<?php

class Antrian_model extends CI_model {
   public function getAllAntrian(){
       $query = $this->db->query("SELECT antrian.*, 
                            daftarpasien.nama_pasien, daftarpasien.tgl_lahir, daftarpasien.jenis_kelamin, daftarpasien.no_hp, daftarpasien.alamat, data_dokter.nama_dokter, data_dokter.nip, data_dokter.jk, data_dokter.tarif_konsul FROM antrian 
                            INNER JOIN daftarpasien ON antrian.id_pasien=daftarpasien.id_pasien INNER JOIN data_dokter ON antrian.id_dokter=data_dokter.id_dokter");
        return $query;
   } 

   public function tambahAntrian($id, $pasien, $dokter, $tgl){
      $tambah = $this->db->query("INSERT INTO antrian (id_antrian, id_pasien, id_dokter, tgl_berobat) VALUES ('$id', '$pasien', '$dokter', '$tgl')");
      return $tambah;
  }

   public function hapusAntrian($id){
      $this->db->where('id_antrian', $id);
      $this->db->delete('antrian');
   }
}
