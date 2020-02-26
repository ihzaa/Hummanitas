<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    function register($email)
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('name', true)),
            'user_image' => 'default.jpg',
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
            'gender' => $this->input->post('vueradio'),
            'isactivate' => 0,
            'role_id' => 2
        ];

        $this->db->insert('user', $data);
    }

    function token($email, $token)
    {

        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->db->insert('token', $user_token);
    }

    function store_session($data)
    {
        $this->session->set_userdata($data);
    }

    function getData($username)
    {
        return $query = $this->db->get_where('user', ['username' => $username])->row_array();
    }

    function emailData($email)
    {
        return $query = $this->db->get_where('user', ['email' => $email])->row_array();
    }

    function tokenData($token)
    {
        return $query = $this->db->get_where('token', ['token' => $token])->row_array();
    }

    function deleteUser($email)
    {
        return $query = $this->db->delete('user', ['email' => $email]);
    }

    function deleteToken($email)
    {
        return $query = $this->db->delete('token', ['email' => $email]);
    }

    function activate($email)
    {
        $this->db->set('ISACTIVATE', 1);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    function reset($email, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $this->db->update('user');
    }
}
