<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('m_auth');
    }

    //to call view login
    function index()
    {

        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }
        $this->form_validation->set_rules('username', 'Username', 'trim');
        $this->form_validation->set_rules('pass', 'Pass', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('v_login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');

        //pass data dari model m_auth
        $user = $this->m_auth->getData($username);

        // var_dump($user);
        // die;

        //jika user terdaftar
        if ($user) {
            //jika user aktif
            if ($user['ISACTIVATE'] == 1) {
                //cek password
                if (password_verify($pass, $user['PASSWORD'])) {
                    $data =  [
                        'username' => $user['USERNAME'],
                        'role_id' => $user['ROLE_ID']
                    ];
                    $this->m_auth->store_session($data);
                    if ($user['ROLE_ID'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user/user_community');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                        <p class="mb-0"> Wrong password! </p></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                <p class="mb-0"> Your account has not been activated! </p></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            <p class="mb-0"> Username is not registered! </p></div>');
            redirect('auth');
        }
    }

    function register()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }
        //form validation
        $this->form_validation->set_rules('name', 'Name', 'trim|is_unique[user.username]', [
            'is_unique' => 'Username already used!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email already used!'
        ]);
        $this->form_validation->set_rules('pass', 'Pass', 'trim|min_length[6]|matches[confirm_pass]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password minimal must be 6 character!'
        ]);
        $this->form_validation->set_rules('confirm_pass', 'Pass', 'trim|matches[pass]');

        //memasukkan ke database

        if ($this->form_validation->run() == false) {
            $this->load->view('v_register');
        } else {
            $email = $this->input->post('email', true);
            $token = base64_encode(random_bytes(32));

            $this->m_auth->register($email);
            $this->m_auth->token($email, $token);

            //kirim verifikasi akun
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           <p class="mb-0"> Congratulation! your account has been created. Please activate your account.</p></div>');
            redirect('auth');
        }
        // $tes = $this->uri->segment(3);
        // $tes2 = $this->uri->segment(5);
        // $data['tes'] = $tes;
        // $data['tes2'] = $tes2;
        // echo $tes;
        // echo $tes2;

    }


    private function _sendEmail($token, $type)
    {
        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'dayat.syahseh@gmail.com';
        $config['smtp_pass'] = 'Salshabilla25';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

        $this->email->from('dayat.syahseh@gmail.com', 'Hummanitas');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click here to verify your account: <a href="' . base_url() .
                'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click here to reset your password: <a href="' . base_url() .
                'auth/resetpass?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        };
    }

    //fungsi aktivasi link di email
    function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->m_auth->emailData($email);


        if ($user) {
            $user_token = $this->m_auth->tokenData($token);

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->m_auth->activate($email);
                    $this->m_auth->deleteToken($email);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    <p class="mb-0"> Your account has been activated!</p></div>');

                    redirect('auth');
                } else {
                    $this->m_auth->deleteToken($email);
                    $this->m_auth->deleteUser($email);
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    <p class="mb-0"> Token expired!</p></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                <p class="mb-0"> Token invalid!</p></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            <p class="mb-0"> Account activation failed! Wrong email.</p></div>');
            redirect('auth');
        }
    }

    function forgotPass()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('v_forgot_pass');
        } else {
            $email = $this->input->post('email');
            $user = $this->m_auth->emailData($email);

            if ($user) {
                $token = base64_encode(random_bytes(32));

                $this->m_auth->token($email, $token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                <p class="mb-0"> Please check your email to reset password!</p></div>');
                redirect('auth/forgotPass');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                <p class="mb-0"> Email is not registered! </p></div>');
                redirect('auth/forgotPass');
            }
        }
    }

    function changePass()
    {

        if (!$this->session->userdata('reset_email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }

        $this->form_validation->set_rules('pass', 'Pass', 'trim|min_length[6]|matches[confirm_pass]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password minimal must be 6 character!'
        ]);
        $this->form_validation->set_rules('confirm_pass', 'Pass', 'trim|matches[pass]');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_reset_password');
        } else {
            $pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->m_auth->reset($email, $pass);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           <p class="mb-0">Your password has been changed!</p></div>');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
        <p class="mb-0"> You have been logout!</p></div>');
        redirect('auth');
    }

    function resetpass()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->m_auth->emailData($email);

        if ($user) {
            $user_token = $this->m_auth->tokenData($token);

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePass();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                <p class="mb-0"> Token invalid!</p></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            <p class="mb-0"> Reset password failed! Wrong email.</p></div>');
            redirect('auth');
        }
    }
}
