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
		return $this->db->query('select POST_ID from post ORDER BY POST_ID DESC LIMIT 1')->result()[0]->POST_ID;
	}


	public function getOnePost($id)
	{
		return $this->db->query('SELECT `POST_IMAGE` FROM `post` WHERE `POST_ID` = "' . $id . '"')->result()[0];
	}

	public function deletePost($id)
	{
		$this->db->query('DELETE FROM `post` WHERE `POST_ID` = "' . $id . '"');
	}

	public function getUserData($id)
	{
		return $this->db->query('SELECT * FROM `user` WHERE `USER_ID` = "' . $id . '"')->result()[0];
	}

	public function get_postingan_per_com($id)
	{
		return $this->db->query('SELECT * FROM `post` WHERE `COM_ID` = "' . $id . '" ORDER BY `UP_DATE` DESC')->result();
	}

	public function hitung_like($arr)
	{
		$ret = array();
		for ($i = 0; $i < count($arr); $i++) {
			$ret[$i] = $this->db->query('SELECT * FROM `like` WHERE `POST_ID` = "' . $arr[$i]->POST_ID . '"')->num_rows();
		}
		return $ret;
	}

	public function commentPerPost($arr)
	{
		$ret = array();
		for ($i = 0; $i < count($arr); $i++) {
			$ret[$i] = $this->db->query('SELECT * FROM `comment` WHERE `POST_ID`= "' . $arr[$i]->POST_ID . '" ORDER BY `CREATE_AT` ASC')->result();
		}
		return $ret;
	}

	public function isLike($arr)
	{
		$ret = array();
		for ($i = 0; $i < count($arr); $i++) {
			$tmp = $this->db->query('SELECT `LIKE_ID` FROM `like` WHERE `POST_ID`= "' . $arr[$i]->POST_ID . '" AND `MEMBER_ID` = "' . $arr[$i]->MEMBER_ID . '"')->num_rows();
			$ret[$i] = ($tmp > 0) ? True : False;
		}
		return $ret;
	}

	public function like($post, $mem)
	{
		$cnt = count($this->db->query('SELECT * FROM `like` WHERE `POST_ID`= "' . $post . '" AND `MEMBER_ID`= "' . $mem . '"')->result());
		if ($cnt == 0)
			$this->db->query('INSERT INTO `like` (`LIKE_ID`, `POST_ID`, `MEMBER_ID`, `CREATED_AT`) VALUES (NULL, "' . $post . '", "' . $mem . '", current_timestamp())');
	}

	public function dislike($post, $mem)
	{
		$this->db->query('DELETE FROM `like` WHERE `POST_ID` = "' . $post . '" AND `MEMBER_ID` = "' . $mem . '"');
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
		$str_query = $str_query . ') ORDER BY `UP_DATE` DESC';
		return $this->db->query($str_query)->result();
	}

	public function storeComment($post, $mem, $isi)
	{
		$this->db->query('INSERT INTO `comment` (`COMMENT_ID`, `MEMBER_ID`, `POST_ID`, `COMMENT_CONTENT`, `CREATE_AT`) VALUES (NULL, "' . $mem . '", "' . $post . '", "' . $isi . '", current_timestamp())');
	}
}
