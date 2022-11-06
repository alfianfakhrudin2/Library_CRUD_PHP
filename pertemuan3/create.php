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
    <!-- Css gue -->
    <link rel="stylesheet" href="asset/css/modif.css">
    <title>Create</title>
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
            if (isset($_POST['submit'])) {
                if (isset($_FILES['cover'])) {
                    $judul = $_POST['judul'];
                    $id = $_POST['id'];
                    $penerbit = $_POST['penerbit'];
                    $genre = $_POST['genre'];
                    $pengarang = $_POST['pengarang'];
                    $jmlhhal = $_POST['jmlhhal'];
                    $harga = $_POST['harga'];
                    $tgl = $_POST['tgl'];
                    $file_tmp = $_FILES['cover']['tmp_name'];
                    $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                    $data = file_get_contents($file_tmp);
                    $cover = 'data:/asset/img/' . $type . ';base64,' . base64_encode($data);

                    $script = "INSERT INTO buku SET 
                        judul='$judul',
                        id='$id',
                        cover='$cover', 
                        penerbit='$penerbit', 
                        genre='$genre', 
                        pengarang='$pengarang',
                        jmlhal='$jmlhhal', 
                        harga='$harga', 
                        tgl='$tgl'";

                    $query = mysqli_query($conn, $script);
                    if ($query) {
                        header("location: index.php");
                    } else {
                        echo "gagal mengupload data";
                    }
                }
            }
            ?>
            <br>
        </div>
        <div class="container-fluid">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div style="color:whitesmoke;" class="page_header">
                            <h2>Tambah Buku</h2>
                        </div>
                        <p style="color:whitesmoke;">Silahkan isi data pada form dibawah ini</p>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group" style="color:whitesmoke;">
                                <label>id</label>
                                <input type="number" class="form-control" name="id">
                            </div>
                            <div class="form-group" style="color:whitesmoke;">
                                <label>judul</label>
                                <input type="text" class="form-control" name="judul">
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
                                <label>cover buku</label>
                                <input type="file" class="form-control" name="cover">
                            </div>
                            <div class="form-group" style="color:whitesmoke;">
                                <label>penerbit</label>
                                <input type="text" class="form-control" name="penerbit">
                            </div>
                            <div class="form-group" style="color:whitesmoke;">
                                <label>pengarang</label>
                                <input type="text" class="form-control" name="pengarang">
                            </div>
                            <div class="form-group" style="color:whitesmoke;">
                                <label>Jumlah Halaman</label>
                                <input type="number" class="form-control" name="jmlhhal">
                            </div>
                            <div class="form-group" style="color:whitesmoke;">
                                <label>harga</label>
                                <input type="number" class="form-control" name="harga">
                            </div>
                            <div class="form-group" style="color:whitesmoke;">
                                <label>Tanggal terbit</label>
                                <input type="date" class="form-control" name="tgl">
                            </div>
                            <input type="submit" style="margin-top: 16px; font-size: 15px; color: whitesmoke; background: #00ABB3; margin-left: 137px;  width: 100px;" class="btn" name="submit" value="Submit">
                            <a href="index.php" style="margin-top: 16px; background: #C9BBCF; width: 100px;" type="submit" class="btn">Cancel</a>
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