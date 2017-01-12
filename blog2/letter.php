<?php
include "conn.php";
    $uid = $_COOKIE['uid'];
    if(isset($_POST['sub'])){
        $sid = $uid;
        $uname = $_POST['uname'];
        $content = $_POST['content'];
        $sql = "select * from user where uname = '$uname'";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query);
        $rid = $result['uid'];
        $sql = "insert into sixin(scontent,stime,sid,rid) values('$content',now(),'$sid','$rid')";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("location:user.php");
        }
    }
    $sql = "select COUNT(*) as number from sixin where rid='$uid' and flag=0";
    $query = mysqli_query($conn,$sql);
    if($query){
        $number = mysqli_fetch_array($query)['number'];
    }else{
        $number = 0;
    }
    echo "<a href='showLetter.php'>你有".$number."封未读邮件</a>";

?>
<form action="letter.php" method="post">
    收件人:<input type="text" name="uname">
    内容:<input type="text" name="content">
    <input type="submit" name="sub" value="发送">
</form>
