<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM sample1";
$statement = $pdo->prepare($sql);
$statement->execute();
$sample1 = $statement->fetchAll(PDO::FETCH_ASSOC);
$num = 0;
foreach ($sample1 as $valeu) {
  $num += $valeu['apple_num'];
}

var_dump($num);

?> 