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
        $this->db->select('BaseTbl.categoryid, BaseTbl.name');
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
        $this->db->select('BaseTbl.categoryid, BaseTbl.name');
        $this->db->from('tbl_categories as BaseTbl');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.categoryid  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.categoryid', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
}
