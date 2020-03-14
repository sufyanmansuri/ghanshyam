<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('home_model');
        $this->load->model('cart_model');
    }

    public function index()
    {
        $data1['getCartCount'] = $this->cart_model->getCartCount();
        $this->load->view('header',$data1);
        $data['getAddress'] = $this->home_model->getAddress();
        $this->load->view('my-account', $data);
        $this->load->view('footer');
    }
    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function accountUpdate()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('changeName', 'Full Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('changeMobile', 'Mobile Number', 'required|min_length[10]');
        $this->form_validation->set_rules('changeEmail', 'Your email', 'trim|required|valid_email|max_length[128]|callback_emailExists');
        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_message('Invalid data');
        } else {

            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('changeName'))));
            $mobile = $this->security->xss_clean($this->input->post('changeMobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('changeEmail')));

            $userInfo = array('name' => $name, 'email' => $email, 'mobile' => $mobile, 'updatedBy' => $this->userId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->editUser($userInfo, $this->userId);

            if ($result == true) {
                $this->session->set_userdata('name', $name);
                $this->session->set_userdata('mobile', $mobile);
                $this->session->set_userdata('email', $email);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('Account');
        }
    }
    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $userId = $_SESSION['userId'];
        $return = false;
        $result = $this->home_model->checkEmailExists($email, $userId);

        if (empty($result)) {
            $return = true;
        } else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword', 'Old password', 'required|max_length[20]');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('Account');
            } else {
                $usersData = array(
                    'password' => getHashedPassword($newPassword), 'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->user_model->changePassword($_SESSION['userId'], $usersData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password updation successful');
                } else {
                    $this->session->set_flashdata('error', 'Password updation failed');
                }

                redirect('Account');
            }
        }
    }
}
