<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Category extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
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
     * This function is used to load category list
     */
    function categoryListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->category_model->categoryListingCount($searchText);
            $returns = $this->paginationCompress("categoryListing/", $count, 10);
            $data['categoryRecords'] = $this->category_model->categoryListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Ghanshyam : Category Listing';
            $this->loadViews("categories", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewC()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('Category_model');
            $this->global['pageTitle'] = 'Ghanshyam : Add New Category';
            $this->loadViews("addNewC", $this->global, NULL, NULL);
        }
    }

    /**
     * This function is used to add new category to the system
     */
    function addNewCategory()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('cname', 'Category Name', 'trim|required|max_length[128]');

            if ($this->form_validation->run() == FALSE) {
                $this->addNewC();
            } else {
                $file=$_FILES['file']['tmp_name'];
                $path=FCPATH.'asset/image/';
                $path_parts = pathinfo($_FILES['file']['name']);
                $fileextension=$path_parts['extension'];
                $imagename=time().'.'.$fileextension;
                $imagepath=$path.$imagename;
                move_uploaded_file($file, $imagepath);
                $url=base_url().'asset/image/'.$imagename;
                $cname = ucwords(strtolower($this->security->xss_clean($this->input->post('cname'))));

                $categoryInfo = array('name' => $cname,'categoryImage'=>$url);

                $this->load->model('category_model');
                $result = $this->category_model->addNewCategory($categoryInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New Category added successfully');
                } else {
                    $this->session->set_flashdata('error', 'Process failed');
                }

                redirect('Category/addNewC');
            }
        }
    }
    /**
     * This function is used load Category edit information
     * @param number $categoryid : Optional : This is category id
     */
    function editOldC($categoryid = NULL)
    {
        if ($this->isAdmin() == TRUE /* || $userId == 1*/) {
            $this->loadThis();
        } else {
            /*
            if($userId == null)
            {
                redirect('userListing');
            }*/

            $data['categoryInfo'] = $this->category_model->getCategoryInfo($categoryid);

            $this->global['pageTitle'] = 'Ghanshyam : Edit Category';

            $this->loadViews("editOldC", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used to edit the category information
     */
    function editCategory()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            //echo "<pre>";print_r($_FILES['file']);exit;
            if ($_FILES['file']['error'] == 0) {
                //echo 'if';exit;
                $file = $_FILES['file']['tmp_name'];
                $path = FCPATH . 'asset/image/';
                $path_parts = pathinfo($_FILES['file']['name']);
                $fileextension = $path_parts['extension'];
                $imagename = time() . '.' . $fileextension;
                $imagepath = $path . $imagename;
                move_uploaded_file($file, $imagepath);
                //$url=base_url().'asset/image/'.$imagename;
                $url = base_url() . 'asset/image/' . $imagename;
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $categoryid = $this->input->post('categoryid');
                $categoryInfo = array('name'=>$name,'categoryImage'=>$url,'categoryid'=>$categoryid);
            } else {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
                $categoryid = $this->input->post('categoryid');
                $categoryInfo = array('categoryid' => $categoryid, 'name' => $name);
            }

            $result = $this->category_model->editCategory($categoryInfo, $categoryid);
            if ($result == true) {
                $this->session->set_flashdata('success', 'Product updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Operation failed');
            }
            redirect('Category/categoryListing');
        }
    }
    public function deleteCategory($categoryid)
    {
        $this->category_model->deleteCategory($categoryid);
        redirect('categoryListing');
    }
}
/**
 * This function is used to delete the category using categoryid
 * @return boolean $result : TRUE / FALSE
     
    function deleteCategory()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $categoryid = $this->input->post('categoryid');
            $categoryInfo = array('categoryid'=>$categoryid);
            
            $result = $this->user_model->deleteCategory($categoryid, $categoryInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }*/
