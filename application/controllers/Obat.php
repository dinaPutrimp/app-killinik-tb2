<?php

class Obat extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index(){
        $data['judul'] = "List Obat";
        $data['data_obat'] = $this->Obat_model->getAllObat();
        if( $this->input->post('keyword') ) {
            $data['data_obat'] = $this->Obat_model->cariObat();
        }
        $this->load->view('template/header', $data);
        $this->load->view('klinik/obat', $data);
        $this->load->view('template/footer');
    }

    public function daftar(){
        $data['judul'] = "List Obat";
        $id = $this->input->post('id_obat', true);
        $no = $this->input->post('no_obat', true);
        $nama = $this->input->post('nama_obat', true);
        $harga_obat = $this->input->post('harga_obat', true);
        $this->Obat_model->tambahObat($id, $no, $nama, $harga_obat);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('obat');
    }
    
    public function hapus($id){
        $this->Obat_model->hapusObat($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('obat');
    }

    public function getEdit(){
        echo json_encode($this->Obat_model->getObatById($_POST['id']));
    }

    public function edit(){
        $data['judul'] = "List Obat";
        $id = $this->input->post('id_Obat', true);
        $id = $this->input->post('id_obat', true);
        $no = $this->input->post('no_obat', true);
        $nama = $this->input->post('nama_obat', true);
        $harga_obat = $this->input->post('harga_obat', true);
        $this->Obat_model->editObat($id, $no, $nama, $harga_obat);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('obat');
    }
}