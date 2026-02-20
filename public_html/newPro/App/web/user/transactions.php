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

$sql = "SELECT * FROM transactions WHERE user_id=:id ORDER BY transaction_time ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_SESSION['sso']['login']['id']]);

$results = $stmt->fetchAll();

?>

<table border="1">
    <tr>
        <td>Transaction id</td>
        <td>Amount</td>
        <td>Type</td>
        <td>Date/Time</td>
        <td>Updated Balance</td>
        <td>Remark</td>
    </tr>

    <?php
    foreach ($results as $key => $transaction):
        ?>
        <tr>
            <td><?= $transaction["id"] ?></td>
            <td><?= $transaction["amount"] ?></td>
            <td style="color:white;background-color:<?php echo $transaction['type'] == 'credit' ? 'red' : 'green' ?>">
                <?= $transaction["type"] ?></td>
            <td><?= $transaction["transaction_time"] ?></td>
            <td><?= $transaction["new_balance"] ?></td>
            <td><?= $transaction["remark"] ?></td>
        </tr>
        <?php
    endforeach;
    ?>

</table>