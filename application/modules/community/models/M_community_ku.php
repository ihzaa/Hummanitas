<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_community_ku extends CI_Model
{

	public function getMemeberId($id)
	{
		return $this->db->query('SELECT `MEMBER_ID` FROM `community_member` WHERE `USER_ID` = "' . $id . '"')->result()[0];
	}

	public function storePostToDB($id_com, $id_mem, $isi, $foto)
	{
		$this->db->query('INSERT INTO `post` (`POST_ID`, `MEMBER_ID`, `COM_ID`, `POST_CONTENT`, `UP_DATE`, `POST_IMAGE`) VALUES (NULL, "' . $id_mem . '", "' . $id_com . '", "' . $isi . '", current_timestamp(), "' . $foto . '")');
	}

	public function getUserData($id)
	{
		return $this->db->query('SELECT * FROM `user` WHERE `USER_ID` = "' . $id . '"')->result()[0];
	}

	public function get_postingan_per_com($id)
	{
		// var_dump($this->db->query('SELECT * FROM `post` WHERE `COM_ID` = "' . $id . '"')->result());
		// die;
		return $this->db->query('SELECT * FROM `post` WHERE `COM_ID` = "' . $id . '" ORDER BY `UP_DATE` DESC')->result();
	}
}
