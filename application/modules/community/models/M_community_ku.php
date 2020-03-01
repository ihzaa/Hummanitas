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
		return $this->db->query('SELECT * FROM `post` WHERE `COM_ID` = "' . $id . '" ORDER BY `UP_DATE` DESC')->result();
	}

	public function get_postingan_per_com_di_home($id)
	{
		$id_member = $this->db->query('SELECT `COM_ID` FROM `community_member` WHERE `USER_ID` = "' . $id . '"')->result();
		$str_query = 'SELECT * FROM `post` WHERE `COM_ID` IN (';
		for ($i = 0; $i < count($id_member); $i++) {
			if ($i == 0) {
				$str_query = $str_query . '"' . $id_member[$i]->COM_ID . '"';
				continue;
			}
			$str_query = $str_query . ',"' . $id_member[$i]->COM_ID . '"';
		}
		$str_query = $str_query . ')';
		return $this->db->query($str_query)->result();
	}
}
