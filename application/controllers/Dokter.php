<?php

class Dokter extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Dokter_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index(){
        $data['judul'] = "List dokter";
        $data['data_dokter'] = $this->Dokter_model->getAllDokter();
        if( $this->input->post('keyword') ) {
            $data['data_dokter'] = $this->Dokter_model->cariDokter();
        }
        $this->load->view('template/header', $data);
        $this->load->view('klinik/dokter', $data);
        $this->load->view('template/footer');
    }

    public function daftar(){
        $data['judul'] = "List Dokter";
        $id = $this->input->post('id_dokter', true);
        $nama = $this->input->post('nama_dokter', true);
        $nip = $this->input->post('nip', true);
        $jk = $this->input->post('jk', true);
        $tarif_konsul = $this->input->post('tarif_konsul', true);
        $this->Dokter_model->tambahDokter($id, $nama, $nip, $jk, $tarif_konsul);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('dokter');
    }
    
    public function hapus($id){
        $this->Dokter_model->hapusDokter($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('dokter');
    }

    public function getEdit(){
        echo json_encode($this->Dokter_model->getDokterById($_POST['id']));
    }

    public function edit(){
        $data['judul'] = "List Dokter";
        $id = $this->input->post('id_dokter', true);
        $nama = $this->input->post('nama_dokter', true);
        $nip = $this->input->post('nip', true);
        $jk = $this->input->post('jk', true);
        $tarif_konsul = $this->input->post('tarif_konsul', true);
        $this->Dokter_model->editDokter($id, $nama, $nip, $jk, $tarif_konsul);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('dokter');
    }
}