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
    
    // artikel 
    function artikel(){
    $this->is_logged_in();
        $data['topik'] = $this->Mtl->get_topik();
        $data['artikel'] = $this->Mtl->get_artikel();
        $data['akun'] = $this->Mtl->get_akun();
        if ($this->session->userdata('privillege') == "common") {
            $data['sidebar'] = "sidebar2";
        } else {
            $data['sidebar'] = "sidebar";
        }
            $data['error'] = "";
            $data['content'] = "artikel";
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
            $this->view('artikel', "<div class='note note-danger'>
            <h4 class='block'>Ups, ada kesalahan! Silahkan masukan kembali data anda</h4>
            </div>"
            );
        } else {
            if ($this->Mtl->add_artikel()) {
                $this->view('artikel', "<div class='note note-success'>
            <h4 class='block'>Success! Data anda telah ditambahkan</h4>
            </div>"
                );
            } else {
                $this->view('artikel', "<div class='note note-danger'>
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
            $this->view('artikel', "<div class='note note-success'>
            <h4 class='block'>Success! Data anda telah ditambahkan</h4>
            </div>"
            );
        } else {
            $this->view('artikel', "<div class='note note-danger'>
            <h4 class='block'>Ups! Data masih digunakan sehingga tidak bisa dihapus</h4>
            </div>"
            );
        }
    }
    
    function tambah_user() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username) && isset($is_logged_in) && $is_logged_in == TRUE) {
            redirect(base_url() . 'ctl/add_user', 'refresh');
            die();
        } else {
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('pass', 'Password', 'trim|required');
            $this->form_validation->set_rules('repass', 'Re-type Password', 'trim|required|matches[pass]');
            $this->form_validation->set_rules('privillege', 'Hak Akses', 'trim|required');
            $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');

            $config = array(
                'upload_path' => './assets/img',
                'allowed_types' => 'gif|jpg|png',
                'overwrite' => TRUE);

            if ($this->form_validation->run() == FALSE) {
                $data['status'] = validation_errors();
                $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                $data['view'] = "add_user";
                $this->load->view('super_adm', $data);
            } else {
                $this->load->library('upload', $config);
                $this->upload->do_upload('foto');
                if ($this->M_admin->add_user()) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data baru telah berhasil ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }

    //halaman edit user
    function edit_user($username) {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username_sess = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($privillege) && $privillege == "common" && isset($username_sess) && isset($is_logged_in) && $is_logged_in == TRUE) {
            $data['status'] = "";
            $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
            $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
            $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
            $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
            $data['data_user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "u_edit_akun";
            $this->load->view('user_adm', $data);
        } else {
            $data['status'] = "";
            $data['data_user'] = $this->M_admin->priv($username);
            $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
            $data['view'] = "edit_user";
            $this->load->view('super_adm', $data);
        }
    }

    //update data user
    function update_user() {
        $this->is_logged_in();
        $privillege = $this->session->userdata('privillege');
        $username_sess = $this->session->userdata('username');
        $is_logged_in = $this->session->userdata('is_logged_in');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'trim');
        $this->form_validation->set_rules('repass', 'Re-type Password', 'trim|matches[pass]');
        $this->form_validation->set_rules('privillege', 'Hak Akses', 'trim|required');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $username = $this->input->post('username');

        $config = array(
            'upload_path' => './assets/img',
            'allowed_types' => 'gif|jpg|png',
            'overwrite' => TRUE);

        if ($this->form_validation->run() == FALSE) {
            $data['status'] = validation_errors();
            $this->edit_user($username);
        } else {
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $q_update = $this->M_admin->update_user();

            if (isset($privillege) && $privillege == "common" && isset($username_sess) && isset($is_logged_in) && $is_logged_in == TRUE) {
                if ($q_update) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data pengguna dengan username $username telah berhasil perbaharui.</div>";
                    $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
                    $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
                    $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
                    $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
                    $data['data_user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "u_edit_akun";
                    $this->load->view('user_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['unread_pengumuman'] = $this->M_admin->unread_pengumuman();
                    $data['count_unread_pengumuman'] = $this->M_admin->count_unread_pengumuman();
                    $data['unread_disposisi'] = $this->M_admin->unread_disposisi();
                    $data['count_unread_disposisi'] = $this->M_admin->count_unread_disposisi();
                    $data['data_user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "u_edit_akun";
                    $this->load->view('user_adm', $data);
                }
            } else {
                if ($q_update) {
                    $data['status'] = "<div class='alert alert-success'><strong>Berhasil!</strong> Data pengguna dengan username $username telah berhasil perbaharui.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                } else {
                    $data['status'] = "<div class='alert alert-danger'><strong>Ups!</strong> Data baru gagal ditambahkan.</div>";
                    $data['user'] = $this->M_admin->priv($this->session->userdata('username'));
                    $data['view'] = "add_user";
                    $this->load->view('super_adm', $data);
                }
            }
        }
    }
    
    

}

?>
