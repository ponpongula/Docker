<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);

$data_sort = new datasort($incomes);
echo $data_sort->apriltotal() . "<br>";
echo $data_sort->maytotal() . "<br>";
echo $data_sort->junetotal() . "<br>";
echo "<br>";
echo "月順にsortして月ごとの収入の合計を一覧表示" . "<br>";
foreach($data_sort->months_sort() as $key=>$value){
  echo $key . "月：" . $value . "<br>"; 
}


class datasort
{
  private $incomes;

  public function __construct(array $incomes)
  {
    $this->incomes = $incomes;
  }

  public function apriltotal(): string
  {
    $sum = 0;
    foreach($this->incomes as $value) {
      if (preg_match("/2022-04/", $value['accrual_date'])){
        $sum += $value['amount'];
      }
    }
    return "4月の収入の合計：". $sum;
  }

  public function  maytotal(): string
  {
    $sum = 0;
    foreach($this->incomes as $value) {
      if (preg_match("/2022-05/", $value['accrual_date'])){
        $sum += $value['amount'];
      }
    }
    return "5月の収入の合計：". $sum;
  }

  public function  june_total(): string
  {
    $sum = 0;
    foreach($this->incomes as $value) {
      if (preg_match("/2022-06/", $value['accrual_date'])){
        $sum += $value['amount'];
      }
    }
    return "6月の収入の合計：". $sum;
  }
  public function monthssort(): array
  { 
    $result = [
    ];
    foreach($this->incomes as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
    }
    return $result;
  }
}
?>
