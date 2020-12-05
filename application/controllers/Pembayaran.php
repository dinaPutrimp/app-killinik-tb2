<?php

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
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

    public function index()
    {
        $data['judul'] = 'Halaman Rekam Medis';

        $this->load->view('template/header', $data);
        $this->load->view('klinik/pembayaran');
        $this->load->view('template/footer');
    }

    public function bayar1($id)
    {
        $data['judul'] = 'Halaman Rekam Medis';
        $data['resep_obat'] = $this->Pembayaran_model->getAllResep($id)->result_array();
        $d = $this->db->query("SELECT harga_obat FROM resep_obat INNER JOIN data_obat ON resep_obat.id_obat=data_obat.id_obat WHERE id_resep='$id'")->row_array();
        $harga = $d['harga_obat'];
        $e = $this->db->query("SELECT qty FROM resep_obat WHERE id_resep='$id'")->row_array();
        $qty = $e['qty'];
        $data['total'] = $harga * $qty;

        $this->load->view('template/header', $data);
        $this->load->view('klinik/pembayaran2', $data);
        $this->load->view('template/footer');
    }

    public function bayar2()
    {
        $data['judul'] = 'Halaman Pembayaran';
        $id = $this->input->post('idrs');
        $total = $this->input->post('total');
        $metode = $this->input->post('metode');
        $keterangan = $this->input->post('keterangan');
        $this->Perekaman_model->membayar($id, $total, $metode, $keterangan);
        $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('pembayaran');
    }

    public function tampilDataResep()
    {
        $data['judul'] = 'Halaman Rekam Medis';

        $data['resep_obat'] = $this->Pembayaran_model->tampilDataResep()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('klinik/transaksi', $data);
        $this->load->view('template/footer');
    }

    public function hapus($id)
    {
        $this->Pembayaran_model->hapusTransaksi($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('transaksi');
    }
}
