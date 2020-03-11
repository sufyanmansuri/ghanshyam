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
        $this->db->from('tbl_packagedetails as pd, tbl_products as product, tbl_package as package');
        $this->db->where('pd.productId LIKE product.productId AND package.packageId LIKE pd.packageId');
        if (!empty($searchText)) {
            $likeCriteria = "(package.packageId  LIKE '%" . $searchText . "%'
            OR  package.PackageName  LIKE '%" . $searchText . "%'
            OR  product.productId  LIKE '%" . $searchText . "%'
            OR  product.productName  LIKE '%" . $searchText . "%')";
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
        $this->db->from('tbl_packagedetails as pd, tbl_products as product, tbl_package as package');
        $this->db->where('pd.productId LIKE product.productId AND package.packageId LIKE pd.packageId');
        if (!empty($searchText)) {
            $likeCriteria = "(package.packageId  LIKE '%" . $searchText . "%'
                            OR  package.packageName  LIKE '%" . $searchText . "%'
                            OR  product.productId  LIKE '%" . $searchText . "%'
                            OR  product.productName  LIKE '%" . $searchText . "%')";
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
        $this->db->where('tbl_package.packageId',$packageId);
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
        $this->db->join('tbl_packagedetails as pd','p.packageId = pd.packageId','left');
        $this->db->join('tbl_products as pr','pr.productId = pd.productId','left');
        $query = $this->db->get();
        return $query->result();
    }
    function getProducts($packageId)
    {
        $this->db->select('pd.productId');
        $this->db->from('tbl_packagedetails as pd');
        $this->db->where('pd.packageId',$packageId);
        $query=$this->db->get();
        return $query->result();
    }
}
