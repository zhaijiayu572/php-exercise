<?php
function getURI(){
    $uri = $_SERVER['REQUEST_URI'];
    $arr = explode('/',$uri);
    $str = $arr[count($arr)-1];
    return $str;
}

