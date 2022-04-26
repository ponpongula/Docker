<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);

$data_sort = new data_sort($incomes);
echo "収出の高い順にsortして月ごとの収入の合計を一覧表示" . "<br>";
foreach($data_sort->revenue_highest_first() as $key => $value){
  echo $key . "月：" . $value . "<br>"; 
}

echo  "<br>"; 

echo "収出の低い順にsortして月ごとの収入の合計を一覧表示" . "<br>";
foreach($data_sort->revenue_low_first() as $key => $value){
  echo $key . "月：" . $value . "<br>"; 
}

class data_sort
{
  private $incomes;

  public function __construct(array $incomes)
  {
    $this->incomes = $incomes;
  }

  public function revenue_highest_first(): array
  { 
    $result = [
    ];
    foreach($this->incomes as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
    }
    arsort($result);
    return $result;
  }

  public function revenue_low_first(): array
  { 
    $result = [
    ];
    foreach($this->incomes as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
    }
    asort($result);
    return $result;
  }
}
?>
