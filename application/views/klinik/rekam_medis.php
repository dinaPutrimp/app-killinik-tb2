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
        <h4 style="font-family: 'Nerko One', cursive; color: #494a49; font-size: 50px;">Pastikan kembali data pada antrian sama dengan data pasien didepan anda!</h4>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Antrian Pasien
            <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#formModal">
                Perekaman 1
            </button>
        </div>
        <div class="card-body">
            <table class="table table-sm mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Berobat</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Dokter</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0;
                    foreach ($antrian as $a) : ?>
                        <tr>
                            <td><?php echo ++$start; ?></td>
                            <td><?php echo $a['tgl_berobat']; ?></td>
                            <td><?php echo $a['nama_pasien']; ?></td>
                            <td><?php echo $a['jenis_kelamin']; ?></td>
                            <td><?php echo $a['nama_dokter']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <div class="mt-4 text-center mb-4">
        <h4 style="font-family: 'Nerko One', cursive; color: #494a49; font-size: 50px;">Lanjutkan ke Perekaman 2 <i class="fas fa-arrow-alt-circle-down"></i></h4>
    </div>


    <div class="card mt-4" style="background-color: rgb(174, 207, 182);">
        <div class="card-body">
            <h5 class="card-title">Perekaman 1</h5>

            <table class="table table-sm mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Berobat</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Dokter</th>
                        <th>Perekaman</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;
                    foreach ($rekam_medis as $a) : ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $a['tgl_berobat']; ?></td>
                            <td><?php echo $a['nama_pasien']; ?></td>
                            <td><?php echo $a['jenis_kelamin']; ?></td>
                            <td><?php echo $a['nama_dokter']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>rekam_medis/merekam/<?php echo $a['id_rm']; ?>" style="color: red;">Perekaman 2</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Perekaman 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>rekam_medis/tambah1" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_rm">No Rekam Medis</label>
                                <input type="text" class="form-control" id="no_rm" name="no_rm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_berobat">Tanggal Berobat</label>
                                <input type="date" class="form-control" name="tgl_berobat" id="tgl_berobat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="npasien">Nama Pasien</label>
                                <select class="form-control" id="npasien" name="npasien">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($daftarpasien as $pasien) : ?>
                                        <option value="<?php echo $pasien['id_pasien']; ?>"><?php echo $pasien['nama_pasien']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ndokter">Dokter</label>
                                <select class="form-control" id="ndokter" name="ndokter">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($data_dokter as $dokter) : ?>
                                        <option value="<?php echo $dokter['id_dokter']; ?>"><?php echo $dokter['nama_dokter']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="riwayat_alergi">Riwayat Alergi</label>
                                <input type="text" class="form-control" id="riwayat_alergi" name="riwayat_alergi">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="td">TD</label>
                                <input type="text" class="form-control" id="td" name="td" placeholder="mmHg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nadi">Nadi</label>
                                <input type="text" class="form-control" id="nadi" name="nadi" placeholder="x/menit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="suhu">Suhu</label>
                                <input type="text" class="form-control" id="suhu" name="suhu" placeholder="C">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tb">TB</label>
                                <input type="text" class="form-control" id="tb" name="tb" placeholder="cm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bb">BB</label>
                                <input type="text" class="form-control" id="bb" name="bb" placeholder="kg">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>