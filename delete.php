<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
    }
} catch (PDOException $e) {
    $e->getMessage();
}

$sql = "DELETE FROM DureAuto 
        WHERE Id = :Id;";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    echo "het record is succesvol verwijderd";
    header('Refresh:2.5; url=index.php');
} else {
    echo "Het is record is niet verwijderd";
}
