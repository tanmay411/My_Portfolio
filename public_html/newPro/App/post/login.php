<?php

$phone_or_email = $_POST["phone_or_email"] ?? null;
$password = $_POST["password"] ?? null;
$tnc = $_POST["remember"] ?? null;


if ($phone_or_email === null || $phone_or_email == ""):
    $_SESSION['error']['login']['status'] = true;
    $_SESSION['error']['login']['phone_or_email'] = "invalid credentials";
endif;


if ($password === null || $password == ""):
    $_SESSION['error']['login']['status'] = true;
    $_SESSION['error']['login']['password'] = "invalid password";
endif;


session_write_close();
session_start();

if ($_SESSION['error']['login']['status'] === true) {
    header("Location: http://newpro.test/newPro/login-now");
    exit;
}

use App\Bin\Db;
$pdo = (new Db())->getDB();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email OR phone = :phone");
$stmt->execute(['email' => $phone_or_email, 'phone' => $phone_or_email]);
$email_or_phone_Exists = $stmt->fetchColumn() > 0;


if (!$email_or_phone_Exists):
    $_SESSION['error']['login']['status'] = true;
    $_SESSION['error']['login']['phone_or_email'] = "invalid credentials not found";
endif;

session_write_close();
session_start();

if ($_SESSION['error']['login']['status'] === true) {
    header("Location: http://newpro.test/newPro/login-now");
    exit;
}

$sql = "SELECT id,password FROM users WHERE email = :email OR phone = :phone";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $phone_or_email, 'phone' => $phone_or_email]);

$results = $stmt->fetch();


if ($password !== $results["password"]):
    $_SESSION['error']['login']['status'] = true;
    $_SESSION['error']['login']['password'] = "invalid password not match";
endif;

session_write_close();
session_start();

if ($_SESSION['error']['login']['status'] === true) {
    header("Location: http://newpro.test/newPro/login-now");
    exit;
}

$_SESSION['sso']['login']['status'] = true;
$_SESSION['sso']['login']['id'] = $results['id'];


header("Location: http://newpro.test/newPro/dashboard");
exit;
