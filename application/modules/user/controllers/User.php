<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class User extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('m_user');
		$this->load->model('community/m_community_ku');
		$this->load->library('form_validation');
		if ($this->session->userdata('role_id') != 2) {
			redirect('auth');
		}
		is_logged_in();
	}

	//to call home user
	function index()
	{
		$data['user'] = $this->m_user->getUser();
		$data['user_com'] = $this->m_user->get_user_com($data['user']['USER_ID']);
		$data['postingan'] = $this->m_community_ku->get_postingan_per_com_di_home($this->session->userdata('id'));
		$data['jml_like'] = $this->m_community_ku->hitung_like($data['postingan']);
		$data['comment'] = $this->m_community_ku->commentPerPost($data['postingan']);
		$data['memberId'] = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;
		$this->load->view('v_user_home', $data);
	}

	function user_setting()
	{

		$data['user'] = $this->m_user->getUser();

		$this->form_validation->set_rules('name', 'Name', 'trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('v_user_setting', $data);
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			$upload_image = $_FILES['image']['name'];

			$this->m_user->EditProfileimg($upload_image, $data);
			$this->m_user->editGeneral($name, $email);


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		   <p class="mb-0">Your profile has been updated!</p></div>');
			redirect('user/user_setting');
		}
	}

	function user_setting1()
	{
		$data['user'] = $this->m_user->getUser();

		$this->form_validation->set_rules('bio', 'Bio', 'trim');
		$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|max_length[12]', [
			'numeric' => 'Phonenumber must number!',
			'max_length' => 'Phonenumber must be 12 digit or less!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('v_user_setting', $data);
		} else {



			$this->m_user->editInfo();

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<p class="mb-0"> Your info has been updated.</p></div>');
			redirect('user/user_setting1');
		}
	}

	function user_Setting2()
	{
		$data['user'] = $this->m_user->getUser();


		$this->form_validation->set_rules('newPass', 'NewPass', 'trim|min_length[6]|matches[conPass]', [
			'matches' => 'New password does not match!',
			'min_length' => 'New password minimal must be 6 character!'
		]);
		$this->form_validation->set_rules('conPass', 'ConPass', 'trim|matches[newPass]');

		if ($this->form_validation->run() == false) {
			$this->load->view('v_user_setting', $data);
		} else {
			$pass = $this->input->post('oldPass');

			if (password_verify($pass, $data['user']['PASSWORD'])) {

				$this->m_user->editPass();

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<p class="mb-0"> Your password has been changed!</p></div>');
				redirect('user/user_setting2');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
			<p class="mb-0"> Your password is wrong!</p></div>');
				redirect('user/user_setting2');
			}
		}
	}

	function user_profile()
	{


		$data['user'] = $this->m_user->getUser();
		$data['user_com'] = $this->m_user->get_user_com($data['user']['USER_ID']);

		// var_dump($data);
		// die;
		$this->load->view('v_user_profile', $data);
	}

	function user_profile_guest()
	{
		$guest_id = $this->uri->segment('3');
		$data['user'] = $this->m_user->getUser();
		$data['user_guest'] = $this->m_user->get_user($guest_id);
		$data['user_com'] = $this->m_user->get_user_com($data['user_guest']['USER_ID']);

		$this->load->view('v_user_profile_guest', $data);
	}

	function user_community()
	{


		$data['community'] = $this->m_user->allCom();
		$data['user'] = $this->m_user->getUser();

		// $data['searchCom'] = $this->m_user->searchCode();


		$this->load->view('v_user_community', $data);
		// print_r($data);
	}

	function create_community()
	{
		$data['community'] = $this->m_user->allCom();
		$data['user'] = $this->m_user->getUser();

		$user_id = $data['user']['USER_ID'];

		$this->form_validation->set_rules('name', 'Name', 'trim');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|max_length[12]', [
			'numeric' => 'Phonenumber must be number!',
			'max_length' => 'Phonenumber must be 12 digit or less!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('v_user_community', $data);
		} else {

			$upload_image = $_FILES['image']['name'];

			$this->m_user->createCom($upload_image, $user_id);


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		   <p class="mb-0">Success creating community !</p></div>');
			redirect('user/user_community');
		}
	}


	public function get_com_result()
	{
		$code = $this->input->post('code');
		if (isset($code) and !empty($code)) {
			$records = $this->m_user->get_com_detail($code);

			if ($records != NULL) {
				echo '<div class="col-12"><img style="height: 230px; width: 220px;margin-left: 115px; border-radius: 15px;" src="' . base_url('assets/img/community/profile/') . $records['COM_IMAGE'] .
					'" alt="Card image">
				</div>
				<div class="col-12" align="center">
				<h3 style="margin-top: 20px;"><strong>' . $records['COM_NAME'] . '</strong></h3>
				<p style="margin-bottom:-7px;"><strong>' . $records['COM_ADDRESS'] . '</strong></p>
				<p><strong>' . $records['COM_LOC'] . '</strong></p>
				<p>' . $records['COM_DESC'] . '</p>
				</div>
				</div>
				<div class="modal-footer">
				<form action="' . base_url('user/joinCom') . '" method="post">
                    <button type="submit" name="join" value="' . $records['COM_ID'] . '" style="margin-right: 180px;" class="btn btn-primary">Join</button>';
			} else {
				echo '<center>
    <h4>There is no community with the following code</h4>
</center><div class="modal-footer">
';
			}
		} else {
			echo '<center>
	<h4 >There is no community with the following code</h4>
</center><div class="modal-footer">
';
		}
	}

	function joinCom()
	{
		$data['user'] = $this->m_user->getUser();

		$user_id = $data['user']['USER_ID'];


		$id = $this->input->post('join');

		// var_dump($id);
		$this->m_user->joinCom($user_id, $id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		   <p class="mb-0">Your request has been send! Please wait for community to accept</p></div>');
		redirect('user/user_community');
	}

	function cekMember()
	{
		$data['user'] = $this->m_user->getUser();
		$user_id = $data['user']['USER_ID'];
		$com_id = $this->input->post('view');

		$q = $this->m_user->cekMember($user_id, $com_id);

		if (count($q) > 0) {
			redirect('community/' . $com_id);
		} else {
			redirect('community/' . $com_id . '/guest');
		}
	}
}
