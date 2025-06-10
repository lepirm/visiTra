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
?>