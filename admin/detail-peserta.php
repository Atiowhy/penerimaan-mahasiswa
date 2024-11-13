<?php
session_start();
include 'config/db.php';

if (isset($_GET['detail'])) {
    $id = $_GET['detail'];

    $sqlPeserta = mysqli_query($connection, "SELECT peserta_pelatihan.*, jurusan.nama_jurusan, gelombang.nama_gelombang FROM peserta_pelatihan LEFT JOIN jurusan ON peserta_pelatihan.id_jurusan = jurusan.id LEFT JOIN gelombang ON peserta_pelatihan.id_gelombang = gelombang.id WHERE peserta_pelatihan.id = '$id'");
    $dataId = mysqli_fetch_assoc($sqlPeserta);
}
// select peserta
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $updateGel = mysqli_query($connection, "UPDATE peserta_pelatihan SET status = 1 WHERE id = '$id'");
    header('location: peserta.php?set-status-success');
}

// select gelombang peserta
$sqlGelombang = mysqli_query($connection, "SELECT DATE_FORMAT(created_at, '%d-%m-%Y') AS tanggal FROM peserta_pelatihan");
$dataSql = mysqli_fetch_assoc($sqlGelombang);

// buat history pendaftaran
$sqlPeserta = mysqli_query($connection, "SELECT peserta_pelatihan.*, jurusan.nama_jurusan, gelombang.nama_gelombang FROM peserta_pelatihan LEFT JOIN jurusan ON peserta_pelatihan.id_jurusan = jurusan.id LEFT JOIN gelombang ON peserta_pelatihan.id_gelombang = gelombang.id");
$dataAll = mysqli_fetch_assoc($sqlPeserta);

// ambil data nik   
$nik = $dataAll['nik'];
$selectByNik = mysqli_query($connection, "SELECT peserta_pelatihan.*, jurusan.nama_jurusan, gelombang.nama_gelombang FROM peserta_pelatihan LEFT JOIN jurusan ON peserta_pelatihan.id_jurusan = jurusan.id LEFT JOIN gelombang ON peserta_pelatihan.id_gelombang = gelombang.id WHERE nik = '$nik'");
// $dataNik = mysqli_fetch_assoc($selectByNik);
// print_r($dataNik);
// die;
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
                                                <label for="" class="form-label">Nama Peserta</label>
                                                <input type="text" value="<?= $dataId['nama_lengkap'] ?>" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">NIK</label>
                                                <input type="text" value="<?= $dataId['nik'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Kartu Keluarga</label>
                                                <input type="text" value="<?= $dataId['kartu_keluarga'] ?>" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Jenis Kelamin</label>
                                                <input type="text" value="<?= $dataId['jenis_kelamin'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Tempat Lahir</label>
                                                <input type="text" value="<?= $dataId['tempat_lahir'] ?>" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Tanggal Lahir</label>
                                                <input type="text" value="<?= $dataId['tanggal_lahir'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Pendidikan Terakhir</label>
                                                <input type="text" value="<?= $dataId['pendidikan_terakhir'] ?>" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Nama Sekolah</label>
                                                <input type="text" value="<?= $dataId['nama_sekolah'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Kejuruan</label>
                                                <input type="text" value="<?= $dataId['kejuruan'] ?>" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Nomor Hp</label>
                                                <input type="text" value="<?= $dataId['nomor_hp'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Email</label>
                                                <input type="text" value="<?= $dataId['email'] ?>" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Aktivitas Saat Ini</label>
                                                <input type="text" value="<?= $dataId['aktivitas_saat_ini'] ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Gelombang</label>
                                                <input type="text" value="<?= $dataId['nama_gelombang'] ?>" class="form-control" readonly>
                                            </div>

                                        </div>

                                        <div class="row mt-5">
                                            <label for="" class="mb-3">Histoy Pendaftaran</label>
                                            <div class="table table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>

                                                        <tr>
                                                            <th>no</th>
                                                            <th>Gelombang</th>
                                                            <th>Jurusan</th>
                                                            <th>Tahun Daftar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        while ($dataNik = mysqli_fetch_assoc($selectByNik)):
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $dataNik['nama_gelombang'] ?></td>
                                                                <td><?= $dataNik['nama_jurusan'] ?></td>
                                                                <td><?= $dataSql['tanggal'] ?></td>
                                                            </tr>
                                                        <?php endwhile ?>
                                                    </tbody>
                                                </table>
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