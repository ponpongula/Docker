<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
// print_r($incomes);
// var_dump($incomes);
$month_sort = new MonthSort($incomes);
echo "前月の収入都の差分を一覧表示してください" . "<br>";
foreach ($month_sort->monthSort() as $value)
{
  $value1[] = $value;
}
// print_r($value1);
// foreach ($value1 as $key=>$difference){
  for ($i=0; $i<=10; $i++){
      $answer[] = $value1[$i] -=$value1[$i+1];
    }
    // print_r($answer);
    echo "1月と2月の差分:" . abs($answer[0]) . "円" . "<br>";
    echo "2月と3月の差分:" . abs($answer[1]) . "円"  . "<br>";
    echo "3月と4月の差分:" . abs($answer[2]) . "円"  . "<br>";
    echo "4月と5月の差分:" . abs($answer[3]) . "円"  . "<br>";
    echo "5月と6月の差分:" . abs($answer[4]) . "円"  . "<br>";
    echo "6月と7月の差分:" . abs($answer[5]) . "円"  . "<br>";
    echo "7月と8月の差分:" . abs($answer[6]) . "円"  . "<br>";
    echo "8月と9月の差分:" . abs($answer[7]) . "円"  . "<br>";
    echo "9月と10月の差分:" . abs($answer[8]) . "円"  . "<br>";
    echo "10月と11月の差分:" . abs($answer[9]) . "円"  . "<br>";
    echo "11月と12月の差分:" . abs($answer[10]) . "円"  . "<br>";
    
class MonthSort
{
  private $incomes;

  public function __construct(array $incomes)
  {
    $this->incomes = $incomes;
  }

  public function monthSort(): array
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