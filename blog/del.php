<?php
include "conect.php";
if(isset($_GET['bid'])){
    $bid = $_GET['bid'];
    if(isset($_COOKIE['id'])){
        $authorId = $_GET['id'];
        $loginId = $_COOKIE['id'];
        if($authorId==$_COOKIE){
            $sql = "delete from blog where bid='$bid'";
            $query = mysqli_query($link,$sql);
            if($query){
                echo "<script>alert('删除数据成功')</script>";
                echo "<script>location='index.php'</script>";
            }else{
                echo "<script>alert('删除数据成失败')</script>";
                echo "<script>location='index.php'</script>";
            }
        }else{
            echo "<script>alert('您不是作者，无权删除')</script>";
            echo "<script>location='index.php'</script>";
        }

    }else{
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/',$url);
        $last = count($url)-1;
        $url = $url[$last]."?bid=".$bid;
        echo "<script>alert('尚未登录,请登录')</script>";
        echo "<script>location='login.php?url=$url'</script>";
    }

}