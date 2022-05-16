<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM sample4";
$statement = $pdo->prepare($sql);
$statement->execute();
$sample4 = $statement->fetchAll(PDO::FETCH_ASSOC);
$num = 0;
foreach ($sample4 as $value) {
  $num += $value['peach_num'];
}

var_dump($num);

?> 