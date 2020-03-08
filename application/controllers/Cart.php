<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model');
	}
	
	public function index()
	{
		$this->load->model('cart_model');
		$data['getCart'] = $this->cart_model->getCart();
		$this->load->view('header');
        $this->load->view('cart',$data);
        $this->load->view('footer');
	}
}
