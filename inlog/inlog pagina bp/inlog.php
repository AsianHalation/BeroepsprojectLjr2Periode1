<?php
$host = 'localhost:3308';
$db   = 'kledingwinkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gebruikersnaam = $_POST["gebruikersnaam"];
    $wachtwoord = $_POST["wachtwoord"];

    $juiste_gebruikersnaam = "gebruiker";
    $juist_wachtwoord = "wachtwoord";

    if ($gebruikersnaam === $juiste_gebruikersnaam && $wachtwoord === $juist_wachtwoord) {
        header("Location: welkom.php");
        exit();
    } else {
        $foutmelding = "Ongeldige inloggegevens. Probeer opnieuw.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <h2>Inloggen</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="gebruikersnaam">Gebruikersnaam:</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
            </div>
            <div class="form-group">
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="password" id="wachtwoord" name="wachtwoord" required>
            </div>
            <button type="submit" class="submit-button">Inloggen</button>
        </form>
        <?php
        if (isset($foutmelding)) {
            echo '<p style="color: red;">' . $foutmelding . '</p>';
        }
        ?>
    </div>
</body>
</html>