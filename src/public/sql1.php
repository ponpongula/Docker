<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=tq_quest; charset=utf8", $dbUserName, $dbPassword);

$sql = "SELECT * FROM incomes";
$statement = $pdo->prepare($sql);
$statement->execute();
$incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($incomes);

$sql = "SELECT * FROM spendings";
$statement = $pdo->prepare($sql);
$statement->execute();
$spendings = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($spendings);

$sql = "SELECT * FROM categories";
$statement = $pdo->prepare($sql);
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($categories);
?>