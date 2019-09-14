<html>
<head>
	<title>ExcelPort</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Peserta_Lomba_IITF.xls");
	?>
 
	<center>
		<h3>DAFTAR PESERTA LOMBA<br/>INTERMEDIA INFORMATION TECHNOLOGY FESTIVAL 2019</h3>
	</center>
 
	<table border="1">
		<tr>
			<th>No</th>
			<th>ID Pendaftaran</th>
			<th>Nama Team/Peserta</th>
			<th>Jumlah Anggota</th>
			<th>Kategori</th>
		</tr>
		<?php 
		$no = 1;
		foreach($row as $u){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $u->id_pendaftaran; ?></td>
			<td><?php echo $u->nama_koor; ?></td>
			<td><?php echo ""; ?></td>
			<td> <?php echo $u->nama_lomba; ?> </td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>