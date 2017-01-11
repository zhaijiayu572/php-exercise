<?php
include "conn.php";
if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $comment = $_POST['comment'];
    $wid = $_POST['wid'];
    $sql = "insert into comment(pcon,ptime,wid,uid) values('$comment',now(),'$wid','$uid')";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('评论成功')</script>";
        echo "<script>location='show.php?wid=".$wid."'</script>";
    }
}else{
    echo "<script>alert('尚未登录')</script>";
    echo "<script>location='login.php'</script>";
}