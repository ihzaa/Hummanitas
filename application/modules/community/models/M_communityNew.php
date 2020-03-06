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

    function cekYear($year)
    {
        return $this->db->query('SELECT * FROM year WHERE YEAR =' . $year)->result();
    }

    function addYear($year)
    {
        $this->db->query('INSERT INTO  year(YEAR) VALUE (' . $year . ')');
    }

    function addMonthYear($year)
    {
        $this->db->query('INSERT INTO monthYear (`MONTH_ID`, `YEAR`) SELECT  `MONTH_ID`,' . $year . ' FROM `month` ');
    }

    function listMonth()
    {
        return $this->db->query('SELECT * FROM month')->result();
    }

    function listYear()
    {
        return $this->db->query('SELECT * FROM year')->result();
    }

    function addMonthlyTransaction($upload_image, $monthYearId, $month, $com_id, $user_id, $amount)
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
            'MONTHYEAR_ID' => $monthYearId,
            'USER_ID' => $user_id,
            'COM_ID' => $com_id,
            'PROOF' => $gbr,
            'CASH_ACTIVITY' => $month . ' Monthly Donation',
            'CASH_AMOUNT' => $amount
        );
        $this->db->insert('monthly_cash', $data);
    }

    function getMonthYear($month, $year)
    {
        return $this->db->query('SELECT * FROM monthYear WHERE MONTH_ID =' . $month . ' AND YEAR=' . $year)->row_array();
    }

    function getMonth($month_id)
    {
        return $this->db->query('SELECT MONTH FROM month WHERE MONTH_ID =' . $month_id)->row_array();
    }

    function checkMonthlyCash($monthYearId, $user_id, $com_id)
    {
        return $this->db->query('SELECT * FROM monthly_cash WHERE MONTHYEAR_ID =' . $monthYearId . ' AND USER_ID =' . $user_id . ' AND COM_ID =' . $com_id)->result();
    }

    function getMonthlyTransaction($com_id)
    {
        return $this->db->query('SELECT c.CASH_ID,y.YEAR,c.CASH_DATE, c.CASH_STATUS, c.CASH_AMOUNT, m.MONTH, u.USERNAME,u.NAME FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID = y.MONTH_ID JOIN user u ON u.USER_ID = c.USER_ID WHERE c.COM_ID=' . $com_id . ' ORDER BY c.CASH_STATUS ASC')->result();
    }

    function memberMonthlyTransaction($com_id, $user_id)
    {
        return $this->db->query('SELECT c.CASH_ID,y.YEAR,c.CASH_DATE, c.CASH_STATUS, c.CASH_AMOUNT, m.MONTH, u.USERNAME,u.NAME FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID = y.MONTH_ID JOIN user u ON u.USER_ID = c.USER_ID WHERE c.COM_ID=' . $com_id . ' AND c.USER_ID=' . $user_id . ' ORDER BY c.CASH_STATUS ASC')->result();
    }

    function unpaidMember($com_id)
    {
        $member = $this->db->query('SELECT u.USER_ID,u.USERNAME,u.NAME,m.JOIN_DATE FROM user u JOIN community_member m ON u.USER_ID = m.USER_ID WHERE m.COM_ID = ' . $com_id)->result();
        $month = $this->m_communitynew->listMonth();
        $year = $this->m_communitynew->listYear();
        $current = date('d-F-Y');


        $unpaid = array();

        foreach ($member as $member) {
            foreach ($month as $m) {
                foreach ($year as $y) {
                    $monthYear_id = $this->getMonthYear($m->MONTH_ID, $y->YEAR);
                    $joinDate = date('Y-m', strtotime($member->JOIN_DATE));
                    $monthYear = '1-' . $m->MONTH_ID . '-' . $y->YEAR;

                    if ($joinDate <= date('Y-m', strtotime($monthYear))) {
                        if (date('Y-m', strtotime($monthYear)) <= date('Y-m', strtotime($current))) {
                            if (!$this->db->query('SELECT c.CASH_AMOUNT, m.MONTH, u.USERNAME,u.NAME FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID = y.MONTH_ID JOIN user u ON u.USER_ID = c.USER_ID WHERE c.USER_ID = ' . $member->USER_ID . ' AND c.COM_ID=' . $com_id . ' AND m.MONTH_ID =' . $m->MONTH_ID . ' AND y.YEAR =' . $y->YEAR . ' AND c.CASH_STATUS = 1')->result()) {

                                $unpaid[] = array(
                                    'NAME' => $member->USERNAME,
                                    'MONTH' => $m->MONTH,
                                    'YEAR' => $y->YEAR
                                );
                            }
                        }
                    }
                }
            }
        }

        return $unpaid;
    }

    function paidMember($com_id, $year)
    {
        return $this->db->query('SELECT y.YEAR, m.MONTH, u.USERNAME,u.NAME FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID = y.MONTH_ID JOIN user u ON u.USER_ID = c.USER_ID WHERE c.COM_ID=' . $com_id . ' AND y.YEAR=' . $year . ' AND c.CASH_STATUS = 1')->result();
    }

    function sumMonthlyCash($com_id)
    {
        return $this->db->query('SELECT c.MONTHYEAR_ID,SUM(c.CASH_AMOUNT) AS "TOTAL",m.MONTH,y.YEAR FROM monthly_cash c JOIN monthyear y ON c.MONTHYEAR_ID = y.ID JOIN month m ON m.MONTH_ID=y.MONTH_ID WHERE c.COM_ID = ' . $com_id . ' AND c.CASH_STATUS = 1 GROUP BY c.MONTHYEAR_ID')->result();
    }

    function sumEventCash($com_id)
    {
        return $this->db->query('SELECT e.ACTIVITY_ID,SUM(e.ANOTHER_AMOUNT) AS "TOTAL",a.ACTIVITY FROM another_income e JOIN activity a ON e.ACTIVITY_ID = a.ACTIVITY_ID WHERE e.COM_ID = ' . $com_id . ' AND e.ANOTHER_STATUS = 1 GROUP BY e.ACTIVITY_ID')->result();
    }
}
