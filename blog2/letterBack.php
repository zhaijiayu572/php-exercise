<?php
include 'conn.php';
include 'back.php';
if(isset($_COOKIE['uid'])){
    if(isset($_GET['rid'])){
        $rid = $_GET['rid'];
    }
    if(isset($_POST['sub'])){

        $rid = $_POST['rid'];
        $content = $_POST['content'];
        $sid = $_COOKIE['uid'];
        $sql = "insert into sixin(scontent,stime,sid,rid) values('$content',now(),'$sid','$rid')";
        if(mysqli_query($conn,$sql)){
            header("location:user.php");
        }
    }
}else{
    $uri = getURI();
    header("location:login.php?uri=$uri");
}

?>
<form action="letterBack.php" method="post">
    <input type="hidden" name="rid" value="<?php echo $rid?>">
    内容：<input type="text" name="content">
    <input type="submit" name="sub" value="发送">
</form>
