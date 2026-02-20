<?php

if ($_SESSION['sso']['login']['status']) {
    echo "Your are already logged in ";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

if (!isset($_SESSION['error']['register'])):
    $_SESSION['error']['register']['status'] = false;
    $_SESSION['error']['register']['name'] = false;
    $_SESSION['error']['register']['phone'] = false;
    $_SESSION['error']['register']['email'] = false;
    $_SESSION['error']['register']['password'] = false;
    $_SESSION['error']['register']['confirm_password'] = false;
    $_SESSION['error']['register']['tnc'] = false;
endif;

?>

<body>
    <form action="" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name">
        <?php
        if ($_SESSION['error']['register']['name'] !== false):
            echo "<br> <small>" . $_SESSION['error']['register']['name'] . "</small>";
        endif;
        ?>
        <br>

        <label for="phone">phone</label>
        <input type="text" name="phone" id="phone">
        <?php
        if ($_SESSION['error']['register']['phone'] !== false):
            echo "<br> <small>" . $_SESSION['error']['register']['phone'] . "</small>";
        endif;
        ?>
        <br>

        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <?php
        if ($_SESSION['error']['register']['email'] !== false):
            echo "<br> <small>" . $_SESSION['error']['register']['email'] . "</small>";
        endif;
        ?>
        <br>

        <label for="password">password</label>
        <input type="text" name="password" id="password">
        <?php
        if ($_SESSION['error']['register']['password'] !== false):
            echo "<br> <small>" . $_SESSION['error']['register']['password'] . "</small>";
        endif;
        ?>
        <br>

        <label for="confirm_password">confirm_password</label>
        <input type="text" name="confirm_password" id="confirm_password">
        <?php
        if ($_SESSION['error']['register']['confirm_password'] !== false):
            echo "<br> <small>" . $_SESSION['error']['register']['confirm_password'] . "</small>";
        endif;
        ?>
        <br>

        <input type="checkbox" name="tnc" id="tnc"> I accept terms and conditions
        <?php
        if ($_SESSION['error']['register']['tnc'] !== false):
            echo "<br> <small>" . $_SESSION['error']['register']['tnc'] . "</small>";
        endif;
        ?>
        <br>

        <input type="submit" value="Register Now">


    </form>
</body>

</html>
<?php


$_SESSION['error']['register']['status'] = false;
$_SESSION['error']['register']['name'] = false;
$_SESSION['error']['register']['phone'] = false;
$_SESSION['error']['register']['email'] = false;
$_SESSION['error']['register']['password'] = false;
$_SESSION['error']['register']['confirm_password'] = false;
$_SESSION['error']['register']['tnc'] = false;

?>