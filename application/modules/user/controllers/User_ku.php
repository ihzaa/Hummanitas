<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class User_ku extends MY_Controller
{
	function index()
	{
		$data['user'] = $this->m_user->getUser();
		$data['user_com'] = $this->m_user->get_user_com($data['user']['USER_ID']);
		$data['postingan'] = $this->m_community_ku->get_postingan_per_com($id);
		$this->load->view('v_user_home', $data);
	}
}
