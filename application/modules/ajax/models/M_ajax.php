<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ajax extends CI_Model
{
    public function search($keyword)
    {
        $query =  $this->db->query("SELECT * FROM (SELECT USER_ID AS ID, 
        USERNAME AS NAME,USER_IMAGE AS IMAGE,EMAIL AS EMAIL, ROLE_ID AS ROLE FROM
         user UNION SELECT COM_ID,COM_NAME,COM_IMAGE,COM_EMAIL,ROLE FROM community) 
         as combine WHERE combine.NAME LIKE '%$keyword%' OR combine.EMAIL LIKE '%$keyword%'");
        return $query->result();
    }

    function listCom($id)
    {
        $q = $this->db->query('Select COM_ID,COM_NAME,COM_EMAIL FROM community WHERE COM_ID !=' . $id);
        return $q->result();
    }

    function insertMessage($id, $user_id, $message)
    {
        $data = array(
            'USER_ID' => $user_id,
            'COLLAB_ID' => $id,
            'MESSAGE' => $message
        );
        $this->db->insert('chat', $data);

        return $this->db->insert_id();
    }

    function get_your_new_chat($id)
    {
        $message = $this->db->query('SELECT u.USER_ID, u.USERNAME, u.USER_IMAGE, c.CHAT_ID, c.TIME, c.MESSAGE, c.COLLAB_ID FROM user u JOIN chat c on u.USER_ID = c.USER_ID WHERE c.CHAT_ID =' . $id);

        return $message->row_array();
    }

    function get_collab_chat($id)
    {
        $message = $this->db->query('SELECT u.USER_ID, u.USERNAME, u.USER_IMAGE, c.CHAT_ID, c.TIME, c.MESSAGE, c.COLLAB_ID FROM user u JOIN chat c on u.USER_ID = c.USER_ID WHERE c.COLLAB_ID = ' . $id . ' ORDER BY c.TIME ASC');

        return $message->result();
    }

    function get_collab_member($id)
    {
        $member = $this->db->query('SELECT c.COLMEM_ID, k.COM_ID, k.COM_NAME, k.COM_IMAGE FROM collab_member c JOIN community k on c.COM_ID = k.COM_ID WHERE c.COLLAB_ID = ' . $id . ' AND c.COLMEM_STATUS = 1');

        return $member->result();
    }

    function get_member_detail($id)
    {
        $member = $this->db->query('SELECT k.COM_ID, k.COM_NAME, k.COM_IMAGE, k.COM_DESC FROM collab_member c JOIN community k on c.COM_ID = k.COM_ID WHERE k.COM_ID = ' . $id);

        return $member->result();
    }

    function delPhoto($id)
    {
        $this->db->where('IMAGE_ID', $id);
        $this->db->delete('images');
    }

    function delGallery($id)
    {
        $this->db->where('GALLERY_ID', $id);
        $this->db->delete('gallery');
    }

    function leaveCommunity($user_id, $com_id)
    {
        $this->db->where('USER_ID', $user_id);
        $this->db->where('COM_ID', $com_id);
        $this->db->delete('community_member');
    }

    function get_last_chat($id)
    {
        return $this->db->query('SELECT COLLAB_ID,TIME FROM chat WHERE COLLAB_ID = ' . $id . ' ORDER BY TIME DESC LIMIT 1')->row_array();
    }
}
