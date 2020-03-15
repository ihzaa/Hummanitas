<?php
// defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('m_ajax');
        $this->load->model('user/m_user');
        $this->load->model('community/m_community');
        $this->load->model('community/m_community_ku');
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

    function searchCom()
    {
        $keyword = $this->input->post('search');
        $output = '';

        $result = $this->m_ajax->searchCom($keyword);

        if ($result != NULL) {
            foreach ($result as $result) {
                $id = $result->COM_ID;

                $output .=  '<div class="col-md-3 col-sm-5 col-11 search-content">
                <div class="card" style="border-radius:10px;border-color:#CC99FF;border-style: groove;padding-bottom:10px;width:275px;height: 350px">
                    <center>
                        <div class="card-body text-center">

                            <img src="' . base_url('assets/img/community/profile/') . $result->COM_IMAGE . '" class=" mb-2" heigth="170px" width="269px" style="border-radius:5px;margin-top:-21px;margin-left:-21px;max-height: 170px" alt="knowledge-base-image">
                            <h4 title="' . $result->COM_NAME . '">' . word_limiter($result->COM_NAME, 3) . '</h4>
                            <small class="text-dark" style="font-size: 15px" title="' . $result->COM_ADDRESS . '"><strong>' . word_limiter($result->COM_ADDRESS, 3) . '</strong></small><br>
                            <small class="text-dark">' . $result->COM_EMAIL . '</small>

                        </div>
                        <div class="tutorial">
                            <form action="cekMember" method="post">
                                <button type="submit" name="view" value="' . $id . '" class="btn gradient-light-primary">View</button>
                            </form>
                        </div>
                    </center>
                </div>
            </div>';
            }
        } else {
            $output .= '<div class="col-12">
            <div style="height: 200px; ">
                <h1 align="center" style="margin: 100px 0px">There is no community with the following name,email,or address.</h1>
            </div>
        </div>';
        }

        echo $output;
    }

    function collabMemberDetail()
    {
        $id = $this->input->post('id');
        $output = '';

        $comDetail = $this->m_ajax->collabMemberDetail($id);


        $output .=  '<div class="avatar">
                <img src="' . base_url('assets/img/community/profile/') . $comDetail['COM_IMAGE'] . '" alt="user_avatar" height="70" width="70">
            </div>
            <h4 class="chat-user-name">' . $comDetail['COM_NAME'] . '</h4>
        </div>
    </header>
    <div class="user-profile-sidebar-area p-2">
        <h6>About</h6>
        <textarea rows="4" style="width: 320px;" readonly>' . $comDetail['COM_DESC'] . '</textarea>
        <a href="' . base_url('community/' . $id . '/guest') . '"><button type="button" class="btn btn-primary send" style="margin-top:40px">Visit</button></a>';

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

                        <a href="' . base_url('user/user_profile_guest/') . $message->USER_ID . '" style="display:inline">
                            <strong>
                                <p style="display:inline-block; font-size:17px">' . $message->USERNAME . '</p>
                            </strong>
                        </a>
                        <strong>
                        <p style="margin-top:-4px;margin-left:3px;font-size: 12px;display:inline">from ' . $message->COM_NAME . '</p>
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

        $com_id = $this->uri->segment(2);

        $photo = $this->m_ajax->getPhoto($id);

        $gallery_id = $photo['GALLERY_ID'];

        $album = $this->m_ajax->getAlbum($gallery_id);

        unlink(FCPATH . 'assets/img/community/gallery/' . $com_id . '/' . $album['GALLERY_NAME'] . '/' . $photo['IMAGE']);

        $this->m_ajax->delPhoto($id);
    }

    function deleteGallery()
    {
        $id = $this->input->post('id');

        $com_id = $this->uri->segment(2);

        $album = $this->m_ajax->getAlbum($id);

        $path = 'assets/img/community/gallery/' . $com_id . '/' . $album['GALLERY_NAME'];

        $this->delete_files($path);

        $this->m_ajax->delGallery($id);
    }

    function delete_files($target)
    {
        if (is_dir($target)) {
            $files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

            foreach ($files as $file) {
                delete_files($file);
            }

            rmdir($target);
        } elseif (is_file($target)) {
            unlink($target);
        }
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

                $current_date = date('Y/m/d');

                if ($date = date('Y/m/d', strtotime($row->TIME)) == $current_date) {
                    $date = 'Today at ' . date('h:i a', strtotime($row->TIME));
                } else if ($date = date('Y/m/d', strtotime($row->TIME)) == date('Y/m/d', strtotime('-1 day', strtotime($current_date)))) {
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

    function loadCom()
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');

        // $limit = $_GET['limit'];
        // $offset = $_GET['offset'];

        $community = $this->m_ajax->loadMoreCom($limit, $offset);

        $output = '';

        if (count($community) > 0) {
            foreach ($community as $com) {
                $id = $com->COM_ID;

                $output .= '<div class="col-md-3 col-sm-5 col-11 search-content">
                    <div class="card" style="border-radius:10px;border-color:#CC99FF;border-style: groove;padding-bottom:10px;width:275px;height: 350px">
                        <center>
                            <div class="card-body text-center">

                                <img src="' . base_url('assets/img/community/profile/') . $com->COM_IMAGE . '" class=" mb-2" heigth="170px" width="269px" style="border-radius:5px;margin-top:-21px;margin-left:-21px;max-height: 170px" alt="knowledge-base-image">
                                <h4 title="' . $com->COM_NAME . '">' . word_limiter($com->COM_NAME, 3) . '</h4>
                                <small class="text-dark" style="font-size: 15px" title="' . $com->COM_ADDRESS . '"><strong>' . word_limiter($com->COM_ADDRESS, 3) . '</strong></small><br>
                                <small class="text-dark">' . $com->COM_EMAIL . '</small>

                            </div>
                            <div class="tutorial">
                                <form action="cekMember" method="post">
                                    <button type="submit" name="view" value="' . $id . '" class="btn gradient-light-primary">View</button>
                                </form>
                            </div>
                        </center>
                    </div>
                </div>';
            }
        } else {
            $output .= '<div class="col-12">
                <div style="height: 200px; ">
                    <h1 align="center" style="margin: 100px 0px">There is still no community created</h1>
                </div>
            </div>';
        }

        echo $output;
    }

    function loadMoreCom()
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');

        // $limit = $_GET['limit'];
        // $offset = $_GET['offset'];

        $community = $this->m_ajax->loadMoreCom($limit, $offset);

        $output = '';

        foreach ($community as $com) {
            $id = $com->COM_ID;

            $output .= '<div class="col-md-3 col-sm-5 col-11 search-content">
                    <div class="card" style="border-radius:10px;border-color:#CC99FF;border-style: groove;padding-bottom:10px;width:275px;height: 350px">
                        <center>
                            <div class="card-body text-center">

                                <img src="' . base_url('assets/img/community/profile/') . $com->COM_IMAGE . '" class=" mb-2" heigth="170px" width="269px" style="border-radius:5px;margin-top:-21px;margin-left:-21px;max-height: 170px" alt="knowledge-base-image">
                                <h4 title="' . $com->COM_NAME . '">' . word_limiter($com->COM_NAME, 3) . '</h4>
                                <small class="text-dark" style="font-size: 15px" title="' . $com->COM_ADDRESS . '"><strong>' . word_limiter($com->COM_ADDRESS, 3) . '</strong></small><br>
                                <small class="text-dark">' . $com->COM_EMAIL . '</small>

                            </div>
                            <div class="tutorial">
                                <form action="cekMember" method="post">
                                    <button type="submit" name="view" value="' . $id . '" class="btn gradient-light-primary">View</button>
                                </form>
                            </div>
                        </center>
                    </div>
                </div>';
        }

        echo $output;
    }

    //Load More halaman user home

    function loadUserPost()
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');


        // $community = $this->m_user->allCom();
        $data['user'] = $this->m_user->getUser();
        $user_com = $this->m_user->get_user_com($data['user']['USER_ID']);
        $postingan = $this->m_ajax->loadMoreUserPost($data['user']['USER_ID'], $limit);

        $jml_like = $this->m_community_ku->hitung_like($postingan);
        $comment = $this->m_community_ku->commentPerPost($postingan);
        $memberId = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;

        $count = 0;
        if ($postingan != NULL) {
            foreach ($postingan as $p) {
                if ($p->POST_IMAGE) {
                    if (count($this->db->query('SELECT * FROM `like` WHERE `POST_ID`= "' . $p->POST_ID . '" AND `MEMBER_ID` = "' . $memberId . '"')->result()) == 1) {
                        if ($p->MEMBER_ID == $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												posted to
												<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													<div class="btn-group ml-2">
														<div class="dropdown">
														<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">
											';
                        } else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												posted to
												<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
                        }

                        //jika belum like
                    } else {
                        //jike bukan pemilik
                        if ($p->MEMBER_ID != $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												posted to
												<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
                            //jika pemilik
                        } else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												posted to
												<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													<div class="btn-group ml-2">
														<div class="dropdown">
														<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                    }

                    //tidak ada gambar
                } else {
                    //sudah like
                    if (count($this->db->query('SELECT * FROM `like` WHERE `POST_ID`= "' . $p->POST_ID . '" AND `MEMBER_ID` = "' . $memberId . '"')->result()) == 1) {
                        //jike bukan pemilik
                        if ($p->MEMBER_ID != $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
															<div class="card-body">
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="avatar mr-1">
																		<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
																	</div>
																	<div class="user-page-info">
																	<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
																	posted to
																	<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
																		<span class="font-small-2">' . $p->UP_DATE . '</span>
																	</div>
																</div>
																<p>' . $p->POST_CONTENT . '</p>
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="d-flex align-items-center">
																		<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
																		<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
																		<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
																		<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
																		<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
																		<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
																	</div>
																</div>
																<div class="divider">
																	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
																</div>
																<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                        //pemilik
                        else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
															<div class="card-body">
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="avatar mr-1">
																		<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
																	</div>
																	<div class="user-page-info">
																	<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
																	posted to
																	<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
																		<span class="font-small-2">' . $p->UP_DATE . '</span>
																		<div class="btn-group ml-2">
																			<div class="dropdown">
																				<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
																				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																					<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<p>' . $p->POST_CONTENT . '</p>
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="d-flex align-items-center">
																		<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
																		<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
																		<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
																		<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
																		<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
																		<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
																	</div>
																</div>
																<div class="divider">
																	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
																</div>
																<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                    }
                    //belum like
                    else {
                        //jike bukan pemilik
                        if ($p->MEMBER_ID != $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
									<div class="card-body">
										<div class="d-flex justify-content-start align-items-center mb-1">
											<div class="avatar mr-1">
												<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
											</div>
											<div class="user-page-info">
											<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
											posted to
											<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
												<span class="font-small-2">' . $p->UP_DATE . '</span>
											</div>
										</div>
										<p>' . $p->POST_CONTENT . '</p>
										<div class="d-flex justify-content-start align-items-center mb-1">
											<div class="d-flex align-items-center">
												<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
												<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
												<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
												<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
												<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
												<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
											</div>
										</div>
										<div class="divider">
                                            <div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        </div>
										<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                        //pemilik
                        else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
																<div class="card-body">
																	<div class="d-flex justify-content-start align-items-center mb-1">
																		<div class="avatar mr-1">
																			<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
																		</div>
																		<div class="user-page-info">
																		<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
																		posted to
																		<a href="' . base_url('community/' . $p->COM_ID) . '"><strong>' . $this->db->query('SELECT `COM_NAME` FROM `community` WHERE `COM_ID` = "' . $p->COM_ID . '"')->result()[0]->COM_NAME . '</strong></a></p>
																			<span class="font-small-2">' . $p->UP_DATE . '</span>
																			<div class="btn-group ml-2">
																				<div class="dropdown">
																					<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
																					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																						<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<p>' . $p->POST_CONTENT . '</p>
																	<div class="d-flex justify-content-start align-items-center mb-1">
																		<div class="d-flex align-items-center">
																			<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
																			<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
																			<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
																			<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
																			<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
																			<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
																		</div>
																	</div>
																	<div class="divider">
																		<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
																	</div>
																	<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                    }
                }

                if (!empty($comment[$count])) {
                    echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="' . $comment[$count][count($comment[$count]) - 1]->COMMENT_ID . '">';
                    for ($i = count($comment[$count]) - 1; $i >= 0; $i--) {
                        $c = $comment[$count][$i];
                        echo '
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="avatar mr-50">
															<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="Avatar" height="30" width="30">
														</div>
														';

                        if ($memberId == $c->MEMBER_ID) {
                            echo '
														<div class="user-page-info w-100">
															<div class="row">
																<div class="col-auto mr-auto">
																	<h6 class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;">' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USERNAME . '</a>
																	</h6>
																	<span class="font-small-2">' . $c->COMMENT_CONTENT . '</span>
																</div>
																<div class="col-auto">
																	<a class="del-comment" id="del-comment' . $c->COMMENT_ID . '" data-id="' . $c->COMMENT_ID . '" data-post="' . $p->POST_ID . '"><i class="fa fa-times-circle-o text-primary" title="Delete"></i></a>
																</div>
															</div>
														</div>
													</div>
													<hr id="hr-ke' . $c->COMMENT_ID  . '">';
                        } else {
                            echo '
														<div class="user-page-info w-100">
															<div class="row">
																<div class="col-auto mr-auto">
																	<h6 class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;">' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USERNAME . '</a>
																	</h6>
																	<span class="font-small-2">' . $c->COMMENT_CONTENT . '</span>
																</div>
															</div>
														</div>
													</div>
													<hr id="hr-ke' . $c->COMMENT_ID  . '">';
                        }
                    }
                } else {
                    echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="">';
                }


                echo '
											</div>
											<fieldset class="form-label-group mb-50">
												<textarea class="form-control" id="input-comment' . $p->POST_ID . '" rows="3" placeholder="Add Comment"></textarea>
												<label for="label-textarea">Add Comment</label>
											</fieldset>
											<button type="button" class="btn btn-sm btn-primary btn-comment-post" data-id="' . $p->POST_ID . '">Post Comment</button>
											<div class="spinner-border text-primary mr-100 " id="ldg-comment' . $p->POST_ID . '" role="status" style="display:none;"></div>
										</div>
									</div>';
                $count++;
            }
        } else {
            echo '<div class="card">
										<div class="card-body">
										<div style="height: 500px;" align="center">
										<h1 align="center" style="margin: 20px 0px"><strong>WELCOME TO</strong></h1>
										<img class="img-fluid card-img-top rounded-sm mb-2" style="margin-top:-40px;height:400px;width:420px" src="'  . base_url('assets/') . 'app-assets/images/logo/logoWeb.png" alt="avtar img holder">
										<h1 align="center" style="margin: -30px 0px"><strong>HUMMANITAS</strong></h1>
									</div>
										</div>
									</div>';
        };
    }

    // Load more community home

    function LoadMoreComPost()
    {
        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');

        $id = $this->uri->segment(2);

        $data['user'] = $this->m_user->getUser();
        $user_com = $this->m_user->get_user_com($data['user']['USER_ID']);

        $postingan = array();

        $postingan = $this->m_ajax->loadMoreComPost($id, $limit);

        $jml_like = $this->m_community_ku->hitung_like($postingan);
        $comment = $this->m_community_ku->commentPerPost($postingan);
        $memberId = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;

        $count = 0;
        if ($postingan != NULL) {
            foreach ($postingan as $p) {
                if ($p->POST_IMAGE) {
                    if (count($this->db->query('SELECT * FROM `like` WHERE `POST_ID`= "' . $p->POST_ID . '" AND `MEMBER_ID` = "' . $memberId . '"')->result()) == 1) {
                        if ($p->MEMBER_ID == $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													<div class="btn-group ml-2">
														<div class="dropdown">
														<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">
											';
                        } else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
                        }

                        //jika belum like
                    } else {
                        //jike bukan pemilik
                        if ($p->MEMBER_ID != $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
                            //jika pemilik
                        } else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
										<div class="card-body">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="avatar mr-1">
													<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
												</div>
												<div class="user-page-info">
												<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
												</p>
													<span class="font-small-2">' . $p->UP_DATE . '</span>
													<div class="btn-group ml-2">
														<div class="dropdown">
														<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<p>' . $p->POST_CONTENT . '</p>
											<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
											<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
											<div class="d-flex justify-content-start align-items-center mb-1">
												<div class="d-flex align-items-center">
													<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
													<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
													<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
													<span id="jml_like' . $count . '">' . $jml_like[$count] . '</span>
													<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
													<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
												</div>
											</div>
											<div class="divider">
                                            	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        	</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                    }

                    //tidak ada gambar
                } else {
                    //sudah like
                    if (count($this->db->query('SELECT * FROM `like` WHERE `POST_ID`= "' . $p->POST_ID . '" AND `MEMBER_ID` = "' . $memberId . '"')->result()) == 1) {
                        //jike bukan pemilik
                        if ($p->MEMBER_ID != $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
															<div class="card-body">
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="avatar mr-1">
																		<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
																	</div>
																	<div class="user-page-info">
																	<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
																	</p>
																		<span class="font-small-2">' . $p->UP_DATE . '</span>
																	</div>
																</div>
																<p>' . $p->POST_CONTENT . '</p>
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="d-flex align-items-center">
																		<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
																		<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
																		<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
																		<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
																		<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
																		<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
																	</div>
																</div>
																<div class="divider">
																	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
																</div>
																<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                        //pemilik
                        else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
															<div class="card-body">
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="avatar mr-1">
																		<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
																	</div>
																	<div class="user-page-info">
																	<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
																	</p>
																		<span class="font-small-2">' . $p->UP_DATE . '</span>
																		<div class="btn-group ml-2">
																			<div class="dropdown">
																				<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
																				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																					<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<p>' . $p->POST_CONTENT . '</p>
																<div class="d-flex justify-content-start align-items-center mb-1">
																	<div class="d-flex align-items-center">
																		<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
																		<div class="spinner-border text-primary spinner-border-sm mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
																		<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" data-id="' . $p->POST_ID . '"></i>
																		<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
																		<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
																		<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
																	</div>
																</div>
																<div class="divider">
																	<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
																</div>
																<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                    }
                    //belum like
                    else {
                        //jike bukan pemilik
                        if ($p->MEMBER_ID != $memberId) {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
									<div class="card-body">
										<div class="d-flex justify-content-start align-items-center mb-1">
											<div class="avatar mr-1">
												<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
											</div>
											<div class="user-page-info">
											<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
											</p>
												<span class="font-small-2">' . $p->UP_DATE . '</span>
											</div>
										</div>
										<p>' . $p->POST_CONTENT . '</p>
										<div class="d-flex justify-content-start align-items-center mb-1">
											<div class="d-flex align-items-center">
												<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
												<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
												<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
												<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
												<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
												<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
											</div>
										</div>
										<div class="divider">
                                            <div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
                                        </div>
										<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                        //pemilik
                        else {
                            echo '<div class="card" id="Kpost' . $p->POST_ID . '">
																<div class="card-body">
																	<div class="d-flex justify-content-start align-items-center mb-1">
																		<div class="avatar mr-1">
																			<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
																		</div>
																		<div class="user-page-info">
																		<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a>
																		</p>
																			<span class="font-small-2">' . $p->UP_DATE . '</span>
																			<div class="btn-group ml-2">
																				<div class="dropdown">
																					<i class="feather icon-more-vertical" type="button" id="dropdownMenuButton100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
																					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton100" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -7px, 0px);">
																						<a class="dropdown-item delete-post-btn" data-id="' . $p->POST_ID . '" href="#">Delete</a>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<p>' . $p->POST_CONTENT . '</p>
																	<div class="d-flex justify-content-start align-items-center mb-1">
																		<div class="d-flex align-items-center">
																			<i class="feather icon-heart font-medium-2 mr-50 like" id="like' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Like" data-id="' . $p->POST_ID . '"></i>
																			<div class="spinner-border spinner-border-sm text-primary mr-50" id="ldg' . $count . '" data-row="' . $count . '" role="status" style="display:none;"></div>
																			<i class="fa fa-heart font-medium-2 mr-50 text-danger dislike" id="dislike' . $count . '" data-row="' . $count . '" data-toggle="tooltip" title="Dis-Like" style="display:none;" data-id="' . $p->POST_ID . '"></i>
																			<span id="jml_like' . $count . '">' . $jml_like[$count]  . '</span>
																			<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
																			<span id="jml_cmt' . $p->POST_ID . '">' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
																		</div>
																	</div>
																	<div class="divider">
																		<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
																	</div>
																	<div id="kotak-komen' . $p->POST_ID . '">';
                        }
                    }
                }

                if (!empty($comment[$count])) {
                    echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="' . $comment[$count][count($comment[$count]) - 1]->COMMENT_ID . '">';
                    for ($i = count($comment[$count]) - 1; $i >= 0; $i--) {
                        $c = $comment[$count][$i];
                        echo '
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="avatar mr-50">
															<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="Avatar" height="30" width="30">
														</div>
														';

                        if ($memberId == $c->MEMBER_ID) {
                            echo '
														<div class="user-page-info w-100">
															<div class="row">
																<div class="col-auto mr-auto">
																	<h6 class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;">' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USERNAME . '</a>
																	</h6>
																	<span class="font-small-2">' . $c->COMMENT_CONTENT . '</span>
																</div>
																<div class="col-auto">
																	<a class="del-comment" id="del-comment' . $c->COMMENT_ID . '" data-id="' . $c->COMMENT_ID . '" data-post="' . $p->POST_ID . '"><i class="fa fa-times-circle-o text-primary" title="Delete"></i></a>
																</div>
															</div>
														</div>
													</div>
													<hr id="hr-ke' . $c->COMMENT_ID  . '">';
                        } else {
                            echo '
														<div class="user-page-info w-100">
															<div class="row">
																<div class="col-auto mr-auto">
																	<h6 class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;">' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USERNAME . '</a>
																	</h6>
																	<span class="font-small-2">' . $c->COMMENT_CONTENT . '</span>
																</div>
															</div>
														</div>
													</div>
													<hr id="hr-ke' . $c->COMMENT_ID  . '">';
                        }
                    }
                } else {
                    echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="">';
                }


                echo '
											</div>
											<fieldset class="form-label-group mb-50">
												<textarea class="form-control" id="input-comment' . $p->POST_ID . '" rows="3" placeholder="Add Comment"></textarea>
												<label for="label-textarea">Add Comment</label>
											</fieldset>
											<button type="button" class="btn btn-sm btn-primary btn-comment-post" data-id="' . $p->POST_ID . '">Post Comment</button>
											<div class="spinner-border text-primary mr-100 " id="ldg-comment' . $p->POST_ID . '" role="status" style="display:none;"></div>
										</div>
									</div>';
                $count++;
            }
        } else {
            echo '<div class="card">
										<div class="card-body">
										<div style="height: 500px;" align="center">
										<h1 align="center" style="margin: 20px 0px"><strong>WELCOME TO</strong></h1>
										<img class="img-fluid card-img-top rounded-sm mb-2" style="margin-top:-40px;height:400px;width:420px" src="'  . base_url('assets/') . 'app-assets/images/logo/logoWeb.png" alt="avtar img holder">
										<h1 align="center" style="margin: -30px 0px"><strong>HUMMANITAS</strong></h1>
									</div>
										</div>
									</div>';
        };
    }

    function loadMoreGuest()
    {

        $limit = $this->input->post('limit');
        $offset = $this->input->post('offset');

        $id = $this->uri->segment(2);

        $data['user'] = $this->m_user->getUser();
        $user_com = $this->m_user->get_user_com($data['user']['USER_ID']);

        $postingan = array();

        $postingan = $this->m_ajax->loadMoreComPost($id, $limit);

        $jml_like = $this->m_community_ku->hitung_like($postingan);
        $comment = $this->m_community_ku->commentPerPost($postingan);
        $memberId = $this->m_community_ku->getMemeberId($this->session->userdata('id'))->MEMBER_ID;

        $count = 0;
        if ($postingan != NULL) {
            foreach ($postingan as $p) {
                if ($p->POST_IMAGE) {
                    echo '<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="avatar mr-1">
														<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
													</div>
													<div class="user-page-info">
														<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a></p>
														<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
												</div>
												<p>' . $p->POST_CONTENT . '</p>
												<div class="divider">
												<div class="divider-text text-primary"><a></a></div>
											</div>
												<img class="img-fluid card-img-top rounded-sm mb-2" src="' . base_url($p->POST_IMAGE) . '" alt="avtar img holder">
												<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="d-flex align-items-center">
														<i class="feather icon-heart font-medium-2 mr-50 like" title="Like" data-toggle="modal" data-target="#warning"></i>
														<span>' . $jml_like[$count] . '</span>
														<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
														<span>' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
													</div>
												</div>';
                } else {
                    echo '<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="avatar mr-1">
														<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="avtar img holder" height="45" width="45">
													</div>
													<div class="user-page-info">
														<p class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;"><strong>' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $p->MEMBER_ID)->result()[0]->USERNAME . '</strong></a></p>
														<span class="font-small-2">' . $p->UP_DATE . '</span>
													</div>
												</div>
												<p>' . $p->POST_CONTENT . '</p>
												<div class="d-flex justify-content-start align-items-center mb-1">
													<div class="d-flex align-items-center">
														<i class="feather icon-heart font-medium-2 mr-50 like" title="Like" data-toggle="modal" data-target="#warning"></i>
														<span>' . $jml_like[$count] . '</span>
														<i style="margin-left: 10px;" class="feather icon-message-square font-medium-2 mr-50" data-toggle="tooltip" title="Comment"></i>
														<span>' . count($this->db->query('SELECT * FROM `comment` WHERE `POST_ID` = "' . $p->POST_ID . '"')->result()) . '</span>
													</div>
												</div>
										';
                }

                echo '
											<div class="divider">
												<div class="divider-text text-primary"><a class="load-more" id="load-more' . $p->POST_ID . '" data-id="' . $p->POST_ID . '">Load More</a></div>
											</div>
											<div id="kotak-komen' . $p->POST_ID . '">';
                if (!empty($comment[$count])) {
                    echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="' . $comment[$count][count($comment[$count]) - 1]->COMMENT_ID . '">';
                    for ($i = count($comment[$count]) - 1; $i >= 0; $i--) {
                        $c = $comment[$count][$i];
                        echo '
													<div class="d-flex justify-content-start align-items-center mb-1">
														<div class="avatar mr-50">
															<img src="' . base_url('assets/img/user/') . $this->db->query('SELECT u.USER_IMAGE FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_IMAGE . '" alt="Avatar" height="30" width="30">
														</div>
														<div class="user-page-info">
															<h6 class="mb-0"><a href="' . base_url('user/user_profile_guest/' . $this->db->query('SELECT u.USER_ID FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USER_ID) . '" style="color: black;">' . $this->db->query('SELECT u.USERNAME FROM user u INNER JOIN community_member c on u.USER_ID = c.USER_ID where c.MEMBER_ID = ' . $c->MEMBER_ID)->result()[0]->USERNAME . '</a>
															</h6>
															<span class="font-small-2">' . $c->COMMENT_CONTENT . '</span>
														</div>
													</div>
													<hr>';
                    }
                } else {
                    echo '<input type="hidden" id="last_id_com' . $p->POST_ID . '" value="">';
                }
                echo '</div></div></div>';
                $count++;
            }
        } else {
            echo '<div class="card">
											<div class="card-body">
											<div style="height: 500px;" align="center">
											<h1 align="center" style="margin: 20px 0px"><strong>WELCOME TO</strong></h1>
											<img class="img-fluid card-img-top rounded-sm mb-2" style="margin-top:-40px;height:400px;width:420px" src="'  . base_url('assets/') . 'app-assets/images/logo/logoWeb.png" alt="avtar img holder">
											<h1 align="center" style="margin: -30px 0px"><strong>HUMMANITAS</strong></h1>
										</div>
											</div>
										</div>';
        }
    }


    //load more photo
    function loadMorePhoto()
    {

        $limit = $this->input->post('limit');

        $com_id = $this->uri->segment(2);
        $id = $this->uri->segment(3);

        $gallery = $this->m_community->getGallery($id);
        $data['user'] = $this->m_user->getUser();

        $image = $this->m_ajax->loadMorePhoto($id, $limit);


        if (count($image) > 0) {

            foreach ($image as $image) {

                if (count($this->db->get_where('community_member', ['COM_ID' => $com_id, 'USER_ID' => $data['user']['USER_ID'], 'ISADMIN' => 1])->result()) != NULL) {

                    echo '<a style="margin:10px 10px" id="image_' . $image->IMAGE_ID . '" href="' . base_url('assets/img/community/gallery/' . $com_id . '/' . $gallery['GALLERY_NAME'] . '/') . $image->IMAGE . '" data-lightbox="mygallery"><img src="' . base_url('assets/img/community/gallery/' . $com_id . '/' . $gallery['GALLERY_NAME'] . '/') . $image->IMAGE . '"></a>
                    <button class="btn del" id="del_' . $image->IMAGE_ID . '" value="' . $image->IMAGE_ID . '" name="del" style="background-color:#D71A1A; padding:0 0; "><i class="feather icon-x"></i></button>';
                } else {
                    echo '<a style="margin:0px" href="' . base_url('assets/img/community/gallery/' . $com_id . '/' . $gallery['GALLERY_NAME'] . '/') . $image->IMAGE . '" data-lightbox="mygallery"><img src="' . base_url('assets/img/community/gallery/' . $com_id . '/' . $gallery['GALLERY_NAME'] . '/') . $image->IMAGE . '"></a>';
                }
            }
        } else {
            echo '<div class="col-12">
                <div style="height: 200px; ">
                    <h1 align="center" style="margin: 100px 0px">No photo has been uploaded</h1>
                </div>
            </div>';
        };
    }
}
