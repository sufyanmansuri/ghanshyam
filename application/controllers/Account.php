<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ACcount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('my-account');
        $this->load->view('footer');
    }

}
?>