<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Product extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Ghanshyam : Dashboard';
        $this->loadViews("dashboard", $this->global, NULL, NULL);
    }

    /**
     * This function is used to load product list
     */
    function productListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->product_model->productListingCount($searchText);
            $returns = $this->paginationCompress("productListing/", $count, 10);
            $data['productRecords'] = $this->product_model->productListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Ghanshyam : Category Listing';
            $this->loadViews("products", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to load the add new form
     */
    function addNewP()
    {
        //echo FCPATH;exit;
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('product_model');
            $data['categories'] = $this->product_model->getProductCategories();
            $this->global['pageTitle'] = 'Ghanshyam : Add New Product';
            $this->loadViews("addNewP", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewProduct()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('productName', 'Product Name', 'required');
            //$this->form_validation->set_rules('file', 'file', 'required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->addNewP();
            } else {
                $file=$_FILES['file']['tmp_name'];
                $path=FCPATH.'asset/image/';
                $path_parts = pathinfo($_FILES['file']['name']);
                $fileextension=$path_parts['extension'];
                $imagename=time().'.'.$fileextension;
                $imagepath=$path.$imagename;
                move_uploaded_file($file, $imagepath);
                $url=base_url().'asset/image/'.$imagename;
                $productName = ucwords(strtolower($this->security->xss_clean($this->input->post('productName'))));
                $price = $this->security->xss_clean($this->input->post('price'));
                $categoryid = $this->input->post('category');
                $desc=$this->input->post('desc');
                $productInfo = array('productName' => $productName,'desc'=>$desc,'image'=>$url,'categoryid' => $categoryid, 'price' => $price, 'createdBy' => $this->vendorId,);
                $this->load->model('product_model');
                $result = $this->product_model->addNewProduct($productInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Product added successfully');
                } else {
                    $this->session->set_flashdata('error', 'Task failed');
                }

                redirect('addNewP');
            }
        }
    }

    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOldP($productId = NULL)
    {
        if($this->isAdmin() == TRUE || $productId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($productId == null)
            {
                redirect('productListing');
            }
            
            $data['categories'] = $this->product_model->getProductCategories();
            $data['productInfo'] = $this->product_model->getProductInfo($productId);
            
            $this->global['pageTitle'] = 'Ghanshyam : Edit Product';
            
            $this->loadViews("editOldP", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to edit the user information
     */
    function editProduct()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $productId = $this->input->post('productid');
            $this->form_validation->set_rules('productName', 'Product Name', 'required|max_length[128]');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOldP($productId);
            }
            else
            {
                //echo "<pre>";print_r($_FILES['file']);exit;
                if($_FILES['file']['error'] == 0){
                //echo 'if';exit;
                $file=$_FILES['file']['tmp_name'];
                $path=FCPATH.'asset/image/';
                $path_parts = pathinfo($_FILES['file']['name']);
                $fileextension=$path_parts['extension'];
                $imagename=time().'.'.$fileextension;
                $imagepath=$path.$imagename;
                move_uploaded_file($file, $imagepath);
                //$url=base_url().'asset/image/'.$imagename;
                $url=base_url().'asset/image/'.$imagename;
                $productName = ucwords(strtolower($this->security->xss_clean($this->input->post('productName'))));
                $price = $this->security->xss_clean($this->input->post('price'));
                $categoryid = $this->input->post('category');
                $desc = $this->input->post('desc');
                $productInfo = array('productName'=>$productName,'desc'=>$desc,'image'=>$url,'categoryid'=>$categoryid, 'price'=>$price);

                }else{
                   // echo 'else';exit;
                $productName = ucwords(strtolower($this->security->xss_clean($this->input->post('productName'))));
                $price = $this->security->xss_clean($this->input->post('price'));
                $categoryid = $this->input->post('category');
                $desc = $this->input->post('desc');
                $productInfo = array('productName'=>$productName,'desc'=>$desc,'categoryid'=>$categoryid, 'price'=>$price);

                }
                
                //print_r($productInfo);exit;
                $result = $this->product_model->editProduct($productInfo, $productId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Product updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Operation failed');
                }
                redirect('productListing');
            }
        }
    }
    public function deleteProduct($productId)
    {
        $this->product_model->deleteProduct($productId);
        redirect('productListing');
    }
}
