<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "project_iot_vokasi";

$koneksi = mysqli_connect("localhost", "root", "", "project_iot_vokasi");

if (mysqli_connect_error()) {
    echo "Koneksi gagal " . mysqli_connect();
}
?>
