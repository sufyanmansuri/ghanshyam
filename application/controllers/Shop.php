<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
        $this->load->model('cart_model');
        $this->load->model('package_model');
    }

    public function index()
    {
        $data['cid'] = ($this->uri->segment(3) != '') ? $this->uri->segment(3) : "All";
        $data['sort'] = ($this->uri->segment(4) != '') ? $this->uri->segment(4) : 'nothing';
        $data['allCategory'] = $this->category_model->getAllCategory();
        $data['allPackage'] = $this->package_model->getAllPackage();
        if (isset($_GET['search']) && $_GET['search'] != '') {
            $data['product'] = $this->category_model->searchProducts($_GET['search']);
        } else {
            $data['product'] = $this->category_model->getProducts($data['cid'], $data['sort']);
        }
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if (isset($isLoggedIn) || $isLoggedIn == TRUE) {
            $data1['getCartCount'] = $this->cart_model->getCartCount();
            $this->load->view('header', $data1);
        } else {
            $this->load->view('header');
        }
        $this->load->view('shop', $data);
        $this->load->view('footer');
        
    }
    public function addCart()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if (isset($isLoggedIn) || $isLoggedIn == TRUE) {
            $userInfo = $this->session->userdata();
            $checkdup = $this->cart_model->checkdup($userInfo['userId'], $this->input->post('pid'));
            if (count($checkdup) == 0) {

                $uid = $userInfo['userId'];
                $pid = $this->input->post('pid');
                $data = array('user_id' => $uid, 'product_id' => $pid);
                $this->cart_model->insertProduct($data);
                $data['response'] = 'yes';
            } else {
                $data['response'] = 'duplicate';
            }
            echo json_encode($data);
        } else {
            $data['pid'] = $this->input->post('pid');
            $data['error'] = 'yes';
            echo json_encode($data);
            //redirect('/registration?pid='.$pid);
        }
    }
    function addAll()
    {
        $packageId = $_POST['package'];
        $productInfo = $this->package_model->getProducts($packageId);
        $count = count($productInfo);
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if (isset($isLoggedIn) || $isLoggedIn == TRUE) {
            $userInfo = $this->session->userdata();
            for ($i = 0; $i < $count; $i++) {
                $productId = $productInfo[$i];
                $checkdup = $this->cart_model->checkdup($userInfo['userId'], $productId->productId);
                if (count($checkdup) == 0) {
                    $this->cart_model->addProduct($productId);
                }
            }
        }
        redirect('Cart');
    }
}
