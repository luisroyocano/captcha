<?php
  define('CAPCHA_LENGTH', 5);
  $chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
  $number = "0123456789";
  $text = substr($number, rand(0, 9), 1);
  for ($i = 0; $i < CAPCHA_LENGTH - 1; $i++){
    $text .= $chars[rand(0, strlen($chars)-1)];
  }
  $text = str_shuffle($text);

  $captchaImage = imagecreatefromjpeg("images/fondo.jpeg");
  $textColor = imagecolorallocate( $captchaImage, 31, 118, 92 );
  imagettftext( $captchaImage, 20, -30, 35, 35, $textColor, "ShakaPow.ttf", $text);
  imagettftext( $captchaImage, 20, 30, 35, 35, $textColor, "ShakaPow.ttf", $text);

  header("Cache-Control: no-cache, must-revalidate");
  header('Content-type: image/jpeg');
  imagedestroy(imagejpeg($captchaImage));


			?>

