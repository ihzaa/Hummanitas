<?php
// defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('m_ajax');
        $this->load->model('user/m_user');
        $this->load->model('community/m_communitynew');
    }

    function index()
    {
        $keyword = $this->input->post('search');
        $output = '';

        $result = $this->m_ajax->search($keyword);

        if (count($result) > 0) {
            foreach ($result as $result) {
                if ($result->ROLE != NULL) {
                    $output .=  '<a href="' . base_url('user/user_profile_guest/' . $result->ID)  . '"><div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
            
            <div class="col-12"> 
                <div class="row align-items-center">
                <div class="col-1">
                <div class="avatar mr-1 avatar-xl" style="margin-left:20px">
                     <img src="' . base_url('assets/img/user/') . $result->IMAGE . '" alt="avtar img holder" height="35" width="35">
                </div>
                </div>
                <div class="col-11">
                <p class="text-bold-600" style="font-size:20px">' . $result->NAME . '</p>
                <small >
                    <p style="margin-top: -10px"><strong>' . $result->EMAIL . '</strong> </p>
                </small>
                </div>
                </div>
                </div>
                
        </div></a>';
                } else {
                    $output .=  '<a href="' . base_url('community/' . $result->ID)  . '"><div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
            
                    <div class="col-12"> 
                        <div class="row align-items-center">
                        <div class="col-1">
                        <div class="avatar mr-1 avatar-xl" style="margin-left:20px">
                             <img src="' . base_url('assets/img/community/profile/') . $result->IMAGE . '" alt="avtar img holder" height="35" width="35">
                        </div>
                        </div>
                        <div class="col-11">
                        <p class="text-bold-600" style="font-size:20px">' . $result->NAME . '</p>
                        <small >
                            <p style="margin-top: -10px"><strong>' . $result->EMAIL . '</strong> </p>
                        </small>
                        </div>
                        </div>
                        </div>
                        
                </div></a>';
                }
            }
        } else {
            $output .= '<div class="list-group-item d-lg-flex justify-content-between align-items-start py-1">
            <div class="col-12">
                <p class="text-bold-600 font-medium-2 mb-0 mt-25">No data found</p>

            </div>
        </div>';
        }

        echo $output;
    }

    function listCom()
    {
        $id = $this->uri->segment('2');
        $data = $this->m_ajax->listCom($id);
        echo json_encode($data);
    }

    //jika mengirimkan chat baru
    function chat()
    {
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];
        $com_id = $this->uri->segment(2);

        $message = $this->input->post('message');
        $id = $this->input->post('id');



        $collabMemberId = $this->m_ajax->collabMemberId($id);


        foreach ($collabMemberId as $memberId) {
            $recipient_com = $memberId->COM_ID;

            $chat_id = $this->m_ajax->insertMessage($id, $user_id, $message, $recipient_com);
        }

        // $your_new_chat = $this->m_ajax->get_your_new_chat($chat_id, $com_id);


        // $output = '';

        // if (count($your_new_chat) != 0) {
        //     $output .= '<div class="chat">
        //     <div class="chat-avatar">
        //         <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
        //             <img src="' . base_url('assets/img/user/') . $your_new_chat['USER_IMAGE'] . '" alt="avatar" height="40" width="40" />
        //         </a>
        //     </div>
        //     <div class="chat-body">
        //         <div class="chat-content">
        //             <strong>
        //                 <p style="display:inline-block; font-size:17px">Me</p>
        //                 <p style="margin-top:-4px;margin-left:3px;font-size: 10px">' . date("F j, Y \&\\n\b\s\p\; g:i a", strtotime($your_new_chat['TIME'])) . '</p>
        //             </strong>
        //             <hr style="margin-top:-2px;">
        //             <p>' . $your_new_chat['MESSAGE'] . '</p>
        //         </div>
        //     </div>
        // </div>';
        // }
        // echo $output;
    }

    //load semua chat kolaborasi
    function get_collab_chat()
    {
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];
        $com_id = $this->uri->segment(2);

        $member = $this->m_ajax->getComMember($user_id, $com_id);
        $member_id = $member['MEMBER_ID'];


        $id = $this->input->post('id');
        $this->m_ajax->update_unseen_message($id, $user_id);
        $message = $this->m_ajax->get_collab_chat($id, $member_id);
        $output = '';

        foreach ($message as $message) {
            if ($message->USER_ID == $user_id) {
                $output .=  '<div class="chat">
                <div class="chat-avatar">
                    <a class="avatar m-0" data-toggle="tooltip" data-placement="right" title="" data-original-title="">
                        <img src="' . base_url('assets/img/user/') . $message->USER_IMAGE . '" alt="avatar" height="40" width="40" />
                    </a>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <strong>
                            <p style="display:inline-block; font-size:17px">Me</p>
                            <p style="margin-top:-4px;margin-left:3px;font-size: 10px">' . date("F j, Y \&\\n\b\s\p\; g:i a", strtotime($message->TIME)) . '</p>
                        </strong>
                        <hr style="margin-top:-2px;">
                        <p>' . $message->MESSAGE . '</p>
                    </div>
                </div>
            </div>';
            } else {
                $output .=  '<div class="chat chat-left">
                <div class="chat-avatar">
                    <a class="avatar m-0" data-toggle="tooltip" href="' . base_url('user/user_profile_guest/') . $message->USER_ID . '" data-placement="left" title="" data-original-title="">
                        <img src="' . base_url('assets/img/user/') . $message->USER_IMAGE . '" alt="avatar" height="40" width="40" />
                    </a>
                </div>
                <div class="chat-body">

                    <div class="chat-content">

                        <a href="' . base_url('user/user_profile_guest/') . $message->USER_ID . '">
                            <strong>
                                <p style="display:inline-block; font-size:17px">' . $message->USERNAME . '</p>
                            </strong>
                        </a>
                        <strong>
                        <p style="margin-top:-4px;margin-left:3px;font-size: 10px">' . date("F j, Y \&\\n\b\s\p\; g:i a", strtotime($message->TIME)) . '</p>
                        </strong>
                        <hr style="margin-top:-2px;">
                        <p>' . $message->MESSAGE . '</p>

                    </div>
                </div>
            </div>';
            }
        }
        echo $output;
    }

    function get_collab_member()
    {
        $id = $this->input->post('id');
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];
        $com_id = $this->uri->segment(2);

        $member = $this->m_ajax->get_collab_member($id);
        $output = '';

        foreach ($member as $member) {
            $output .= '<div class="avatar user-profile-toggle m-0 m-0 mr-1" title data-original-title="komunitas" id="' . $member->COM_ID . '">
                <img src="' . base_url('assets/img/community/profile/') . $member->COM_IMAGE . '" alt="" height="40" width="40" title="' . $member->COM_NAME . '" data-toggle="tooltip" data-original-title="' . $member->COM_NAME . '"/>
            </div>';
        }

        echo $output;
    }

    function get_member_detail()
    {
        $id = $this->input->post('id');
        $member = $this->m_ajax->get_member_detail($id);
        $output = '';

        $output .= '<header class="user-profile-header">
        <span class="close-icon">
            <i class="feather icon-x"></i>
        </span>
        <div class="header-profile-sidebar">
            <div class="avatar">
                <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="user_avatar" height="70" width="70">
            </div>
            <h4 class="chat-user-name">Komunitas Bola Basket</h4>
        </div>
    </header>
    <div class="user-profile-sidebar-area p-2">
        <h6>About</h6>
        <p>Deskripsi dari komunitas ini adalah ......</p>
    </div>';

        echo $output;
    }

    function deletePhoto()
    {
        $id = $this->input->post('id');

        $this->m_ajax->delPhoto($id);
    }

    function deleteGallery()
    {
        $id = $this->input->post('id');

        $this->m_ajax->delGallery($id);
    }

    function leaveCommunity()
    {
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];

        $com_id = $this->uri->segment(2);

        $this->m_ajax->leaveCommunity($user_id, $com_id);
        redirect('user/');
    }

    function get_last_chat()
    {
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->input->post('id');
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];
        $com_id = $this->uri->segment(2);

        $member = $this->m_ajax->getComMember($user_id, $com_id);
        $member_id = $member['MEMBER_ID'];

        $idArray = [];
        $last_chat = [];

        $idArray = explode(',', $id);
        $i = 0;
        foreach ($idArray as $id) {
            $chatNotif[$i] = $this->m_ajax->get_last_chat($id, $user_id, $member_id);
            $i++;
        }

        echo json_encode($chatNotif);
    }

    function update_unseen_message()
    {
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];
        $id = $this->input->post('id');

        $this->m_ajax->update_unseen_message($id, $user_id);
    }

    function getYear()
    {
        $year = $this->m_communitynew->listYear();

        $option = '';
        foreach ($year as $year) {
            $option .= '<option value="' . $year->YEAR . '">' . $year->YEAR . '</option>';
        }

        echo $option;
    }

    function notification()
    {
        $data['user'] = $this->m_user->getUser();
        $user_id = $data['user']['USER_ID'];

        if ($_POST["view"] != '') {
            $this->m_ajax->update_unseen_notif($user_id);
        }

        $notif = $this->m_ajax->get_notification($user_id);
        $output = '';
        if (count($notif) > 0) {
            foreach ($notif as $row) {

                $current_date = date('d/m/Y');

                if ($date = date('d/m/Y', strtotime($row->TIME)) == $current_date) {
                    $date = 'Today at ' . date('h:i a', strtotime($row->TIME));
                } else if ($date = date('d/m/Y', strtotime($row->TIME)) == date('d/m/Y', strtotime('-1 day', strtotime($current_date)))) {
                    $date = 'Yesterday at ' . date('h:i a', strtotime($row->TIME));
                } else {
                    if (date('Y', strtotime($row->TIME)) == date('Y')) {
                        $date = date('d F', strtotime($row->TIME));
                    } else {
                        $date = date('d F Y', strtotime($row->TIME));
                    }
                }

                $output .= '<a class="d-flex justify-content-between" href="' . base_url("$row->NOTIF_LINK") . '">
                <div class="media d-flex align-items-start">
                    <div class="media-left"><i class="feather icon-' . $row->NOTIF_ICON . ' font-medium-5 primary"></i></div>
                    <div class="media-body">
                        <h6 class="primary media-heading">' . $row->NOTIF_SUBJECT . '</h6>
                        <small class="notification-text">' . $row->NOTIF_TEXT . '</small>
                    </div><small>
                        <time class="media-meta" datetime="' . $row->TIME . '">' . $date . '</time></small>
                </div>
            </a>';
            }
        } else {
            $output .= '<li><a href="javascript:void(0)" class="text-bold text-italic">No Notification Found</a></li>';
        }

        $unseen_notif = $this->m_ajax->get_unseen_notification($user_id);
        $count = count($unseen_notif);
        $data = array(
            'notification' => $output,
            'unseen_notification'  => $count
        );
        echo json_encode($data);
    }

    public function get_event_transaction()
    {
        $id = $this->input->post('transactionId');
        if (isset($id) and !empty($id)) {
            $transaction = $this->m_ajax->get_event_transaction($id);

            if ($transaction['NAME'] == NULL) {
                $name = $transaction['USERNAME'];
            } else {
                $name = $transaction['NAME'];
            };
            echo ' <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <input readonly id="transactionId" value="' . $id . '" hidden>
                    <label>Name</label>
                    <input readonly="" class="form-control" value="' . $name . '">
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label>Amount</label>
                    <input readonly="" class="form-control" value="' . $transaction['ANOTHER_AMOUNT'] . '">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label>
                        Proof Of Payment
                    </label>
                    <br>
                        <img height="500px" width="400px" src="' . base_url('assets/img/community/transaction/') . $transaction['COM_ID'] . '/' . $transaction['PROOF'] . '" alt="Card image">
                </div>
            </div>
        </div>
        ';
        }
    }

    function confirmEventIncome()
    {
        $id = $this->input->post('id');

        $check = $this->m_ajax->checkEventTransaction($id);

        if ($check != NULL) {
            $this->m_ajax->confirmEventIncome($id);

            echo 'success';
        } else {
            echo 'failed';
        }
    }

    function listEventIncome()
    {
        $id = $this->uri->segment(2);
        $list = $this->m_ajax->listEventIncome($id);
        echo json_encode($list);
    }

    function updateEventIncome()
    {
        $id = $this->input->post('id');

        $this->m_ajax->updateEventIncome($id);
    }

    function saveDonation()
    {
        $amount = $this->input->post('amount');
        $com_id = $this->uri->segment(2);
        $this->m_ajax->saveDonation($amount, $com_id);
    }

    public function get_Monthly_transaction()
    {
        $id = $this->input->post('transactionId');
        if (isset($id) and !empty($id)) {
            $transaction = $this->m_ajax->get_Monthly_transaction($id);

            if ($transaction['NAME'] == NULL) {
                $name = $transaction['USERNAME'];
            } else {
                $name = $transaction['NAME'];
            };
            echo ' <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <input readonly id="transactionId" value="' . $id . '" hidden>
                    <label>Name</label>
                    <input readonly="" class="form-control" value="' . $name . '">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label>Month & Year</label>
                    <input readonly="" class="form-control" value="' . $transaction['MONTH'] . ' ' . $transaction['YEAR'] . '">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label>
                        Proof Of Payment
                    </label>
                    <br>
                        <img height="500px" width="400px" src="' . base_url('assets/img/community/transaction/') . $transaction['COM_ID'] . '/' . $transaction['PROOF'] . '" alt="Card image">
                </div>
            </div>
        </div>
        ';
        }
    }

    function confirmMonthlyIncome()
    {
        $id = $this->input->post('id');

        $check = $this->m_ajax->checkMonthlyTransaction($id);

        if ($check != NULL) {
            $this->m_ajax->confirmMonthlyIncome($id);

            echo 'success';
        } else {
            echo 'failed';
        }
    }

    function selectedMonthlyIncome()
    {
        $com_id = $this->uri->segment(2);
        $value = $this->input->post('valueSelected');

        $selected = $this->m_ajax->selectedMonthlyIncome($com_id, $value);
        $Total = $this->m_ajax->totalMonthlyIncome($com_id, $value);
        $output = '';
        $total = '';

        if ($selected != NULL) {
            foreach ($selected as $selected) {
                $i = 1;
                $output .= '<tr>
                    <th>
                       ' . $i . '
                    </th>
                    <th>
                        ' . $selected->MONTH . '
                    </th>
                    <th>
                        ' . $selected->YEAR . '
                    </th>
                    <th>
                        ' . $selected->TOTAL . '
                    </th>
            
                </tr>';
                $i++;
            }
        } else {
            $output .= '<tr>
                    <th>
                    <div class="center">
                      No Data Found.
                      </div>
                    </th>
            
                </tr>';
        }


        if ($Total != 0) {
            $total .= '<tr>
            <th></th>
            <th>Total</th>
            <th></th>
            <th><strong>' . $Total['TOTAL'] . '</strong></th>
        </tr>';
        } else {
            $total .= '<tr>
        </tr>';
        }


        $data = array(
            'row' => $output,
            'total' => $total
        );
        echo json_encode($data);
    }

    function selectedProfitLoss()
    {
        $com_id = $this->uri->segment(2);
        $value = $this->input->post('valueSelected');



        $selectedIncome = $this->m_ajax->selectedTotalIncome($com_id, $value);

        $selectedOutcome = $this->m_ajax->selectedTotalOutcome($com_id, $value);
        $totalIncome = $this->m_ajax->totalSelectedIncome($com_id, $value);
        $totalOutcome = $this->m_ajax->totalSelectedOutcome($com_id, $value);

        $outputIncome = '';
        $outputOutcome = '';
        $TotalIncome = '';
        $TotalOutcome = '';
        $i = 1;
        if ($selectedIncome != NULL) {
            foreach ($selectedIncome as $income) {

                $outputIncome .= '
                    <tr>
                        <th>
                            ' . $i . '
                        </th>
                        <th>
                            ' . $income->CASH_ACTIVITY . '
                        </th>
                        <th>
                            ' . date('Y', strtotime($income->YEAR)) . '
                        </th>
                        <th>
                            ' . $income->TOTAL . '
                        </th>
                        <th>
                            -
                        </th>

                    </tr>

               ';
                $i++;
            }
        }


        if ($selectedOutcome != NULL) {
            foreach ($selectedOutcome as $outcome) {
                $outputOutcome .= '
                    <tr>
                        <th>
                            ' . $i . '
                        </th>
                        <th>
                            ' . $outcome->OUTCOME_ACTIVITY . '
                        </th>
                        <th>
                            ' . date('Y', strtotime($outcome->OUTCOME_DATE)) . '
                        </th>
                        <th>
                            -
                        </th>
                        <th>
                            ' . $outcome->TOTAL . '
                        </th>

                    </tr>

               ';
                $i++;
            }
        }


        if ($totalIncome != 0) {
            $TotalIncome .= '<strong>' . $totalIncome['TOTAL'] . '</strong>
        </tr>';
        }

        if ($totalOutcome != 0) {
            $TotalOutcome .= '<strong>' . $totalOutcome['TOTAL'] . '</strong>';
        }


        $data = array(
            'row1' => $outputIncome,
            'row2' => $outputOutcome,
            'total1' => $TotalIncome,
            'total2' => $TotalOutcome,
        );

        echo json_encode($data);
    }
}
