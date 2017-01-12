<?php
include "back.php";
if(isset($_COOKIE['uid'])){

}else{
    $uri = getURI();
    header("location:login.php?uri=$uri");
}
?>
<a href="letter.php">邮箱</a>
<a href="index.php">返回主页</a>