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

    function update_unseen_notif($user_id)
    {
        $this->db->query('UPDATE notification n JOIN community_member m on n.RECIPIENT_ID = m.MEMBER_ID SET n.NOTIF_STATUS = 1 WHERE n.NOTIF_STATUS = 0 AND m.USER_ID = ' . $user_id);
    }

    function get_notification($user_id)
    {
        $query = $this->db->query('SELECT * FROM notification n JOIN community_member m on n.RECIPIENT_ID = m.MEMBER_ID WHERE m.USER_ID = ' . $user_id . ' ORDER BY TIME DESC');
        return $query->result();
    }

    function get_unseen_notification($user_id)
    {
        $query = $this->db->query('SELECT * FROM notification n JOIN community_member m on n.RECIPIENT_ID = m.MEMBER_ID WHERE m.USER_ID = ' . $user_id . ' AND NOTIF_STATUS = 0');
        return $query->result();
    }

    //Event Income
    function get_event_transaction($id)
    {
        $query = $this->db->query('SELECT a.ANOTHER_DATE,a.ANOTHER_AMOUNT,a.ANOTHER_ID,a.COM_ID,a.PROOF,a.ANOTHER_STATUS,u.USERNAME,u.NAME FROM another_income a JOIN community_member m on m.MEMBER_ID = a.USER_ID JOIN user u on m.USER_ID = u.USER_ID WHERE a.ANOTHER_ID = ' . $id);
        return $query->row_array();
    }

    function confirmEventIncome($id)
    {
        $this->db->query('UPDATE another_income SET ANOTHER_STATUS = 1 WHERE ANOTHER_ID = ' . $id);
    }

    function checkEventTransaction($id)
    {
        $query = $this->db->query('SELECT * FROM another_income WHERE ANOTHER_ID = ' . $id . ' AND ANOTHER_STATUS = 0');
        return $query->result();
    }

    function listEventIncome($id)
    {
        $query = $this->db->query('SELECT a.ACTIVITY_ID,a.ACTIVITY FROM activity a JOIN event e on a.EVENT_ID = e.EVENT_ID WHERE e.COM_ID = ' . $id);
        return $query->result();
    }

    //Monthly Income
    function saveDonation($amount, $com_id)
    {
        $this->db->query('UPDATE community SET JUMLAH_KAS =' . $amount . ' WHERE COM_ID = ' . $com_id);
    }

    function get_Monthly_transaction($id)
    {
        $query = $this->db->query('SELECT c.CASH_ID,m.MONTH,y.YEAR,c.PROOF,c.COM_ID,u.USERNAME,u.NAME FROM monthly_cash c JOIN user u ON c.USER_ID = u.USER_ID JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID = y.MONTH_ID WHERE c.CASH_ID = ' . $id);
        return $query->row_array();
    }

    function confirmMonthlyIncome($id)
    {
        $this->db->query('UPDATE monthly_cash SET CASH_STATUS = 1 WHERE CASH_ID = ' . $id);
    }

    function checkMonthlyTransaction($id)
    {
        $query = $this->db->query('SELECT * FROM monthly_cash WHERE CASH_ID = ' . $id . ' AND CASH_STATUS = 0');
        return $query->result();
    }

    function selectedMonthlyIncome($com_id, $value)
    {
        $query = $this->db->query("SELECT c.MONTHYEAR_ID,SUM(c.CASH_AMOUNT) AS 'TOTAL',m.MONTH,y.YEAR FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID=y.MONTH_ID WHERE c.COM_ID = " . $com_id . " AND m.MONTH LIKE '%$value%' AND c.CASH_STATUS = 1 GROUP BY c.MONTHYEAR_ID")->result();
        return $query;
    }

    function totalMonthlyIncome($com_id, $value)
    {
        $query = $this->db->query("SELECT SUM(c.CASH_AMOUNT) AS 'TOTAL' FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID=y.MONTH_ID WHERE c.COM_ID = " . $com_id . " AND m.MONTH LIKE '%$value%' AND c.CASH_STATUS = 1 ")->row_array();
        return $query;
    }

    function selectedTotalIncome($com_id, $value)
    {

        $income = $this->db->query("SELECT c.CASH_ACTIVITY,y.YEAR,SUM(c.CASH_AMOUNT) AS 'TOTAL' FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID=y.MONTH_ID WHERE y.YEAR LIKE '%2020%' AND c.COM_ID = " . $com_id . " AND c.CASH_STATUS = 1 GROUP BY c.MONTHYEAR_ID
        UNION ALL
        SELECT a.ACTIVITY,e.ANOTHER_DATE,SUM(e.ANOTHER_AMOUNT) AS 'TOTAL' FROM another_income e JOIN activity a ON e.ACTIVITY_ID = a.ACTIVITY_ID WHERE e.ANOTHER_DATE LIKE '%2020%' AND e.COM_ID = " . $com_id . " AND e.ANOTHER_STATUS = 1 GROUP BY e.ACTIVITY_ID")->result();

        return $income;
    }

    function selectedTotalOutcome($com_id, $value)
    {
        $outcome = $this->db->query("SELECT OUTCOME_ACTIVITY,OUTCOME_DATE,SUM(OUTCOME_AMOUNT) AS 'TOTAL' FROM outcome WHERE OUTCOME_DATE LIKE '%$value%' AND COM_ID =" . $com_id)->result();

        return $outcome;
    }

    function totalSelectedIncome($com_id, $value)
    {
        $query = $this->db->query("SELECT SUM(t.TOTAL) AS 'TOTAL' FROM (SELECT c.CASH_ACTIVITY,y.YEAR,SUM(c.CASH_AMOUNT) AS 'TOTAL' FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID=y.MONTH_ID WHERE y.YEAR LIKE '%$value%' AND c.COM_ID = " . $com_id . " AND c.CASH_STATUS = 1 GROUP BY c.MONTHYEAR_ID
        UNION ALL
        SELECT a.ACTIVITY,e.ANOTHER_DATE,SUM(e.ANOTHER_AMOUNT) AS 'TOTAL' FROM another_income e JOIN activity a ON e.ACTIVITY_ID = a.ACTIVITY_ID WHERE e.ANOTHER_DATE LIKE '%$value%' AND e.COM_ID = " . $com_id . " AND e.ANOTHER_STATUS = 1 GROUP BY e.ACTIVITY_ID) t")->row_array();
        return $query;
    }

    function totalSelectedOutcome($com_id, $value)
    {
        $query = $this->db->query("SELECT SUM(OUTCOME_AMOUNT) AS 'TOTAL' FROM outcome WHERE COM_ID = " . $com_id . " AND OUTCOME_DATE LIKE '%$value%' ")->row_array();
        return $query;
    }
}
