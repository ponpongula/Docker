<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM sample5";
$statement = $pdo->prepare($sql);
$statement->execute();
$sample5 = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($sample5);

?>