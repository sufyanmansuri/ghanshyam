<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Package extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('package_model');
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
     * This function is used to load package list
     */
    function packageListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->package_model->packageListingCount($searchText);
            $returns = $this->paginationCompress("packageListing/", $count, 10);
            $data['packageRecords'] = $this->package_model->packageListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Ghanshyam : Package Listing';
            $this->loadViews("packages", $this->global, $data, NULL);
        }
    }
    function packageProductListing($packageId)
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->package_model->packageProductListingCount($searchText,$packageId);
            $returns = $this->paginationCompress("packageListing/", $count, 10);
            $data['packageInfo']=$this->package_model->getPackageInfo($packageId);
            $data['packageProductRecords'] = $this->package_model->packageProductListing($searchText, $packageId, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Ghanshyam : Package Listing';
            $this->loadViews("packageProducts", $this->global, $data, NULL);
        }
    }
    function removeProduct($productId,$packageId)
    {
        $this->package_model->removeProduct($productId,$packageId);
        redirect('/packageProductListing/'.$packageId);
    }
}
