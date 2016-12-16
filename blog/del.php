<?php
include "conect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $sql = "delete from blog where bid='$id'";
    $query = mysqli_query($link,$sql);
    if($query){
        echo "<script>alert('删除数据成功')</script>";
        echo "<script>location='index.php'</script>";
    }else{
        echo "删除失败";
    }
}