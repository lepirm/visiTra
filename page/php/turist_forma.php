<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travnikturizam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $odakle_dolazite = $_POST["odakle_dolazite"];
    $vrijeme_raspolaganja = $_POST["vrijeme_raspolaganja"];
    $sta_zelite = $_POST["sta_zelite"];

    $sql = "INSERT INTO turist (odakle_dolazite, vrijeme_raspolaganja, sta_zelite)
            VALUES ('$odakle_dolazite', '$vrijeme_raspolaganja', '$sta_zelite')";

    if ($conn->query($sql) === TRUE) {
        echo "Podaci uspješno uneseni.";
    } else {
        echo "Greška pri unosu podataka: " . $conn->error;
    }
}

$conn->close();
?>