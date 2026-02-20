<?php

if (!$_SESSION['sso']['login']['status']) {
    echo "Kindly Login ";
    exit;
}

$_SESSION = array();

// If there's a session cookie, delete it
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),     // session cookie name
        '',                 // empty value
        time() - 42000,     // expired in the past
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}


session_destroy();

echo "You are successfully logged out";