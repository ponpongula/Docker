<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);

$dataSort = new DataSort($incomes);
echo $dataSort->aprilTotal() . "<br>";
echo $dataSort->mayTotal() . "<br>";
echo $dataSort->juneTotal() . "<br>";
echo "<br>";
echo "月順にsortして月ごとの収入の合計を一覧表示" . "<br>";
foreach ($dataSort->monthsSort() as $key => $value) {
  echo $key . "月：" . $value . "<br>"; 
}




class DataSort
{
  private $incomes;

  public function __construct(array $incomes)
  {
    $this->incomes = $incomes;
  }

  public function aprilTotal(): string
  {
    $sum = 0;
    foreach ($this->incomes as $value) {
      if (preg_match("/2022-04/", $value['accrual_date'])){
        $sum += $value['amount'];
      }
    }
    return "4月の収入の合計：". $sum;
  }

  public function maytotal(): string
  {
    $sum = 0;
    foreach ($this->incomes as $value) {
      if (preg_match("/2022-05/", $value['accrual_date'])){
        $sum += $value['amount'];
      }
    }
    return "5月の収入の合計：". $sum;
  }

  public function juneTotal(): string
  {
    $sum = 0;
    foreach ($this->incomes as $value) {
      if (preg_match("/2022-06/", $value['accrual_date'])){
        $sum += $value['amount'];
      }
    }
    return "6月の収入の合計：". $sum;
  }
  public function monthsSort(): array
  { 
    $result = [];
    foreach ($this->incomes as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
    }
    return $result;
  }
}
?>
