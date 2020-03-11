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

		$userInfo = $this->session->userdata();
		$data['getCart'] = $this->cart_model->getCart($userInfo['userId']);
		$data1['getCartCount'] = $this->cart_model->getCartCount();
        $this->load->view('header',$data1);
		$this->load->view('cart', $data);
		$this->load->view('footer');
	}

	public function addOrder()
	{
		//$this->load->model('order_model');
		//$this->load->model('cart_model');
		//$this->load->model('orderDetails_model');
		$userInfo = $this->session->userdata();
		$getCart = $this->cart_model->getCart($userInfo['userId']);
		//get the post value after submit form
		// insert into order tabel get inserted id
		$array = array();
		$insertOrder = $this->order_model->insert($array);
		foreach ($getCart as $key => $value) {

			$productarray = array('order_id' => $insertOrder, 'product_id' => $value->product_id);
			$this->orderDetails_model->insertOrderDetails($productarray);
		}
		$this->cart_model->deleteCartDetails($userInfo['userId']);

		redirect('/');
	}
	function removeFromCart($productId,$userId)
	{
		$this->cart_model->removeFromCart($productId,$userId);
		redirect('Cart');
	}
}
