<?php
include "conn.php";
if(isset($_GET['wid'])){
    $wid = $_GET['wid'];
    $sql = "select * from blog where wid='$wid'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
}
if(isset($_POST['sub'])){
    $content = $_POST['content'];
    $wid = $_POST['wid'];
    $title = $_POST['title'];
    $sql = "update blog set title='$title',content='$content' where wid='$wid'";
    $query = mysqli_query($conn,$sql);
    if($query){
        header("location:index.php");
    }
}
?>
<form action="edit.php" method="post">
    <input type="hidden" name="wid" value="<?php echo $wid?>">
    <input type="text" name="title" value="<?php echo $result['title']?>">
    <textarea name="content" id="" cols="30" rows="10">
        <?php echo $result['content']?>
    </textarea>
    <input type="submit" name="sub">
</form>
