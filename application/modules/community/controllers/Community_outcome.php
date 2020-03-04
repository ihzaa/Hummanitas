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

        is_logged_in();
    }

    function outcome()
    {
        $id = $this->uri->segment('2');
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
        redirect('community/' . $com_id . '/finance/outcome');
    }
}
