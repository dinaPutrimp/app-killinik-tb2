<?php

class Pasien extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index(){
        $data['judul'] = "List Pasien";
        $data['daftarpasien'] = $this->Pasien_model->getAllPasien();
        if( $this->input->post('keyword') ) {
            $data['daftarpasien'] = $this->Pasien_model->cariPasien();
        }
        $this->load->view('template/header', $data);
        $this->load->view('klinik/pasien', $data);
        $this->load->view('template/footer');
    }

    public function daftar(){
        $data['judul'] = "List Pasien";
        $id = $this->input->post('id_pasien', true);
        $nama = $this->input->post('nama_pasien', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $no_hp = $this->input->post('no_hp', true);
        $alamat = $this->input->post('alamat', true);
        $this->Pasien_model->tambahPasien($id, $nama, $tgl_lahir,$jenis_kelamin, $no_hp, $alamat);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('pasien');
    }
    
    public function hapus($id){
        $this->Pasien_model->hapusPasien($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pasien');
    }

    public function getEdit(){
        echo json_encode($this->Pasien_model->getPasienById($_POST['id']));
    }

    public function edit(){
        $data['judul'] = "List Pasien";
        $id = $this->input->post('id_pasien', true);
        $nama = $this->input->post('nama_pasien', true);
        $tgl_lahir = $this->input->post('tgl_lahir', true);
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $no_hp = $this->input->post('no_hp', true);
        $alamat = $this->input->post('alamat', true);
        $this->Pasien_model->editPasien($id, $nama, $tgl_lahir, $jenis_kelamin, $no_hp, $alamat);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('pasien');
    }
}