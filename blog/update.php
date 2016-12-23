<?php
include "conect.php";
if(isset($_GET['bid'])){
    $authorId = $_GET['id'];
    $loginId = $_COOKIE['id'];
    $bid = $_GET['bid'];
    if(isset($_COOKIE['id'])){
        if($authorId == $loginId){
            $sql = "select * from blog where bid='$bid'";
            $query = mysqli_query($link,$sql);
            $arr = mysqli_fetch_array($query);
        }else{
            echo "<script>alert('您不是作者，无权更改')</script>";
            echo "<script>location='index.php'</script>";
        }
    }else{
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/',$url);
        $last = count($url)-1;
        $url = $url[$last];
        echo "<script>alert('尚未登录,请登录')</script>";
        echo "<script>location='login.php?url=$url'</script>";
    }


}
if(isset($_POST['sub'])){
    $title = $_POST['title'];
    $con = $_POST['con'];
    $bid = $_POST['bid'];
    $sql = "update blog set title='$title',content='$con' where bid='$bid'";
    $query = mysqli_query($link,$sql);
    if($query){
        echo "<script>alert('更新数据成功')</script>";
        echo "<script>location='index.php'</script>";
    }
}
?>
<meta charset="utf-8">
<form action="update.php" method="post">
    <input type="hidden" name="bid" value="<?php echo $bid?>">
    标题:<input type="text" name="title" value="<?php echo $arr['title']?>">
    内容:<textarea cols="20" rows="10" name="con"><?php echo $arr['content']?></textarea>
    <input type="submit" name="sub" value="添加">
</form>
