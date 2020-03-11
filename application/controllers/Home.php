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
        $this->load->model('package_model');
    }

    public function index()
    {
        $data['getCategory'] = $this->category_model->getCategory();
        $data['getProduct'] = $this->product_model->getProduct();
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        $data['getPackage'] = $this->package_model->getPackage();
        if (!$this->session->userdata('role') || $this->session->userdata('role') == 4) {
            $isLoggedIn = $this->session->userdata('isLoggedIn');
            if (isset($isLoggedIn) || $isLoggedIn == TRUE) {
                $data1['getCartCount'] = $this->cart_model->getCartCount();
                $this->load->view('header', $data1);
            } else {
                $this->load->view('header');
            }
            $this->load->view('index',$data);
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
    /**
     * This function used to load forgot password view
     */
    public function customerForgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $this->load->view('customerForgotPassword');
        } else {
            redirect('/');
        }
    }

    /**
     * This function used to generate reset password request link
     */
    function resetPasswordCustomer()
    {
        $status = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->customerForgotPassword();
        } else {
            $email = strtolower($this->security->xss_clean($this->input->post('login_email')));

            if ($this->login_model->checkEmailExist($email)) {
                $encoded_email = urlencode($email);

                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum', 15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();

                $save = $this->home_model->resetPasswordCustomer($data);

                if ($save) {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmCustomer/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if (!empty($userInfo)) {
                        $data1["name"] = $userInfo->name;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if ($sendStatus) {
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                } else {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            } else {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }
    /**
     * This function used to reset the password 
     * @param string $activation_id : This is unique id
     * @param string $email : This is user email
     */
    function resetPasswordConfirmCustomer($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);

        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        $data['email'] = $email;
        $data['activation_code'] = $activation_id;
        if ($is_correct == 1) {
            $this->load->view('newCustomerPassword', $data);
        } else {
            redirect('home/customerForgotPassword');
        }
    }
    /**
     * This function used to create new password for user
     */
    function createPasswordCustomer()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->resetPasswordConfirmcustomer($activation_id, urlencode($email));
        } else {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');

            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

            if ($is_correct == 1) {
                $this->login_model->createPasswordUser($email, $password);

                $status = 'success';
                $message = 'Password reset successfully';
            } else {
                $status = 'error';
                $message = 'Password reset failed';
            }

            setFlashData($status, $message);
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
                redirect("Account");
            }
        }
    }
    function package($packageId = 1)
    {
        $data['packageId'] = $this->uri->segment(2);
        $data['allCategory'] = $this->category_model->getAllCategory();
        $data['allPackage'] = $this->package_model->getAllPackage();
        $data['packageProduct'] = $this->package_model->getPackageProducts($data['packageId']);
        //$data['product']=$this->category_model->getProducts($data['cid'],$data['sort']);
        $data['packageInfo'] = $this->package_model->getPackageInfo($data['packageId']);
        $this->load->view('header');
        $this->load->view('package', $data);
        $this->load->view('footer');
    }
}
