
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin & Petugas</h1>
                        <a href="#" data-toggle="modal" data-target="#add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    </div>
                    <?= $this->session->flashdata('msg'); ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>TELEPON</th>
                                            <th><center>LEVEL</center></th>
                                            <th><center>AKSI</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($data as $i):
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $i['nama_petugas']; ?></td>
                                            <td><?= $i['username']; ?></td>
                                            <td><?= $i['password']; ?></td>
                                            <td><?= $i['telp']; ?></td>
                                            <td align="center">
                                            <?php if ($i['level']=='admin'): ?>
                                                <span class="badge badge-primary">Admin</span>
                                            <?php elseif($i['level']=='petugas'): ?>
                                                <span class="badge badge-danger">Petugas</span>
                                            <?php endif ?>
                                            </td>
                                            <td align="center">
                                                <a href="<?= base_url('admin/users/edit/').$i['id_petugas']; ?>" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#hapus_<?= $i['id_petugas']; ?>" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


    <!-- modal add -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="user" action="<?= base_url('admin/users/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="mb-0">Nama :</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="username" class="mb-0">Username :</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="mb-0">Password :</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="telp" class="mb-0">Telp :</label>
                        <input type="text" name="telp" class="form-control" id="telp">
                    </div>
                    <div class="form-group">
                        <label for="level" class="mb-0">Hak Akses :</label>
                        <select name="level" class="form-control" id="level">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <?php foreach ($data as $i): ?>
    <div class="modal fade" id="hapus_<?= $i['id_petugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hapus Pengguna <?= $i['nama_petugas'] ;?> ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('admin/users/hapus/').$i['id_petugas']; ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>