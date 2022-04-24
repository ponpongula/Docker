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
// var_dump($data_sort->revenue_highest_first());
// print_r($data_sort->revenue_highest_first());
// foreach($data_sort->revenue_highest_first() as $key => $row){
//   $date[$key] = $row["amount"];
// }
// array_multisort($date, SORT_DESC, $data_sort->revenue_highest_first());
// foreach($data_sort->revenue_highest_first() as $sort) {
//   echo $sort['amount'] . "<br>";
// }

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
      "01" =>0,
      "02" =>0,
      "03" =>0,
      "04" =>0,
      "05" =>0,
      "06" =>0,
      "07" =>0,
      "08" =>0,
      "09" =>0,
      "10" =>0,
      "11" =>0,
      "12" =>0
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
      "01" =>0,
      "02" =>0,
      "03" =>0,
      "04" =>0,
      "05" =>0,
      "06" =>0,
      "07" =>0,
      "08" =>0,
      "09" =>0,
      "10" =>0,
      "11" =>0,
      "12" =>0
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