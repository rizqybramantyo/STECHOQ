
<?php
include "koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal = $_POST['tanggal'];
$id_karyawan = $_POST['id_karyawan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
mysql_query("INSERT INTO modal (nama,alamat,tanggal,id_karyawan,jenis_kelamin) VALUES ('$nama','$alamat','$tanggal','$id_karyawan','$jenis_kelamin')");
header('location:index.php');
?>