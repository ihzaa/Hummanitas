<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommunityController_ku extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_community_ku');
		$this->load->model('m_community');
		$this->load->model('user/m_user');
		$this->load->library('form_validation');

		is_logged_in();
	}

	function idx()
	{
		$id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($id);
		$this->load->view('v_monthly_cash',$data);
	}
}
