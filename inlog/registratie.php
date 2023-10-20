<!DOCTYPE html>
<html>
    <head>
        <title>Registratie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="registratie.css">
    </head>

    <?php
    include "../Database/database.php";

    if (isset($_POST["registreer"])) {
        $sql = "INSERT INTO `klanten` (`Naam`, `Email`, `Wachtwoord`)
                VALUES (:Naam, :Email, :Wachtwoord)";
                $stmt = $pdo->prepare($sql);
                
                $data = [
                    "Naam" => $_POST['Naam'],
                    "Email" => $_POST['Email'],
                    "Wachtwoord" => $_POST['Wachtwoord'],
                ];
                $stmt->execute($data);
                header("Location:../hoofdpagina/hoofdpagina.html"); 
            }                 
           
        ?>


    <body>
        <div class="container">

            <h2>Gebruiker Registratie</h2>

            <form method="POST">
                <div class="inputs">
                    <label for="Naam">Naam:</label>
                    <input type="text" id="naam" name="Naam" required>

                    <label for="Email">E-mail:</label>
                    <input type="text" id="email" name="Email" required>

                    <label for="Wachtwoord">Wachtwoord:</label>
                    <input type="password" id="wachtwoord" name="Wachtwoord" required>

                    <input type="submit" name="registreer" value="Registreer">
                    <p>Al geregistreerd? <a href="login.html">Inloggen</a></p>
                </div>
            </form>
        </div>

        
    </body>
</html>