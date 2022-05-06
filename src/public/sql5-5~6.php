<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM spendings";
$statement = $pdo->prepare($sql);
$statement->execute();
$spendings = $statement->fetchAll(PDO::FETCH_ASSOC);

$ConditionalProcessing = new ConditionalProcessing($spendings);
echo "支出の低い順sortして月ごとの支出の合計を一覧表示。ただし、支出日に5が含まれているときだけ100円引いてください。" . "<br>";
foreach ($ConditionalProcessing->revenueHighestFirst() as $key=>$value)
{
  echo $key . "月の支出の合計：" . $value . "<br>"; 
}
echo "<br>";
echo "支出の高い順sortして月ごとの支出の合計を一覧表示。ただし、支出日に5が含まれているときだけ3000円引いてください。" . "<br>";
foreach ($ConditionalProcessing->revenueLowFirst() as $key=>$value)
{
  echo $key . "月の支出の合計：" . $value . "<br>"; 
}

class ConditionalProcessing
{
  private $spendings;

  public function __construct(array $spendings)
  {
    $this->spendings = $spendings;
  }

  public function revenueHighestFirst(): array
  { 
    $result = [];
    foreach ($this->spendings as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
      if (preg_match("/5/", $date)) {
        $result[$months] -= 100;
        }
    }
    arsort($result);
    return $result;
  }

  public function revenueLowFirst(): array
  { 
    $result = [];
    foreach ($this->spendings as $value) {
      [$year, $months, $date] = explode("-", $value['accrual_date']);
      $result[$months] += $value['amount'];
      if (preg_match("/5/", $date)) {
        $result[$months] -= 3000;
        }
    }
    asort($result);
    return $result;
  }
}


?>
