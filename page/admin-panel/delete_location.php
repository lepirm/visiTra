<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travnikturizam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$columnName = $data->columnName;

// Check which table is being updated based on the columnName parameter
$tableName = "";
if ($columnName == "Naziv_Bastine" || $columnName == "Lokacija_Bastine") {
    $tableName = "kulturnabastina";
} elseif ($columnName == "Naziv_Restorana" || $columnName == "Lokacija_Restorana") {
    $tableName = "restorani";
} elseif ($columnName == "Naziv_Gradjevine" || $columnName == "Lokacija_Gradjevine") {
    $tableName = "vjerskegradjevine";
}

if ($tableName != "") {
    $sql = "DELETE FROM $tableName WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Record deleted successfully"));
    } else {
        echo json_encode(array("error" => "Error deleting record: " . $conn->error));
    }
} else {
    echo json_encode(array("error" => "Invalid column name"));
}

$conn->close();
?>