<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM users";
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);


echo "課題1";
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/東京都/", $value['birth_place'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/北海道/", $value['birth_place'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/千葉県/", $value['birth_place'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
echo "課題2";
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/県/", $value['birth_place'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/府/", $value['birth_place'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/山/", $value['birth_place'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
echo "課題３";
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/田/", $value['name'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/本/", $value['name'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if (preg_match("/川/", $value['name'])) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
?> 