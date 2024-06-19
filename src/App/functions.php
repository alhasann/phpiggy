<?php

declare(strict_types=1);

/**
 * Dumps and dies.
 * 
 * Outputs the given value wrapped in <pre> tags for readability and terminates the script.
 * 
 * @param mixed $value The value to be dumped.
 */
function dd(mixed $value)
{
    echo "<pre><hr>";
    var_dump($value);
    echo "<hr></pre>";
    die();
}

/**
 * Escapes HTML characters in a string.
 * 
 * Converts special characters to HTML entities to prevent XSS attacks.
 * 
 * @param mixed $value The value to be escaped. Typically, this will be a string.
 * @return string The escaped string.
 */
function e(mixed $value): string
{
    return htmlspecialchars((string) $value);
}
