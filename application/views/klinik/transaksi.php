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

    <div class="col mt-4">
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>



    <h3 class="mt-5">Data Transaksi</h3>
    <div class="row">

        <div class="col">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Berobat</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Dokter</th>
                        <th scope="col">Obat</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                        <th scope="col">Keterangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($resep_obat as $resep) : ?>
                        <tr>
                            <th scope="row"><?php echo ++$start; ?></th>
                            <td><?php echo $resep['tgl_berobat']; ?></td>
                            <td><?php echo $resep['nama_pasien']; ?></td>
                            <td><?php echo $resep['nama_dokter']; ?></td>
                            <td><?php echo $resep['nama_obat']; ?></td>
                            <td><?php echo $resep['qty']; ?></td>
                            <td>Rp <?php echo $resep['harga_obat']; ?></td>
                            <td>Rp <?php echo $resep['total']; ?></td>
                            <td><?php echo $resep['keterangan']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>pembayaran/hapus/<?php echo $resep['id_resep']; ?>" class="badge icon-hapus"><i class="fas fa-trash fa-lg"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>