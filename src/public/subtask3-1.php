<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM sample1";
$statement = $pdo->prepare($sql);
$statement->execute();
$sample1 = $statement->fetchAll(PDO::FETCH_ASSOC);

$result = [];
foreach ($sample1 as $value) {
  $result[] += $value['apple_num'];
}

rsort($result);

var_dump($result);

?>  