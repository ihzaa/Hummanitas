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
		$new_name = time() . '-' . rand(0, 10000) . '-' . $id_com . '-' . $id_member . '.' . pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
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
			$output = '<div class="card" id="Kpost' . $id_post . '" style="display : block;">
			<div class="card-body">
				<div class="d-flex justify-content-start align-items-center mb-1">
					<div class="avatar mr-1">
						<img src="' . base_url('assets/img/user/') . $user->USER_IMAGE  . '" alt="avtar img holder" height="45" width="45">
					</div>
					<div class="user-page-info">
						<p class="mb-0"><a href="" style="color: black;"><strong>' . $user->NAME . '</strong></a></p>
						<span class="font-small-2">' . date("Y-m-d H:i:s", time()) . '</span>
						<div class="btn-group ml-2">
							<div class="dropdown">
								<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
									<a class="dropdown-item delete-post-btn" data-id="' . $id_post . '" href="#">Delete</a>
								</div>
							</div>
						</div>
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
				<hr>
				<div id="kotak-komen' . $id_post . '">
				</div>
				<fieldset class="form-label-group mb-50">
					<textarea class="form-control" id="input-comment' .  $id_post . '" rows="3" placeholder="Add Comment"></textarea>
					<label for="label-textarea">Add Comment</label>
				</fieldset>
				<button type="button" class="btn btn-sm btn-primary btn-comment-post" data-id="' . $id_post . '">Post Comment</button>
				<div class="spinner-border text-primary mr-100 " id="ldg-comment' . $id_post . '" role="status" style="display:none;"></div>
			</div>
		</div>';
			echo $output;
		} else {
			$id_post = $this->m_community_ku->storePostToDB($id_com, $id_member, $isi, $lengkap);
			$output = '<div class="card" id="Kpost' . $id_post . '" style="display : block;">
		<div class="card-body">
			<div class="d-flex justify-content-start align-items-center mb-1">
				<div class="avatar mr-1">
					<img src="' . base_url('assets/img/user/') . $user->USER_IMAGE  . '" alt="avtar img holder" height="45" width="45">
				</div>
				<div class="user-page-info">
					<p class="mb-0"><a href="" style="color: black;"><strong>' . $user->NAME . '</strong></a></p>
					<span class="font-small-2">' . date("Y-m-d H:i:s", time()) . '</span>
					<div class="btn-group ml-2">
						<div class="dropdown">
							<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
								<a class="dropdown-item delete-post-btn" data-id="' . $id_post . '" href="#">Delete</a>
							</div>
						</div>
					</div>
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
			<hr>
			<div id="kotak-komen' . $id_post . '">
			</div>
			<fieldset class="form-label-group mb-50">
				<textarea class="form-control" id="input-comment' .  $id_post . '" rows="3" placeholder="Add Comment"></textarea>
				<label for="label-textarea">Add Comment</label>
			</fieldset>
			<button type="button" class="btn btn-sm btn-primary btn-comment-post" data-id="' . $id_post . '">Post Comment</button>
			<div class="spinner-border text-primary mr-100 " id="ldg-comment' . $id_post . '" role="status" style="display:none;"></div>
		</div>
	</div>';
			echo $output;
		}
	}

	function deletePost()
	{
		$this->load->helper("file");
		if ($this->m_community_ku->getOnePost($this->input->post('id_post'))->POST_IMAGE != '') {
			$this->m_community_ku->deletePost($this->input->post('id_post'));
		} else {
			if (unlink($this->m_community_ku->getOnePost($this->input->post('id_post'))->POST_IMAGE)) {
				$this->m_community_ku->deletePost($this->input->post('id_post'));
			}
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

	function storeComment()
	{
		$id_post = $this->input->post('id_post');
		$isi = $this->input->post('isi');
		$id_mem = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;


		$this->m_community_ku->storeComment($id_post, $id_mem, $isi);

		echo '
		<div class="d-flex justify-content-start align-items-center mb-1">
			<div class="avatar mr-50">
				<img src="' . base_url("assets/img/user/" . $this->m_user->getUser()["USER_IMAGE"]) . '" alt="Avatar" height="30" width="30">
			</div>
			<div class="user-page-info">
				<h6 class="mb-0"><a href="" style="color: black;">' . $this->m_user->getUser()["NAME"] . '</a>
				</h6>
				<span class="font-small-2">' . $isi . '</span>
			</div>
		</div>
		<hr>';
	}
}
