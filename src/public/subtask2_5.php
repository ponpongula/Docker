<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM users";
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<br>";
echo "課題5";
echo "1" . "<br>";
foreach ($users as $value) {
  if (preg_match("/東京都/", $value['birth_place']) and 5000 <= $value['money_in_possession']) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}

echo "2" . "<br>";
foreach ($users as $value) {
  if (preg_match("/東京都/", $value['birth_place']) and 5000 > $value['money_in_possession']) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}

echo "3" . "<br>";
foreach ($users as $value) {
  if (preg_match("/県/", $value['birth_place']) and $value['money_in_possession'] % 2 == 0) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}

echo "4" . "<br>";
foreach ($users as $value) {
  if (preg_match("/県/", $value['birth_place'])) {
    continue;
  } elseif ($value['money_in_possession'] & 1) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
//４の該当者はいませんでした

echo "5" . "<br>";
foreach ($users as $value) {
  if (preg_match("/田/", $value['name']) and $value['money_in_possession'] % 2 == 0) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}

echo "6" . "<br>";
foreach ($users as $value) {
  if (preg_match("/田/", $value['name']) and $value['money_in_possession'] & 1) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
//６の該当者はいませんでした

echo "7" . "<br>";
foreach ($users as $value) {
  if (preg_match("/川/", $value['name']) and preg_match("/東京都/", $value['birth_place']) and 5000  <= $value['money_in_possession']) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  } 
}

echo "8" . "<br>";
foreach ($users as $value) {
  if (preg_match("/本/", $value['name']) and preg_match("/県/", $value['birth_place']) and  5000 > $value['money_in_possession']) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  } 
}

echo "9" . "<br>";
foreach ($users as $value) {
  if (preg_match("/県/" , $value['birth_place'])) {
    continue;
  } elseif ((preg_match("/藤/" , $value['name']) or preg_match("/山/" , $value['name']) or preg_match("/田/" , $value['name'])) and (5000 <= $value['money_in_possession'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}

echo "10" . "<br>";
foreach ($users as $value) {
  if ((preg_match("/川/" , $value['name']) or preg_match("/山/" , $value['name']) or preg_match("/村/" , $value['name'])) and (preg_match("/県/" , $value['birth_place']) or preg_match("/京/" , $value['birth_place'])) and (5000 <= $value['money_in_possession'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
?> 