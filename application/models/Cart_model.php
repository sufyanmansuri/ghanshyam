<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cart_model extends CI_Model
{
    
    function insertProduct($categoryInfo)
    {
        //$this->db->trans_start();
        $query =$this->db->insert('tbl_cart', $categoryInfo);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function checkdup($uid,$pid)
    {
        $this->db->select('*');
        $this->db->from('tbl_cart');
        $this->db->where('user_id', $uid);
        $this->db->where('product_id', $pid);
        $query = $this->db->get();

        return $query->result();
    }
    function getCart()
    {
        $this->db->select('BaseTbl.*, Product.*');
        $this->db->from('tbl_cart as BaseTbl');
        $this->db->join('tbl_products as Product', 'Product.productId = BaseTbl.product_id','left');
        $query = $this->db->get();

        return $query->result();

    }
}
