<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- css -->
    <?php include 'inc/head.php' ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php include 'inc/navbar.php' ?>
    <!-- Navbar End -->


    <!-- tampilan pendaftaran -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="title d-flex justify-content-center">
                <h1>Pendaftaran Siswa Pelatihan</h1>
            </div>
            <div class="btn-cta d-flex justify-content-center mb-3">
                <a href="peserta.php" class="btn btn-success rounded-3">Klik Untuk Mendaftar</a>
            </div>
            <div class="btn-cta d-flex justify-content-center">
                <button class="btn btn-primary rounded-3">Klik Untuk Melihat jumlah peserta</button>
            </div>
            <div class="container py-5 d-flex justify-content-center">
                <div class="header-img">
                    <img src="img/pendaftaran.png" alt="form pendaftaran">
                </div>
            </div>
            <div class="btn-cta d-flex justify-content-center">
                <a href="peserta.php" class="btn btn-success rounded-3">Klik Disini Untuk Mendaftar</a>
            </div>
        </div>
    </div>
    <!-- end of tampilan pendaftaran -->

    <!-- Footer Start -->
    <?php include 'inc/footer.php' ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include 'inc/js.php' ?>
</body>

</html>