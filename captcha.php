<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-type: image/png");

include("random_text.php");
$captcha = generate_code();

$cookie = md5($captcha);
$cookie_time = time() + 90;
setcookie("captcha", $cookie, $cookie_time);

function gen_captcha_image($code)
{
    $fonts = glob('fonts/*');
    $images = glob('img/*');

    $image = imagecreatetruecolor(250, 100);
    $black = imagecolorallocate($image, 0, 0, 0);

    $image = imagecreatefromjpeg($images[rand(0, count($images) -1)]);

    $lines = rand(3,5);
    for ($i=0; $i<$lines; $i++)
    {
        $color = imagecolorallocate($image, rand(0, 150), rand(0, 100), rand(0, 150)); // Случайный цвет c изображения
        imageline($image, rand(0, 20), rand(1, 100), rand(200, 250), rand(1, 100), $color);
    }

    $x = rand(10, 50);
    $size = rand(20, 30);
    for ($i = 0; $i < strlen($code); $i++) {
        $x += 20;
        $letter = substr($code, $i, 1);

        imagettftext($image, $size, rand(0, 10), $x, rand(40, 60), $black, $fonts[rand(0, count($fonts) - 1)], $letter);
    }

    for ($i=0; $i<$lines; $i++)
    {
        $color = imagecolorallocate($image, rand(0, 150), rand(0, 100), rand(0, 150)); // Случайный цвет c изображения
        imageline($image, rand(0, 20), rand(1, 100), rand(200, 250), rand(1, 100), $color);
    }

    imagepng($image);
    imagedestroy($image);
}

gen_captcha_image($captcha);
?>
