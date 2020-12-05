<div class="container">
    <!-- flashdata -->
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data penobat <strong>berhasil</strong> <?php echo $this->session->flashdata('flash'); ?>.
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
            <button type="button" class="btn btn-secondary tombolObat" data-toggle="modal" data-target="#formModal">
                Tambah Data Obat
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


    <h3 class="mt-5">Data Obat</h3>
    <div class="row">

        <div class="col">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Harga Obat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($data_obat as $obat) : ?>
                        <tr>
                            <th scope="row"><?php echo ++$start; ?></th>
                            <td><?php echo $obat['no_obat']; ?></td>
                            <td><?php echo $obat['nama_obat']; ?></td>
                            <td><?php echo $obat['harga_obat']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>obat/edit/<?php echo $obat['id_obat']; ?>" class="tampilModalEditObat" data-toggle="modal" data-target="#formModal" data-id_obat="<?php echo $obat['id_obat']; ?>"><i class="fas fa-edit fa-lg"></i></a>
                                <a href="<?php echo base_url(); ?>obat/hapus/<?php echo $obat['id_obat']; ?>" class="badge icon-hapus"><i class="fas fa-trash fa-lg"></i></a>
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
                <h5 class="modal-title" id="formModalLabelObat">Tambah Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>obat/daftar" method="post">
                    <input type="hidden" class="form-control" id="id_obat" name="id_obat">
                    <div class="form-group">
                        <label for="nama">Nomor obat</label>
                        <input type="text" class="form-control" id="no_obat" name="no_obat">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama obat</label>
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat">
                    </div>
                    <div class="form-group">
                        <label for="harga_obat">Harga Obat</label>
                        <input type="text" class="form-control" id="harga_obat" name="harga_obat">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger float-right mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary float-right" name="obat">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>