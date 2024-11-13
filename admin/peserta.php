<?php
session_start();
include 'config/db.php';

// select peserta
$sqlPeserta = mysqli_query($connection, "SELECT peserta_pelatihan.*, jurusan.nama_jurusan, gelombang.nama_gelombang FROM peserta_pelatihan LEFT JOIN jurusan ON peserta_pelatihan.id_jurusan = jurusan.id LEFT JOIN gelombang ON peserta_pelatihan.id_gelombang = gelombang.id");
// print_r($dataPeserta);
// die;




if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $updateGel = mysqli_query($connection, "UPDATE peserta_pelatihan SET status = 1 WHERE id = '$id'");
    header('location: peserta.php?set-status-success');
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
                                    <div class="card-header fs-1">Data Peserta</div>

                                    <div class="card-body">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="bg-primary ">
                                                    <th class="text-white">No</th>
                                                    <th class="text-white">Nama Peserta</th>
                                                    <th class="text-white">Gelombang</th>
                                                    <th class="text-white">Jurusan</th>
                                                    <th class="text-white">Pendidikan Terakhir</th>
                                                    <th class="text-white">Aktivitas Saat Ini</th>
                                                    <th class="text-white">Status</th>
                                                    <th class="text-white">Detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                while ($dataPeserta = mysqli_fetch_assoc($sqlPeserta)):
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $dataPeserta['nama_lengkap'] ?></td>
                                                        <td><?= $dataPeserta['nama_gelombang'] ?></td>
                                                        <td><?= $dataPeserta['nama_jurusan'] ?></td>
                                                        <td><?= $dataPeserta['pendidikan_terakhir'] ?></td>
                                                        <td><?= $dataPeserta['aktivitas_saat_ini'] ?></td>
                                                        <td>
                                                            <a href="peserta.php?edit=<?= $dataPeserta['id'] ?>" class="<?= $dataPeserta['status'] == 0 ? 'btn btn-warning' : 'btn btn-success' ?>"><?= $dataPeserta['status'] == 0 ? 'Verify' : "Lolos" ?></a>
                                                        </td>
                                                        <td>
                                                            <a href="detail-peserta.php?detail=<?= $dataPeserta['id'] ?>" class="btn btn-warning">Detail</a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile ?>
                                            </tbody>
                                        </table>
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