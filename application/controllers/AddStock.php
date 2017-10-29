<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddStock extends CI_Controller {

	public function index()
	{
		redirect(base_url()."main");
	}

  public function form_validation()
	{
		$this->load->library('form_validation');
    $this->form_validation->set_rules("item_code","Item Code",'required');
    $this->form_validation->set_rules("item_name","Name",'required');
    $this->form_validation->set_rules("item_quantity","Quantity",'required');
		$this->form_validation->set_rules("date","Date",'required');

    if($this->form_validation->run())
     {

  			$this->load->model("kitchen_model");
				$tmp = 0;
  			$data = array(
          "kitchen_item_id"  =>$this->input->post("item_code"),
          "kitchen_item_name" =>$this->input->post("item_name"),
          "item_quantity"  =>$this->input->post("item_quantity"),
          "date_inserted"   =>$this->input->post("date")
        );
				$tdata = array(
					"kitchen_item_id" =>$this->input->post("item_code"),
					"kitchen_item_name" =>$this->input->post("item_name"),
					"available_stock" =>$tmp,
					"date_inserted" =>$this->input->post("date")
				);
        $this->kitchen_model->insertMainStock($data);
				$this->kitchen_model->monthlyInsert($tdata);
  			redirect(base_url()."main");
  		}
  		else
  		{
  			$this->index();
  		}
  	}

  }
