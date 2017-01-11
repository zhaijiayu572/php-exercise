<?php
include 'conn.php';
if(isset($_GET['uid'])){
    $uid = $_GET['uid'];
    $pid = $_GET['pid'];
    $wid = $_GET['wid'];
}
if(isset($_POST['sub'])){
    $uid = $_POST['uid'];
    $pid = $_POST['pid'];
    $wid = $_POST['wid'];
    $content = $_POST['content'];
    $sql = "insert into comment(pcon,ptime,wid,uid,pflag) values('$content',now(),'$wid','$uid','$pid')";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('回复成功')</script>";
        echo "<script>location='show.php?&wid=".$wid."'</script>";
    }
}
?>
<form action="reply.php" method="post">
    <input type="hidden" value="<?php echo $uid?>" name="uid">
    <input type="hidden" value="<?php echo $pid?>" name="pid">
    <input type="hidden" value="<?php echo $wid?>" name="wid">
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="评论" name="sub">
</form>
