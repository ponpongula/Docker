<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);

$dataSort = new dataSort($incomes);
echo "収出の高い順にsortして月ごとの収入の合計を一覧表示" . "<br>";
foreach ($dataSort->revenueHighestFirst() as $key => $value){
  echo $key . "月：" . $value . "<br>"; 
}

echo  "<br>"; 

echo "収出の低い順にsortして月ごとの収入の合計を一覧表示" . "<br>";
foreach ($dataSort->revenueLowFirst() as $key => $value){
  echo $key . "月：" . $value . "<br>"; 
}

class dataSort
{
  private $incomes;

  public function __construct(array $incomes)
  {
    $this->incomes = $incomes;
  }

  public function revenueHighestFirst(): array
  { 
    $result = [];
    foreach ($this->incomes as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
    }
    arsort($result);
    return $result;
  }

  public function revenueLowFirst(): array
  { 
    $result = [];
    foreach ($this->incomes as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
    }
    asort($result);
    return $result;
  }
}
?>
