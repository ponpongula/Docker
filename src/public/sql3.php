<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM spendings";
$statement = $pdo->prepare($sql);
$statement->execute();
$spendings = $statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($spendings);
echo "1月の支出";
echo "<br>";
foreach ($spendings as $value) {
  if (preg_match("/2022-01/", $value['accrual_date'])){
    echo $value['name'].":". $value['amount'];
    echo "<br>";
  }
}

echo "<br>";
echo "2月の支出";
echo "<br>";
foreach ($spendings as $value) {
  if (preg_match("/2022-02/", $value['accrual_date'])){
    echo $value['name'].":". $value['amount'];
    echo "<br>";
  }
}

echo "<br>";
echo "3月の支出";
echo "<br>";
foreach ($spendings as $value) {
  if (preg_match("/2022-03/", $value['accrual_date'])){
    echo $value['name'].":". $value['amount'];
    echo "<br>";
  }
}

echo "<br>";
echo "日付順にsortして支出を一覧表示";
foreach($spendings as $key => $row) {
  $date[$key] = $row["accrual_date"];
}
array_multisort($date, SORT_ASC, $spendings);

foreach($spendings as $sort) {
    echo $sort['name'].":". $sort['amount'];
    echo "<br>";
}

echo "<br>";
echo "支出の高い順";
foreach($spendings as $key => $row) {
  $date[$key] = $row["amount"];
}
array_multisort($date, SORT_DESC, $spendings);
foreach($spendings as $sort) {
  echo $sort['amount'];
  echo "<br>";
}

echo "<br>";
echo "支出の低い順";
foreach($spendings as $key => $row) {
  $date[$key] = $row["amount"];
}
array_multisort($date, SORT_ASC, $spendings);
foreach($spendings as $sort) {
  echo $sort['amount'];
  echo "<br>";
}
?>