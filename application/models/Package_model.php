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
}
