<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travnikturizam";

// Provjeri da li su podaci poslani metodom POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Stvori konekciju s bazom podataka
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Provjeri konekciju s bazom podataka
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Pripremi podatke za umetanje u bazu podataka i spriječi SQL injection
    $ime = $conn->real_escape_string($_POST['ime']);
    $gmail = $conn->real_escape_string($_POST['gmail']);
    $broj_telefona = $conn->real_escape_string($_POST['broj_telefona']);
    $problem = $conn->real_escape_string($_POST['problem']);
    $objasnjenje_problema = $conn->real_escape_string($_POST['objasnjenje_problema']);

    // Izvrši SQL upit za umetanje podataka
    $sql = "INSERT INTO problemi (Ime, Email, Broj_telefona, Problem, Objasnjenje) VALUES ('$ime', '$gmail', '$broj_telefona', '$problem', '$objasnjenje_problema')";

    if ($conn->query($sql) === TRUE) {
        header("Location: http://localhost/visitra/visitra.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Zatvori konekciju s bazom podataka
    $conn->close();
} else {
    // Ako podaci nisu poslani metodom POST, ispiši poruku
    echo "Invalid request!";
}
?>