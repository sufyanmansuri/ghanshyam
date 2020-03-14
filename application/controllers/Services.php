<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('cart_model');
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(isset($isLoggedIn) || $isLoggedIn == TRUE){
            $data1['getCartCount'] = $this->cart_model->getCartCount();
            $this->load->view('header',$data1);
        }else{
            $this->load->view('header');
        }
        $this->load->view('services');
        $this->load->view('footer');
    }

}
?>