<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{


    function getUser()
    {
        return $query = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    function editProfileimg($upload_image, $data)
    {
        // $upload_image = $_FILES[$image]['name'];
        if ($upload_image) {



            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/user/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $gambar_lama = $data['user']['USER_IMAGE'];

                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/user/' . $gambar_lama);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('user_image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    function editGeneral($name, $email)
    {
        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
    }

    function editInfo()
    {

        $id = $this->input->post('id');

        $birth = $this->input->post('birthdate');

        $date = strtotime($birth);

        $new = date("Y-m-d", $date);

        $data = [
            'BIO' => $this->input->post('bio'),
            'BIRTHDATE' => $new,
            'ADDRESS' => $this->input->post('address'),
            'NOTELP' => $this->input->post('phone'),

        ];

        $this->db->where('USER_ID', $id);
        $this->db->update('user', $data);
    }

    function editPass()
    {
        $id = $this->input->post('id');

        $data = [
            'PASSWORD' =>  password_hash($this->input->post('newPass'), PASSWORD_DEFAULT),


        ];

        $this->db->where('USER_ID', $id);
        $this->db->update('user', $data);
    }

    function generateRandomString()
    {
        $length = 6;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    function createCom($upload_image, $user_id)
    {
        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path']        = 'assets/img/community/profile';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']            = 2048;

        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $gbr = $this->upload->data('file_name');


        $data = array(

            'COM_NAME' => $this->input->post('name', true),
            'COM_DESC' => $this->input->post('desc', true),
            'COM_ADDRESS' => $this->input->post('address', true),
            'COM_COVER' => 'default-cover.png',
            'COM_EMAIL' => htmlspecialchars($this->input->post('email', true)),
            'COM_TELP' => $this->input->post('phone'),
            'ISPUBLIC' => $this->input->post('vueradio'),
            'COM_CODE' => $this->generateRandomString(),
            'COM_IMAGE' => $gbr


        );
        $this->db->insert('community', $data);

        $com_id = $this->db->insert_id();

        $data = array(

            'USER_ID' => $user_id,
            'COM_ID' => $com_id,
            'ISADMIN' => 1,
            'ISLEADER' => 0,
            'ISVICELEADER' => 0,
            'ISSECRETARY' => 0,
            'ISTREASURER' => 0,
            'MEMBER_STATUS' => 1


        );
        $this->db->insert('community_member', $data);
    }


    function joinCom($user_id, $com_id)
    {
        $q = $this->db->get_where('community_member', array("USER_ID" => $user_id, "COM_ID" => $com_id))->result();

        if (count($q) == 0) {
            $data = array(

                'USER_ID' => $user_id,
                'COM_ID' => $com_id,
                'ISADMIN' => 0,
                'ISLEADER' => 0,
                'ISVICELEADER' => 0,
                'ISSECRETARY' => 0,
                'ISTREASURER' => 0,
                'MEMBER_STATUS' => 0

            );
            $this->db->insert('community_member', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		   <p class="mb-0">You cant join community that you already join or request!</p></div>');
            redirect('user/user_community');
        }
    }

    function allCom()
    {
        $this->db->select("*");
        $this->db->from("community");
        $query = $this->db->get();
        return $query->result();
    }



    public function get_com_detail($Code)
    {
        return $query = $this->db->get_where('community', ['COM_CODE' => $Code])->row_array();
    }

    // public function get_com_member($)
    // {
    //     return $query = $this->db->get_where('community', ['COM_CODE' => $Code])->row_array();
    // }

    function get_user_com($user_id)
    {

        $q = $this->db->join('user', 'user.USER_ID = community_member.USER_ID')->join('community', 'community.COM_ID = community_member.COM_ID')->get_where('community_member', array("community_member.USER_ID" => $user_id, "MEMBER_STATUS" => 1));
        return $q->result();
    }

    function cekMember($user_id, $com_id)
    {
        $query = $this->db->get_where('community_member', array("USER_ID" => $user_id, "COM_ID" => $com_id, "MEMBER_STATUS" => 1))->result();
        return $query;
    }

    //guest
    public function get_user($user_id)
    {
        return $query = $this->db->get_where('user', ['USER_ID' => $user_id])->row_array();
    }
}
