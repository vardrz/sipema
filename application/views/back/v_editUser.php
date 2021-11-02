                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data User - <?= $data['nama_petugas'] ;?></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4 p-5">
                                <?= $this->session->flashdata('msg'); ?>
                                <form class="user" action="<?= base_url('admin/users/update') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $data['id_petugas'] ;?>">
                                    <div class="form-group">
                                        <label for="nama">Nama :</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $data['nama_petugas'] ;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username :</label>
                                        <input type="text" name="username" class="form-control" id="username" value="<?= $data['username'] ;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password :</label>
                                        <input type="text" name="password" class="form-control" id="password" value="<?= $data['password'] ;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Telepon :</label>
                                        <input type="number" name="telp" class="form-control" id="telp" value="<?= $data['telp'] ;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Hak Akses :</label>
                                        <select name="level" class="form-control" id="level">
                                        <?php if ($data['level']=='admin'): ?>
                                            <option value="admin" selected>Admin</option>
                                            <option value="petugas">Petugas</option>
                                        <?php elseif ($data['level']=='petugas'): ?>
                                            <option value="admin">Admin</option>
                                            <option value="petugas" selected>Petugas</option>
                                        <?php endif ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
