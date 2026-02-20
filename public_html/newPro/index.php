<?php
@session_start();

if (!isset($_SESSION['sso']['login']['status'])) {
    $_SESSION['sso']['login']['status'] = false;
}

session_write_close();
session_start();

require_once "autoload.php";

use App\App;

new App();