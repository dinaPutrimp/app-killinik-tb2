<div class="container">
    <!-- flashdata -->
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <?php if( $this->session->flashdata('flash') ) : ?>
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
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <h4>List Pembayaran</h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Berobat</th>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Harga Obat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $start=0; foreach($resep_obat as $resep) : ?>
                            <tr>
                                <td><?php echo ++$start; ?></td>
                                <td><?php echo $resep['tgl_berobat']; ?></td>
                                <td><?php echo $resep['nama_pasien']; ?></td>
                                <td><?php echo $resep['nama_obat']; ?></td>
                                <td><?php echo $resep['qty']; ?></td>
                                <td>Rp <?php echo $resep['harga_obat']; ?>/pcs</td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <hr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-body">
                    <h4>Total yang harus dibayar</h4>
                    <h3>Rp <?php echo $total; ?>,-</h3>
                </div>
            </div>
        </div>
    </div>
    <h5>Silahkan melakukan pembayaran!</h5>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-body">
                    <form action="<?php echo base_url(); ?>pembayaran/bayar2" method="post" class="text-center">
                        <input type="hidden" name="idrs" value="<?php echo $resep['id_resep']; ?>">
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <input type="hidden" name="keterangan" value="dibayarkan">
                        <div class="form-group">
                            <label for="metode">Metode Pembayaran</label>
                            <select class="form-control" id="metode" name="metode" required>
                                <option>-- Pilih --</option>
                                <option value="Cash">Cash</option>
                                <option value="Debit/Credit Card">Debit/Credit Card</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning bayar-akhir">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>