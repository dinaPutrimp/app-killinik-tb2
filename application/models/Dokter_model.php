<?php

class Dokter_model extends CI_model {
    public function getAllDokter(){
        return $this->db->get('data_dokter')->result_array();
    }

    public function tambahDokter($id, $nama, $nip, $jk, $tarif_konsul){
        $tambah = $this->db->query("INSERT INTO data_dokter (id_dokter, nama_dokter, nip, jk, tarif_konsul) VALUES ('$id', '$nama', '$nip', '$jk', '$tarif_konsul')");
        return $tambah;
    }

    public function hapusDokter($id){
        $this->db->where('id_dokter', $id);
        $this->db->delete('data_dokter');
    }

    public function getDokterById($id){
        return $this->db->get_where('data_dokter', ['id_dokter' => $id])->row_array();
    }

    public function editDokter($id, $nama, $nip, $jk, $tarif_konsul){
        $edit = $this->db->query("UPDATE data_dokter SET nama_dokter='$nama', nip='$nip', jk='$jk', tarif_konsul='$tarif_konsul' WHERE id_dokter='$id'");
        return $edit;
    }

    public function cariDokter(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_dokter', $keyword);
        $this->db->or_like('nip', $keyword);
        $this->db->or_like('jk', $keyword);
        $this->db->or_like('tarif_konsul', $keyword);
        return $this->db->get('data_dokter')->result_array();
    }
}