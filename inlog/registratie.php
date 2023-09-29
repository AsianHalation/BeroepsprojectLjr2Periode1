<?php
    $host = 'localhost:3307';
    $db   = 'Kledingwinkel';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $conn = new PDO($dsn, $user, $pass, $options);
    } catch (Exception $e) {
        die("Failed to open database connection, did you start it and configure the credentials properly?");
    }
?>

<html>
    <head>
        <title>Registratie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="registratie.css">
    </head>

    <body>
        <div class="container">

            <h2>Gebruiker Registratie</h2>

            <form action="registratie.php" method="post">
                <div class="inputs">
                    <label for="naam">Naam:</label>
                    <input type="text" id="naam" name="naam" required>
                </div>

                <div class="inputs">
                    <label for="e-mail">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="inputs">
                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" id="wachtwoord" name="wachtwoord" required>
                </div>

                <div class="inputs">
                    <input type="button" href="index.html" value="inloggen"><br>
                    <input type="submit" value="Registreer">
                </div>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $naam = $_POST['naam'];
                    $email = $_POST['email'];
                    $wachtwoord = $_POST['wachtwoord'];
                    $conn->query(
                        "INSERT INTO `Klanten`(`Naam`, `Email`, `Wachtwoord`) 
                        VALUES ('$naam', '$email', '$wachtwoord');"
                    );
                }
            ?>

        </div>
    </body>
</html>