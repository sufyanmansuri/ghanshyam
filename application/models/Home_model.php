<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model
{
    function createAccount($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_users', $userInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();
        return $insert_id;
    }
    function loginAccount($userInfo)
    {
        $this->db->trans_start();
        $this->db->get('tbl_users', $userInfo);
        $this->db->trans_complete();
    }
        /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }
    function getAddress()
    {
        $this->db->select('BaseTbl.*, Users.*');
        $this->db->from('tbl_address as BaseTbl');
        $this->db->join('tbl_users as Users', 'Users.userId = BaseTbl.userId','left');
        $query = $this->db->get();

        return $query->result();

    }
    /**
     * This function used to insert reset password data
     * @param {array} $data : This is reset password data
     * @return {boolean} $result : TRUE/FALSE
     */
    function resetPasswordCustomer($data)
    {
        $result = $this->db->insert('tbl_reset_password', $data);

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
