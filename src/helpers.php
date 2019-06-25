<?php

if (!function_exists('show')){
    function show($message, $color = 'black')
    {
        echo "<p style='color: $color'>$message</p>";
    }
}
