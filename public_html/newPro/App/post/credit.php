<?php

$amount = $_POST["amount"] ?? null;
$remark = $_POST["remark"] ?? null;


if ($amount === null || $amount == ""):
    $_SESSION['error']['credit']['status'] = true;
    $_SESSION['error']['credit']['amount'] = "cannot be null";
endif;


session_write_close();
session_start();

if ($_SESSION['error']['credit']['status'] === true) {
    header("Location: http://newpro.test/newPro/credit");
    exit;
}

use App\Bin\Db;
$pdo = (new Db())->getDB();
$sql = "SELECT current_balance FROM users WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_SESSION['sso']['login']['id']]);

$results = $stmt->fetch();
$current_balance = $results["current_balance"];
$new_balance = $current_balance + $amount;

$sql = "INSERT INTO transactions (user_id, type, amount, new_balance, remark)
VALUES (:id, 'credit', :amount, :new_balance, :remark);";
$stmt = $pdo->prepare($sql);

// Example data
$data = [
    'id' => $_SESSION['sso']['login']['id'],
    'amount' => $amount,
    'new_balance' => $new_balance,
    'remark' => $remark
];

// Execute the statement
$stmt->execute($data);


$sql = "UPDATE users SET current_balance = :new_balance where id = :id";
$stmt = $pdo->prepare($sql);

// Example data
$data = [
    'id' => $_SESSION['sso']['login']['id'],
    'new_balance' => $new_balance
];

// Execute the statement
$stmt->execute($data);

echo "You are credited";


