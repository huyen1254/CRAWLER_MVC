<?php
include_once('./Page/Dantri.php');
include_once('./Page/Vietnamnet.php');
include_once('./Page/Vnexpress.php');
class Check
{
    public $html;

    function makeWebsite(string $param)
    {
        switch (strtolower($param)) {
            case 'vnexpress':
                return new Vnexpress($this->html);
                break;
            case 'vietnamnet':
                return new Vietnamnet($this->html);
                break;
            case 'dantri':
                return new Dantri($this->html);
                break;
            default:
                return null;
                break;
        }
    }
}
