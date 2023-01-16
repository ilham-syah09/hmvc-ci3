<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('log_admin'))) {
            $this->session->set_flashdata('toastr-eror', 'Anda Belum Login');
            redirect('auth', 'refresh');
        }

        $this->db->where('id', $this->session->userdata('id'));
        $data = $this->dt_admin = $this->db->get('admin')->row();
    }


    public function index()
    {
        $data = [
            'title'     => 'Dashboard admin',
            'page'      => 'dashboard'
        ];

        $this->load->view('index', $data);
    }
}

/* End of file Admin.php */
