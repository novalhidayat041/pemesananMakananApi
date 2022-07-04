<?php

include "db/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	parse_str(file_get_contents("php://input"), $_PUT);

	foreach ($_PUT as $key => $value) {
		unset($_PUT[$key]);

		$_PUT[str_replace('amp;', '', $key)] = $value;
	}

	$_REQUEST = array_merge($_REQUEST, $_PUT);
}

$id = $_PUT["id"];
$nama = $_PUT["nama"];
$harga = $_PUT["harga"];
$kuota = $_PUT["kuota"];

$query = "UPDATE categories SET nama = ?, harga = ?, kuota = ? WHERE id = ?";

if ($stmt = $con->prepare($query)) {
	$stmt->bind_param("ssss", $nama, $harga, $kuota, $id);
	$stmt->execute();
	$stmt->close();
}

echo "data berhasil diubah";

// EOF