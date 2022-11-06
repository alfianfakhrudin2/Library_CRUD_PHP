<?php
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="asset/img/logolur.svg">
    <!-- Link BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- File css gue -->
    <link rel="stylesheet" href="asset/css/modif.css">

</head>

<body>
    <header>
        <div class="bungkus">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="" style="margin-top: 26px;">
                            <h2 style="font-family: 'Fuzzy Bubbles', cursive; color:whitesmoke;" class="pull-left" style="margin-top:10px;">Data Buku Perpusatakaan XYZ</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="bungkus">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border-radius: 12px;">
                        <div class="card-header">
                            <form method="get">
                                <div class="input-group" style="margin: 14px 0px; padding:0px 10px;">
                                    <input class="inpot" type="search" style="height: 42px;" name="search" id="forml" placeholder="Search book?" class="form-control" />
                                    <button style="border-radius:0px 10px 10px 0px;" type="submit" class="btn btn-primary" value="Search"><i class='bx bx-search-alt-2'></i></button>
                                    <a href="create.php" class="btn" style="height: 42px; border-radius: 10px; margin-left: 540px; color: #06283D; font-size: 16px; background:#B1B2FF;"><b><i class='bx bx-message-alt-add'></i>Add Book</b></a>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <?php
                            $batas = 2;
                            $page = $_GET['page'] ?? null;
                            if (empty($page)) {
                                $position = 0;
                                $page = 1;
                            } else {
                                $position = ($page - 1) * $batas;
                            }

                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $sql = "SELECT * FROM buku WHERE judul LIKE '%$search%' ORDER BY id DESC LIMIT $position, $batas";
                            } else {
                                $sql = "SELECT * FROM buku ORDER BY id DESC LIMIT $position, $batas";
                            }

                            $i = 1;
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table class='table table-bordered table-striped table-hover'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th class='text-center'>No</th>";
                                echo "<th class='text-center'>id</th>";
                                echo "<th class='text-center'>judul</th>";
                                echo "<th class='text-center'>penerbit</th>";
                                echo "<th class='text-center'>pengarang</th>";
                                echo "<th class='text-center'>harga</th>";
                                echo "<th class='text-center'>Tanggal</th>";
                                echo "<th class='text-center'>Action</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td class='text-center'>" . $i++ . "</td>";
                                    echo "<td class='text-center'>" . $row['id'] . "</td>";
                                    echo "<td class='text-center'>" . $row['judul'] . "</td>";
                                    echo "<td class='text-center'>" . $row['penerbit'] . "</td>";
                                    echo "<td class='text-center'>" . $row['pengarang'] . "</td>";
                                    echo "<td class='text-center'>" . $row['harga'] . "</td>";
                                    echo "<td class='text-center'>" . $row['tgl'] . "</td>";
                                    echo "<td class='text-center'>";
                                    echo "<a style='padding-right: 3px;' href='read.php?id=" . $row['id'] . "' tittle='View Record' ><span><i class='btn btn-success bx bx-spreadsheet' style='font-size:14px;'></i></span></a>";
                                    echo "<a style='padding-right: 3px;' href='update.php?id=" . $row['id'] . "' title='Update Record' ><span><i class='btn btn-warning bx bxs-edit' style='font-size:14px;'></i></span></a>";
                                    echo "<a style='padding-right: 3px;' href='delete.php?id=" . $row['id'] . "' title='Delete Record'><span><i class='btn btn-danger bx bxs-trash' style='font-size:14px;'></i></span></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";

                                mysqli_free_result($result);
                            } else {
                                echo "<table class='table table-bordered table-striped table-hover' style='background-color:white'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Student Number</th>";
                                echo "<th>Name</th>";
                                echo "<th>Task</th>";
                                echo "<th>Middle Test</th>";
                                echo "<th>Final Test</th>";
                                echo "<th>Settings</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td td class='text-center' colspan='6'>Oops! Data Not Found.</td>";
                                echo "</tr>";
                                echo "</tbody>";
                                echo "</table>";
                            }
                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $query2 = "SELECT * FROM buku WHERE judul LIKE '%$search%' ORDER BY id DESC";
                            } else {
                                $query2 = "SELECT * FROM buku ORDER BY id DESC";
                            }
                            $result2 = mysqli_query($conn, $query2);
                            $jmlhdata = mysqli_num_rows($result2);
                            $jmlhalaman = ceil($jmlhdata / $batas);
                            // Close connection
                            mysqli_close($conn);
                            ?>
                            <ul class="pagination">
                                <?php
                                for ($i = 1; $i <= $jmlhalaman; $i++) {
                                    if ($i != $page) {
                                        if (isset($_GET['search'])) {
                                            $search = $_GET['search'];
                                            echo "<li class='page-item'><a class='page-link' href='index.php?page=$i&search=$search'>$i</a></li>";
                                        } else {
                                            echo "<li class='page-item'><a class='page-link' href='index.php?page=$i' style='color: black;'>$i</a></li>";
                                        }
                                    } else {
                                        echo "<li class'page-item'><a class='page-link' href='#' style='color: black;'>$i</a></li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>