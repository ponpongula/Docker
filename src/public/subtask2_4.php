<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM users";
$statement = $pdo->prepare($sql);
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);


echo "課題4";
echo "<br>";
foreach ($users as $value) {
  if (5000 <= $value['money_in_possession']) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if (5000 > $value['money_in_possession']) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
echo "<br>";
foreach ($users as $value) {
  if ($value['money_in_possession'] % 2 == 0) {
    var_dump(array_slice($value, 1));
    echo "<br>";
  }
}
?> 