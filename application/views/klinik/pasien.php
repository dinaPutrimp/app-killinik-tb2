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

    <!-- Button trigger modal -->
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <button type="button" class="btn btn-secondary tombolDaftar" data-toggle="modal" data-target="#formModal">
                Daftar disini!
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


    <h3 class="mt-5">Data Pasien</h3>
    <div class="row">

        <div class="col-md-10">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($daftarpasien as $daftar) : ?>
                        <tr>
                            <th scope="row"><?php echo ++$start; ?></th>
                            <td><?php echo $daftar['nama_pasien']; ?></td>
                            <td><?php echo $daftar['tgl_lahir']; ?></td>
                            <td><?php echo $daftar['jenis_kelamin']; ?></td>
                            <td><?php echo $daftar['no_hp']; ?></td>
                            <td><?php echo $daftar['alamat']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>pasien/edit/<?php echo $daftar['id_pasien']; ?>" class="tampilModalEdit" data-toggle="modal" data-target="#formModal" data-id_pasien="<?php echo $daftar['id_pasien']; ?>"><i class="fas fa-edit fa-lg"></i></a>
                                <a href="<?php echo base_url(); ?>pasien/hapus/<?php echo $daftar['id_pasien']; ?>" class="badge icon-hapus"><i class="fas fa-trash fa-lg"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <img src="<?php echo base_url(); ?>assets/img/mask-man.svg" style="width: 300px;" alt="">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Pendaftaran Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>pasien/daftar" method="post">
                    <input type="hidden" class="form-control" id="id_pasien" name="id_pasien">
                    <div class="form-group">
                        <label for="nama">Nama Paisen</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger float-right mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary float-right" name="daftar">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>