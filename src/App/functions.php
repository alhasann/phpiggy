<?php 
declare(strict_types=1) ; 

function dd(mixed $value) { 
echo "<pre><hr>" ; 
var_dump($value) ; 
echo "<hr></pre>" ; 
die() ; 
}