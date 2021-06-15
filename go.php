<META http-equiv=content-type content="text/html; charset=UTF-8">
<?php
    include("random_text.php");

    $cap = $_COOKIE["captcha"]; // берем из куки значение MD5 хэша, занесенного туда в captcha.php

    // Пишем функцию проверки введенного кода
    function check_code($code, $cookie)
    {

    // АЛГОРИТМ ПРОВЕРКИ
        $code = trim($code); // На всякий случай убираем пробелы
        $code = md5($code);

        if ($code == $cookie)
            return TRUE;
        else
            return FALSE;
    // если все хорошо - возвращаем TRUE (если нет - false)

    }

    // Обрабатываем полученный код
    if (isset($_POST['captcha_text']))
    {
        // Если код не введен (в POST-запросе поле 'code' пустое)...
        if ($_POST['captcha_text'] == '')
        {
            echo "<!DOCTYPE html><html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <title>ACCESS DENIED</title>
                <link rel='stylesheet' href='styles.css'>
            </head>
            <body>
                <img src='img2/empty.jpg' alt='Go back!'>
                <br><b><span style='color: #FF0000'>Error:</span> enter CAPTCHA!</b><br>
                <input type='button' value='Go back' onclick='history.go(-1)'>
            </body>
            </html>";
            die();
        }
        // Если код введен правильно (функция вернула TRUE), то...
        if (check_code($_POST['captcha_text'], $cap))
        {
            echo "<!DOCTYPE html><html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <title>ACCESS DENIED</title>
                <link rel='stylesheet' href='styles.css'>
            </head>
            <body>
                <img src='img2/nice.gif' alt='Great job!'>
                <br><b>Great job!</b><br>
                <input type='button' value='Try again?' onclick='history.go(-1)'>
            </body>
            </html>";
            die();
        }
        // Если код введен неверно...
        else
        {
            echo "<!DOCTYPE html><html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <title>ACCESS DENIED</title>
                <link rel='stylesheet' href='styles.css'>
            </head>
            <body>
                <img src='img2/wrong.jpg' alt='Try again!'>
                <br><b><span style='color: #FF0000'>Error:</span> wrong CAPTCHA!</b><br>
                <input type='button' value='Try again' onclick='history.go(-1)'>
            </body>
            </html>";
            die();
        }
    }
    // Если к нам обращаются напрямую, то дело дрянь...
    else
    {
        echo "<!DOCTYPE html><html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>ACCESS DENIED</title>
            <link rel='stylesheet' href='styles.css'>
        </head>
        <body>
            <img src='img2/sus.jpg' alt='Go away!'>
            <br><b><span style='color: #FF0000'>Error:</span> you picked the wrong house, fool!</b>
            <br><h1>Go away!</h1>
        </body>
        </html>";
        die();
    }

?>