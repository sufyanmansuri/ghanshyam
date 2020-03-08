<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Registration extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index()
    {
        $data['userInfo'] = $this->session->userdata();
        $data['pid']=$this->input->get('pid');
        $this->load->view('header');
        $this->load->view('registration',$data);
        $this->load->view('footer');
    }
}