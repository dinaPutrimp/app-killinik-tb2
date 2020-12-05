<div class="container">
    <!-- flashdata -->
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <?php if( $this->session->flashdata('flash') ) : ?>
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

    <div class="row">
        <div class="col-md-6">
            <div class="card mt-4">
                <h5 class="card-header bg-light">Rekaman Pasien
                
                    <button type="button" class="btn btn-secondary float-right" data-toggle="modal" data-target="#formModal">
                    Perekaman 2
                    </button>
                </h5>
                <div class="card-body">
                    <table class="table table-sm">
                    <?php $start=0; foreach($rekam as $r) : ?>
                        <tr>
                            <th>No Rekam Medis</th>
                            <td>:</td>
                            <td><?php echo $r['no_rm']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Berobat</th>
                            <td>:</td>
                            <td><?php echo $r['tgl_berobat']; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Pasien</th>
                            <td>:</td>
                            <td><?php echo $r['nama_pasien']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>:</td>
                            <td><?php echo $r['tgl_lahir']; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>
                            <td><?php echo $r['jenis_kelamin']; ?></td>
                        </tr>
                        <tr>
                            <th>Dokter</th>
                            <td>:</td>
                            <td><?php echo $r['nama_dokter']; ?></td>
                        </tr>
                        <tr>
                            <th>Riwayat Alergi</th>
                            <td>:</td>
                            <td><?php echo $r['riwayat_alergi']; ?></td>
                        </tr>
                        <tr>
                            <th>TD</th>
                            <td>:</td>
                            <td><?php echo $r['td']; ?> mmHg</td>
                        </tr>
                        <tr>
                            <th>Nadi</th>
                            <td>:</td>
                            <td><?php echo $r['nadi']; ?> x/menit</td>
                        </tr>
                        <tr>
                            <th>Suhu</th>
                            <td>:</td>
                            <td><?php echo $r['suhu']; ?> C</td>
                        </tr>
                        <tr>
                            <th>TB</th>
                            <td>:</td>
                            <td><?php echo $r['tb']; ?> cm</td>
                        </tr>
                        <tr>
                            <th>BB</th>
                            <td>:</td>
                            <td><?php echo $r['bb']; ?> kg</td>
                        </tr>
                        <tr>
                            <th>Keluhan</th>
                            <td>:</td>
                            <td><?php echo $r['keluhan']; ?></td>
                        </tr>
                        <tr>
                            <th>Diagnosis</th>
                            <td>:</td>
                            <td><?php echo $r['diagnosis']; ?></td>
                        </tr>
                        <tr>
                            <th>Anjuran</th>
                            <td>:</td>
                            <td><?php echo $r['anjuran']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                    <a href="<?php echo base_url(); ?>rekam_medis" class="btn btn-primary float-right">Kembali</a>
                </div>
                </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-4">
                <h5 class="card-header bg-light">Resep Obat</h5>
                <div class="card-body">
                    <form action="<?php echo base_url(); ?>rekam_medis/tambah_resep" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="hidden" name="id_resep">
                                <input type="hidden" name="idrm" value="<?php echo $r['id_rm']; ?>">
                                <div class="form-group">
                                    <select class="form-control" id="obat" name="obat">
                                        <option value="">- Pilih Obat -</option>
                                        <?php foreach($data_obat as $obat) : ?>
                                            <option value="<?php echo $obat['id_obat']; ?>"><?php echo $obat['nama_obat']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="qty" id="qty" placeholder="qty">
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <button type="submit" class="btn btn-success" style="border-radius: 40px; background-color: rgb(3, 105, 23);"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama_obat</th>
                                <th scope="col">Qty</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s=0; foreach($resep_obat as $resep) : ?>
                            <tr>
                                <td><?php echo ++$s; ?></td>
                                <td><?php echo $resep['nama_obat']; ?></td>
                                <td><?php echo $resep['qty']; ?></td>
                                <td>
                                <a href="<?php echo base_url(); ?>rekam_medis/hapus/<?php echo $resep['id_resep']; ?>/<?php echo $resep['id_rm']; ?>" class="badge icon-hapus"><i class="fas fa-trash fa-lg"></i></a>
                                </td>
                                <td>
                                <a href="<?php echo base_url(); ?>pembayaran/bayar1/<?php echo $resep['id_resep']; ?>" class="btn btn-success">Bayar</a>
                                </td>
                                <td>
                                    <p class='hasil'></p>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>    
</div>

<!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Perekaman 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                        <!-- form -->
                            <form action="<?php echo base_url(); ?>rekam_medis/tambah2" method="post">
                                <input type="hidden" name="idrm" value="<?php echo $r['id_rm']; ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="keluhan">Keluhan</label>
                                            <textarea class="form-control" id="keluhan" rows="3" name="keluhan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="diagnosis">Diagnosis</label>
                                            <textarea class="form-control" id="diagnosis" rows="3" name="diagnosis"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="anjuran">Anjuran</label>
                                            <select class="form-control" id="anjuran" name="anjuran">
                                                <option value="">- Pilih -</option>
                                                <option value="Rawat Jalan">Rawat Jalan</option>
                                                <option value="Rawat Inap">Rawat Inap</option>
                                                <option value="Rujuk">Rujuk</option>
                                                <option value="Istirahat dirumah">Istirahat dirumah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-secondary">Simpan</button>
                                </div>
                            </form>
                            <!-- endform -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>