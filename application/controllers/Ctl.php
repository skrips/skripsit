<?php

Class Ctl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        //super admin
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'Ctl/admin', 'refresh');
            die();
        } //user biasa
        elseif (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'Ctl/user', 'refresh');
            die();
        } else {
            $this->load->view('login');
        }
    }

    function cek_awal() {
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        //super admin
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'Ctl/admin', 'refresh');
            die();
        } //user biasa
        elseif (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'Ctl/user', 'refresh');
            die();
        } else {
            $this->load->view('login');
        }
    }

    function priv() {
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $query = $this->Mtl->priv();
            if ($query) { // if the user's validated...
                if ($query->privillege == "common") {
                    $data = array(
                        'username' => $this->input->post('username'),
                        'is_logged_in' => TRUE,
                        'privillege' => "common"
                    );
                } elseif ($query->privillege == "superadmin") {
                    $data = array(
                        'username' => $this->input->post('username'),
                        'is_logged_in' => TRUE,
                        'privillege' => "superadmin"
                    );
                }
                $this->session->set_userdata($data);
                $priv = $this->session->userdata('privillege');
                if ($priv == "superadmin") {
                    redirect(base_url() . 'Ctl/admin', 'refresh');
                    die();
                } else {
                    redirect(base_url() . 'Ctl/user', 'refresh');
                    die();
                }
            } else { // incorrect username or password
                $this->index();
            }
        }
    }

    function is_logged_in() {
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($privillege) && $privillege != "superadmin" && !isset($username) && !isset($is_logged_in) && $is_logged_in != TRUE) {
            header('location: ' . base_url() . 'Ctl/');
            die();
        }
    }

    function admin() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'Ctl/user', 'refresh');
            die();
        } else {
            $data['topik'] = $this->Mtl->get_topik();
            $data['artikel'] = $this->Mtl->get_artikel();
            $data['akun'] = $this->Mtl->get_akun();
            $data['sidebar'] = "sidebar";
            $data['error'] = "";
            $data['content'] = "defcont";
            $this->load->view('skeleton', $data);
        }
    }

    function user() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "superadmin" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'Ctl/admin', 'refresh');
            die();
        } else {
            $data['topik'] = $this->Mtl->get_topik();
            $data['artikel'] = $this->Mtl->get_artikel();
            $data['akun'] = $this->Mtl->get_akun();
            $data['sidebar'] = "sidebar2";
            $data['error'] = "";
            $data['content'] = "defcont";
            $this->load->view('skeleton', $data);
        }
    }

    function user_out() {
        $this->session->unset_userdata('is_logged_in');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('privillege');
        $this->index();
    }

    function view($v, $error = "") {
        $this->is_logged_in();
        $data['topik'] = $this->Mtl->get_topik();
        $data['akun'] = $this->Mtl->get_akun();
        $data['artikel'] = $this->Mtl->get_artikel();
        if ($this->session->userdata('privillege') == "common") {
            $data['sidebar'] = "sidebar2";
        } else {
            $data['sidebar'] = "sidebar";
        }
        $data['error'] = $error;
        $data['content'] = $v;
        $this->load->view('skeleton', $data);
    }

    function ed_artikel($id_artikel, $error = "") {
        $this->is_logged_in();
        $data['topik'] = $this->Mtl->get_topik();
        $data['akun'] = $this->Mtl->get_akun();
        $data['dt_artikel'] = $this->Mtl->get_artikel($id_artikel);
        if ($this->session->userdata('privillege') == "common") {
            $data['sidebar'] = "sidebar2";
        } else {
            $data['sidebar'] = "sidebar";
        }
        $data['error'] = $error;
        $data['content'] = "ed_artikel";
        $this->load->view('skeleton', $data);
    }

    function add_artikel() {
        $this->is_logged_in();
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required');
        $this->form_validation->set_rules('topik', 'Topik Artikel', 'trim|required');
        $this->form_validation->set_rules('akses', 'Akses Publikasi Artikel', 'trim|required');
        $this->form_validation->set_rules('isi', 'Konten Artikel', 'trim|required');
        $this->form_validation->set_rules('sumber', 'Sumber Artikel', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->view('defcont', "<div class='note note-danger'>
            <h4 class='block'>Ups, ada kesalahan! Silahkan masukan kembali data anda</h4>
            </div>"
            );
        } else {
            if ($this->Mtl->add_artikel()) {
                $this->view('defcont', "<div class='note note-success'>
            <h4 class='block'>Success! Data anda telah ditambahkan</h4>
            </div>"
                );
            } else {
                $this->view('defcont', "<div class='note note-danger'>
            <h4 class='block'>Ups, ada kesalahan! Silahkan masukan kembali data anda</h4>
            </div>"
                );
            }
        }
    }

    function upd_artikel() {
        $this->is_logged_in();
        $this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required');
        $this->form_validation->set_rules('topik', 'Topik Artikel', 'trim|required');
        $this->form_validation->set_rules('akses', 'Akses Publikasi Artikel', 'trim|required');
        $this->form_validation->set_rules('isi', 'Konten Artikel', 'trim|required');
        $this->form_validation->set_rules('sumber', 'Sumber Artikel', 'trim|required');

        $id_artikel = $this->input->post('id_artikel');

        if ($this->form_validation->run() == FALSE) {
            $this->ed_artikel($id_artikel, "<div class='note note-danger'>
            <h4 class='block'>Ups, ada kesalahan! Silahkan masukan kembali data anda</h4>
            </div>");
        } else {
            if ($this->Mtl->upd_artikel()) {
                $this->ed_artikel($id_artikel, "<div class='note note-success'>
            <h4 class='block'>Success! Data anda telah diubah</h4>
            </div>");
            } else {
                $this->ed_artikel($id_artikel, "<div class='note note-danger'>
            <h4 class='block'>Ups, ada kesalahan! Silahkan masukan kembali data anda</h4>
            </div>");
            }
        }
    }

    function del_artikel($id_artikel) {
        $this->is_logged_in();
        if ($this->Mtl->del_artikel($id_artikel)) {
            $this->view('defcont', "<div class='note note-success'>
            <h4 class='block'>Success! Data anda telah ditambahkan</h4>
            </div>"
            );
        } else {
            $this->view('defcont', "<div class='note note-danger'>
            <h4 class='block'>Ups! Data masih digunakan sehingga tidak bisa dihapus</h4>
            </div>"
            );
        }
    }

}

?>
