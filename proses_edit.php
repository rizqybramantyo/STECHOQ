<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
	include "koneksi.php";
	$modal_id=$_POST['modal_id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tanggal = $_POST['tanggal'];
	$id_karyawan = $_POST['id_karyawan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$modal=mysql_query("UPDATE modal SET nama = '$nama',alamat = '$alamat',tanggal ='$tanggal',id_karyawan = '$id_karyawan' ,jenis_kelamin = '$jenis_kelamin' WHERE modal_id = '$modal_id'");
	header('location:index.php');
?>