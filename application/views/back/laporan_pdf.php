<h3 align="center"><?= $laporan; ?></h3>
<table border="1" width="100%" style="border-collapse:collapse;text-align: center;">
	<tr>
		<td><b>NO</b></td>
		<td><b>NIK</b></td>
		<td><b>LAPORAN</b></td>
		<td><b>STATUS</b></td>
		<td><b>TANGGAL</b></td>
	</tr>
	<?php $no = 1;
	foreach ($data as $i) : ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $i['nik'] ?></td>
			<td align="left">
				<div style="margin-left:5px;">
					<b>Judul : <?= $i['judul_laporan']; ?></b>
					<br><?= preg_replace("/\r\n|\r|\n/", '<br>', $i['isi_laporan']); ?>
				</div>
			</td>
			<td>
				<?php if ($i['status'] == '0') : ?>
					Baru
				<?php elseif ($i['status'] == 'tolak') : ?>
					Ditolak
				<?php elseif ($i['status'] == 'proses') : ?>
					Diproses
				<?php elseif ($i['status'] == 'selesai') : ?>
					Selesai
				<?php endif ?>
			</td>
			<td><?= $i['tgl_pengaduan'] ?></td>
		</tr>
	<?php endforeach ?>
</table>