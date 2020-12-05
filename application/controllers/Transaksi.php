<?php

class Transaksi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Antrian_model');
        $this->load->model('Dokter_model');
        $this->load->model('Pasien_model');
        $this->load->model('Perekaman_model');
        $this->load->model('Obat_model');
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index(){
        $data['judul'] = 'Halaman Data Transaksi';
    
        $data['resep_obat'] = $this->Pembayaran_model->getDataResep()->result_array();
        if( $this->input->post('keyword') ) {
            $data['resep_obat'] = $this->Pembayaran_model->cariTransaksi();
        }
        
        $this->load->view('template/header', $data);
        $this->load->view('klinik/transaksi', $data);
        $this->load->view('template/footer'); 
    }

    
} 