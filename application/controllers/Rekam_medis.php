<?php

class Rekam_medis extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Antrian_model');
        $this->load->model('Dokter_model');
        $this->load->model('Pasien_model');
        $this->load->model('Perekaman_model');
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index(){
        $data['judul'] = 'Halaman Rekam Medis';
        $data['antrian'] = $this->Antrian_model->getAllAntrian()->result_array();
        $data['rekam_medis'] = $this->Perekaman_model->getAllRekam()->result_array();

        // tampil
        $data['daftarpasien'] = $this->Pasien_model->getAllPasien();
        $data['data_dokter'] = $this->Dokter_model->getAllDokter();
        
        $this->load->view('template/header', $data);
        $this->load->view('klinik/rekam_medis', $data);
        $this->load->view('template/footer'); 
    }

    public function tambah(){
        $data['judul'] = "List Antrian";
        $pasien = $this->input->post('npasien');
        $dokter = $this->input->post('ndokter');
        $tgl = $this->input->post('tgl_berobat');
        $id= $this->input->post('id_antrian');
        $this->Antrian_model->tambahAntrian($id, $pasien, $dokter, $tgl);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('antrian');
    }

    public function tambah1(){
        $data['judul'] = "Halaman Rekam Medis";
        $no_rm = $this->input->post('no_rm');
        $tgl = $this->input->post('tgl_berobat');
        $pasien = $this->input->post('npasien');
        $dokter = $this->input->post('ndokter');
        $riwayat = $this->input->post('riwayat_alergi');
        $td = $this->input->post('td');
        $nadi = $this->input->post('nadi');
        $suhu = $this->input->post('suhu');
        $tb = $this->input->post('tb');
        $bb = $this->input->post('bb');
        $id_rm = $this->input->post('id');
        $this->Perekaman_model->tambahRekam($id_rm, $no_rm,  $tgl, $pasien, $dokter, $riwayat, $td, $nadi, $suhu, $tb, $bb);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('rekam_medis');
    }

    public function merekam($id){
        $data['judul'] = 'Halaman Rekam Medis';

        $data['rekam'] = $this->Perekaman_model->getAllMerekam($id)->result_array();

        $data['data_obat'] = $this->Obat_model->getAllObat();
        $data['resep_obat'] = $this->Perekaman_model->getAllResep($id)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('klinik/perekaman', $data);
        $this->load->view('template/footer'); 
    }

    public function tambah2(){
        $data['judul'] = "Halaman Rekam Medis";
        $keluhan = $this->input->post('keluhan');
        $diagnosis = $this->input->post('diagnosis');
        $anjuran = $this->input->post('anjuran');
        $id_rm = $this->input->post('idrm');
        $this->Perekaman_model->tambahMerekam($id_rm, $keluhan, $diagnosis, $anjuran);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('rekam_medis/merekam/'.$id_rm);
    }

    public function tambah_resep(){
        $rm = $this->input->post('idrm');
        $obat = $this->input->post('obat');
        $qty = $this->input->post('qty');
        $id_resep = $this->input->post('id_resep');
        $this->Perekaman_model->tambahResep($id_resep, $rm, $obat, $qty);
        redirect('rekam_medis/merekam/'.$rm);
    }

    public function hapus($idr, $rm){
        $id = ['id_resep'=>$idr];
        $this->Perekaman_model->hapusResep($id);
        redirect('rekam_medis/merekam/'.$rm);
    }
} 