<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM sample2";
$statement = $pdo->prepare($sql);
$statement->execute();
$sample2 = $statement->fetchAll(PDO::FETCH_ASSOC);

$num = [];
foreach ($sample2 as $value) {
  $num[] = $value['banana_num'];
}

for ($i = 0; $i < 3; $i++) {
  $answer[] = $num[$i] -= $num[$i+1];
  echo "id" . ($i+1) . "とid" . ($i+2) . "の差分:" . abs($answer[$i]) . "<br>";
}

var_dump($answer);

?>