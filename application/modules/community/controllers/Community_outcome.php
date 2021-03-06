<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Community_outcome extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('m_community');
        $this->load->model('m_community_ku');
        $this->load->model('m_community_outcome');
        $this->load->model('user/m_user');
        $this->load->library('form_validation');
        if ($this->session->userdata('role_id') != 2) {
            redirect('auth');
        }
        is_logged_in();
    }

    function outcome()
    {
        $id = $this->uri->segment('2');
        $data['balance'] = $this->m_communitynew->balance($id);
        $data['user'] = $this->m_user->getUser();
        $data['community'] = $this->m_community->get_com_detail($id);
        $data['outcome'] = $this->m_community_outcome->get_outcome_detail($id);
        $data['total'] = $this->m_community_outcome->sumTotal($id);

        $this->load->view('v_outcome_admin', $data);
    }

    function outcomeAdd()
    {
        $com_id = $this->uri->segment('2');
        $data['user'] = $this->m_user->getUser();
        $data['community'] = $this->m_community->get_com_detail($com_id);
        $data['outcome'] = $this->m_community_outcome->get_outcome_detail($com_id);
        $user_id = $data['user']['USER_ID'];
        $member = $this->m_community->getMemberId($com_id, $user_id);
        $member_id = $member['MEMBER_ID'];
        $this->m_community_outcome->addOutcome($com_id, $member_id);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>   
		<p align="center" align="center" class="mb-0">Success adding new outcome!</p></div>');
        redirect('community/' . $com_id . '/finance/outcome');
    }
}
