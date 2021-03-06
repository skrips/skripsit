<?php

Class Mtl extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function index() {
        
    }

    function add_artikel() {
        $dt_artikel = array(
            'judul' => $this->input->post('judul'),
            'id_topik' => $this->input->post('topik'),
            'username' => $this->session->userdata('username'),
            'akses' => $this->input->post('akses'),
            'isi' => $this->input->post('isi'),
            'sumber' => $this->input->post('sumber'),
            'create_date' => date('Y-m-d')
        );
        if ($this->db->insert('artikel', $dt_artikel)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function upd_artikel() {
        $dt_artikel = array(
            'judul' => $this->input->post('judul'),
            'id_topik' => $this->input->post('topik'),
            'akses' => $this->input->post('akses'),
            'isi' => $this->input->post('isi'),
            'sumber' => $this->input->post('sumber'),
            'last_update' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_artikel', $this->input->post('id_artikel'));
        $this->db->where('username', $this->session->userdata('username'));
        if ($this->db->update('artikel', $dt_artikel)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function priv() {
        $username = $this->input->post('username');
        $this->db->where('username', $username);
        $this->db->where('passw_user', md5($this->input->post('password')));
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            return $query->row();
        }
    }

    function get_akun() {
        $username = $this->session->userdata('username');
        $this->db->where('username', $username);
        return $this->db->get('user')->row();
    }

    function get_topik() {
        return $this->db->get('topik')->result();
    }

    function get_artikel($id_artikel = "") {
        if ($id_artikel == "") {
            $username = $this->session->userdata('username');
            $this->db->select('*');
            $this->db->from('artikel a');
            $this->db->join('topik b', 'b.id_topik = a.id_topik', 'left');
            $this->db->where('username', $username);
            return $this->db->get()->result();
        } else {
            $username = $this->session->userdata('username');
            $this->db->select('*');
            $this->db->from('artikel a');
            $this->db->join('topik b', 'b.id_topik = a.id_topik', 'left');
            $this->db->where('username', $username);
            $this->db->where('id_artikel', $id_artikel);
            return $this->db->get()->row();
        }
    }
    
    function del_artikel($id){
        $this->db->where('id_artikel', $id);
        if ($this->db->delete('artikel')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function add_user() {
        $add_user = array(
            'username' => $this->input->post('username'),
            'nm_user' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'jenkel' => $this->input->post('jenkel'),
            'privillege' => $this->input->post('privillege'),
            'jabatan' => $this->input->post('jabatan'),
            'passw_user' => md5($this->input->post('pass')),
            'foto' => $_FILES['foto']['name']
        );
        $insert = $this->db->insert('user', $add_user);

        if ($insert) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function update_user() {
        $username = $this->input->post('username');
        if ($this->input->post('pass') != "") {
            if ($_FILES['foto']['name'] != "") {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan'),
                    'passw_user' => md5($this->input->post('pass')),
                    'foto' => $_FILES['foto']['name']
                );
            } else {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan'),
                    'passw_user' => md5($this->input->post('pass'))
                );
            }
        } else {
            if ($_FILES['foto']['name'] != "") {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan'),
                    'foto' => $_FILES['foto']['name']
                );
            } else {
                $upd_user = array(
                    'nm_user' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'jenkel' => $this->input->post('jenkel'),
                    'privillege' => $this->input->post('privillege'),
                    'jabatan' => $this->input->post('jabatan')
                );
            }
        }
        $this->db->where('username', $username);
        $update = $this->db->update('user', $upd_user);

        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_user() {
        $this->db->where('username !=', "siliwanti");
        $this->db->order_by('id_user');
        return $this->db->get('user')->result();
    }

}

?>
