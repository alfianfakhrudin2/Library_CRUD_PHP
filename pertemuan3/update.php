<?php
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="asset/img/logolur.svg">
	<!-- Css Gue -->
	<link rel="stylesheet" href="asset/css/modif.css">
	<title>Update page</title>
	<style type="text/css">
		.wrapper {
			width: 500px;
			margin: 0 auto;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<div>
			<?php
			if ($_GET['id'] == null) {
				header("location:index.php");
			}
			$id = $_GET['id'];
			$script = "SELECT * FROM buku WHERE id = $id";
			$query = mysqli_query($conn, $script);
			$data = mysqli_fetch_array($query);
			if (isset($_POST['submit'])) {
				if (isset($_FILES['cover'])) {
					$judul = $_POST['judul'];
					$penerbit = $_POST['penerbit'];
					$pengarang = $_POST['pengarang'];
					$harga = $_POST['harga'];
					$tgl = $_POST['tgl'];
					$file_tmp = $_FILES['cover']['tmp_name'];

					if ($file_tmp == null) {
						$cover = $data['cover'];
						$script = "UPDATE buku SET judul='$judul', penerbit='$penerbit', pengarang='$pengarang', harga='$harga', tgl='$tgl', cover='$cover' WHERE id=$id";
					} else {
						$type = pathinfo($file_tmp, PATHINFO_EXTENSION);
						$data = file_get_contents($file_tmp);
						$cover = 'data:/asset/img/' . $type . ';base64,' . base64_encode($data);
						$script = "UPDATE buku SET judul='$judul', penerbit='$penerbit', pengarang='$pengarang', harga='$harga', tgl='$tgl',cover='$cover' WHERE id=$id";
					}

					$query = mysqli_query($conn, $script);
					if ($query) {
						header("location: index.php");
					} else {
						echo "Gagal mengupload data";
					}
				}
			}
			?>
		</div>
		<div class="container-fluid">
			<div class="wrapper">
				<div class="row">
					<div class="col-md-12">
						<div class="page_header" style="color:whitesmoke; margin-top: 15px;">
							<h2>Edit Buku <?php echo $data['judul']; ?></h2>
						</div>
						<p style="color:whitesmoke;">Silahkan isi data pada form dibawah ini</p>
						<form method="post" enctype="multipart/form-data">
							<div class="form-group" style="color:whitesmoke;">
								<label> Judul Buku </label>
								<input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>">
							</div>
							<div class="form-group" style="color:whitesmoke;">
								<label>Genre Buku</label>
								<select name="genre" class="form-control">
									<option>Pilih</option>
									<option value="Horor">Horor</option>
									<option value="Fantasy">Fantasy</option>
									<option value="Romance">Romance</option>
									<option value="Science Fiction">Science Fiction</option>
									<option value="Thriller / Suspense / Mystery">Thriller / Suspense / Mystery</option>
									<option value="Historical">Historical</option>
									<option value="Realistic Fiction">Realistic Fiction</option>
								</select>
							</div>
							<div class="form-group" style="color:whitesmoke;">
								<label> Cover Buku </label>
								<input type="file" class="form-control" name="cover">
							</div>
							<div class="form-group" style="color:whitesmoke;">
								<label> Penerbit Buku </label>
								<input type="text" class="form-control" name="penerbit" value="<?= $data['penerbit'] ?>">
							</div>
							<div class="form-group" style="color:whitesmoke;">
								<label> Pengarang Buku </label>
								<input type="text" class="form-control" name="pengarang" value="<?= $data['pengarang'] ?>">
							</div>
							<div class="form-group" style="color:whitesmoke;">
								<label>Jumlah Halaman Buku </label>
								<input type="number" class="form-control" name="harga" value="<?= $data['jmlhal'] ?>">
							</div>
							<div class="form-group" style="color:whitesmoke;">
								<label>Harga Buku</label>
								<input type="number" class="form-control" name="harga" value="<?= $data['harga'] ?>">
							</div>
							<div class="form-group" style="color:whitesmoke;">
								<label>Tanggal Terbit</label>
								<input type="date" class="form-control" name="tgl" value="<?= $data['tgl'] ?>">
							</div>
							<input type="submit" class="btn" style="margin-top: 16px; font-size: 15px; color: whitesmoke; background: #00ABB3; margin-left: 137px;  width: 100px;" name="submit" value="Submit">
							<a href="index.php" type="submit" style="margin-top: 16px; background: #C9BBCF; width: 100px;" class="btn">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br><br><br>
	</div>


	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>