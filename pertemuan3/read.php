<?php
require "koneksi.php";

if ($_GET['id'] != null) {
	$id = $_GET['id'];
	$script = "SELECT * FROM buku WHERE id=$id";
	$query = mysqli_query($conn, $script);
	$data = mysqli_fetch_array($query);
} else {
	header("location:index.php");
}

if (isset($_POST['hapus'])) {
	$script2 = "DELETE FROM buku WHERE id = $id";
	$query = mysqli_query($conn, $script2);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="asset/img/logolur.svg">
	<link rel="stylesheet" href="asset/css/detail.css">
	<title>read detail</title>
</head>

<body>
	<div class="wrapper" style="margin-top: 60px;">
		<div class="row">
			<div class="col-7">
				<img src="<?= $data['cover'] ?>" alt="foto" width="90%">
			</div>
			<div class="col-4">
				<div class="box-detail-produk">
					<h2>Tentang Buku</h2>
					<h3><?= $data['judul'] ?></h3>
					<h5>Rp <?= number_format($data['harga']) ?></h5>
					<p>Genre: <?= $data['genre'] ?></p>
				</div>
				<div class="box-detail-produk">
					<h2>Tentang penerbit</h2>
					<h3><?= $data['penerbit'] ?></h3>
				</div>
				<div class="box-detail-produk">
					<h2>Aksi Lainnya</h2>
					<form method="post">
						<a href="read.php" type="submit" style="background: #AA8B56; color: whitesmoke; font-size: 18px;" class="btn">Kembali</a>
					</form>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box-detail-product">
					<h2>Deskripsi Buku</h2>
					<p>Jumlah Halaman : <?= $data['jmlhal'] ?></p>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>