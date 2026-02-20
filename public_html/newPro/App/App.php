<?php

namespace App;

use App\Bin\Url;

class App
{
    public function __construct()
    {
        $url = (new Url())->getCurrentUrl();
        if ($_POST):
            $this->formLoad($url);
        else:
            $this->pageLoad($url);
        endif;
    }

    private function formLoad($url)
    {
        switch ($url):
            case "/register-now":
                require_once "post/register.php";
                break;
            case "/login-now":
                require_once "post/login.php";
                break;
            case "/credit":
                require_once "post/credit.php";
                break;
            case "/debit":
                require_once "post/debit.php";
                break;
            default:
                echo "This is 404 Page";
        endswitch;
    }

    private function pageLoad($url)
    {
        switch ($url):
            case "/":
                require_once "web/home.php";
                break;
            case "/about-us":
                require_once "web/about_us.php";
                break;
            case "/register-now":
                require_once "web/sso/register.php";
                break;
            case "/login-now":
                require_once "web/sso/login.php";
                break;
            case "/logout-now":
                require_once "web/sso/logout.php";
                break;
            case "/dashboard":
                require_once "web/user/dashboard.php";
                break;
            case "/credit":
                require_once "web/user/credit.php";
                break;
            case "/debit":
                require_once "web/user/debit.php";
                break;
            case "/transactions":
                require_once "web/user/transactions.php";
                break;
            default:
                echo "This is 404 Page";
        endswitch;
    }
}