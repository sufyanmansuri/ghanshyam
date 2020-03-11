<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function index()
    {
        $this->load->model('cart_model');
        $data1['getCartCount'] = $this->cart_model->getCartCount();
        $this->load->view('header',$data1);
        $this->load->view('checkout');
        $this->load->view('footer');
    }
}
