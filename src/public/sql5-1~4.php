<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM spendings";
$statement = $pdo->prepare($sql);
$statement->execute();
$spendings = $statement->fetchAll(PDO::FETCH_ASSOC);


$conditional_processing = new ConditionalProcessing($spendings);
echo $conditional_processing->julySpending() ."<br>";
echo $conditional_processing->augustSpending() ."<br>";
echo $conditional_processing->septemberSpending() ."<br>";
echo "<br>";
echo "月順にsortして月ごとの支出の合計を一覧表示。ただし、支出日に5が含まれているときだけ1500円引いてください。" . "<br>";
foreach ($conditional_processing->monthsSort() as $key=>$value) {
  echo $key . "月の支出の合計：" . $value . "<br>"; 
}


class ConditionalProcessing
{
  private $spendings;

  public function __construct(array $spendings)
  {
    $this->spendings = $spendings;
  }

  public function julySpending(): string
  {
    $num = 0;
    foreach ($this->spendings as $value) {
      if (preg_match("/2022-07/", $value['accrual_date'])) {
        $num += $value['amount'];
        [$year, $months, $date] = explode("-", $value["accrual_date"]);
       if (preg_match("/2/", $date)) {
        $num -= 1000;
        }
      }
    }
      return "7月の支出の合計:" . $num;
  }

  
  public function augustSpending(): string
  {
    $num = 0;
    foreach($this->spendings as $value) {
      if (preg_match("/2022-08/", $value['accrual_date'])) {
        $num += $value['amount'];
        [$year, $months, $date] = explode("-", $value["accrual_date"]);
       if (preg_match("/0/", $date)){
        $num -= 500;
        }
      }
    }
      return "8月の支出の合計:" . $num;
  }

  public function septemberSpending(): string
  {
    $num = 0;
    foreach ($this->spendings as $value) {
      if (preg_match("/2022-09/", $value['accrual_date'])) {
        $num += $value['amount'];
        [$year, $months, $date] = explode("-", $value["accrual_date"]);
       if (preg_match("/1/", $date)) {
        $num -= 2000;
        }
      }
    }
      return "9月の支出の合計:" . $num;
  }

  public function monthsSort(): array
  { 
    $result = [];
    foreach ($this->spendings as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
      if (preg_match("/5/", $date)) {
        $result[$months]  -= 1500;
        }
    }
    return $result;
  }
}
?>