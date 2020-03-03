<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/AdminModel','am');
    }

    public function index()
    {
        if($this->session->userdata('admin_username') == "" && $this->session->userdata('admin_pwd') == "")
        {
            $this->load->view('Admin/index');
        }
        else{
            return redirect('Admin/Dashboard');
        }
    }

    public function CreateAccount()
    {
        $result = $this->am->CreateAccount();
        $admin_email=$this->input->post('email');
        $admin_pwd=$this->input->post('password');
        $this->load->view('Admin/mymail','','true');
        if($result){/*
            $this->load->library('email');
            $config['charset']='utf-8';
            $config['mailtype']='html';
            $this->email->initialize($config);
            $this->email->to($admin_email);
            $this->email->from('sufyan8834@gmail.com');
            $this->email->subject('Ghanshyam Caterers Admin Account');
            $this->email->message($msg);
            if($this->email->send())
            {
                $this->load->view('Admin/Dashboard');
            }
            else{
                return redirect('Admin/index');
            }*/
            $session_data = [
                'admin_username'    =>  $admin_email,
                'admin_pwd' =>  $admin_pwd
            ];
            $this->session->set_userdata($session_data);
            return redirect('Admin/Dashboard');
        }
        else{
            return redirect('Admin/index');
        }
    }
    public function Login(){
        $ausername = $this->input->post('admin_username');
        $apassword = $this->input->post('admin_password');
        $result = $this->am->Login();
        if($result == true){
            $session_data = [
                'admin_username'=>$ausername,
                'admin_password'=>$apassword
            ];
            $this->session->set_userdata($session_data);
            $this->Dashboard();
        }
        else{
            return redirect('Admin/index');
        }
    }
    public function Dashboard(){
        if($this->session->userdata('admin_username') == "" && $this->session->userdata('admin_pwd') == "")
        {
            return redirect('Admin/index');
        }
        else{
            $this->load->view('Admin/Dashboard');
        }
    }

    public function Logout(){
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_password');
        return redirect('Admin/index');
    }
}
?>