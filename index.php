<?php


include "src/VyalovAlexander/ImageDefender/GD/GDImageDefender.php";
include "src/VyalovAlexander/ImageDefender/ImageDefenderInterface.php";
$imageDefender = new \VyalovAlexander\ImageDefender\Gd\GDImageDefender();
//echo $imageDefender->imposeText("/home/alexander/Изображения/ball.png", "/home/alexander/Изображения/newball.png", "ХУЙ", 10, 10, 0, 20);
echo $imageDefender->imposeStamp("/home/alexander/Изображения/ball.png", "/home/alexander/Изображения/newball.png", "/home/alexander/Изображения/2ca6f78b-5449-4466-88b1-4b2f88102fca.jpg", 20, 20 ,50);

//http://ru2.php.net/manual/ru/function.imagettftext.php