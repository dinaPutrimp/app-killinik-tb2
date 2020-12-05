<div class="container">
    <!-- flashdata -->
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data pendokter <strong>berhasil</strong> <?php echo $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <!-- Button trigger modal -->
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <button type="button" class="btn btn-secondary tombolDokter" data-toggle="modal" data-target="#formModal">
                Tambah Data Dokter
            </button>
        </div>

        <div class="col">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <h3 class="mt-3">Data Dokter</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img src="<?php echo base_url(); ?>assets/img/doctor-woman.svg" alt="">
        </div>

        <div class="col-md-8">
            <table class="table float-right">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tarif Konsultasi</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($data_dokter as $dokter) : ?>
                        <tr>
                            <th scope="row"><?php echo ++$start; ?></th>
                            <td><?php echo $dokter['nama_dokter']; ?></td>
                            <td><?php echo $dokter['nip']; ?></td>
                            <td><?php echo $dokter['jk']; ?></td>
                            <td>Rp <?php echo $dokter['tarif_konsul']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>dokter/edit/<?php echo $dokter['id_dokter']; ?>" class="tampilModalEditDokter" data-toggle="modal" data-target="#formModal" data-id_dokter="<?php echo $dokter['id_dokter']; ?>"><i class="fas fa-edit fa-lg"></i></a>

                                <a href="<?php echo base_url(); ?>dokter/hapus/<?php echo $dokter['id_dokter']; ?>" class="badge icon-hapus"><i class="fas fa-trash fa-lg"></i></a>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabelDokter">Tambah Data Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>dokter/daftar" method="post">
                    <input type="hidden" class="form-control" id="id_dokter" name="id_dokter">
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter">
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-control" id="jk" name="jk">
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tarif_konsul">Tarif Konsultasi</label>
                        <input type="text" class="form-control" id="tarif_konsul" name="tarif_konsul">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger float-right mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary float-right" name="dokter">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>