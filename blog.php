<?php
date_default_timezone_set('Asia/Jakarta');
$koneksi = mysqli_connect('Localhost','root','','absen');

if (!$koneksi) {
	die("Koneksi Gagal".mysqli_connect_error());
}

$username = "codingasik";
$tanggal = date('d',"Y-m-d H:i:s");

$sql = "SELECT * FROM absen WHERE username = '$username' and date(tanggal) = '$tanggal' ";
$query = mysqli_query($koneksi,$sql);

$data = array();

while ($baris = mysqli_fetch_assoc($query)) {
    $data[] = $baris;
}

if (mysqli_num_rows($query) == 0) {
	echo $tanggal;
}else{
	echo json_encode($data);
}

?>
