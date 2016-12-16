<?php
$link = @mysqli_connect("localhost","root","") or die('数据库连接失败');
mysqli_select_db($link,'blog');
mysqli_set_charset($link,'utf8');