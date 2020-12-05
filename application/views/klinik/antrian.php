<div class="container">
  <!-- flashdata -->
  <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
  <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data pendaftar <strong>berhasil</strong> <?php echo $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
  <?php endif; ?>

  <div class="mt-4 text-center mb-4">
    <h4 style="font-family: 'Nerko One', cursive; color: #494a49; font-size: 50px;">Sudah pernahkah pasien didepan anda "Mendaftarkan diri" di klinik ini?</h4>
    <h2 style="font-family: 'Nerko One', cursive; color: #494a49;">
      Klik <a href="<?php echo base_url(); ?>pasien" style="color: seagreen;">Pendaftaran</a>
    </h2>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#formModal">
    Tambah antrian
  </button>


  <table class="table mt-4 mb-4">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pasien</th>
        <th scope="col">Nama Dokter</th>
        <th scope="col">Tanggal Berobat</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php $start = 0;
      foreach ($antrian as $a) : ?>
        <tr>
          <td><?php echo ++$start; ?></td>
          <td><?php echo $a['nama_pasien']; ?></td>
          <td><?php echo $a['nama_dokter']; ?></td>
          <td><?php echo $a['tgl_berobat']; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>antrian/hapus/<?php echo $a['id_antrian']; ?>" class="badge icon-hapus"><i class="fas fa-trash fa-lg"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>


  <!-- Modal -->
  <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formModalLabelAntrian">Tambah Antrian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url(); ?>rekam_medis/tambah" method="post">
            <input type="hidden" name="id_antrian">
            <div class="form-group">
              <label for="npasien">Nama Pasien</label>
              <select class="form-control" id="npasien" name="npasien">
                <option value="">- Pilih -</option>
                <?php foreach ($daftarpasien as $pasien) : ?>
                  <option value="<?php echo $pasien['id_pasien']; ?>"><?php echo $pasien['nama_pasien']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="ndokter">Nama Dokter</label>
              <select class="form-control" id="ndokter" name="ndokter">
                <option value="">- Pilih -</option>
                <?php foreach ($data_dokter as $dokter) : ?>
                  <option value="<?php echo $dokter['id_dokter']; ?>"><?php echo $dokter['nama_dokter']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="tgl_berobat">Tanggal Berobat</label>
              <input type="date" class="form-control" id="tgl_berobat" name="tgl_berobat">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
