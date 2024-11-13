<?php
session_start();
include 'config/db.php';

if (isset($_POST['jurusan'])) {
    $nama_jurusan = $_POST['nama_jurusan'];
    // $aktif = 0;

    $queryInsert = mysqli_query($connection, "INSERT INTO jurusan (nama_jurusan) VALUES ('$nama_jurusan')");
    if ($queryInsert) {
        header('location: jurusan.php?insert-jurusan-success');
    }
}

// select jurusan
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sqlJurusan = mysqli_query($connection, "SELECT * FROM jurusan WHERE id = '$id'");
    $dataEditJurusan = mysqli_fetch_assoc($sqlJurusan);
}

$id = isset($_GET['edit']) ? $_GET['edit'] : "";


// edit gelombang
if (isset($_POST['jurusan'])) {

    $nama_jurusan = $_POST['nama_jurusan'];

    // edit
    $sqlEdit = mysqli_query($connection, "UPDATE jurusan SET nama_jurusan = '$nama_jurusan' WHERE id = '$id'");
    header('location: jurusan.php?edit-success');
}
?>

<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <?php include 'inc/haed.php' ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include 'inc/sidebar.php' ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include 'inc/navbar.php' ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">

                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="" method="post">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Edit Jurusan</label>
                                                    <input type="text" class="form-control" name="nama_jurusan" value="<?= $dataEditJurusan['nama_jurusan'] ?>">
                                                </div>
                                                <div class="btn-cta">
                                                    <button class="btn btn-primary" type="submit" name="jurusan">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php include 'inc/footer.php' ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <?php include 'inc/js.php' ?>
</body>

</html>