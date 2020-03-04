<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_community_outcome extends CI_Model
{
    public function get_outcome_detail($id)
    {
        return $query = $this->db->query('SELECT o.OUTCOME_DATE,o.OUTCOME_ACTIVITY,o.OUTCOME_AMOUNT,u.USERNAME,o.OUTCOME_ID FROM outcome o JOIN community_member m ON o.MEMBER_ID = m.MEMBER_ID JOIN user u ON u.USER_ID=m.USER_ID WHERE o.COM_ID =' . $id)->result();
    }

    function addOutcome($com_id, $member_id)
    {


        $data = [
            'COM_ID' => $com_id,
            'MEMBER_ID' => $member_id,
            'OUTCOME_DATE' => $this->input->post('date'),
            'OUTCOME_ACTIVITY' => $this->input->post('activity'),
            'OUTCOME_AMOUNT' => $this->input->post('amount'),


        ];

        $this->db->insert('outcome', $data);
    }
}
