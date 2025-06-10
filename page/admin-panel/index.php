<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title> Admin Panel</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "travnikturizam_2"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$datum = date("Y-m-d");


$sql = "SELECT Broj_posjeta FROM posjete WHERE Datum = '$datum'";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $broj_posjeta = $row['Broj_posjeta'];
} else {
    $broj_posjeta = 0;
}

$conn->close();
?>

<style>
    .btn {
    text-decoration: none;
    color: #fff;
    padding: 10px;
    background-color: #F79F1F;
    border: 1px solid #ccc;
    border-radius: 8px;
    cursor: pointer;
}

    </style>
</head>
<body>

<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
            
            </label>
            Admin Panel
        </h2>

        <div id="nazad" style="display: inline; font: 1em sans-serif;">
            <h1><a href="#" onclick="window.history.back(); return false;" style="text-decoration: none; color:black">Odjava<i class="las la-sign-out-alt"></i></a></h1>
        </div>

        <div class="user-wrapper">
            <div>
                <h2 id="user"></h2>
                <small>Admin</small>
            </div>
        </div>
    </header>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    <h1><?php echo $broj_posjeta; ?></h1>
                    <span>Posjetioca danas</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h2>Lokacije u gradu</h2>
                    <button class="btn" onclick="window.location.href='lokacije.php'">Prikazi lokacije</button>
                </div>
                <div>
                    <span class="las la-clipboard-list"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h2>Korisnik feedback</h2>
                    <button class="btn" onclick="window.location.href='vidi_ocjene.php'">Prikazi</button>
                </div>
                <div>
                    <span class="las la-receipt"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h2>Admini</h2>
                    <button class="btn" onclick="window.location.href='registracija.php'">Dodaj admina</button>
                </div>
                <div>
                    <span class="las la-user"></span>
                </div>
            </div>
        </div>

    


        <div class="recent-grid">
            <div class="projects">
                <div class="card">
                <div class="card-header">
                    <h3>Trenutne aktivnosti</h3>
                    <button>Pogledaj više <span class="las la-arrow-right"></span></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Naziv</td>
                                <td>Organizacija</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Andrićevi dani</td>
                                <td>Općina Travnik</td>
                                <td>
                                    <span class="status orange"></span>
                                    Aktivno
                                </td>
                            </tr>
                            <tr>
                                <td>IT Reboot</td>
                                <td>Općina Travnik / CEM</td>
                                <td> <span class="status pink"></span>
                                Uskoro
                            </td>
                            </tr>
                            <tr>
                                <td>Dani dijaspore</td>
                                <td>Općina Travnik</td>
                                <td>
                                    <span class="status pink"></span>
                                    Uskoro
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
            <div class="customers">
                <div class="card">
                    <div class="card-header">
                        <h3>Novi turisti</h3>
                        <button>Pogledaj više <span class="las la-arrow-right"></span></button>
                    </div>
                    <div class="card-body">
                        <div class="customer">
                            <div class="info">
                                <img src="unnamed.jpg" width="40px" height="40px" alt="">
                                <div>
                                    <h3 id="user1"></h3>
                                    <small>Admin</small>
                                </div>
                            </div>
                            <div class="contact">
                                <span class="las la-user-circle"></span>
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>
                        </div>

                        
                    </div>
        </div>
       
    </main>
</div>
<script>
    //////////////////////////POZDRAV USER 

    const params = new URLSearchParams(window.location.search);
    const username = params.get('username');

    // Check if username is present in the URL
    if (username) {
        // Use the username in your HTML
        document.getElementById('user').innerHTML = `Hello, ${username}!`;
        document.getElementById('user1').innerHTML = `${username}`;
    } else {
        // Handle case where username is not present in URL
        document.getElementById('user').innerHTML = 'Username not found.';
    }

    /////////////////////////////NEW USER
    

</script>
</body>
</html>