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

echo "「住宅費」カテゴリーの支出一覧表示してみてください" . "<br>";
foreach ($spendings as $value) {
  if(preg_match("/家賃/", $value['name'])) {
    echo $value['accrual_date'] . "に支払った家賃料金:" . $value['amount'] . "<br>";
  } elseif (preg_match("/駐車場/", $value['name'])) {
    echo $value['accrual_date'] . "に支払った駐車場料金:" . $value['amount'] . "<br>";
  }
}
?>