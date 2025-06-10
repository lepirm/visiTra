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

// Dohvatite trenutni datum
$datum = date("Y-m-d");

// Provjerite je li već unesen posjet za današnji datum
$sql = "SELECT * FROM posjete WHERE Datum = '$datum'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ako je posjet već unesen za današnji datum, povećajte broj posjeta
    $row = $result->fetch_assoc();
    $novi_broj_posjeta = $row['Broj_posjeta'] + 1;

    $sql = "UPDATE posjete SET Broj_posjeta = $novi_broj_posjeta WHERE Datum = '$datum'";
    $conn->query($sql);
} else {
    // Ako još nije unesen posjet za današnji datum, unesite ga
    $sql = "INSERT INTO posjete (Datum, Broj_posjeta) VALUES ('$datum', 1)";
    $conn->query($sql);
}

$conn->close();
?>