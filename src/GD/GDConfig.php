<?php
namespace VyalovAlexander\ImageDefender\GD;

class GDConfig
{
    public static function sign()
    {
        return require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'sign.php';
    }

    public static function stamp()
    {
        return require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'stamp.php';
    }

}