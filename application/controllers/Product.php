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

            $this->form_validation->set_rules('productName', 'Product Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->addNewP();
            } else {
                $productName = ucwords(strtolower($this->security->xss_clean($this->input->post('productName'))));
                $price = $this->security->xss_clean($this->input->post('price'));
                $categoryid = $this->input->post('category');
                $productInfo = array('productName' => $productName, 'categoryid' => $categoryid, 'price' => $price, 'createdBy' => $this->vendorId,);
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
            
            $productId = $this->input->post('productId');
            
            $this->form_validation->set_rules('productName', 'Product Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOldP($productId);
            }
            else
            {
                $productName = ucwords(strtolower($this->security->xss_clean($this->input->post('productName'))));
                $price = $this->security->xss_clean($this->input->post('price'));
                $categoryid = $this->input->post('category');
                
                $productInfo = array('productName'=>$productName, 'categoryid'=>$categoryid, 'price'=>$price);
                
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
}
