<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_communityNew extends CI_Model
{
    //finance event
    function get_event($id)
    {
        $event = $this->db->query('SELECT EVENT_ID,EVENT_TITLE FROM event WHERE NOT EXISTS (SELECT EVENT_ID FROM activity WHERE activity.EVENT_ID = event.EVENT_ID ) AND COM_ID =' . $id);
        return $event->result();
    }

    function add_event($event_id, $event_name)
    {
        $data = array(
            'ACTIVITY' => $event_name,
            'EVENT_ID' => $event_id
        );
        $this->db->insert('activity', $data);
    }

    function get_activity($id)
    {
        $activity = $this->db->query('SELECT a.ACTIVITY_ID,a.EVENT_ID,a.ACTIVITY FROM activity a JOIN event e on e.EVENT_ID = a.EVENT_ID WHERE e.COM_ID =' . $id);
        return $activity->result();
    }

    function addEventTransaction($upload_image, $com_id, $user_id)
    {
        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path']        = 'assets/img/community/transaction/' . $com_id;
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']            = 0;

        if (!file_exists('assets/img/community/transaction/' . $com_id)) {
            mkdir('assets/img/community/transaction/' . $com_id, 0777, true);
        }

        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $gbr = $this->upload->data('file_name');


        $data = array(
            'ACTIVITY_ID' => $this->input->post('activityId'),
            'USER_ID' => $user_id,
            'COM_ID' => $com_id,
            'PROOF' => $gbr,
            'ANOTHER_AMOUNT' => $this->input->post('amount'),
            'ANOTHER_STATUS' => 0
        );
        $this->db->insert('another_income', $data);
    }

    function cekMember($user_id, $com_id)
    {
        $q = $this->db->get_where('community_member', array("USER_ID" => $user_id, "COM_ID" => $com_id))->row_array();
        return $q;
    }
}
