<?php
$link = mysqli_connect('localhost','root','');
if($link){
    mysqli_select_db($link,'blog');
    mysqli_set_charset($link,'utf8');
}else{
    die('数据库连接失败');
}