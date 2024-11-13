<?php
include '../admin/config/db.php';

// select gelombang
$queryGelombang = mysqli_query($connection, "SELECT * FROM gelombang WHERE aktif = 1");

// select jurusan
$queryJurusan = mysqli_query($connection, "SELECT * FROM jurusan");

// query insert gelombang
if (isset($_POST['kirim'])) {
    // print_r($_POST);
    // die;
    $id_gelombang = $_POST['id_gelombang'];
    $id_jurusan = $_POST['id_jurusan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $kartu_keluarga = $_POST['kartu_keluarga'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $nama_sekolah = $_POST['nama_sekolah'];
    $kejuruan = $_POST['kejuruan'];
    $nomor_hp = $_POST['nomor_hp'];
    $email = $_POST['email'];
    $aktivitas_saat_ini = $_POST['aktivitas_saat_ini'];
    $status = $_POST['status'];

    $queryInsertSiswa = mysqli_query($connection, "INSERT INTO peserta_pelatihan (id_gelombang, id_jurusan, nama_lengkap, nik,  kartu_keluarga, jenis_kelamin, tempat_lahir, tanggal_lahir, pendidikan_terakhir, nama_sekolah, kejuruan, nomor_hp, email, aktivitas_saat_ini, status) VALUES ('$id_gelombang', '$id_jurusan', '$nama_lengkap', '$nik', '$kartu_keluarga', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$pendidikan_terakhir', '$nama_sekolah', '$kejuruan', '$nomor_hp', '$email', '$aktivitas_saat_ini', '$status')");
    // print_r($queryInsertSiswa);
    // die;

    if ($queryInsertSiswa) {
        header('location: peserta.php?success-insert-data');
    } else {
        header('location: peserta.php?failed-insert-data');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'inc/head.php' ?>
</head>

<body class="bg-secondary">
    <div class="container">
        <div class="card mt-5 rounded-3 shadow">
            <div class="card-body d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/logo.png" alt="logo ppkd">
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <h1>Pusat Pelatihan Kerja Daerah Jakarta Pusat</h1>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <img src="img/logo.png" alt="logo ppkd">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card rounded-3 shadow">
                    <div class="card-body">
                        <div class="menu p-3">
                            <ul>
                                <li class="fs-4 mb-3"><a href="#beranda">Beranda</a></li>
                                <li class="fs-4 mb-3"><a href="#program">Program PPKD</a></li>
                                <li class="fs-4 mb-3"><a href="#identitas">Identitas diri</a></li>
                                <li class="fs-4 mb-3"><a href="#pendidikan">Pendidikan</a></li>
                                <li class="fs-4 mb-3"><a href="#Aktivitas">Aktivitas</a></li>
                                <li class="fs-4 mb-3"><a href="#Alamat">Alamat</a></li>
                                <li class="fs-4 mb-3"><a href="#Upload">Upload File</a></li>
                                <li class="fs-4 mb-3"><a href="#Persetujuan">Persetujuan & Lainnya</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card rounded-3 shadow">
                    <div class="card-body">
                        <div class="header">
                            <h1>Program PPKD</h1>
                        </div>
                        <!-- gelombang -->
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Gelombang</label>
                                <select name="id_gelombang" id="" class="form-control rounded-3">
                                    <option value="Pilih Gelombang"></option>
                                    <?php while ($dataGelombang = mysqli_fetch_assoc($queryGelombang)) : ?>
                                        <option value="<?= $dataGelombang['id'] ?>"><?= $dataGelombang['nama_gelombang'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <!-- jurusan -->
                            <div class="mb-3">
                                <label for="" class="form-label">Jurusan</label>
                                <select name="id_jurusan" id="" class="form-control rounded-3">
                                    <option value="Pilih Gelombang"></option>
                                    <?php while ($dataJurusan = mysqli_fetch_assoc($queryJurusan)) : ?>
                                        <option value="<?= $dataJurusan['id'] ?>"><?= $dataJurusan['nama_jurusan'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <!-- biodata -->
                            <div class="mb-3">
                                <label for="" class="form-label">Biodata</label>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">nik</label>
                                    <input type="text" name="nik" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kartu Keluarga</label>
                                    <input type="text" name="kartu_keluarga" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="" class="form-control">
                                        <option value="laki-laki" name="jenis_kelamin">Laki-laki</option>
                                        <option value="perempuan" name="jenis_kelamin">perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" name="pendidikan_terakhir" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Sekolah</label>
                                    <input type="text" name="nama_sekolah" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Kejuruan</label>
                                    <input type="text" name="kejuruan" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No hp</label>
                                    <input type="text" name="nomor_hp" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Aktivitas saat ini</label>
                                    <div class="mb-3">
                                        <input type="radio" name="aktivitas_saat_ini" value="sedang kuliah">
                                        <label for="">Sedang Kuliah</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="radio" name="aktivitas_saat_ini" value="Tidak sedang kuliah">
                                        <label for="">Tidak sedang kuliah / menganggur</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="radio" name="aktivitas_saat_ini" value="Mencari Kerja">
                                        <label for="">Mencari Kerja</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Status</label>
                                    <input type="text" class="form-control" name="status">
                                </div>
                                <div class="btn-cta">
                                    <button class="btn btn-primary" type="submit" name="kirim">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>