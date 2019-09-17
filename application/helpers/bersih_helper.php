<?php
function bersih($value = ''){

    $value = trim($value);
    if (get_magic_quotes_gpc()) { $value = stripslashes($value); }

    $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}