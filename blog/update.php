<?php
include "conect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from blog where bid='$id'";
    $query = mysqli_query($link,$sql);
    $arr = mysqli_fetch_array($query);
}
if(isset($_POST['sub'])){
    $title = $_POST['title'];
    $con = $_POST['con'];
    $hid = $_POST['hid'];
    $sql = "update blog set title='$title',content='$con' where bid='$hid'";
    $query = mysqli_query($link,$sql);
    if($query){
        echo "<script>alert('更新数据成功')</script>";
        echo "<script>location='index.php'</script>";
    }
}
?>
<meta charset="utf-8">
<form action="update.php" method="post">
    <input type="hidden" name="hid" value="<?php echo $id?>">
    标题:<input type="text" name="title" value="<?php echo $arr['title']?>">
    内容:<textarea cols="20" rows="10" name="con"><?php echo $arr['content']?></textarea>
    <input type="submit" name="sub" value="添加">
</form>
