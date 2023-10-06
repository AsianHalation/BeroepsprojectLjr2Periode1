<!DOCTYPE html>
<html>
    <head>
    <title>connectie</title>
</head>

<body>
    <?php

    include "../Database/database.php";
    $Naam =  ($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$Naam)) {
      $nameErr = "Only letters and white space allowed";
    }

    $Email = ($_POST["email"]);
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "ongeldige email adres";
    }
    $Wachtwoord = $_POST['wachtwoord'];

    if (isset($_GET['email']) && isset($_GET['Naam'])) {
        $Email = htmlspecialchars($_GET['email']);
    }
    $sql = "INSERT INTO klanten VALUES 
        ('$Naam', '$Email', '$Wachtwoord')";

    header("Location:../hoofdpagina/hoofdpagina.html");
    ?>

</body>

</html>