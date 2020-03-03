<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommunityNew extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('m_community_ku');
        $this->load->model('m_community');
        $this->load->model('m_communitynew');
        $this->load->model('user/m_user');
        $this->load->library('form_validation');

        is_logged_in();
    }

    // finance event income
    function event_income()
    {
        $id = $this->uri->segment('2');
        $data['user'] = $this->m_user->getUser();
        $data['community'] = $this->m_community->get_com_detail($id);
        $data['event'] = $this->m_communitynew->get_event($id);
        $data['activity'] = $this->m_communitynew->get_activity($id);
        $user_id = $data['user']['USER_ID'];

        if ($this->m_community->getCom($id)) {
            if ($this->m_community->cekUser($user_id, $id) != NULL) {


                $this->load->view('v_event_income', $data);
            } else {
                redirect('community/' . $id . '/guest');
            }
        } else {
            redirect('community/authorized');
        }
    }

    function add_event()
    {
        $com_id = $this->uri->segment(2);
        $event_id = $this->input->post('selectEvent');
        $event = $this->m_community->get_com_event_detail($com_id, $event_id);
        $event_name = $event['EVENT_TITLE'];

        if ($event_id == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
			<p class="mb-0" align="center">Error when adding new event income</p></div>');
            redirect('community/' . $com_id . '/finance/income/2');
        } else {
            $this->m_communitynew->add_event($event_id, $event_name);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<p class="mb-0" align="center">Success adding new event income</p></div>');
            redirect('community/' . $com_id . '/finance/income/2');
        }
    }

    function addEventTransaction()
    {
        $com_id = $this->uri->segment(2);
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];

        $member = $this->m_communitynew->cekMember($user_id, $com_id);
        $member_id = $member['MEMBER_ID'];

        $upload_image = $_FILES['image']['name'];

        $this->m_communitynew->addEventTransaction($upload_image, $com_id, $member_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <p class="mb-0" align="center">Transaction send, please wait for admin to confirm</p></div>');
        redirect('community/' . $com_id . '/finance/income/2');
    }
}
