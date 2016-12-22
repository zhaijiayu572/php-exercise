<?php
include "connect.php";
if(isset($_POST['sub'])){
    $content = $_POST['content'];
    $title = $_POST['title'];
    $sql = "insert into blog(title,content,time) values('$title','$content',now())";
    $query = mysqli_query($link,$sql);
    if($query){
        echo "<script>alert('发表成功！')</script>";
        echo "<script>location='index.php'</script>";
    }else{
        echo "<script>alert('发表失败')</script>";
        echo "<script>location='index.php'</script>";
    }
}
?>
<meta charset="utf-8">
<form method="post" action="add.php">
    标题:<input type="text" name="title">
    内容:<textarea name="content" cols="30" rows="10"></textarea>
    <input type="submit" name="sub" value="发表">
</form>
