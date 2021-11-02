<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Proses</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL</th>
                            <th>NIK</th>
                            <th>LAPORAN</th>
                            <th>BUKTI FOTO</th>
                            <th>
                                <center>AKSI</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $i) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $i['tgl_pengaduan']; ?></td>
                                <td><?= $i['nik']; ?></td>
                                <td><a href="#" data-toggle="modal" data-target="#isi_<?= $i['id_pengaduan']; ?>">Lihat Detail Laporan</a></td>
                                <td align="center">
                                    <?php if ($i['foto'] == '0') : ?>
                                        <span class="text-danger">Tanpa Bukti Foto</span>
                                    <?php else : ?>
                                        <a target="_blank" href="<?= base_url('image/') . $i['foto']; ?>" class="text-primary">Lihat Foto</a>
                                    <?php endif ?>
                                </td>
                                <td align="center">
                                    <a href="#" data-toggle="modal" data-target="#proses_<?= $i['id_pengaduan']; ?>" class="btn btn-sm btn-primary">Tanggapi Laporan</a>
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


<!-- Modal Isi -->
<?php foreach ($data as $i) : ?>
    <div class="modal fade" id="isi_<?= $i['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close mb-3" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <table class="table" width="100%" cellspacing="0">
                        <tr>
                            <td width="20%"><b>Judul Laporan</b></td>
                            <td>:</td>
                            <td><?= $i['judul_laporan']; ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Isi Laporan</b></td>
                            <td>:</td>
                            <td><?= preg_replace('/\r\n|\r|\n/', '<br>', $i['isi_laporan']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Proses -->
<?php foreach ($data as $i) : ?>
    <div class="modal fade" id="proses_<?= $i['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanggapi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="user" action="<?= base_url('admin/laporan_proses/fix/') . $i['id_pengaduan']; ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="petugas" value="<?= $this->session->userdata('id'); ?>">
                        <div class="form-group">
                            <label for="tgl" class="mb-0">Tanggal :</label>
                            <input type="text" name="tgl" class="form-control" id="tgl" value="<?= date('d-m-Y'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="petugas" class="mb-0">Ditanggapi Oleh :</label>
                            <input type="text" class="form-control" id="petugas" value="<?= $this->session->userdata('nama'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan" class="mb-0">Tanggapan :</label>
                            <textarea rows="5" name="tanggapan" class="form-control" id="tanggapan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>