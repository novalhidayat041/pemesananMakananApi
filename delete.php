<?php

include "db/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	parse_str(file_get_contents("php://input"), $_DELETE);

	foreach ($_DELETE as $key => $value) {
		unset($_DELETE[$key]);

		$_DELETE[str_replace('amp;', '', $key)] = $value;
	}

	$_REQUEST = array_merge($_REQUEST, $_DELETE);
}

$id = $_DELETE["id"];

$query = "DELETE FROM categories WHERE id = ?";

if ($stmt = $con->prepare($query)) {
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$stmt->close();
}

echo "data berhasil dihapus";

// EOF