<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM spendings";
$statement = $pdo->prepare($sql);
$statement->execute();
$spendings = $statement->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categories";
$statement = $pdo->prepare($sql);
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($categories as $value) {
  if (preg_match("/交際費/", $value['name'])) {
     $entertainmentExpenses = $value;
  }
}

foreach ($spendings as $value) {
  if ($entertainmentExpenses['id'] == $value['category_id']) {
    echo $value['accrual_date'] . "に支払った" . $value['name']. "会料金:" . $value['amount'] . "<br>";
  }
}

?>