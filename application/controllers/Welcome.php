<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
    redirect(base_url()."main");
		//$this->load->view('kitchen_inventory');
	}
}
