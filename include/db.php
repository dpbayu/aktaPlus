<?php
$servername = "localhost";
$database = "e-note";
$username = "root";
$password = "";
$db = mysqli_connect($servername, $username, $password, $database); // membuat koneksi
// mengecek koneksi
if (!$db) {
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>