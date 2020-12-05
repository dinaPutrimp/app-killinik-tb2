<?php

class Pembayaran_model extends CI_model
{
    public function getAllResep($id)
    {
        $query = $this->db->query("SELECT resep_obat.*, daftarpasien.nama_pasien, daftarpasien.tgl_lahir, daftarpasien.jenis_kelamin, daftarpasien.no_hp, daftarpasien.alamat, data_dokter.nama_dokter, data_dokter.nip, data_dokter.jk, data_dokter.tarif_konsul, rekam_medis.no_rm, rekam_medis.tgl_berobat, rekam_medis.id_pasien, rekam_medis.id_dokter, rekam_medis.riwayat_alergi, rekam_medis.td, rekam_medis.nadi, rekam_medis.suhu, rekam_medis.tb, rekam_medis.bb, rekam_medis.keluhan, rekam_medis.diagnosis, rekam_medis.anjuran, data_obat.no_obat, data_obat.nama_obat, data_obat.harga_obat FROM resep_obat 
        INNER JOIN rekam_medis ON resep_obat.id_rm=rekam_medis.id_rm 
        INNER JOIN daftarpasien ON rekam_medis.id_pasien=daftarpasien.id_pasien 
        INNER JOIN data_dokter ON rekam_medis.id_dokter=data_dokter.id_dokter 
        INNER JOIN data_obat ON resep_obat.id_obat=data_obat.id_obat WHERE resep_obat.id_resep='$id'");
        return $query;
    }

    public function getDataResep()
    {
        $query = $this->db->query("SELECT resep_obat.*, daftarpasien.nama_pasien, daftarpasien.tgl_lahir, daftarpasien.jenis_kelamin, daftarpasien.no_hp, daftarpasien.alamat, data_dokter.nama_dokter, data_dokter.nip, data_dokter.jk, data_dokter.tarif_konsul, rekam_medis.no_rm, rekam_medis.tgl_berobat, rekam_medis.id_pasien, rekam_medis.id_dokter, rekam_medis.riwayat_alergi, rekam_medis.td, rekam_medis.nadi, rekam_medis.suhu, rekam_medis.tb, rekam_medis.bb, rekam_medis.keluhan, rekam_medis.diagnosis, rekam_medis.anjuran, data_obat.no_obat, data_obat.nama_obat, data_obat.harga_obat FROM resep_obat 
        INNER JOIN rekam_medis ON resep_obat.id_rm=rekam_medis.id_rm 
        INNER JOIN daftarpasien ON rekam_medis.id_pasien=daftarpasien.id_pasien 
        INNER JOIN data_dokter ON rekam_medis.id_dokter=data_dokter.id_dokter 
        INNER JOIN data_obat ON resep_obat.id_obat=data_obat.id_obat");
        return $query;
    }

    public function cariTransaksi()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_dokter', $keyword);
        $this->db->or_like('tgl_berobat', $keyword);
        $this->db->or_like('nama_pasien', $keyword);
        return $this->db->get('resep_obat')->result_array();
    }

    public function hapusTransaksi($id)
    {
        $this->db->where('id_resep', $id);
        $this->db->delete('resep_obat');
    }
}
