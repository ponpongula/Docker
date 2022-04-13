<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
$num = 0;
foreach ($incomes as $value) {
  $num += $value['amount'];
}
echo "incomesテーブルのamountカラムの合計：". $num;
echo "<br>";

$sql = "SELECT * FROM spendings";
$statement = $pdo->prepare($sql);
$statement->execute();
$spendings = $statement->fetchAll(PDO::FETCH_ASSOC);
$sum = 0;
foreach ($spendings as $value) {
  $sum += $value['amount'];
}
echo "spendingsテーブルのamountカラムの合計：". $sum;
echo "<br>";
?>