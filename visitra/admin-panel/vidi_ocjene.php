<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
    text-align: center;
    margin: 20px auto;
    max-width: 600px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
a, button {
            text-decoration: none;
            color: black;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
        a:hover, button:hover {
            background-color: #e0e0e0;
        }
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    justify-content: center;
    align-items:center;
    align-content:center;
}

th {
    background-color: #f2f2f2;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Prikaz ocjena</h1>
        <a href="#" onclick="window.history.back(); return false;">Nazad</a>
        <br><br>
        <table>
            <tr>
                <th>Ocjena</th>
                <th>Komentar</th>
                <th>Izbrisi</th>
            </tr>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "travnikturizam";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM ocjena";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Ocjena"]. "</td><td>" . $row["Komentar"]. "</td><td>
                        <button class='delete-button'>Izbriši</button></td>
                        </tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </table>
    </div>
    <div class="container">
        <h1>Korisnik support</h1>
        <br><br>
        <table>
            <tr>
                <th>Ime</th>
                <th>Email</th>
                <th>Broj telefona</th>
                <th>Problem</th>
                <th>Opis problema</th>
            </tr>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "travnikturizam";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM problemi";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Ime"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Broj_telefona"]. "</td>
                        <td>" . $row["Problem"]. "</td><td>" . $row["Objasnjenje"]. "</td>
                        </tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </table>
    </div>
    </body>
    </html>