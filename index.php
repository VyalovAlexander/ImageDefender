<?php


include "src/VyalovAlexander/ImageDefender/GD/GDImageDefender.php";
include "src/VyalovAlexander/ImageDefender/ImageDefenderInterface.php";
$imageDefender = new \VyalovAlexander\ImageDefender\Gd\GDImageDefender();
echo $imageDefender->imposeText("/home/alexander/Изображения/ball.png", "/home/alexander/Изображения/newball.png", "FAQ");

//http://ru2.php.net/manual/ru/function.imagettftext.php