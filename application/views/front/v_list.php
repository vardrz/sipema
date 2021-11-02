<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Laporan Anda</h1>
    <?= $this->session->flashdata('msg'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <span class="text-warning">*Note : Laporan yang sudah diproses oleh petugas tidak dapat dihapus.</span>
                <p />
                <table class="table table-bordered" id="data" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>TANGGAL</th>
                            <th>JUDUL</th>
                            <th>LAPORAN</th>
                            <th>FOTO</th>
                            <th>STATUS</th>
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
                                <td><?= $i['judul_laporan']; ?></td>
                                <td><a href="#" data-toggle="modal" data-target="#isi_<?= $i['id_pengaduan']; ?>" class="text-primary">Baca Selengkapnya.</a></td>
                                <td>
                                    <?php if ($i['foto'] == '0') : ?>
                                        <span class="text-danger">Tanpa Bukti Foto</span>
                                    <?php else : ?>
                                        <a target="_blank" href="<?= base_url('image/') . $i['foto']; ?>" class="text-primary">Lihat Foto</a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?php if ($i['status'] == '0') : ?>
                                        Laporan Terkirim
                                    <?php elseif ($i['status'] == 'tolak') : ?>
                                        <span class="text-danger">Laporan Ditolak</span>
                                        <br><small>Alasan : Laporan tidak valid.</small>
                                    <?php elseif ($i['status'] == 'proses') : ?>
                                        Laporan Sedang Diproses
                                    <?php elseif ($i['status'] == 'selesai') : ?>
                                        Selesai
                                        <br><a href="#" data-toggle="modal" data-target="#tanggapan_<?= $i['id_pengaduan']; ?>" class="text-decoration-none text-primary">Lihat Tanggapan.</a>
                                    <?php endif ?>
                                </td>
                                <td align="center">
                                    <?php if ($i['status'] == '0') : ?>
                                        <a href="#" data-toggle="modal" data-target="#hapus_<?= $i['id_pengaduan']; ?>" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    <?php else : ?>
                                        <button class="btn btn-sm btn-danger btn-circle" disabled><i class="fas fa-trash"></i></button>
                                    <?php endif ?>
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


<!-- Modal Hapus -->
<?php foreach ($data as $i) : ?>
    <div class="modal fade" id="hapus_<?= $i['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url('daftar_laporan/hapus'); ?>">
                    <input type="hidden" name="id" value="<?= $i['id_pengaduan']; ?>">
                    <input type="hidden" name="foto" value="<?= $i['foto']; ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Hapus Laporan ini ?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="isi_<?= $i['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <b><?= $i['judul_laporan']; ?></b>
                    <p><?= preg_replace("/\r\n|\r|\n/", '<br>', $i['isi_laporan']); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($tanggapan as $t) : ?>
    <div class="modal fade" id="tanggapan_<?= $t['id_pengaduan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <b>Oleh <?= $t['nama_petugas']; ?> - <?= $t['tgl_tanggapan']; ?></b>
                    <p class="mt-2"><?= preg_replace("/\r\n|\r|\n/", '<br>', $t['tanggapan']); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>