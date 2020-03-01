<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function get_count_comunity()
	{
		return $this->db->get('community')->num_rows();
	}

	public function get_count_user()
	{
		return $this->db->get('user')->num_rows();
	}

	public function get_report_community()
	{
		return $this->db->query('SELECT u.USERNAME , c.COM_NAME , r.REPORT_DATE , r.REPORT_DESC , r.READ_STATUS as status , r.REPORT_ID , r.COM_ID   from report r INNER join community c USING (COM_ID) INNER JOIN user u USING (USER_ID) where r.COM_ID is NOT null')->result();
	}

	public function get_report_user()
	{
		return $this->db->query('SELECT u.USERNAME as pelapor, t.USERNAME as terlapor ,r.REPORT_DATE , r.REPORT_DESC , r.READ_STATUS as status , r.REPORT_ID , r.SUSPECT_ID from report r INNER JOIN user u USING (USER_ID) INNER JOIN user t on r.SUSPECT_ID = t.USER_ID where r.SUSPECT_ID is NOT null')->result();
	}

	public function read_report($id)
	{
		$this->db->query('UPDATE `report` SET `READ_STATUS` = "1" WHERE `report`.`REPORT_ID` = "' . $id . '"');
	}

	public function hapus_report($id)
	{
		$this->db->where('REPORT_ID', $id);
		$this->db->delete('report');
	}

	public function hapus_community($id)
	{
		$this->db->where('COM_ID', $id);
		$this->db->delete('community');
	}

	public function hapus_user($id)
	{
		$this->db->where('USER_ID', $id);
		$this->db->delete('user');
	}

	public function ubah_pass($usr, $pass_old, $pass)
	{
		$user = $this->db->query('SELECT * FROM `user` WHERE `USERNAME` = "' . $usr . '"')->result();

		if (password_verify($pass_old, $user[0]->PASSWORD)) {
			$this->db->query('UPDATE `user` SET `PASSWORD` = "' . password_hash($pass, true) . '" WHERE `user`.`USERNAME` = "' . $usr . '";');
			return 1;
		}
		return 0;
	}
}
