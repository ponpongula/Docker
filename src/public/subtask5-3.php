<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM sample3";
$statement = $pdo->prepare($sql);
$statement->execute();
$sample3 = $statement->fetchAll(PDO::FETCH_ASSOC);

$result = [];
foreach ($sample3 as $value) {
  if (! ($value['id'] % 2) == 0) {
    $result[] += $value['orange_num'];
   }
}

var_dump($result);

?>