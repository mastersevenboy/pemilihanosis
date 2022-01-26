<html>
<head>
	<title>Cetak Laporan Data Pemilih</title>
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
	<table border="0">
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
	<table border="1" style="width: 100%">
	<tr>
		<th width="30px">No.</th>
		<th>NAMA</th>
		<th>STATUS</th>
	</tr>
	<?php $no=1; foreach($panitia as $row) { ?>
 	<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $row->nama; ?></td>
    <td align="center"><?php echo $row->status; ?></td>
    </tr>
    <?php } ?>
	</table>
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
