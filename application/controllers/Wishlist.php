<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wishlist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('wishlist');
        $this->load->view('footer');
    }

}
?>