<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Package_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function packageListingCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_package as package');
        if (!empty($searchText)) {
            $likeCriteria = "(package.packageId  LIKE '%" . $searchText . "%'
            OR  package.PackageName  LIKE '%" . $searchText . "%'
            OR  package.packageImage  LIKE '%" . $searchText . "%'
            OR  product.packageDesc  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get the package listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function packageListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_package as package');
        if (!empty($searchText)) {
            $likeCriteria = "(package.packageId  LIKE '%" . $searchText . "%'
            OR  package.PackageName  LIKE '%" . $searchText . "%'
            OR  package.packageImage  LIKE '%" . $searchText . "%'
            OR  product.packageDesc  LIKE '%" . $searchText . "%')";
        }
        $this->db->order_by('package.packageId');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function getPackage()
    {
        $this->db->select('*');
        $this->db->from('tbl_package');
        //$this->db->order_by('name');
        $this->db->limit('3');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getPackageInfo($packageId)
    {
        $this->db->select('*');
        $this->db->from('tbl_package');
        //$this->db->order_by('name');
        //$this->db->limit('3');
        $this->db->where('tbl_package.packageId', $packageId);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllPackage()
    {
        $this->db->select('*');
        $this->db->from('tbl_package');
        //$this->db->order_by('name');
        //$this->db->limit('3');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getPackageProducts($packageId)
    {
        $this->db->select('*');
        $this->db->from('tbl_package as p');
        // $this->db->from('tbl_products as pr');
        $this->db->join('tbl_packagedetails as pd', 'p.packageId = pd.packageId', 'left');
        $this->db->join('tbl_products as pr', 'pr.productId = pd.productId', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    function getProducts($packageId)
    {
        $this->db->select('pd.productId');
        $this->db->from('tbl_packagedetails as pd');
        $this->db->where('pd.packageId', $packageId);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function packageProductListingCount($searchText = '', $packageId)
    {
        $this->db->select('*');
        $this->db->from('tbl_products as p', 'tbl_packagedetails as pd');
        $this->db->where('pd.packageId', $packageId);
        $this->db->join('tbl_packagedetails as pd', 'p.productId = pd.productId', 'left');
        //$this->db->where('pd.productId','p.productId');
        if (!empty($searchText)) {
            $likeCriteria = "(p.productId  LIKE '%" . $searchText . "%'
            OR  p.productName  LIKE '%" . $searchText . "%'
            OR  p.productImage  LIKE '%" . $searchText . "%'
            OR  p.productDesc  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    function packageProductListing($searchText = '', $packageId, $page, $segment)
    {
        
        $query = $this->db->query('SELECT * FROM tbl_packagedetails as pd , tbl_products as p , tbl_package as pg WHERE pg.packageId = pd.packageId AND p.productId = pd.productId');
        if (!empty($searchText)) {
            $likeCriteria = "(pr.productId  LIKE '%" . $searchText . "%'
            OR  pr.productName  LIKE '%" . $searchText . "%'
            OR  pr.productImage  LIKE '%" . $searchText . "%'
            OR  pr.productDesc  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $result = $query->result(); 
        return $result;
    }
    function removeProduct($productId,$packageId)
    {
        $query = $this->db->query('DELETE FROM tbl_packagedetails WHERE productId  = '.$productId.' AND packageId = '.$packageId);
    }
}
