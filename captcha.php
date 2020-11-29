<?php
  define('CAPCHA_LENGTH', 5);

  generateCaptcha();

  // functions

  function generateCaptcha(){
    $captchaImage = imagecreatefromjpeg("images/fondo.jpeg");
    $textColor = imagecolorallocate( $captchaImage, 31, 255, 255 );
    $x = 20;
    $y = 40;
    $ang = -30;
    for ($i = 0; $i < CAPCHA_LENGTH; $i++){ // se sacan las letras de una en una para aplicar distintos valores de posición y ángulo
      $font = randomFont();
      $text = randomLetter();
      imagettftext( $captchaImage, rand(25, 30), $ang, $x, $y, $textColor, $font, $text);
      $x += 30;
      $y += 10;
      $ang += 20;
    }
    $x -= 10;
    $y -= 20;
    $ang = -30;
    $text = randomNumber(); // se genera un número y se inserta en la imagen
    imagettftext( $captchaImage, 20, $ang, $x, $y, $textColor, $font, $text);

    header("Cache-Control: no-cache, must-revalidate");
    header('Content-type: image/jpeg');
    imagedestroy(imagejpeg($captchaImage));
  }

  function randomFont(){
    $files = scandir("./fonts/");
    return "./fonts/" . $files[rand(2, count($files) - 1)];

  }

  function randomLetter(){
    $chars = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
    return $chars[rand(0, strlen($chars)-1)];
  }

  function randomNumber(){
    $number = "0123456789";
    return $number[rand(0, strlen($number)-1)];
  }
?>