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
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO ocjena (Komentar, Ocjena) VALUES ('$comment', $rating)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>