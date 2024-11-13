<?php
session_start();

include 'config/db.php';
// $id = $_SESSION['id'];


// data kejuruan
$sqlDataJurusan = mysqli_query($connection, "SELECT * FROM jurusan ORDER BY id DESC");

// update
if (isset($_POST['submit'])) {
    // $id_user = $_SESSION['id'];
    $id_jurusan = $_POST['id_jurusan'];

    $sqlInsertPic = mysqli_query($connection, "INSERT INTO users_jurusan (id_user, id_jurusan) VALUES ('$id', '$id_jurusan')");
    header('location: profile.php?set-pic-success');
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header fs-1">Detail Peserta</div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <form action="" method="post">
                                                    <label for="" class="form-label">Pic Jurusan</label>
                                                    <select name="id_jurusan" class="form-control" id="">
                                                        <option value="">--pilih kejuruan--</option>
                                                        <?php while ($dataJurusan = mysqli_fetch_assoc($sqlDataJurusan)) : ?>
                                                            <option value="<?= $dataJurusan['id'] ?>"><?= $dataJurusan['nama_jurusan'] ?></option>
                                                        <?php endwhile ?>
                                                    </select>
                                                    <div class="bnt-cta mt-3">
                                                        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
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