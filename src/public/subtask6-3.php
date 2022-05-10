<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM sample3";
$statement = $pdo->prepare($sql);
$statement->execute();
$sample3 = $statement->fetchAll(PDO::FETCH_ASSOC);

$num = [];
foreach ($sample3 as $value) {
  $num[] = $value['orange_num'];
}

for ($i=0; $i<3; $i++) {
  $answer[] = $num[$i] -= $num[$i+1];
}
echo "id1とid2の差分:" . abs($answer[0]) . "<br>";
echo "id2とid3の差分:" . abs($answer[1]) . "<br>";
echo "id3とid4の差分:" . abs($answer[2]) . "<br>";

var_dump($answer);

?>