<html>
    <head>
    <title>connectie</title>
</head>

<body>
    <?php

    include "../Database/database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $naam = $_POST['naam'];
      $email = $_POST['email'];
      $wachtwoord = $_POST['wachtwoord'];
      $conn->query(
          "INSERT INTO `klanten`(`naam`, `email`, `wachtwoord`) 
                                      VALUES ('$naam', '$email', $wachtwoord);"
      );

    }

    header("Location:../hoofdpagina/hoofdpagina.html");
    ?>

</body>

</html>