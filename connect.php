<?php
$connection = mysqli_connect("localhost", "drea", "kobayashi", "dorokuis");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>