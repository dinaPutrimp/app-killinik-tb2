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


    <h3 class="mt-5">Data User</h3>
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo base_url(); ?>assets/img/remote-work-man.svg" alt="">
        </div>

        <div class="col-md-6">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 0; ?>
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <th scope="row"><?php echo ++$start; ?></th>
                            <td><?php echo $u['username']; ?></td>
                            <td><?php echo $u['email']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>user/edit/<?php echo $u['id_user']; ?>" class="tampilModalEditUser" data-toggle="modal" data-target="#formModal" data-id_user="<?php echo $u['id_user']; ?>"><i class="fas fa-edit fa-lg"></i></a>
                                <a href="<?php echo base_url(); ?>user/hapus/<?php echo $u['id_user']; ?>" class="badge icon-hapus"><i class="fas fa-trash fa-lg"></i></a>
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
                <h5 class="modal-title" id="formModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>user/edit" method="post">
                    <input type="hidden" class="form-control" id="id_user" name="id_user">
                    <div class="form-group">
                        <label for="nama">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger float-right mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary float-right" name="edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>