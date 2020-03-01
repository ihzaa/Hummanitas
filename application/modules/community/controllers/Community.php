<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Community extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('m_community');
		$this->load->model('m_community_ku');
		$this->load->model('user/m_user');
		$this->load->library('form_validation');

		is_logged_in();
	}

	//sebagai member

	function index()
	{

		$id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($id);
		$data['member'] = $this->m_community->get_com_member($id);
		$data['event'] = $this->m_community->upcomingEvent($id);
		$data['image'] = $this->m_community->get_com_image($id);
		$data['user'] = $this->m_user->getUser();
		$data['postingan'] = $this->m_community_ku->get_postingan_per_com($id);

		$user_id = $data['user']['USER_ID'];


		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) != NULL) {


				$this->load->view('v_home_community', $data);
			} else {
				redirect('community/' . $id . '/guest');
			}
		} else {
			redirect('community/authorized');
		}
	}



	function event()
	{
		$id = $this->uri->segment('2');

		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();

		$data['event'] = $this->m_community->get_com_event($id);



		$this->load->view('v_event_community', $data);
	}

	function createEvent()
	{
		$id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();


		$user_id = $data['user']['USER_ID'];

		$member = $this->m_community->getMemberId($id, $user_id);
		$member_id = $member['MEMBER_ID'];

		$upload_image = $_FILES['image']['name'];


		$this->m_community->createEvent($upload_image, $member_id, $id);
		redirect('community/' . $id . '/event');
	}

	function event_detail()
	{
		$com_id = $this->uri->segment('2');
		$event_id = $this->uri->segment('4');

		$data['community'] = $this->m_community->get_com_detail($com_id);
		$data['user'] = $this->m_user->getUser();
		// $data['member'] = $this->m_community->get_com_member($id);
		$data['event'] = $this->m_community->get_com_event_detail($com_id, $event_id);




		$this->load->view('v_detailevent_community', $data);
	}

	function listMember()
	{
		$com_id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($com_id);
		$data['user'] = $this->m_user->getUser();
		$data['image'] = $this->m_community->get_com_image($com_id);
		$data['member'] = $this->m_community->memberList($com_id);

		$this->load->view('v_list_member', $data);
	}

	function setting_community()
	{
		$com_id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($com_id);
		$data['user'] = $this->m_user->getUser();
		$data['member'] = $this->m_community->memberList($com_id);

		$this->load->view('v_setting_community', $data);
	}

	function setting_community1()
	{
		$com_id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($com_id);
		$upload_image = $_FILES['image']['name'];
		$upload_image1 = $_FILES['cover']['name'];

		// var_dump($upload_image1);
		// die;

		$this->form_validation->set_rules('name', 'Name', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'trim');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|max_length[12]', [
			'numeric' => 'Phonenumber must number!',
			'max_length' => 'Phonenumber must be 12 digit or less!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('v_setting_community', $data);
		} else {


			$this->m_community->edit_image_com($upload_image, $data);
			$this->m_community->edit_cover_com($upload_image1, $data);
			$this->m_community->setting_com($com_id);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<p class="mb-0"> Your info has been updated.</p></div>');
			redirect('community/' . $com_id . '/setting');
		}
	}

	function Report()
	{
		$this->form_validation->set_rules('report', 'report', 'required');
		$com_id = $this->uri->segment('2');
		$data['user'] = $this->m_user->getUser();
		$user_id = $data['user']['USER_ID'];
		$report = $_POST['report'];
		$a = '';
		$i = 0;
		foreach ($report as $report) {
			if ($i == 0) {
				$a =  $report;
			} else {
				$a = $a . ',' . $report;
			}
			$i++;
		}


		$this->m_community->report($a, $com_id, $user_id);

		$this->load->library('user_agent');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        <p class="mb-0"> Success reporting community.</p></div>');

		redirect($this->agent->referrer());
	}

	function viewMember()
	{
		$data['user'] = $this->m_user->getUser();
		$id = $data['user']['USER_ID'];
		$user_id = $this->input->post('view');

		if ($id == $user_id) {
			redirect('user/user_profile');
		} else {
			redirect('user/user_profile_guest/' . $user_id);
		}
	}

	function userProfile()
	{
		$data['user'] = $this->m_user->getUser();
		$id = $data['user']['USER_ID'];
		$user_id = $this->uri->segment(2);

		if ($id == $user_id) {
			redirect('user/user_profile');
		} else {
			redirect('user/user_profile_guest/' . $user_id);
		}
	}



	function gallery()
	{
		$id = $this->uri->segment('2');

		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();
		$data['member'] = $this->m_community->get_com_member($id);
		$data['album'] = $this->m_community->getAlbum($id);
		$user_id = $data['user']['USER_ID'];

		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) != NULL) {
				$this->load->view('v_gallery_community', $data);
			} else {
				redirect('community/' . $id . '/guest');
			}
		} else {
			redirect('community/authorized');
		}
	}

	// public function uploadImage($name, $gallery_id)
	// {
	//     $id = $this->uri->segment('2');



	// $path = 'assets/img/community/gallery/' . $id . '/' . $name;
	// $this->load->library('upload');
	// $image = array();


	// $ImageCount = count($_FILES['image_name']['name']);

	// for ($i = 0; $i < $ImageCount; $i++) {
	//     $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
	//     $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
	//     $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
	//     $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
	//     $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];

	//     // File upload configuration

	//     $uploadPath = $path;
	//     $config['upload_path'] = $uploadPath;
	//     $config['allowed_types'] = 'jpg|jpeg|png|gif';
	//     $config['max_size']      = 0;
	//     $config['max_height']    = 0;
	//     $config['max_width']     = 0;
	//     // Load and initialize upload library
	//     if (!is_dir('assets/img/community/gallery' . $id)) {
	//         mkdir("assets/img/community/gallery/" . $id, 0700);
	//     }
	//     if (!is_dir('assets/img/community/gallery' . $id . '/' . $name)) {
	//         mkdir("assets/img/community/gallery/" . $id . '/' . $name, 0700);
	//     }
	//     $this->load->library('upload', $config);
	//     $this->upload->initialize($config);

	//     // Upload file to server
	//     if ($this->upload->do_upload('file')) {
	//         // Uploaded file data
	//         $imageData = $this->upload->data();
	//         $uploadImgData[$i]['COM_ID'] = $id;
	//         $uploadImgData[$i]['GALLERY_ID'] = $gallery_id;
	//         $uploadImgData[$i]['IMAGE'] = $imageData['file_name'];
	//     }
	// }
	// // var_dump($uploadImgData);
	// // die;
	// if (!empty($uploadImgData)) {
	//     // Insert files data into the database
	//     $this->m_community->multiple_images($uploadImgData);
	// }
	// }

	public function uploadImage($name, $gallery_id)
	{
		$id = $this->uri->segment('2');
		// Check form submit or not
		if ($this->input->post('upload') != NULL) {

			$data = array();

			// Count total files
			$countfiles = count($_FILES['image_name']['name']);
			$path = 'assets/img/community/gallery/' . $id . '/' . $name . '/';
			// Looping all files

			for ($i = 0; $i < $countfiles; $i++) {

				if (!empty($_FILES['image_name']['name'][$i])) {

					// Define new $_FILES array - $_FILES['file']
					$_FILES['file']['name'] = $_FILES['image_name']['name'][$i];
					$_FILES['file']['type'] = $_FILES['image_name']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['image_name']['error'][$i];
					$_FILES['file']['size'] = $_FILES['image_name']['size'][$i];

					// Set preference
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '0'; // max_size in kb
					$config['file_name'] = $_FILES['image_name']['name'][$i];


					if (!file_exists('assets/img/community/gallery' . $id)) {
						mkdir('assets/img/community/gallery/' . $id, 0777, true);
					}
					if (!file_exists('assets/img/community/gallery/' . $id . '/' . $name)) {
						mkdir('assets/img/community/gallery/' . $id . '/' . $name, 0777, true);
					}

					//Load upload library
					$this->load->library('upload', $config);

					// var_dump($_FILES['file']['name']);
					// die;
					// File upload
					if ($this->upload->do_upload('file')) {
						// Get data about the file
						$imageData = $this->upload->data();
						$uploadImgData[$i]['COM_ID'] = $id;
						$uploadImgData[$i]['GALLERY_ID'] = $gallery_id;
						$uploadImgData[$i]['IMAGE'] = $imageData['file_name'];
					}
				}
			}
			if (!empty($uploadImgData)) {
				// Insert files data into the database
				$this->m_community->multiple_images($uploadImgData);
			}
		}
	}



	function createAlbum()
	{
		$id = $this->uri->segment('2');

		$name = $this->input->post('name', true);

		$gallery_id = $this->m_community->createAlbum($name);

		// var_dump($name);
		// die;
		$this->uploadImage($name, $gallery_id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           <p class="mb-0"> Success creating new album.</p></div>');
		redirect('community/' . $id . '/gallery');
	}

	//show all image on gallery
	function image()
	{
		$id = $this->uri->segment('2');
		$gallery_id = $this->uri->segment('4');

		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();
		// $data['member'] = $this->m_community->get_com_member($id);
		$data['event'] = $this->m_community->upcomingEvent($id);
		$data['image'] = $this->m_community->getPhoto($gallery_id);

		$user_id = $data['user']['USER_ID'];


		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) != NULL) {
				if ($this->m_community->cekAlbum($id, $gallery_id)) {
					$this->load->view('v_image_community', $data);
				} else {
					redirect('community/authorized');
				}
			} else {
				redirect('community/' . $id . '/guest');
			}
		} else {
			redirect('community/authorized');
		}
	}

	//add image to gallery
	function addPhoto()
	{
		$com_id = $this->uri->segment('2');
		$gallery_id = $this->uri->segment('4');

		$gallery = $this->m_community->getGallery($gallery_id);

		// var_dump($gallery['GALLERY_NAME']);
		// die;

		$this->uploadImage($gallery['GALLERY_NAME'], $gallery_id);

		redirect('community/' . $com_id . '/gallery/' . $gallery_id);
	}


	//member management
	function memberManagement()
	{
		$id = $this->uri->segment('2');

		$data['community'] = $this->m_community->get_com_detail($id);
		$data['request'] = $this->m_community->get_requested_member($id);
		$data['member'] = $this->m_community->get_all_member($id);
		$data['user'] = $this->m_user->getUser();

		$user_id = $data['user']['USER_ID'];


		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) != NULL) {


				// var_dump($data['member']);
				// die;
				$this->load->view('v_memberManagement', $data);
			} else {
				redirect('community/' . $id . '/guest');
			}
		} else {
			redirect('community/authorized');
		}
	}

	//invite by phone number
	public function get_user_detail()
	{
		$notelp = $this->input->post('phoneNum');
		$id = $this->uri->segment('2');

		if (isset($notelp) and !empty($notelp)) {
			$records = $this->m_community->get_user_detail($notelp);


			if ($records != NULL) {
				echo '<div class="col-12">><img style="height: 230px; width: 220px;margin-left: 115px; border-radius: 15px;" src="' . base_url('assets/img/user/') . $records['USER_IMAGE'] .
					'" alt="Card image">
				
				</div>
				<div class="col-12" align="center">
				<h3 style="margin-top: 20px;"><strong>' . $records['USERNAME'] . '</strong></h3>
				<p style="margin-bottom:-7px;"><strong>' . $records['EMAIL'] . '</strong></p>
				<br>
				</div>
				</div>
				<div class="modal-footer">
				<form action="' . base_url('community/' . $id . '/memberManagement/invite') . '" method="post">
                    <button type="submit" name="invite" value="' . $records['USER_ID'] . '" style="margin-right: 180px;" class="btn btn-primary">Invite</button>';
			} else {
				echo '<center>
    <h4>There is no user with the following phone number</h4>
</center><div class="modal-footer">
';
			}
		} else {
			echo '<center>
	<h4 >There is no user with the following phone number</h4>
</center><div class="modal-footer">
';
		}
	}


	function invite()
	{
		$com_id = $this->uri->segment('2');
		$data['user'] = $this->m_user->getUser();

		$user_id = $data['user']['USER_ID'];

		$id = $this->input->post('invite');
		if ($user_id != $id) {
			$this->m_community->invite($id, $com_id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               <p class="mb-0">Success inviting user!</p></div>');
			redirect('community/' . $com_id . '/memberManagement');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
               <p class="mb-0">You cannot invite yourself!</p></div>');
			redirect('community/' . $com_id . '/memberManagement');
		}
	}

	function makeAdmin()
	{
		$com_id = $this->uri->segment('2');
		$id = $this->input->post('makeAdmin');
		$this->m_community->makeAdmin($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <p align="center" class="mb-0">Success!</p></div>');
		redirect('community/' . $com_id . '/memberManagement');
	}

	function removeAdmin()
	{
		$com_id = $this->uri->segment('2');
		$id = $this->input->post('removeAdmin');
		$this->m_community->removeAdmin($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <p align="center" class="mb-0">Success!</p></div>');
		redirect('community/' . $com_id . '/memberManagement');
	}

	function accept()
	{
		$com_id = $this->uri->segment('2');
		$id = $this->input->post('accept');

		$this->m_community->accept($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <p align="center" class="mb-0">Accept success!</p></div>');
		redirect('community/' . $com_id . '/memberManagement');
	}

	function removeMember()
	{
		$com_id = $this->uri->segment('2');
		$id = $this->input->post('removeMember');

		$this->m_community->removeMember($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <p align="center" class="mb-0">Success removing member!</p></div>');
		redirect('community/' . $com_id . '/memberManagement');
	}

	function reject()
	{
		$com_id = $this->uri->segment('2');
		$id = $this->input->post('reject');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <p align="center" class="mb-0">Reject success!</p></div>');
		$this->m_community->removeMember($id);
		redirect('community/' . $com_id . '/memberManagement');
	}

	//kolaborasi
	function collaboration()
	{
		$id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($id);
		$data['collab'] = $this->m_community->get_com_collab($id);
		$data['request'] = $this->m_community->get_collab_request($id);
		$data['user'] = $this->m_user->getUser();

		$this->load->view('v_collaboration', $data);
	}

	function createCollab()
	{
		$id = $this->uri->segment(2);
		$data['community'] = $this->m_user->allCom();
		$data['user'] = $this->m_user->getUser();

		$user_id = $data['user']['USER_ID'];

		$this->form_validation->set_rules('name', 'Name', 'trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('v_collaboration', $data);
		} else {

			$upload_image = $_FILES['image']['name'];

			$this->m_community->createCollab($upload_image, $id);


			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		   <p class="mb-0">Success creating new collaboration!</p></div>');
			redirect('community/' . $id . '/collaboration');
		}
	}

	function acceptCollab()
	{
		$com_id = $this->uri->segment('2');
		$id = $this->input->post('accept');

		$this->m_community->acceptCollab($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <p align="center" class="mb-0">Success accepting collaboration!</p></div>');
		redirect('community/' . $com_id . '/collaboraton');
	}

	function rejectCollab()
	{
		$com_id = $this->uri->segment('2');
		$id = $this->input->post('reject');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            <p align="center" class="mb-0">Success rejecting collaboration!</p></div>');
		$this->m_community->removeCollab($id);
		redirect('community/' . $com_id . '/collaboration');
	}


	// sebagai guest

	function guest()
	{
		$id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();
		$data['member'] = $this->m_community->get_com_member($id);
		$data['image'] = $this->m_community->get_com_image($id);

		$user_id = $data['user']['USER_ID'];

		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) == NULL) {

				if ($this->m_community->cekPrivate($id) != NULL) {
					$this->load->view('v_guest_home', $data);
				} else {
					redirect('community/' . $id . '/privateGuest');
				}
			} else {
				redirect('community/' . $id);
			}
		} else {
			redirect('community/authorized');
		}
	}

	function guestMember()
	{
		$id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();
		$data['member'] = $this->m_community->memberList($id);
		$data['image'] = $this->m_community->get_com_image($id);

		$user_id = $data['user']['USER_ID'];

		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) == NULL) {

				if ($this->m_community->cekPrivate($id) != NULL) {
					$this->load->view('v_guest_member', $data);
				} else {
					redirect('community/' . $id . '/privateGuest');
				}
			} else {
				redirect('community/' . $id);
			}
		} else {
			redirect('community/authorized');
		}
	}

	function joinGuest()
	{
		$com_id = $this->uri->segment(2);
		$code = $this->input->post('code');
		$data['user'] = $this->m_user->getUser();
		$user_id = $data['user']['USER_ID'];

		$cekCode = $this->m_community->cekCode($code, $com_id);
		$cekMember = $this->m_community->cekMember($user_id, $com_id);

		if (count($cekMember) == 0) {
			if (count($cekCode) > 0) {
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

				echo 'success';
			} else {
				echo 'failed';
			}
		} else {
			echo 'requested';
		}
	}

	function guestGallery()
	{
		$id = $this->uri->segment(2);

		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();
		$data['member'] = $this->m_community->get_com_member($id);
		$data['album'] = $this->m_community->getAlbum($id);

		$user_id = $data['user']['USER_ID'];

		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) == NULL) {

				if ($this->m_community->cekPrivate($id) != NULL) {
					$this->load->view('v_guest_gallery', $data);
				} else {
					redirect('community/' . $id . '/privateGuest');
				}
			} else {
				redirect('community/' . $id);
			}
		} else {
			redirect('community/authorized');
		}
	}

	function guestPhoto()
	{
		$id = $this->uri->segment(2);
		$gallery_id = $this->uri->segment(5);

		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();
		$data['member'] = $this->m_community->get_com_member($id);
		$data['image'] = $this->m_community->getPhoto($gallery_id);

		$user_id = $data['user']['USER_ID'];

		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) == NULL) {

				if ($this->m_community->cekPrivate($id) != NULL) {
					if ($this->m_community->cekAlbum($id, $gallery_id)) {
						$this->load->view('v_guest_image', $data);
					} else {
						redirect('community/authorized');
					}
				} else {
					redirect('community/' . $id . '/privateGuest');
				}
			} else {
				redirect('community/' . $id);
			}
		} else {
			redirect('community/authorized');
		}
	}


	function privateGuest()
	{
		$id = $this->uri->segment('2');
		$data['community'] = $this->m_community->get_com_detail($id);
		$data['user'] = $this->m_user->getUser();

		$user_id = $data['user']['USER_ID'];

		if ($this->m_community->getCom($id)) {
			if ($this->m_community->cekUser($user_id, $id) == NULL) {
				if ($this->m_community->cekPrivate($id) == NULL) {



					$this->load->view('v_guest_private', $data);
				} else {
					redirect('community/' . $id . '/guest');
				}
			} else {
				redirect('community/' . $id);
			}
		} else {
			redirect('community/authorized');
		}
	}



	//blocked
	function authorized()
	{
		$this->load->view('v_notAuthorized');
	}

	//search
	public function search($keyword)
	{
	}
}
