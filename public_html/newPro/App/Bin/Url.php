<?php

namespace App\Bin;

class Url
{
    public function getCurrentUrl()
    {
        return str_replace("/newPro", "", $_SERVER['REQUEST_URI']);
    }
}