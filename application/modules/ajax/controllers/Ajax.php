<?php
// defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('m_ajax');
        $this->load->model('user/m_user');
    }

    function index()
    {
        $keyword = $this->input->post('search');
        $output = '';

        $result = $this->m_ajax->search($keyword);

        if (count($result) > 0) {
            foreach ($result as $result) {
                if ($result->ROLE != NULL) {
                    $output .=  '<a href="' . base_url('user/guest_profile/' . $result->ID)  . '"><div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
            
            <div class="col-12"> 
                <div class="row align-items-center">
                <div class="col-1">
                <div class="avatar mr-1 avatar-xl" style="margin-left:20px">
                     <img src="' . base_url('assets/img/user/') . $result->IMAGE . '" alt="avtar img holder" height="35" width="35">
                </div>
                </div>
                <div class="col-11">
                <p class="text-bold-600" style="font-size:20px">' . $result->NAME . '</p>
                <small >
                    <p style="margin-top: -10px"><strong>' . $result->EMAIL . '</strong> </p>
                </small>
                </div>
                </div>
                </div>
                
        </div></a>';
                } else {
                    $output .=  '<a href="' . base_url('community/' . $result->ID)  . '"><div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
            
                    <div class="col-12"> 
                        <div class="row align-items-center">
                        <div class="col-1">
                        <div class="avatar mr-1 avatar-xl" style="margin-left:20px">
                             <img src="' . base_url('assets/img/community/profile/') . $result->IMAGE . '" alt="avtar img holder" height="35" width="35">
                        </div>
                        </div>
                        <div class="col-11">
                        <p class="text-bold-600" style="font-size:20px">' . $result->NAME . '</p>
                        <small >
                            <p style="margin-top: -10px"><strong>' . $result->EMAIL . '</strong> </p>
                        </small>
                        </div>
                        </div>
                        </div>
                        
                </div></a>';
                }
            }
        } else {
            $output .= '<div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
            <div class="col-12">
                <p class="text-bold-600 font-medium-2 mb-0 mt-25">No data found</p>

            </div>
        </div>';
        }

        echo $output;
    }

    function listCom()
    {
        $id = $this->uri->segment('2');
        $data = $this->m_ajax->listCom($id);
        echo json_encode($data);
    }

    //jika mengirimkan chat baru
    function chat()
    {
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];

        $id = $this->input->post('id');
        $message = $this->input->post('message');

        $chat_id = $this->m_ajax->insertMessage($id, $user_id, $message);
        $your_new_chat = $this->m_ajax->get_your_new_chat($chat_id);
        $output = '';

        if (count($your_new_chat) != 0) {
            $output .= '<div class="chat">
            <div class="chat-avatar">
                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                    <img src="' . base_url('assets/img/user/') . $your_new_chat['USER_IMAGE'] . '" alt="avatar" height="40" width="40" />
                </a>
            </div>
            <div class="chat-body">
                <div class="chat-content">
                    <strong>
                        <p style="display:inline-block; font-size:17px">Me</p>
                        <p style="margin-top:-4px;margin-left:3px;font-size: 10px">' . date("h:ia", strtotime($your_new_chat['TIME'])) . '</p>
                    </strong>
                    <hr style="margin-top:-2px;">
                    <p>' . $your_new_chat['MESSAGE'] . '</p>
                </div>
            </div>
        </div>';
        }
        echo $output;
    }

    //load semua chat kolaborasi
    function get_collab_chat()
    {
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];

        $id = $this->input->post('id');
        $message = $this->m_ajax->get_collab_chat($id);
        $output = '';

        foreach ($message as $message) {
            if ($message->USER_ID == $user_id) {
                $output .=  '<div class="chat">
                <div class="chat-avatar">
                    <a class="avatar m-0" data-toggle="tooltip" data-placement="right" title="" data-original-title="">
                        <img src="' . base_url('assets/img/user/') . $message->USER_IMAGE . '" alt="avatar" height="40" width="40" />
                    </a>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <strong>
                            <p style="display:inline-block; font-size:17px">Me</p>
                            <p style="margin-top:-4px;margin-left:3px;font-size: 10px">' . date("h:ia", strtotime($message->TIME)) . '</p>
                        </strong>
                        <hr style="margin-top:-2px;">
                        <p>' . $message->MESSAGE . '</p>
                    </div>
                </div>
            </div>';
            } else {
                $output .=  '<div class="chat chat-left">
                <div class="chat-avatar">
                    <a class="avatar m-0" data-toggle="tooltip" href="' . base_url('user/user_profile_guest/') . $message->USER_ID . '" data-placement="left" title="" data-original-title="">
                        <img src="' . base_url('assets/img/user/') . $message->USER_IMAGE . '" alt="avatar" height="40" width="40" />
                    </a>
                </div>
                <div class="chat-body">

                    <div class="chat-content">

                        <a href="' . base_url('user/user_profile_guest/') . $message->USER_ID . '">
                            <strong>
                                <p style="display:inline-block; font-size:17px">' . $message->USERNAME . '</p>
                            </strong>
                        </a>
                        <strong>
                        <p style="margin-top:-4px;margin-left:3px;font-size: 10px">' . date("h:ia", strtotime($message->TIME)) . '</p>
                        </strong>
                        <hr style="margin-top:-2px;">
                        <p>' . $message->MESSAGE . '</p>

                    </div>
                </div>
            </div>';
            }
        }
        echo $output;
    }

    function get_collab_member()
    {
        $id = $this->input->post('id');
        $member = $this->m_ajax->get_collab_member($id);
        $output = '';

        foreach ($member as $member) {
            $output .= '<div class="avatar user-profile-toggle m-0 m-0 mr-1" title data-original-title="komunitas" id="' . $member->COM_ID . '">
            <img src="' . base_url('assets/img/community/profile/') . $member->COM_IMAGE . '" alt="" height="40" width="40" title="' . $member->COM_NAME . '"/>
        </div>';
        }

        echo $output;
    }

    function get_member_detail()
    {
        $id = $this->input->post('id');
        $member = $this->m_ajax->get_member_detail($id);
        $output = '';

        $output .= '<header class="user-profile-header">
        <span class="close-icon">
            <i class="feather icon-x"></i>
        </span>
        <div class="header-profile-sidebar">
            <div class="avatar">
                <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="user_avatar" height="70" width="70">
            </div>
            <h4 class="chat-user-name">Komunitas Bola Basket</h4>
        </div>
    </header>
    <div class="user-profile-sidebar-area p-2">
        <h6>About</h6>
        <p>Deskripsi dari komunitas ini adalah ......</p>
    </div>';

        echo $output;
    }

    function deletePhoto()
    {
        $id = $this->input->post('id');

        $this->m_ajax->delPhoto($id);
    }
}
