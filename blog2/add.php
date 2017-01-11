<?php
require "conn.php";
include 'back.php';
$uri = getURI();
if(isset($_COOKIE['uid'])){
    $uid = $_COOKIE['uid'];
    if(isset($_POST['sub'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $cid = $_POST['catalog'];
        $sql = "insert into blog (title,content,cid,time,uid) values('$title','$content','$cid',now(),'$uid')";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script>location='index.php'</script>";
        }
    }
}else{

    echo "<script>alert('尚未登录')</script>";
    echo "<script>location='login.php?uri=".$uri."'</script>";
}

?>
<meta charset="utf-8">
<form action="add.php" method="post">
    标题:<input type="text" name="title">&nbsp;
    <select name="catalog">
        <?php
            $sql = "select * from catalog";
            $query = mysqli_query($conn,$sql);
            while ($result = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $result['cid']?>"><?php  echo $result['cname']?></option>
        <?php
            }

        ?>
    </select>
    <a href="addcatalog.php">添加标签</a>
    <br>
    内容: <textarea name="content" id="" cols="30" rows="10"></textarea>
    <input type="submit" name="sub" value="发布">
</form>
