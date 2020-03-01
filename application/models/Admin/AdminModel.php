<?php
    class AdminModel extends CI_Model
    {
        public function CreateAccount(){
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $email = $this->input->post('email');
            $pword = $this->input->post('password');
            $mob = $this->input->post('mobile_number');
            $insert_admin = $this->db->insert('user',['user_fname'=>$fname,'user_lname'=>$lname,'user_email'=>$email,'user_pwd'=>$pword,'user_contact'=>$mob,'create_date'=>date('Y-m-d'),'admin_month'=>date('m'),'admin_year'=>date('Y')]);
            if ($insert_admin)
            {
                return true;
            }
            else{
                return false;
            }
        }

        public function Login(){
            $ausername=$this->input->post('admin_username');
            $apassword=$this->input->post('admin_password');
            $check_user = $this->db->get_where('user',['user_email'=>$ausername,'user_pwd'=>$apassword]);
            if($check_user->num_rows() > 0)
            {
                return true;
            }
            else{
                return false;
            }
        }
    }
