<?php 
include "db/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	parse_str(file_get_contents("php://input"), $_PUT);
	foreach ($PUT as $key => $value) {
		unset($PUT[$key]);

		$_PUT[str_replace('amp', '', $key)] = $value;

	}

	$_REQUEST = array_merge($_REQUEST, $PUT);
}

$id = $_PUT['id'];
$total = $_PUT['total'];

$query = "UPDATE makanan SET total = ? WHERE id = ? ";

if ($stmt = $connect->prepare($query)) {
	$stmt->bind_param('s',$total, $id);
	$stmt->execute();
	$stmt->close();
}

echo "data berhasil di ubah"


?>