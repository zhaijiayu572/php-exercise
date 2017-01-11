<?php
$conn = @mysqli_connect('localhost','root','') or die('数据库连接失败');
@mysqli_select_db($conn,'blog2') or die('选择数据库失败');
mysqli_set_charset($conn,'utf8');