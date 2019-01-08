<?php

$conn = new mysqli("localhost", "root", "", "vue");
if($conn->connect_error){
	die("Could not connect to database!");
}

$res = array('error' => false);

$action = 'read';

if(isset($_GET['action'])){
	$action = $_GET['action'];
}


if($action == 'read'){
	$result = $conn->query("SELECT * FROM `users`");
	$users = array();

	while($row = $result->fetch_assoc()){
		array_push($users, $row);
	}

	$res['users'] = $users;
}

if($action == 'create'){

	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tanggal = $_POST['tanggal'];
	$jk = $_POST['jk'];
	$idKaryawan = $_POST['idKaryawan'];

	$result = $conn->query("INSERT INTO `users` (`nama`, `alamat`, `tanggal`, `jk`, `idKaryawan`) VALUES ('$nama', '$alamat', '$tanggal', '$jk', '$idKaryawan') ");
	
	if($result){
		$res['message'] = "Berhasil Ditambahkan";
	} else{
		$res['error'] = true;
		$res['message'] = "Gagal Ditambahkan";
	}
}

if($action == 'update'){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tanggal = $_POST['tanggal'];
	$jk = $_POST['jk'];
	$idKaryawan = $_POST['idKaryawan'];
	$result = $conn->query("UPDATE `users` SET `nama` = '$nama', `alamat` = '$alamat', `tanggal` = '$tanggal', `jk` = '$jk', `idKaryawan` = '$idKaryawan' WHERE `id` = '$id'");
	
	if($result){
		$res['message'] = "Berhasil Diubah";
	} else{
		$res['error'] = true;
		$res['message'] = "Gagal Diubah";
	}

}

if($action == 'delete'){
	$id = $_POST['id'];
	

	$result = $conn->query("DELETE FROM `users` WHERE `id` = '$id'");
	
	if($result){
		$res['message'] = "Berhasil Dihapus";
	} else{
		$res['error'] = true;
		$res['message'] = "Gagal Dihapus";
	}

}


$conn->close();

header("Content-type: application/json");
echo json_encode($res);
die();