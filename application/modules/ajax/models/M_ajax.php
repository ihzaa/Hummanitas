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

    function collabMemberId()
    {
        $query = $this->db->query('SELECT COM_ID FROM `collab_member` WHERE COLLAB_ID = 5 AND COLMEM_STATUS = 1');

        return $query->result();
    }

    function insertMessage($id, $user_id, $message, $com_id)
    {
        // $data = array(
        //     'USER_ID' => $user_id,
        //     'COLLAB_ID' => $id,
        //     'MESSAGE' => $message
        // );
        // $this->db->insert('chat', $data);

        $this->db->query('INSERT INTO chat (`USER_ID`, `RECIPIENT_ID`, `COLLAB_ID`, `MESSAGE`) SELECT ' . $user_id . ', `MEMBER_ID`,' . $id . ', "' . $message . '" FROM `community_member` WHERE `COM_ID` = ' . $com_id . ' AND MEMBER_STATUS = 1');

        return $this->db->insert_id();
    }

    function get_your_new_chat($id)
    {
        $message = $this->db->query('SELECT u.USER_ID, u.USERNAME, u.USER_IMAGE, c.CHAT_ID, c.TIME, c.MESSAGE, c.COLLAB_ID FROM user u JOIN chat c on u.USER_ID = c.USER_ID WHERE c.CHAT_ID =' . $id);

        return $message->row_array();
    }

    function get_collab_chat($id, $user_id)
    {
        $message = $this->db->query('SELECT u.USER_ID, u.USERNAME, u.USER_IMAGE, c.CHAT_ID, c.TIME, c.MESSAGE, c.COLLAB_ID FROM user u JOIN chat c on u.USER_ID = c.USER_ID JOIN community_member m on m.USER_ID = u.USER_ID WHERE c.COLLAB_ID = ' . $id . ' AND c.RECIPIENT_ID = m.MEMBER_ID ORDER BY c.TIME ASC');

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

    function get_last_chat($id, $user_id)
    {
        $last_chat = $this->db->query('SELECT COLLAB_ID,TIME FROM chat WHERE COLLAB_ID = ' . $id . ' ORDER BY TIME DESC LIMIT 1')->row_array();

        $unseen_message = $this->db->query('SELECT c.CHAT_ID FROM chat c JOIN community_member m on c.RECIPIENT_ID = m.MEMBER_ID WHERE c.COLLAB_ID = ' . $id . ' AND m.USER_ID = ' . $user_id . ' AND c.READ_STATUS = 0');
        $unseen = $unseen_message->result();
        if ($unseen != NULL) {
            $count = count($unseen);

            $data = array(
                'COUNT' => $count,
                'COLLAB_ID' => $last_chat['COLLAB_ID'],
                'TIME' => $last_chat['TIME']
            );
            return $data;
        } else {
            $data = array(
                'COUNT' => 0,
                'COLLAB_ID' => $last_chat['COLLAB_ID'],
                'TIME' => $last_chat['TIME']
            );
            return $data;
        }
    }


    function get_unseen_message($id, $user_id)
    {
        $unseen_message = $this->db->query('SELECT c.COLLAB_ID FROM chat c JOIN community_member m on c.RECIPIENT_ID = m.MEMBER_ID WHERE c.COLLAB_ID = ' . $id . ' AND m.USER_ID = ' . $user_id . ' AND c.READ_STATUS = 0');
        $unseen = $unseen_message->result();
        if ($unseen != NULL) {
            $count = count($unseen);

            foreach ($unseen as $unseen) {
                $collab_id = $unseen->COLLAB_ID;
            }

            $data = array(
                'COUNT' => $count,
                'COLLAB_ID' => $collab_id
            );
            return $data;
        } else {
            $data = array(
                'COUNT' => 0,
                'COLLAB_ID' => NULL
            );
            return $data;
        }
    }


    function update_unseen_message($id, $user_id)
    {
        $this->db->query('UPDATE chat c JOIN community_member m on c.RECIPIENT_ID = m.MEMBER_ID SET c.READ_STATUS = 1 WHERE c.READ_STATUS = 0 AND c.COLLAB_ID = ' . $id . ' AND m.USER_ID = ' . $user_id);
    }
}
