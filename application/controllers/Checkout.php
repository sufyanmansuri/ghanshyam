<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->view('checkout');
        $this->load->view('footer');
    }
}
