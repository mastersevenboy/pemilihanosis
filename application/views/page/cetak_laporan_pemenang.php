<html>
<head>
	<title>Cetak Laporan Pemenang</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 900px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
	<table border="0" class="table table-bordered table-striped table-hover js-basic-example dataTable">
	<tr><img src="<?php echo base_url() ?>assets/images/logo.png" align="left" width="95px" hight="95px"/>
	<p align="center">
	<b>YAYASAN PENDIDIKAN WIDYA KARYA PURWOKERTO</b> <br />
	<b>SMK WIDYA KARYA PURWOKERTO</b> <br />
	KELOMPOK TEKNOLOGI DAN REKAYASA <br>
	<b>TERAKREDITASI B</b> <br />
	Alamat: Jl. Martadireja II, Mersi, Purwokerto Timur, 53112 Kejawar<br>
	Banyumas, Kabupaten Banyumas, Jawa Tengah 53111, No.tlp: (0281) 632220 <br>
	</p>
	</tr>
	</table>
	<hr size="5px">
	<br>
	<b><?php echo $keterangan; ?></b><br /><br />
	<br>
	<?php foreach($banyak as $win) { ?>
	<table border="0">
	<tr><div align="center">
		<img height="150px" width="150px" alt="<?= $win->foto; ?>" src="<?= base_url(); ?>./assets/images/<?= $win->foto; ?>">
	</div><br>
	<br>
	<tr class="bg-green">
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Jurusan</th>
    <th>Jumlah Suara</th>
    <th>Total Pemilih</th>
    </tr>
    <tr>
    <td align="center"><?php echo $win->nis_kandidat; ?></td>
    <td align="center"><?php echo $win->nama; ?></td>
    <td align="center"><?php echo $win->kelas; ?></td>
    <td align="center"><?php echo $win->jurusan; ?></td>
    <td align="center"><?php echo $win->suara_kandidat; ?></td>
    <?php foreach($datauseraktif as $row) { ?>
    <td align="center"><?php echo $row->totaluseraktif; ?></td>
    <?php } ?>
  <!--   <td><?php echo $row->visi; ?></td>
    <td><?php echo $row->misi; ?></td>  -->                                         
	</tr>

</table>
<br>
<br>
<table>
	<tr>
		<th>Visi</th>
		<th>Misi</th>
	</tr>
	<tr>
		<td><?php echo $win->visi; ?></td>
		<td><?php echo $win->misi; ?></td>
	</tr>
</table>

   <?php } ?>

   <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<table border="0" style="width: 100%">
	<tr>
		<th>Ketua Panitia</th>
		<th>Kesiswaan</th>
		<th>Kepala Sekolah</th>
	</tr>
	<tr>
    <td align="center">
    <br>
    <br>
    <br>
    <?php foreach($ketua as $row) { ?>
    <?php echo $row->nama; ?></td>
    <?php } ?>
    <td align="center">
    <br>
    <br>
    <br>
    <?php foreach($kesiswaan as $row) { ?>
    <?php echo $row->nama; ?></td>
    <?php } ?>
    </td>
    <td align="center">
    <br>
    <br>
    <br>
    <?php foreach($kepsek as $row) { ?>
    <?php echo $row->nama; ?></td>
    <?php } ?>
	</td>
    </tr>
	</table>
<script>
	window.print();
</script>
</body>
</html>
