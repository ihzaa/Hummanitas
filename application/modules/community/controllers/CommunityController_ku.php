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
		$this->load->view('v_monthly_cash', $data);
	}

	function posting()
	{

		$id_com = $this->uri->segment('2');
		$id_member = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;
		$isi = $this->input->post('isi');

		$row = $this->input->post('cnt_row');

		//start notif
		$user = $this->m_user->getUser();
		$username = $user['USERNAME'];
		$community = $this->m_community->get_com_detail($id_com);
		$com_name = $community['COM_NAME'];

		$icon = 'edit';
		$subject = 'New Post has been created';
		$text = $com_name . ' has new post from ' . $username;
		$link = 'community/' . $id_com;

		//insert table notification
		$this->m_community->insertNotif($id_com, $icon, $subject, $text, $link);

		//end notif
		$config['upload_path']          = 'assets/img/post/' . $id_member;
		$config['allowed_types']        = 'gif|jpg|png';
		$new_name = time() . '-' . $id_com . '-' . $id_member . '-' . $_FILES['gambar']['name'];
		$config['file_name'] = $new_name;

		//var lengkap = letak + nama file
		$lengkap = $config['upload_path'] . '/' . $new_name;
		$this->load->library('upload', $config);

		if (!is_dir('assets/img/post/' . $id_member)) {
			mkdir('assets/img/post/' . $id_member, 0777, TRUE);
		}
		$user = $this->m_community_ku->getUserData($this->session->userdata('id'));
		if (!$this->upload->do_upload('gambar')) {
			$id_post = $this->m_community_ku->storePostToDB($id_com, $id_member, $isi, NULL);
			$output = '<div class="card" style="display : block;">
			<div class="card-body">
				<div class="d-flex justify-content-start align-items-center mb-1">
					<div class="avatar mr-1">
						<img src="' . base_url('assets/img/user/') . $user->USER_IMAGE  . '" alt="avtar img holder" height="45" width="45">
					</div>
					<div class="user-page-info">
						<p class="mb-0"><a href="" style="color: black;"><strong>' . $user->NAME . '</strong></a></p>
						<span class="font-small-2">' . date("Y-m-d H:i:s", time()) . '</span>
					</div>
				</div>
				<p>' . $isi . '</p>
				<div class="d-flex justify-content-start align-items-center mb-1">
					<div class="d-flex align-items-center">
						<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $row . '" data-row="' . $row . '" data-toggle="tooltip" title="Like" data-id="' . $id_post . '"></i>
						<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $row . '" data-row="' . $row . '" role="status" style="display:none;"></div>
						<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $row . '" data-row="' . $row . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $id_post . '"></i>
						<span id="jml_like' . $row . '">0</span>
						<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
						<span>0</span>
					</div>
				</div>
				<fieldset class="form-label-group mb-50">
					<textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
					<label for="label-textarea">Add Comment</label>
				</fieldset>
				<button type="button" class="btn btn-sm btn-primary">Post Comment</button>
			</div>
		</div>';
			echo $output;
		} else {
			$id_post = $this->m_community_ku->storePostToDB($id_com, $id_member, $isi, $lengkap);
			$output = '<div class="card" style="display : block;">
		<div class="card-body">
			<div class="d-flex justify-content-start align-items-center mb-1">
				<div class="avatar mr-1">
					<img src="' . base_url('assets/img/user/') . $user->USER_IMAGE  . '" alt="avtar img holder" height="45" width="45">
				</div>
				<div class="user-page-info">
					<p class="mb-0"><a href="" style="color: black;"><strong>' . $user->NAME . '</strong></a></p>
					<span class="font-small-2">' . date("Y-m-d H:i:s", time()) . '</span>
				</div>
			</div>
			<p>' . $isi . '</p>
			<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($lengkap) . '" alt="avtar img holder">
			<div class="d-flex justify-content-start align-items-center mb-1">
				<div class="d-flex align-items-center">
					<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $row . '" data-row="' . $row . '" data-toggle="tooltip" title="Like" data-id="' . $id_post . '"></i>
					<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $row . '" data-row="' . $row . '" role="status" style="display:none;"></div>
					<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $row . '" data-row="' . $row . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $id_post . '"></i>
					<span id="jml_like' . $row . '">0</span>
					<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
					<span>0</span>
				</div>
			</div>
			<fieldset class="form-label-group mb-50">
				<textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
				<label for="label-textarea">Add Comment</label>
			</fieldset>
			<button type="button" class="btn btn-sm btn-primary">Post Comment</button>
		</div>
	</div>';
			echo $output;
		}
	}

	function like()
	{
		$id_post = $this->input->post('id');
		$id_mem = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;

		$this->m_community_ku->like($id_post, $id_mem);
	}

	function dislike()
	{
		$id_post = $this->input->post('id');
		$id_mem = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;

		$this->m_community_ku->dislike($id_post, $id_mem);
	}
}
