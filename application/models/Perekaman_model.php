<?php

class Perekaman_model extends CI_model {
   public function getAllRekam(){
       $query = $this->db->query("SELECT rekam_medis.*, 
                            daftarpasien.nama_pasien, daftarpasien.tgl_lahir, daftarpasien.jenis_kelamin, daftarpasien.no_hp, daftarpasien.alamat, data_dokter.nama_dokter, data_dokter.nip, data_dokter.jk, data_dokter.tarif_konsul FROM rekam_medis 
                            INNER JOIN daftarpasien ON rekam_medis.id_pasien=daftarpasien.id_pasien INNER JOIN data_dokter ON rekam_medis.id_dokter=data_dokter.id_dokter");
        return $query;
   } 

   public function tambahRekam($id_rm, $no_rm,  $tgl, $pasien, $dokter, $riwayat, $td, $nadi, $suhu, $tb, $bb){
      $tambah = $this->db->query("INSERT INTO rekam_medis (id_rm, no_rm, tgl_berobat, id_pasien, id_dokter, riwayat_alergi, td, nadi, suhu, tb, bb) VALUES ('$id_rm', '$no_rm', '$tgl', '$pasien', '$dokter', '$riwayat', '$td', '$nadi', '$suhu', '$tb', '$bb')");
      return $tambah;
  }

  public function getAllMerekam($id){
    $query = $this->db->query("SELECT rekam_medis.*, 
                        daftarpasien.nama_pasien, daftarpasien.tgl_lahir, daftarpasien.jenis_kelamin, daftarpasien.no_hp, daftarpasien.alamat, data_dokter.nama_dokter, data_dokter.nip, data_dokter.jk, data_dokter.tarif_konsul FROM rekam_medis 
                        INNER JOIN daftarpasien ON rekam_medis.id_pasien=daftarpasien.id_pasien 
                        INNER JOIN data_dokter ON rekam_medis.id_dokter=data_dokter.id_dokter WHERE rekam_medis.id_rm='$id'");
    return $query;
  }

  public function tambahMerekam($id_rm, $keluhan, $diagnosis, $anjuran){
    $tambah = $this->db->query("UPDATE rekam_medis SET keluhan='$keluhan', diagnosis='$diagnosis', anjuran='$anjuran' WHERE id_rm='$id_rm'");
    return $tambah;
  }

  public function tambahResep($id_resep, $rm, $obat, $qty){
    $tambah = $this->db->query("INSERT INTO resep_obat (id_resep, id_rm, id_obat, qty) VALUES ('$id_resep', '$rm', '$obat', '$qty')");
    return $tambah;
  }

  public function getAllResep($id){
    $query = $this->db->query("SELECT resep_obat.*, data_obat.no_obat, data_obat.nama_obat, data_obat.harga_obat FROM resep_obat INNER JOIN data_obat ON resep_obat.id_obat=data_obat.id_obat WHERE resep_obat.id_rm='$id'");
    return $query;
  }

  public function hapusResep($id){
    $this->db->where($id);
    $this->db->delete('resep_obat');
  }

  public function membayar($id, $total, $metode, $keterangan){
    $tambah = $this->db->query("UPDATE resep_obat SET total='$total', metode='$metode', keterangan='$keterangan' WHERE id_resep='$id'");
    return $tambah;
  }

  
}
