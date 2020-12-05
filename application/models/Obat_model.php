<?php

class Obat_model extends CI_model {
    public function getAllObat(){
        return $this->db->get('data_obat')->result_array();
    }

    public function tambahObat($id, $no_obat, $nama, $harga_obat){
        $tambah = $this->db->query("INSERT INTO data_obat (id_obat, no_obat, nama_obat, harga_obat) VALUES ('$id', '$no_obat', '$nama', '$harga_obat')");
        return $tambah;
    }

    public function hapusObat($id){
        $this->db->where('id_obat', $id);
        $this->db->delete('data_obat');
    }

    public function getObatById($id){
        return $this->db->get_where('data_obat', ['id_obat' => $id])->row_array();
    }

    public function editObat($id, $no_obat, $nama, $harga_obat){
        $edit = $this->db->query("UPDATE data_obat SET no_obat='$no_obat', nama_obat='$nama', harga_obat='$harga_obat' WHERE id_obat='$id'");
        return $edit;
    }

    public function cariObat(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('no_obat', $keyword);
        $this->db->or_like('nama_obat', $keyword);
        $this->db->or_like('harga_obat', $keyword);
        return $this->db->get('data_obat')->result_array();
    }
}