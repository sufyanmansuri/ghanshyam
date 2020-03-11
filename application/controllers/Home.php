<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->model('login_model');
        $this->load->model('cart_model');
    }

    public function index()
    {
        $data['getCategory'] = $this->category_model->getCategory();
        $data['getProduct'] = $this->product_model->getProduct();
        if (!$this->session->userdata('role') || $this->session->userdata('role') == 4) {
            $this->load->view('header');
            $this->load->view('index', $data);
            $this->load->view('footer');
        } else if ($this->session->userdata('role') != 4) {
            redirect('login');
        }
    }

    public function createAccount()
    {
        $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fullname'))));
        $email = strtolower($this->security->xss_clean($this->input->post('email')));
        $password = $this->input->post('password');
        $roleId = 4;
        $pid = $this->input->post('pid');

        $userInfo = array(
            'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $roleId, 'name' => $name, 'createdDtm' => date('Y-m-d H:i:s')
        );
        $this->load->model('home_model');
        $createAccount = $this->home_model->createAccount($userInfo);
        $result = $this->login_model->loginMe($email, $password);

        if (!empty($result)) {
            $lastLogin = $this->login_model->lastLoginInfo($result->userId);

            $sessionArray = array(
                'userId' => $result->userId,
                'role' => $result->roleId,
                'roleText' => $result->role,
                'name' => $result->name,
                'email' => $result->email,
                'mobile' => $result->mobile,
                'lastLogin' => $lastLogin->createdDtm,
                'isLoggedIn' => TRUE
            );

            $this->session->set_userdata($sessionArray);

            //unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

            $loginInfo = array("userId" => $result->userId, "sessionData" => json_encode($sessionArray), "machineIp" => $_SERVER['REMOTE_ADDR'], "userAgent" => getBrowserAgent(), "agentString" => $this->agent->agent_string(), "platform" => $this->agent->platform());

            $this->login_model->lastLogin($loginInfo);

            //redirect('/dashboard');
            if ($result > 0) {
                $this->session->set_flashdata('success', 'New User created successfully');
            } else {
                $this->session->set_flashdata('error', 'User creation failed');
            }
            if ($pid == '') {

                redirect('/');
            } else {
                $checkdup = $this->cart_model->checkdup($sessionArray['userId'], $pid);
                if (count($checkdup) == 0) {

                    $uid = $sessionArray['userId'];
                    $data = array('user_id' => $uid, 'product_id' => $pid);
                    $this->cart_model->insertProduct($data);
                }
                redirect('shop/index');
            }
        } else {

            $this->session->set_flashdata('error', 'Something went wrong!');
            redirect('registration');
        }
    }
    public function loginAccount()
    {
        $email = strtolower($this->security->xss_clean($this->input->post('lemail')));
        $password = $this->input->post('lpassword');
        $pid = $this->input->post('lpid');

        $userInfo = array(
            'email' => $email, 'password' => getHashedPassword($password)
        );
        $this->load->model('home_model');
        $loginAccount = $this->home_model->loginAccount($userInfo);
        $result = $this->login_model->loginMe($email, $password);

        if (!empty($result)) {
            $lastLogin = $this->login_model->lastLoginInfo($result->userId);
            $sessionArray = array(
                'userId' => $result->userId,
                'role' => $result->roleId,
                'roleText' => $result->role,
                'name' => $result->name,
                'email' => $result->email,
                'mobile' => $result->mobile,
                'lastLogin' => $lastLogin->createdDtm,
                'isLoggedIn' => TRUE
            );

            $this->session->set_userdata($sessionArray);

            //unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);

            $loginInfo = array("userId" => $result->userId, "sessionData" => json_encode($sessionArray), "machineIp" => $_SERVER['REMOTE_ADDR'], "userAgent" => getBrowserAgent(), "agentString" => $this->agent->agent_string(), "platform" => $this->agent->platform());

            $this->login_model->lastLogin($loginInfo);

            //redirect('/dashboard');
            if ($this->session->userdata('role') == 4) {
                if ($pid == '') {

                    redirect('/');
                } else {
                    $checkdup = $this->cart_model->checkdup($sessionArray['userId'], $pid);
                    if (count($checkdup) == 0) {

                        $uid = $sessionArray['userId'];
                        $data = array('user_id' => $uid, 'product_id' => $pid);
                        $this->cart_model->insertProduct($data);
                    }
                    redirect('shop/index');
                }
            } else {
                redirect('login');
            }
        } else {

            $this->session->set_flashdata('error', 'Something went wrong!');
            redirect('/?status=wrong');
        }
    }
    function logOut()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('');
    }
}
