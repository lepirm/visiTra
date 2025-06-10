<?php
$servername = "localhost";
$username = "root"; // Vaše korisničko ime za bazu podataka
$password = ""; // Vaša lozinka za bazu podataka
$dbname = "travnikturizam"; // Ime vaše baze podataka

// Kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjeri konekciju
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['Username'];
$password = $_POST['Password'];

$sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Novi zapis je uspješno dodan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>