<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Selesai</h1>
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
                            <th>
                                <center>TANGGAPAN</center>
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
                                <td><a href="#" data-toggle="modal" data-target="#isi_<?= $i['id_pengaduan']; ?>">Lihat Laporan</a></td>
                                <td align="center">
                                    <a href="#" data-toggle="modal" data-target="#tanggapan_<?= $i['id_pengaduan']; ?>">Lihat Tanggapan</a>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b><?= $i['judul_laporan']; ?></b>
                    <br /><?= preg_replace('/\r\n|\r|\n/', '<br>', $i['isi_laporan']); ?>
                    <br><br>
                    <?php if ($i['foto'] != '0') : ?>
                        <center>
                            <img src="<?= base_url('image/') . $i['foto']; ?>" class="img-fluid">
                        </center>
                    <?php else : ?>
                        <span class="text-danger">
                            <center>(Tanpa Bukti Foto)</center>
                        </span>
                    <?php endif ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Tanggapan -->
<?php foreach ($tanggapan as $i) : ?>
    <div class="modal fade" id="tanggapan_<?= $i['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanggapan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $i['tgl_tanggapan']; ?> | Tanggapan Dari <?= $i['nama_petugas']; ?>
                    <br><br><?= preg_replace('/\r\n|\r|\n/', '<br>', $i['tanggapan']); ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>