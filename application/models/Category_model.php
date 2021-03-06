<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model
{
    /**
     * This function is used to get the category listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function categoryListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_categories as BaseTbl');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.categoryid  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get the category listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function categoryListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_categories as BaseTbl');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.categoryid  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.categoryid');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function getCategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_categories');
        $this->db->order_by('name');
        $this->db->limit('6');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getAllCategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_categories');
        $this->db->order_by('name');
        //$this->db->limit('6');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getProducts($id, $sort)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        if ($id !== "All") {
            $this->db->where('categoryid', $id);
        }
        if ($sort == 'nothing') {
            $this->db->order_by('productName', 'ASC');
        } else if ($sort == 'priceDesc') {
            $this->db->order_by('price', 'DESC');
        } else {
            $this->db->order_by('price', 'ASC');
        }
        //$this->db->limit('6');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function searchProducts($search)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where("productName LIKE '%$search%'");
        $this->db->order_by('productName', 'ASC');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to add new category to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewCategory($categoryInfo)
    {
        $this->db->trans_start();
        $query =
            $this->db->insert('tbl_categories', $categoryInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    /**
     * This function used to get category information by id
     * @param number $categoryd : This is category id
     * @return array $result : This is category information
     */
    function getCategoryInfo($categoryid)
    {
        $this->db->select('categoryid, name,categoryImage');
        $this->db->from('tbl_categories');
        $this->db->where('categoryid', $categoryid);
        $query = $this->db->get();

        return $query->row();
    }
    /**
     * This function is used to update the category information
     * @param array $categoryInfo : This is category updated information
     * @param number $categoryd : This is category id
     */
    function editCategory($categoryInfo, $categoryid)
    {
        $this->db->where('categoryid', $categoryid);
        $this->db->update('tbl_categories', $categoryInfo);

        return TRUE;
    }
    /**
     * This function is used to delete the category information
     * @param number $categoryid : This is category id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCategory($categoryid)
    {
        $this->db->delete('tbl_categories', array('categoryid' => $categoryid));
        return $this->db->affected_rows();
    }
}
