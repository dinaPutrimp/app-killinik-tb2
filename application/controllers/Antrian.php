<?php

class Antrian extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Antrian_model');
        $this->load->model('Dokter_model');
        $this->load->model('Pasien_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index(){
        $data['judul'] = "List Antrian";
        $data['antrian'] = $this->Antrian_model->getAllAntrian()->result_array();

        // tampil
        $data['daftarpasien'] = $this->Pasien_model->getAllPasien();
        $data['data_dokter'] = $this->Dokter_model->getAllDokter();
        
        $this->load->view('template/header', $data);
        $this->load->view('klinik/antrian', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id){
        $this->Antrian_model->hapusAntrian($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('antrian');
    }
    

}
