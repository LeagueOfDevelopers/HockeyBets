<?php
//Инициализируем сессию
session_start();

//Генерируем числа
$char1 = rand(1,10);
$char2 = rand(1,3);
$char3 = rand(1,10);


//$_SESSION['captcha']  = $char1 +  $char2 * $char3;

//Создаем изображение
$img = imagecreatetruecolor(165,40);
if(!$img) exit("Ошибка при создании изображения");
//Задаем цвет заливки
$color = imagecolorallocate($img, 255, 255, 255); //белый
//Задаем цвет тектса
$color_text = imagecolorallocate($img, 8, 37, 103); //сапфировый
//Производим заливку
imagefill($img,0,0, $color);
//Пишем текст
$arial = "arial.ttf";
imagettftext($img, 20, 0, 20, 25, $color_text, $arial, "$char1 *  $char2 + $char3");
 $_SESSION['captcha']  = $char1 *  $char2 + $char3;

//Немного шумов
imageline($img,0,rand(0,24),130,rand(0,40),$color);
imageline($img,0,rand(0,24),130,rand(0,40),$color);
imageline($img,0,rand(0,24),130,rand(0,40),$color);
//Определяем видимость как изображение
header("Content-type: image/png");
//cоздаем png изображение
imagepng($img);
//Чистим память
imagedestroy($img);

?>