<?php
// Генерируем строку из случайных символов длиной от 5 до 8
function generate_code() {
    $chars = "012345678901234567abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $text = '';

    $n = rand(5, 7);

    for ($i = 0; $i < $n; $i++)
        $text .= $chars[rand(0, strlen($chars) - 1)];

    return $text;
}
