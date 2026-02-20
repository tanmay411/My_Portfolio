<?php

$name = $_POST["name"] ?? null;
$phone = $_POST["phone"] ?? null;
$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;
$confirm_password = $_POST["confirm_password"] ?? null;
$tnc = $_POST["tnc"] ?? null;

if ($name === null || $name == ""):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['name'] = "invalid name";
endif;

if ($phone === null || $phone == ""):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['phone'] = "invalid phone";
endif;

if ($email === null || $email == ""):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['email'] = "invalid email";
endif;

if ($password === null || $password == ""):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['password'] = "invalid password";
endif;

if ($confirm_password === null || $confirm_password == ""):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['confirm_password'] = "invalid confirm_password";
elseif ($confirm_password !== $password):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['confirm_password'] = "password confirm_password do not match";
endif;

if ($tnc === null || $tnc !== 'on'):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['tnc'] = "accept tnc";
endif;

session_write_close();
session_start();

if ($_SESSION['error']['register']['status'] === true) {
    header("Location: http://newpro.test/newPro/register-now");
    exit;
}

use App\Bin\Db;
$pdo = (new Db())->getDB();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
$emailExists = $stmt->fetchColumn() > 0;

$stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE phone = :phone");
$stmt->execute(['phone' => $phone]);
$phoneExists = $stmt->fetchColumn() > 0;

if ($phoneExists):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['phone'] = " phone already exist";
endif;

if ($emailExists):
    $_SESSION['error']['register']['status'] = true;
    $_SESSION['error']['register']['email'] = "email already exist";
endif;

session_write_close();
session_start();

if ($_SESSION['error']['register']['status'] === true) {
    header("Location: http://newpro.test/newPro/register-now");
    exit;
}



$sql = "INSERT INTO users (name, email, phone, password) 
            VALUES (:name, :email, :phone, :password)";
$stmt = $pdo->prepare($sql);

// Example data
$data = [
    'name' => $_POST["name"],
    'email' => $_POST["email"],
    'phone' => $_POST["phone"],
    'password' => $_POST["password"]
];

// Execute the statement
$stmt->execute($data);

echo "You are regsitered";
