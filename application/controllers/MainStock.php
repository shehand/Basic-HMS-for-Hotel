<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainStock extends CI_Controller {

	public function index()
	{
		redirect(base_url()."main");
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
  			$tmp = $this->input->post("item_quantity");
  			$ava = (float)$tmp;
  			$id = $this->input->post("item_code");

  			$new  = $this->kitchen_model->get_data($id);
  			$new_ava = $ava + (float)$new;
  			$dt = array(
  				"item_quantity"   =>$new_ava,
  				"date_inserted" =>$this->input->post("date")
  			);
  			$this->kitchen_model->insertMain($dt,$id);
  			redirect(base_url()."main");
  		}
  		else
  		{
  			$this->index();
  		}
  	}

  }
