<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != 1) {
			redirect('auth');
		}
		$this->load->model('M_admin');

		is_logged_in();
	}

	function index()
	{
		$data['judul_halaman'] = 'Dashboard';
		$data['report'] = $this->M_admin->getReport();
		$data['count'] = $this->M_admin->getReportCount();
		$data['jml_com'] = $this->M_admin->get_count_comunity();
		$data['jml_user'] = $this->M_admin->get_count_user();
		$this->load->view('V_index', $data);
	}

	function report_community()
	{
		$data['judul_halaman'] = 'Report';
		$data['report'] = $this->M_admin->getReport();
		$data['count'] = $this->M_admin->getReportCount();
		$data['row'] = $this->M_admin->get_report_community();
		$this->load->view('V_report_com', $data);
	}

	function report_user()
	{
		$data['judul_halaman'] = 'Report';
		$data['report'] = $this->M_admin->getReport();
		$data['count'] = $this->M_admin->getReportCount();
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
		$data['report'] = $this->M_admin->getReport();
		$data['count'] = $this->M_admin->getReportCount();
		$this->load->view('V_kelola_password', $data);
	}

	function ubah_password()
	{
		$usr = $this->session->userdata('username');
		$pass_old = $this->input->post('pass_lama');
		$pass = $this->input->post('pass1');
		if ($this->M_admin->ubah_pass($usr, $pass_old, $pass) == 1) {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			<p class="mb-0"> Success change password</p></div>');
			return redirect($_SERVER['HTTP_REFERER']);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		<p class="mb-0"> Sorry! Your old password is wrong !!!</p></div>');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	function getNotif()
	{
		$report = $this->M_admin->getReport();
		$count = $this->M_admin->getReportCount();

		$output = '';

		foreach ($report as $report) {
			if ($report->COM_ID == NULL) {
				$output .= '<a class="dropdown-item d-flex align-items-center" href="' . base_url('admin/report-user') . '">
					<div class="mr-3">
						<div class="icon-circle bg-primary">
							<i class="fas fa-file-alt text-white"></i>
						</div>
					</div>
					<div>
						<div class="small text-gray-500">' . date('d M Y h:ia', strtotime($report->REPORT_DATE)) . '</div>
						<span class="font-weight-bold">There is new reported user!</span>
					</div>
				</a>';
			} else {
				$output .= '<a class="dropdown-item d-flex align-items-center" href="' . base_url('admin/report-community') . '">
					<div class="mr-3">
						<div class="icon-circle bg-primary">
							<i class="fas fa-file-alt text-white"></i>
						</div>
					</div>
					<div>
						<div class="small text-gray-500">' . date('d M Y h:ia', strtotime($report->REPORT_DATE)) . '</div>
						<span class="font-weight-bold">There is new reported community!</span>
					</div>
				</a>';
				$data = array(
					'report' => $output,
					'count' => $count
				);

				echo json_encode($data);
			}
		}
	}
}
