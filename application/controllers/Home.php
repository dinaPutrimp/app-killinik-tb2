<?php

class Home extends CI_Controller
{

    public function index()
    {
        $data['judul'] = 'Halaman Home';
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('klinik/index', $data);
        $this->load->view('template/footer');
    }
}
