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

if (!isset($_SESSION['error']['login'])):
    $_SESSION['error']['login']['status'] = false;
    $_SESSION['error']['login']['phone_or_email'] = false;
    $_SESSION['error']['login']['password'] = false;
endif;

?>

<body>
    <form action="" method="post">


        <label for="phone_or_email">Phone/Email</label>
        <input type="text" name="phone_or_email" id="phone_or_email">
        <?php
        if ($_SESSION['error']['login']['phone_or_email'] !== false):
            echo "<br> <small>" . $_SESSION['error']['login']['phone_or_email'] . "</small>";
        endif;
        ?>
        <br>

        <label for="password">password</label>
        <input type="text" name="password" id="password">
        <?php
        if ($_SESSION['error']['login']['password'] !== false):
            echo "<br> <small>" . $_SESSION['error']['login']['password'] . "</small>";
        endif;
        ?>
        <br>

        <input type="checkbox" name="remember" id="remember"> Remember me on this device
        <br>

        <input type="submit" value="Login Now">


    </form>
</body>

</html>
<?php


$_SESSION['error']['login']['status'] = false;
$_SESSION['error']['login']['phone_or_email'] = false;
$_SESSION['error']['login']['password'] = false;

?>