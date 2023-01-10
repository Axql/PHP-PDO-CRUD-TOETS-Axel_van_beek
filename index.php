<?php
include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try
{
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo)
    {
       // echo "er is een verbinding!!!!";
    }
    else 
    {
        echo "er is een error";
    }
}
catch(PDOException $e)
{
    echo $e -> getMessage();
}


$sql = "SELECT Merk,Model,Topsnelheid,Prijs,id FROM DureAuto";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);

// var_dump($result);


// echo $result[0]->Voornaam;
$row = "";

foreach($result as $info)
{
    $row .= "<tr>
                <td>$info->Merk</td>
                <td>$info->Model</td>
                <td>$info->Topsnelheid</td>
                <td>$info->Prijs</td>
                <td>
                <a href='delete.php?Id=$info->id'>
                    <img src='img/b_drop.png' alt='cross'
                </td>
            </tr>";
}
?>
<h3>Autos</h3>
<a href="index.php">
    <input type="button" value="maak een nieuw record">
</a>
<table border="1">
    <thead>
        <th>Merk</th>
        <th>Model</th>
        <th>Topsnelheid</th>
        <th>Prijs</th>
        <th></th>
    </thead>
    <tbody>
           <?php echo $row ?>
    </tbody>
</table>
