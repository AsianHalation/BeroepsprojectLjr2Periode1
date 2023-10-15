<?php
$host = 'localhost:3307';
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

    if (empty($_POST['Naam']) || empty($_POST['Adres'])){
        echo "Vul alstublieft alle velden in";
    } else {

        $Naam = $_POST["Naam"];
        $Adres = $_POST["Adres"];

        $sql = "INSERT INTO Bestellingen (BestellingID, ProductenID, KlantenID, Naam, Adres) VALUES (NULL, NULL, NULL, :Naam, :Adres)";

        $stmt= $pdo->prepare($sql);

        $data = [
        'Naam' => $Naam,
        'Adres' => $Adres,
        ];
        $stmt->execute($data);
        echo "Bestelling succesvol!" . "<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <span style="color:orange"> <h2>Plaats uw bestelling</h2> </span>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="Naam" required>
            </div>
            <div class="form-group">
                <label for="adres">Adres:</label>
                <input type="text" id="adres" name="Adres" required>
            </div>
            <button type="submit" class="submit-button">Bestelling plaatsen</button>
        </form>
    </div>
</body>
</html>