<?php
session_start();

include 'config/db.php';
// $id = $_SESSION['id'];

// select data pic
$sqlPIC = mysqli_query($connection, "SELECT users.*, jurusan.nama_jurusan, levels.nama_level FROM users LEFT JOIN jurusan ON users.id_jurusan = jurusan.id LEFT JOIN levels ON users.id_level = levels.id WHERE levels.nama_level = 'pic' ORDER BY id DESC");

// delete pic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = mysqli_query($connection, "DELETE FROM users WHERE id = '$id'");
    header('location: pic.php');
}

// data kejuruan
$sqlDataJurusan = mysqli_query($connection, "SELECT * FROM jurusan ORDER BY id DESC");

// data level
$sqlDataLevel = mysqli_query($connection, "SELECT * FROM levels ORDER BY id DESC");

// update
if (isset($_POST['submit'])) {
    $id_level = $_POST['id_level'];
    $id_jurusan = $_POST['id_jurusan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlInsertPic = mysqli_query($connection, "INSERT INTO users (id_level, id_jurusan, nama_lengkap, email, password) VALUES ('$id_level', '$id_jurusan', '$nama_lengkap', '$email', '$password')");
    header('location: pic.php?set-pic-success');
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
                                    <div class="card-header fs-1">Edit Pic</div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Nama PIC</label>
                                                        <input type="text" class="form-control" name="nama_lengkap">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Email</label>
                                                        <input type="text" class="form-control" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">level</label>
                                                        <select name="id_level" id="" class="form-control">
                                                            <option value="">pilh level</option>
                                                            <?php while ($dataLevel = mysqli_fetch_assoc($sqlDataLevel)): ?>
                                                                <option value="<?= $dataLevel['id'] ?>"><?= $dataLevel['nama_level'] ?></option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">jurusan</label>
                                                        <select name="id_jurusan" class="form-control" id="">
                                                            <option value="">Pilih Jurusan</option>
                                                            <?php while ($dataJurusan = mysqli_fetch_assoc($sqlDataJurusan)) : ?>
                                                                <option value="<?= $dataJurusan['id'] ?>">
                                                                    <?= $dataJurusan['nama_jurusan'] ?>
                                                                </option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Password</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-cta">
                                                <button class="btn btn-primary" name="submit" type="submit">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Level</th>
                                                        <th>Jurusan</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    while ($dataPic = mysqli_fetch_assoc($sqlPIC)):
                                                    ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $dataPic['nama_level'] ?></td>
                                                            <td><?= $dataPic['nama_jurusan'] ?></td>
                                                            <td><?= $dataPic['nama_lengkap'] ?></td>
                                                            <td><?= $dataPic['email'] ?></td>
                                                            <td>
                                                                <a href="pic.php?delete=<?= $dataPic['id'] ?>" class="btn btn-danger" onclick="return ('apakah anda yakin untuk menghapus data ini?')">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
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