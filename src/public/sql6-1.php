<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
$monthSort = new MonthSort($incomes);
echo "前月の収入都の差分を一覧表示してください" . "<br>";
foreach ($monthSort->monthlySummary() as $value) {
  $value1[] = $value;
}

for ($i = 0; $i <= 10; $i++) {
  $answer[] = $value1[$i] -= $value1[$i + 1];
  echo ($i + 1) . "月と" . ($i + 2) . "月の差分:" . abs($answer[$i]) . "円" . "<br>";
}

class MonthSort
{
  private $incomes;

  public function __construct(array $incomes)
  {
    $this->incomes = $incomes;
  }

  public function monthlySummary(): array
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