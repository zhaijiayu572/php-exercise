<?php
$arr = array();
for ($i=0;$i<5;$i++){
    $arr[$i] = rand(0,9);
    $arr = array_unique($arr);
    if(count($arr) != ($i+1)){
        $i--;
    }
}
echo "<pre>";
var_dump($arr);
echo "</pre>";