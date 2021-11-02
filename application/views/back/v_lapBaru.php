<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Baru</h1>
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
                            <th>VERIFIKASI</th>
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
                                    <a href="#" data-toggle="modal" data-target="#verif_<?= $i['id_pengaduan']; ?>" class="btn btn-sm btn-success btn-circle"><i class="fas fa-check"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#tolak_<?= $i['id_pengaduan']; ?>" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-ban"></i></a>
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

<!-- Modal Verif -->
<?php foreach ($data as $i) : ?>
    <div class="modal fade" id="verif_<?= $i['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Verifikasi Laporan ini ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('admin/laporan_baru/verif/') . $i['id_pengaduan']; ?>" class="btn btn-primary">Verifikasi</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Tolak -->
<?php foreach ($data as $i) : ?>
    <div class="modal fade" id="tolak_<?= $i['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tolak Laporan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tolak Laporan ini karena tidak valid ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('admin/laporan_baru/tolak/') . $i['id_pengaduan']; ?>" class="btn btn-danger">Tolak</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>