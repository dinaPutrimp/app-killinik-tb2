<?php

class Pasien_model extends CI_model {
    public function getAllPasien(){
        return $this->db->get('daftarpasien')->result_array();
    }

    public function tambahPasien($id, $nama, $tgl_lahir, $jenis_kelamin, $no_hp, $alamat){
        $tambah = $this->db->query("INSERT INTO daftarpasien (id_pasien, nama_pasien, tgl_lahir, jenis_kelamin, no_hp, alamat) VALUES ('$id', '$nama', '$tgl_lahir', '$jenis_kelamin', '$no_hp', '$alamat')");
        return $tambah;
    }

    public function hapusPasien($id){
        $this->db->where('id_pasien', $id);
        $this->db->delete('daftarpasien');
    }

    public function getPasienById($id){
        return $this->db->get_where('daftarpasien', ['id_pasien' => $id])->row_array();
    }

    public function editPasien($id, $nama, $tgl_lahir, $jenis_kelamin, $no_hp, $alamat){
        $edit = $this->db->query("UPDATE daftarpasien SET nama_pasien='$nama', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat' WHERE id_pasien='$id'");
        return $edit;
    }

    public function cariPasien(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_pasien', $keyword);
        $this->db->or_like('tgl_lahir', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('no_hp', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('daftarpasien')->result_array();
    }
}