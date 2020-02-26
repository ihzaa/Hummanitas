<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('ROLE_ID') != 1){
		// 	redirect('auth');
		// }
		$this->load->model('M_admin');

		is_logged_in();
	}

	function index()
	{
		$data['judul_halaman'] = 'Dashboard';
		$data['jml_com'] = $this->M_admin->get_count_comunity();
		$data['jml_user'] = $this->M_admin->get_count_user();
		$this->load->view('V_index', $data);
	}

	function report_community()
	{
		$data['judul_halaman'] = 'Report';
		$data['row'] = $this->M_admin->get_report_community();
		$this->load->view('V_report_com', $data);
	}

	function report_user()
	{
		$data['judul_halaman'] = 'Report';
		$data['row'] = $this->M_admin->get_report_user();
		$this->load->view('V_report_user', $data);
	}

	function read_report()
	{
		$this->M_admin->read_report($this->input->post('id'));
	}

	function del_report()
	{
		$this->M_admin->hapus_report($this->input->post('id'));
	}

	function del_community()
	{
		$id = $this->input->post('id_terlapor');
		$this->M_admin->hapus_community($id);
		redirect('admin/report-community');
	}

	function del_user()
	{
		$id = $this->input->post('id_terlapor');
		$this->M_admin->hapus_user($id);
		redirect('admin/report-user');
	}

	function kelola_profil()
	{
		$data['judul_halaman'] = 'Kelola Profil';
		$this->load->view('V_kelola_password', $data);
	}

	function ubah_password()
	{
		$id = $this->input->post('id');
		$pass_old = $this->input->post('pass_lama');
		$pass = $this->input->post('pass1');
		$this->M_admin->ubah_pass($id, $pass_old, $pass);
	}
}
