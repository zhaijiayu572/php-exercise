<?php
include "conect.php";
    if(isset($_POST['sub'])){
        $title = $_POST['title'];
        $con = $_POST['con'];
        $sql = "insert into blog(bid,title,content,time) values(null,'$title','$con',now())";
        $query = mysqli_query($link,$sql);
        if($query){
            echo "<script>alert('更新数据成功')</script>";
            echo "<script>location='index.php'</script>";
        }else{
            echo "error";
        }
    }
?>
<meta charset="utf-8">
<form action="add.php" method="post">
    标题:<input type="text" name="title">
    内容:<textarea cols="20" rows="10" name="con"></textarea>
    <input type="submit" name="sub" value="添加">
</form>
