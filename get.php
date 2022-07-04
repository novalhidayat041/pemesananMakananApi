<?php
$response = array();
include 'db/db_connect.php';
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $query = "SELECT * FROM categories WHERE id = ?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            $temporal_data = array();

            $temporal_data["id"] = $row[0];
            $temporal_data["nama"] = $row[1];
            $temporal_data["harga"] = $row[2];
            $temporal_data["kuota"] = $row[3];

            array_push($data, $temporal_data);
        }

        echo json_encode($data);
    }
} else {
    $query = "SELECT * FROM categories";

    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            $temporal_data = array();

            $temporal_data["id"] = $row[0];
            $temporal_data["nama"] = $row[1];
            $temporal_data["harga"] = $row[2];
            $temporal_data["kuota"] = $row[3];

            array_push($data, $temporal_data);
        }

        echo json_encode($data);
    }
}