<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->model("kitchen_model");
		$data['infos'] = $this->kitchen_model->tableMainStock();
		$data['avail'] = $this->kitchen_model->tableAvailableStock();
		$data['month'] = $this->kitchen_model->tableMonthlyUsage();

		$this->load->view('kitchen_inventory',$data);
	}

	public function form_validation()
	{
		$this->load->library('form_validation');
    $this->form_validation->set_rules("item_code","Item Code",'required');
    $this->form_validation->set_rules("item_quantity","Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');

    if($this->form_validation->run())
     {
      $this->load->model("kitchen_model");
			$id = $this->input->post("item_code");
			$item_name = $this->kitchen_model->getItemName($id);
			$data = array(
				"kitchen_item_id"  =>$this->input->post("item_code"),
				"kitchen_item_name" =>$item_name,
				"used_quantity"  =>$this->input->post("item_quantity"),
				"date"  =>$this->input->post("date")
			);

			$this->kitchen_model->insert_data($data);

			$this->load->model("kitchen_model");
			$tmp = $this->input->post("item_quantity");
			$ava = (float)$tmp;

			$new  = $this->kitchen_model->get_data($id);
			$new_ava = (-1)*$ava + (float)$new;
			$dt = array(
				"item_quantity"   =>$new_ava
			);
			$this->kitchen_model->update_data($dt,$id);

			$available = $this->kitchen_model->monthly($id);
			$pass = $available + $ava;
			$dtt = array(
				"available_stock"  =>$pass,
				"date_inserted"  =>$this->input->post("date")
			);
			$this->kitchen_model->monthly_update($dtt,$id);
			redirect(base_url()."main");
    }
    else
    {
      redirect(base_url()."main");
    }
  }


}
