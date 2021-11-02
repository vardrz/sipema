                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Buat Laporan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col">
                            <div class="card shadow mb-4 p-5">
                                <?= $this->session->flashdata('msg'); ?>
                                <?php if ($hari_ini == 'sudah') : ?>
                                    <div class="alert alert-success" role="alert">Anda sudah mengirim Laporan hari ini. maksimal kirim 1 Laporan/hari</div>
                                <?php endif ?>
                                <form class="user" action="<?= base_url('lapor/tambah') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nik">NIK :</label>
                                        <input type="number" name="nik" class="form-control" id="nik" value="<?= $this->session->userdata('nik'); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Tanggal :</label>
                                        <input type="text" name="tgl" class="form-control" id="date" value="<?= date('d-m-Y'); ?>" readonly>
                                    </div>
                                    <?php if ($hari_ini == 'sudah') : ?>
                                        <div class="form-group">
                                            <label for="judul">Judul Laporan :</label>
                                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Judul Laporan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="isi">Isi Laporan :</label>
                                            <textarea name="isi" class="form-control" id="isi" placeholder="Anda Sudah Membuat Laporan Hari Ini" readonly></textarea>
                                        </div>
                                    <?php elseif ($hari_ini == 'belum') : ?>
                                        <div class="form-group">
                                            <label for="judul">Judul Laporan :</label>
                                            <input type="text" name="judul" class="form-control" id="judul" placeholder="Tulis Judul Laporan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="isi">Isi Laporan :</label>
                                            <textarea name="isi" class="form-control" id="isi" placeholder="Tulis Isi Laporan" required></textarea>
                                        </div>
                                    <?php endif ?>
                                    <div class="form-group">
                                        <label for="foto">Bukti Foto<small class="text-primary"> ( opsional )</small></label><br>
                                        <?php if ($hari_ini == 'sudah') : ?>
                                            <input type="file" name="foto" id="foto" disabled>
                                        <?php elseif ($hari_ini == 'belum') : ?>
                                            <input type="file" name="foto" id="foto">
                                        <?php endif ?>
                                    </div>
                                    <?php if ($hari_ini == 'sudah') : ?>
                                        <button type="submit" class="btn btn-primary btn-block" disabled>Kirim</button>
                                    <?php elseif ($hari_ini == 'belum') : ?>
                                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                                    <?php endif ?>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->