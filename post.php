<?php
include "db/db_connect.php";

$nama = $_POST["nama"];
$harga = $_POST["harga"];
$kuota = $_POST["kuota"];

$insert_query = "INSERT INTO categories (nama,harga,kuota) VALUES(?,?,?)";

if ($stmt = $con->prepare($insert_query)) {
	$stmt->bind_param('sss', $nama, $harga, $kuota);
	$stmt->execute();
	$stmt->close();
}