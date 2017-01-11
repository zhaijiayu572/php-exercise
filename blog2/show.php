<html>
<head>
    <meta charset="utf-8">
    <style>
        #show-comment{
            width: 400px;
            height: 200px;
        }
        #comment{
            float: right;
            margin-right: 100px;
        }
        #user{
            color: #ff00ff;
            width: 100%;
        }
        .content{
            background: #cccccc;
            width: 100%;
            height: 50px;
            padding: 10px 0;
        }
        .aa{
            margin-top: 5px;
            width: 100%;
            border: 1px solid;
        }
    </style>
</head>
<?php
require "conn.php";
require 'back.php';
if(!isset($_COOKIE['uid'])){
    $uri = getURI();
    echo "<script>location='login.php?uri=".$uri."'</script>";
}
if(isset($_GET['wid'])){
    $wid = $_GET['wid'];
    $sql = "update blog set hits=hits+1 where wid='$wid'";
    $query = mysqli_query($conn,$sql);
    if($query){
        $sql = "select * from blog where wid='$wid'";
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query);
        ?>

        <a href="index.php">返回首页</a>
        <div id="content">
            <h1><?php echo $result['title']?></h1>
            <span>发布时间:<?php echo $result['time']?></span>&nbsp;
            <span>访问量:<?php echo $result['hits']?></span>
            <p><?php echo $result['content']?></p>
            <hr>
        </div>
        <div id="show-comment">
<?php
    }else{
        echo "<script>alert('数据更新失败')</script>";
        echo "<script>location='index.php'</script>";
    }
}
$sql = "select * from comment,user where comment.uid = user.uid and wid='$wid'";
$query = mysqli_query($conn,$sql);
while ($result=mysqli_fetch_array($query)){
    if($result['pflag']!=0){
        $pflag = $result['pflag'];
        $beReply = $result;
        echo "<div class='aa'>";
        while ($pflag!=0){
            $sql1 = "select * from comment,user where pid='$pflag' and comment.uid=user.uid and wid='$wid'";
            $query1 = mysqli_query($conn,$sql1);
            $arr = mysqli_fetch_array($query1);
            $pflag = $arr['pflag'];
            ?>
            <p><?php echo $beReply['uname']?>回复了<?php echo $arr['uname']?>:<?php echo $beReply['pcon']?></p>
            &nbsp;<p style="background: #777"><?php echo $arr['pcon']?></p>

            <?php
            $beReply = $arr;

        }
?>
        <span><a href="reply.php?pid=<?php echo $result['pid']?>&uid=<?php $uid = $_COOKIE['uid']; echo $uid?>&wid=<?php echo $result['wid']?>">回复</a></span>
        </div>
        <?php
        continue;
    }
    ?>
    <div class="aa">
        <p id="user"><?php echo $result['uname']?></p>
        <span><?php echo $result['ptime']?></span>
        <p class="content"><?php echo $result['pcon']?></p>
        <span><a href="reply.php?pid=<?php echo $result['pid']?>&uid=<?php $uid = $_COOKIE['uid']; echo $uid?>&wid=<?php echo $result['wid']?>">回复</a></span>

    </div>
<?php
}
?>
        </div>
<form action="comment.php" method="post" id="comment">
    <input type="hidden" value="<?php if(isset($wid)) echo $wid?>" name="wid">
    <input type="hidden" value="<?php $uid = $_COOKIE['uid']; echo $uid?>" name="uid">
    <textarea name="comment" id="" cols="50" rows="10"></textarea>
    <input type="submit" name="sub">
</form>
</body>
</html>