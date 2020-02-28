<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_community extends CI_Model
{


    public function get_com_detail($id)
    {
        return $query = $this->db->get_where('community', ['COM_ID' => $id])->row_array();
    }

    public function get_user_detail($notelp)
    {
        return $query = $this->db->get_where('user', ['NOTELP' => $notelp])->row_array();
    }

    public function memberList($id)
    {
        $q = $this->db->join('user', 'user.USER_ID = community_member.USER_ID')->join('community', 'community.COM_ID = community_member.COM_ID')->get_where('community_member', array("community_member.COM_ID" => $id, "MEMBER_STATUS" => 1));
        return $q->result();
    }

    public function get_com_member($id)
    {
        $this->db->limit(7);
        // $q = $this->db->join('user', 'user.USER_ID = community_member.USER_ID')->join('community', 'community.COM_ID = community_member.COM_ID')->get_where('community_member', array("community_member.COM_ID" => $id, "MEMBER_STATUS" => 1));
        $q = $this->db->query('Select u.USER_ID, u.USERNAME, u.USER_IMAGE, u.NAME, m.MEMBER_ID,m.ISADMIN, m.COM_ID From user u JOIN community_member m on u.USER_ID = m.USER_ID WHERE m.COM_ID = ' . $id . ' AND m.MEMBER_STATUS = 1');

        return $q->result();
    }

    public function get_all_member($id)
    {
        $q = $this->db->query('Select u.USER_ID, u.USERNAME, u.USER_IMAGE, u.NAME, m.MEMBER_ID,m.USER_ID,m.ISADMIN, m.COM_ID From user u JOIN community_member m on u.USER_ID = m.USER_ID WHERE m.COM_ID = ' . $id . ' AND m.MEMBER_STATUS = 1 ORDER BY ISADMIN DESC');
        return $q->result();
    }

    public function get_requested_member($id)
    {
        $q = $this->db->query('Select u.USER_ID, u.USERNAME, u.USER_IMAGE, u.EMAIL, m.MEMBER_ID, m.COM_ID From user u JOIN community_member m on u.USER_ID = m.USER_ID WHERE m.COM_ID = ' . $id . ' AND m.MEMBER_STATUS = 0');

        return $q->result();
    }

    function cekUser($user_id, $com_id)
    {
        $query = $this->db->get_where('community_member', array("USER_ID" => $user_id, "COM_ID" => $com_id, "MEMBER_STATUS" => 1))->result();
        return $query;
    }

    function getCom($com_id)
    {
        $query = $this->db->get_where('community', ["COM_ID" => $com_id])->row_array();
        return $query;
    }

    //upload multiple image
    public function multiple_images($image = array())
    {
        $this->db->insert_batch('images', $image);
    }

    //gallery page
    function createAlbum($name)
    {
        $data = [
            'GALLERY_NAME' => $name
        ];
        $this->db->insert('gallery', $data);

        return $this->db->insert_id();
    }

    function getAlbum($id)
    {
        $q = $this->db->query('Select c.COM_ID, i.COM_ID, i.IMAGE,i.GALLERY_ID, g.GALLERY_ID, g.GALLERY_NAME From community c JOIN images i on c.COM_ID = i.COM_ID JOIN gallery g on i.GALLERY_ID = g.GALLERY_ID WHERE i.COM_ID = ' . $id);
        // $q = $this->db->join('community', 'community.COM_ID = images.COM_ID')->join('gallery', 'gallery.GALLERY_ID = images.GALLERY_ID')->get_where('images', array("images.COM_ID" => $id));
        // var_dump($q->result());
        // die;
        return $q->result();
    }

    function cekAlbum($id, $gallery_id)
    {
        $q = $this->db->join('community', 'community.COM_ID = images.COM_ID')->join('gallery', 'gallery.GALLERY_ID = images.GALLERY_ID')->get_where('images', array("images.COM_ID" => $id, "images.GALLERY_ID" => $gallery_id));
        return $q->result();
    }


    //gallery photo page
    function getPhoto($gallery_id)
    {
        $q = $this->db->get_where('images', ["GALLERY_ID" => $gallery_id])->result();
        return $q;
    }

    function get_com_image($id)
    {
        $this->db->limit(9);
        $q = $this->db->query('Select c.COM_ID, i.IMAGE, i.IMAGE_ID, g.GALLERY_ID, g.GALLERY_NAME From community c JOIN images i on c.COM_ID = i.COM_ID JOIN gallery g on i.GALLERY_ID = g.GALLERY_ID WHERE i.COM_ID = ' . $id);
        return $q->result();
    }

    function getGallery($gallery_id)
    {
        return $this->db->get_where('gallery', ["GALLERY_ID" => $gallery_id])->row_array();
    }

    function upcomingEvent($id)
    {
        $this->load->helper('date');

        $query = $this->db->query('SELECT EVENT_ID,EVENT_TITLE,START_DATE FROM event WHERE date(START_DATE) >= date(NOW()) AND COM_ID =' . $id . ' ORDER BY START_DATE ASC LIMIT 7');

        return $query->result();
    }


    function invite($id, $com_id)
    {
        $q = $this->db->get_where('community_member', array("USER_ID" => $id, "COM_ID" => $com_id))->result();

        if (count($q) == 0) {
            $data = array(

                'USER_ID' => $id,
                'COM_ID' => $com_id,
                'ISADMIN' => 0,
                'ISLEADER' => 0,
                'ISVICELEADER' => 0,
                'ISSECRETARY' => 0,
                'ISTREASURER' => 0,
                'MEMBER_STATUS' => 1


            );
            $this->db->insert('community_member', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		   <p class="mb-0">User already join!</p></div>');
            redirect('community/' . $com_id . '/memberManagement');
        }
    }


    function makeAdmin($id)
    {
        $this->db->where('MEMBER_ID', $id);
        $this->db->update('community_member', array('ISADMIN' => 1));
        return true;
    }

    function removeAdmin($id)
    {
        $this->db->where('MEMBER_ID', $id);
        $this->db->update('community_member', array('ISADMIN' => 0));
        return true;
    }

    function accept($id)
    {
        $this->db->where('MEMBER_ID', $id);
        $this->db->update('community_member', array('MEMBER_STATUS' => 1));
        return true;
    }

    function removeMember($id)
    {
        $this->db->where('MEMBER_ID', $id);
        $this->db->delete('community_member');
        return true;
    }

    //collaboration
    function createCollab($upload_image, $com_id)
    {
        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path']        = 'assets/img/community/collab';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']            = 0;

        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $gbr = $this->upload->data('file_name');


        $data = array(
            'SENDER_ID' => $com_id,
            'COLLAB_NAME' => $this->input->post('name', true),
            'COLLAB_DESC' => $this->input->post('desc', true),
            'COLLAB_THUMBNAIL' => $gbr


        );
        $this->db->insert('collaboration', $data);

        $collab_id = $this->db->insert_id();

        $data = array(

            'COLLAB_ID' => $collab_id,
            'COM_ID' => $com_id,
            'COLMEM_STATUS' => 1


        );
        $this->db->insert('collab_member', $data);

        $invite = $this->input->post('multiple');
        foreach ($invite as $invite) {
            $data = array(
                'COLLAB_ID' => $collab_id,
                'COM_ID' => $invite,
                'COLMEM_STATUS' => 0
            );
            $this->db->insert('collab_member', $data);
        }
    }

    function get_com_collab($id)
    {
        $q = $this->db->query('Select c.COM_ID, c.COM_NAME, m.COLMEM_ID, a.COLLAB_ID, a.COLLAB_NAME, a.COLLAB_THUMBNAIL From community c JOIN collab_member m on c.COM_ID = m.COM_ID JOIN collaboration a on m.COLLAB_ID = a.COLLAB_ID WHERE m.COM_ID = ' . $id . ' AND m.COLMEM_STATUS = 1');

        return $q->result();
    }

    function get_collab_request($id)
    {
        $q = $this->db->query('Select c.COM_ID, c.COM_NAME, m.COLMEM_ID, a.COLLAB_ID, a.COLLAB_NAME, a.COLLAB_THUMBNAIL,a.COLLAB_DESC,s.COM_NAME AS SENDER,s.COM_ID AS SENDER_ID From community c JOIN collab_member m on c.COM_ID = m.COM_ID JOIN collaboration a on m.COLLAB_ID = a.COLLAB_ID JOIN community s on a.SENDER_ID = s.COM_ID WHERE m.COM_ID = ' . $id . ' AND m.COLMEM_STATUS = 0');

        return $q->result();
    }

    function acceptCollab($id)
    {
        $this->db->where('COLMEM_ID', $id);
        $this->db->update('collab_member', array('COLMEM_STATUS' => 1));
        return true;
    }

    function removeCollab($id)
    {
        $this->db->where('COLMEM_ID', $id);
        $this->db->delete('collab_member');
        return true;
    }



    //guest

    //cek jika member sudah mengirim request member
    function cekMember($user_id, $com_id)
    {
        $q = $this->db->get_where('community_member', array("USER_ID" => $user_id, "COM_ID" => $com_id))->result();
        return $q;
    }

    //cek jika user beenar memasukkan code komunitas
    function cekCode($code, $com_id)
    {
        $q = $this->db->get_where('community', array("COM_CODE" => $code, "COM_ID" => $com_id))->result();
        return $q;
    }

    function cekPrivate($com_id)
    {
        $q = $this->db->get_where('community', array("ISPUBLIC" => 1, "COM_ID" => $com_id))->result();
        return $q;
    }

    function createEvent($upload_image, $member_id, $com_id)
    {
        $this->load->library('upload');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['upload_path'] = 'assets/img/community/event';

        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $gbr = $this->upload->data('file_name');


        $data = array(

            'MEMBER_ID' => $member_id,
            'COM_ID' => $com_id,
            'START_DATE' => $this->input->post('startDate'),
            'EVENT_LOC' => $this->input->post('location'),

            'EVENT_DESC' => $this->input->post('description'),
            'EVENT_THUMBNAIL' => $gbr,
            'EVENT_TITLE' => $this->input->post('title'),
            'END_DATE' => $this->input->post('endDate'),



        );
        $this->db->insert('event', $data);
    }

    function edit_image_com($upload_image, $data)
    {
        // $upload_image = $_FILES[$image]['name'];
        if ($upload_image) {



            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['upload_path'] = 'assets/img/community/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $gambar_lama = $data['user']['USER_IMAGE'];

                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/community/profile/' . $gambar_lama);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('com_image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    function edit_cover_com($upload_image, $data)
    {
        // $upload_image = $_FILES[$image]['name'];
        if ($upload_image) {

            // var_dump('image');
            // die;

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['upload_path'] = 'assets/img/community/cover/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('cover')) {
                $gambar_lama = $data['user']['USER_IMAGE'];

                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/community/cover/' . $gambar_lama);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('com_cover', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    function setting_com($com_id)
    {

        $data = [
            'ISPUBLIC' => $this->input->post('vueradio'),
            'COM_NAME' => $this->input->post('name'),
            'COM_DESC' => $this->input->post('description'),
            'COM_LOC' => $this->input->post('location'),
            'COM_TELP' => $this->input->post('phone'),
            'COM_EMAIL' => $this->input->post('email'),
            'COM_ADDRESS' => $this->input->post('address'),


        ];

        $this->db->where('COM_ID', $com_id);
        $this->db->update('community', $data);
    }
    function report($report, $com_id, $user_id)
    {

        $data = array(

            'USER_ID' => $user_id,
            'COM_ID' => $com_id,
            'REPORT_DESC' => $report,

        );
        $this->db->insert('report', $data);
    }

    public function get_com_event($id)
    {
        return $query = $this->db->get_where('event', ['COM_ID' => $id])->result();
    }

    public function get_com_event_detail($com_id, $event_id)
    {
        $query = $this->db->get_where('event', array("EVENT_ID" => $event_id, "COM_ID" => $com_id))->row_array();
        return $query;
    }

    function getMemberId($com_id, $user_id)
    {
        $q = $this->db->join('user', 'user.USER_ID = community_member.USER_ID')->join('community', 'community.COM_ID = community_member.COM_ID')->get_where('community_member', array("community_member.COM_ID" => $com_id, 'community_member.USER_ID' => $user_id));
        return $q->row_array();
    }
}
