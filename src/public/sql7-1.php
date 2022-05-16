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

echo "「通信料」カテゴリーの支出一覧表示してみてください" . "<br>";
foreach ($spendings as $value) {
  if (preg_match("/ネット/", $value['name'])) {
    echo $value['accrual_date'] . "に支払ったネット料金:" . $value['amount'] . "<br>";
  } elseif (preg_match("/携帯/", $value['name'])) {
    echo $value['accrual_date'] . "に支払った携帯料金:" . $value['amount'] . "<br>";
  }
}
?>