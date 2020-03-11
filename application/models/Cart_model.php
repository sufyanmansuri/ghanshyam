<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cart_model extends CI_Model
{

    function insertProduct($categoryInfo)
    {
        //$this->db->trans_start();
        $query = $this->db->insert('tbl_cart', $categoryInfo);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function checkdup($uid, $pid)
    {
        $this->db->select('*');
        $this->db->from('tbl_cart');
        $this->db->where('user_id', $uid);
        $this->db->where('product_id', $pid);
        $query = $this->db->get();

        return $query->result();
    }
    function getCart($uid)
    {
        $this->db->select('BaseTbl.*, Product.*');
        $this->db->from('tbl_cart as BaseTbl');
        $this->db->join('tbl_products as Product', 'Product.productId = BaseTbl.product_id', 'left');
        $this->db->where('BaseTbl.user_id', $uid);
        $query = $this->db->get();

        return $query->result();
    }
    function removeFromCart($productId, $userId)
    {
        $this->db->delete('tbl_cart', array('user_id' => $userId, 'product_id' => $productId));
        return $this->db->affected_rows();
    }
    function addProduct($productId)
    {
        $query = $this->db->insert('tbl_cart', array('product_id' => $productId->productId, 'user_id' => $_SESSION['userId']));
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    function getCartCount()
    {
        $this->db->select('*');
        $this->db->from('tbl_cart');
        $this->db->where('user_id', $_SESSION['userId']);
        $query = $this->db->get();
        $result=$query->num_rows();
        return $result;
    }
}
