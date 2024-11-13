<?php
session_start();
include 'config/db.php';
$selectGel = mysqli_query($connection, "SELECT * FROM gelombang ORDER BY id ASC");
// $dataGel = mysqli_fetch_assoc($selectGel);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $updateGel = mysqli_query($connection, "UPDATE gelombang SET aktif = 1 WHERE id = '$id'");
    header('location: gelombang.php?set-status-success');
}

// delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // delete
    $sqlDelete = mysqli_query($connection, "DELETE FROM gelombang WHERE id = '$id'");
    header('location: gelombang.php?delete-success');
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
                                    <div class="card-header fs-1">Data Gelombang</div>
                                    <div class="btn-cta d-flex justify-content-end me-4">
                                        <a href="tambah-gelombang.php" class="btn btn-info">Tambah Gelombang</a>
                                    </div>
                                    <div class="card-body">
                                        <?php if (isset($_GET['success-delete'])): ?>
                                            <div id="alert" class="alert alert-success" role="alert">Deleted Success</div>
                                        <?php endif; ?>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="bg-primary ">
                                                    <th class="text-white">No</th>
                                                    <th class="text-white">Status</th>
                                                    <th class="text-white">Gelombang</th>
                                                    <th class="text-white">Aksi</th>
                                                    <!-- <th class="text-white">Detail</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                while ($dataGel = mysqli_fetch_assoc($selectGel)) :
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td>
                                                            <a href="gelombang.php?edit=<?php echo $dataGel['id'] ?>" type="submit" class="<?php echo $dataGel['aktif'] == 0 ? 'btn btn-danger' : 'btn btn-success' ?>"><?php echo $dataGel['aktif'] == 0 ? 'Tidak Aktif' : 'Aktif' ?></a>
                                                        </td>
                                                        <td><?= $dataGel['nama_gelombang'] ?></td>
                                                        <td>
                                                            <a href="gelombang.php?delete=<?php echo $dataGel['id'] ?>" class="btn btn-danger btn-sm"><span class="tf-icon bx bx-trash me-2"">Delete</span></a>
                                                            <a href=" tambah-gelombang.php?edit=<?php echo $dataGel['id'] ?>" class="btn btn-warning btn-sm"><span class="tf-icon bx bx-trash me-2"">Edit</span></a>
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
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php include 'inc/footer.php' ?>
                    <!-- / Footer -->

                    <div class=" content-backdrop fade">
                                    </div>
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