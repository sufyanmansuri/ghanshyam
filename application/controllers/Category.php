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
    function addNew()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('Category_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'Ghanshyam : Add New User';

            $this->loadViews("addNewCategory", $this->global, $data, NULL);
        }
    }
    /**
     * This function is used load category edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            
            $this->global['pageTitle'] = 'CodeInsect : Edit User';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
}
