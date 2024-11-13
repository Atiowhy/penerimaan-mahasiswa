<?php
// session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pendaftaran';

$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
    echo 'koneksi gagal';
}
