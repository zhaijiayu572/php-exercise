<?php
include "connect.php";
if(isset($_GET['bid'])){
    $bid = $_GET['bid'];
    $sql = "delete from blog where bid ='$bid'";
    $query = mysqli_query($link,$sql);
    if($query){
        echo "<script>alert('删除成功！')</script>";
        echo "<script>location='index.php'</script>";
    }else{
        echo "<script>alert('删除失败！')</script>";
        echo "<script>location='index.php'</script>";
    }
}