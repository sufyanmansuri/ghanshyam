<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model
{
    /**
     * This function is used to get the category listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function productListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.productId,BaseTbl.productName,BaseTbl.price, BaseTbl.createdDt, Category.name');
        $this->db->from('tbl_products as BaseTbl');
        $this->db->join('tbl_categories as Category', 'Category.categoryid = BaseTbl.categoryid', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.productName  LIKE '%" . $searchText . "%'
                            OR  Category.name  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.price  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function productListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_products as BaseTbl');
        $this->db->join('tbl_categories as Category', 'Category.categoryid = BaseTbl.categoryid', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.productName  LIKE '%" . $searchText . "%'
                            OR  Category.name  LIKE '%" . $searchText . "%'
                            OR  Product.name  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.price  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.productId', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getProductCategories()
    {
        $this->db->select('categoryid, name');
        $this->db->from('tbl_categories');
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewProduct($productInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_products', $productInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getProductInfo($productId)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('productId', $productId);
        $query = $this->db->get();
        
        return $query->row();
    }

    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editProduct($productInfo, $productId)
    {
        $this->db->where('productId', $productId);
        $this->db->update('tbl_products', $productInfo);
        
        return TRUE;
    }
    function getProduct()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        //$this->db->order_by('name');
        $this->db->limit('8');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
