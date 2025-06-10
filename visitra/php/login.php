<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travnikturizam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Izvršite upit za provjeru korisničkog imena i lozinke u bazi
  $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Ako je korisnik pronađen, preusmjerite ga na drugu stranicu
    header("Location: http://localhost/najnobija/admin-panel/index.php?username=$username&password=$password");
    exit();
  } else {
    echo "Pogrešno korisničko ime ili lozinka.";
  }
}

$conn->close();
?>