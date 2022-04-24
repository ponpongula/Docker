<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);

$data_sort = new data_sort($incomes);
echo $data_sort->april_total() . "<br>";
echo $data_sort->may_total() . "<br>";
echo $data_sort->june_total() . "<br>";
echo "<br>";
echo "月順にsortして月ごとの収入の合計を一覧表示" . "<br>";
foreach($data_sort->months_sort() as $key=>$value){
  echo $key . "月：" . $value . "<br>"; 
}


// print_r($incomes);
// print_r(explode("-", $incomes["accrual_date"]))."<br>";
// var_dump();
// var_dump($incomes["accrual_date"]);
// foreach($incomes as $key => $row) {
//   print_r($date[$key] = $row["accrual_date"]);
// }
// array_multisort($date, SORT_ASC, $incomes);
// $result = [
//   "01" =>0,
//   "02" =>0,
//   "03" =>0,
//   "04" =>0,
//   "05" =>0,
//   "06" =>0,
//   "07" =>0,
//   "08" =>0,
//   "09" =>0,
//   "10" =>0,
//   "11" =>0,
//   "12" =>0
// ];
// foreach($incomes as $value) {
//   [$year, $months, $date] = explode("-", $value['accrual_date']);
//   $result[$months] += $value['amount'];
// }
// foreach($result as $key => $value) {
//   echo $key . "月：" . $value; 
//   echo "<br>";
// }

class data_sort
{
  private $incomes;

  public function __construct(array $incomes)
  {
    $this->incomes = $incomes;
  }

  public function april_total(): string
  {
    $sum = 0;
    foreach($this->incomes as $value) {
      if (preg_match("/2022-04/", $value['accrual_date'])){
        $sum += $value['amount'];
      }
    }
    return "4月の収入の合計：". $sum;
  }

  public function  may_total(): string
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
  public function months_sort(): array
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
    return $result;
  }
}
?>