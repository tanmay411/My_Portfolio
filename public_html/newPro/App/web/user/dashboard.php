<?php

if (!$_SESSION['sso']['login']['status']) {
    echo "Kindly Login ";
    exit;
}
use App\Bin\Db;
$pdo = (new Db())->getDB();
$sql = "SELECT name,current_balance FROM users WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_SESSION['sso']['login']['id']]);

$results = $stmt->fetch();
echo "Hello " . $results["name"];
echo "<br>Your Balance is " . $results["current_balance"];
