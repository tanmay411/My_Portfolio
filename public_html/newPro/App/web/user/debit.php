<?php

if (!$_SESSION['sso']['login']['status']) {
    echo "Kindly Login ";
    exit;
}



if (!isset($_SESSION['error']['debit'])):
    $_SESSION['error']['debit']['status'] = false;
    $_SESSION['error']['debit']['amount'] = false;
endif;




use App\Bin\Db;
$pdo = (new Db())->getDB();
$sql = "SELECT name,current_balance FROM users WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_SESSION['sso']['login']['id']]);

$results = $stmt->fetch();
echo "Hello " . $results["name"];
?>

<h3>CREDIT PAGE (INCOMEING MONEY)</h3>

<form action="" method="post">
    <label for="amount">Amount</label>
    <input type="text" name="amount" id="amount">
    <br>
    <label for="remark">remark</label>
    <input type="text" name="remark" id="remark">
    <input type="submit" value="debit Now">
</form>

<?php
$_SESSION['error']['debit']['status'] = false;
$_SESSION['error']['debit']['amount'] = false;
?>