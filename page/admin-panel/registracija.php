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
}

th {
    background-color: #f2f2f2;
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #F79F1F;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #F79F1F;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Popis korisnika</h1>
        <a href="#" onclick="window.history.back(); return false;">Nazad</a>
        <br><br>
        <table>
            <tr>
                <th>Korisničko ime</th>
                <th>Lozinka</th>
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

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Username"]. "</td><td>" . $row["Password"]. "</td></tr>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </table>
    </div>

    <div class="container">
        <h1>Registracija</h1>
        <form id="registrationForm">
            <label for="username">Korisničko ime:</label>
            <input type="text" id="username" name="username"><br>

            <label for="password">Lozinka:</label>
            <input type="password" id="password" name="password"><br>

            <input type="submit" value="Registriraj se">
        </form>
    </div>
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Slanje podataka na PHP skriptu
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            console.log(xhr.responseText); // Ovdje možete obraditi odgovor
        } else {
            console.error('Error:', xhr);
        }
    };
    xhr.send('username=' + username + '&password=' + password);
});
    </script>
</body>
</html>