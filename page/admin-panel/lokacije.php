<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablice</title>
    <link rel="stylesheet" href="style.css">
    <style>
         .flex-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .grid-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .centered-table {
            margin: 0 auto;
            text-align: center;
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
        .actions {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }

        .action-column {
            text-align: center;
        }

        .action-column button {
            margin: 5px;
            padding: 8px;
        }
    </style>
</head>
<body>
<a href="#" onclick="window.history.back(); return false;" style="padding: 15px; margin-top: 15px;">Nazad</a>
<button>Dodaj Lokaciju</button>
    <div class="flex-container">
        <div class="grid-container">
        <div class="grid-item">
            <h2>Kulturna Bastina</h2>
            <table>
                <tr>
                    <th>Naziv</th>
                    <th>Lokacija</th>
                    <th>Akcije</th>
                </tr>
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
                $sql = "SELECT * FROM kulturnabastina";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Naziv_Bastine"]. "</td><td>" . $row["Lokacija_Bastine"]. "</td>
                        <td class='action-column'>
                        <button>Uredi</button>
                        <button>Izbrisi</button>
                        </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nema rezultata</td></tr>";
                }
                ?>
            </table>
        </div>
        <div class="grid-item">
            <h2>Restorani</h2>
            <table>
                <tr>
                    <th>Naziv</th>
                    <th>Lokacija</th>
                    <th>Akcije</th>
                </tr>
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
                $sql = "SELECT * FROM restorani";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Naziv_Restorana"]. "</td><td>" . $row["Lokacija_Restorana"]. "</td>
                        <td class='action-column'>
                        <button>Uredi</button>
                        <button>Izbrisi</button>
                        </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nema rezultata</td></tr>";
                }
                ?>
            </table>
        </div>
        </div>
        <div class="centered-table">
            <h2>Vjerske Ustanove</h2>
            <table class="grid-item">
                <tr>
                    <th>Naziv</th>
                    <th>Lokacija</th>
                    <th>Akcije</th>
                </tr>
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
                $sql = "SELECT * FROM vjerskegradjevine";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["Naziv_Gradjevine"]. "</td><td>" . $row["Lokacija_Gradjevine"]. "</td>
                        <td class='action-column'>
                        <button>Uredi</button>
                        <button>Izbrisi</button>
                        </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Nema rezultata</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>