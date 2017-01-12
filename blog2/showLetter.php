<meta charset="utf-8">
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .letter{
        margin-top: 10px;
        width: 400px;
        /*height: 200px;*/
        border: 1px solid;

    }
    .letter p{
        margin-top: 10px;
    }
    #menu{
        width:100px;
        height:50px;
        text-align: center;
        line-height:50px;
        float: right;
        margin-right: 100px;
    }
</style>
<body>
<div id="menu">
    <a href="user.php">返回用户中心</a>
</div>
<?php
include 'conn.php';
$uid = $_COOKIE['uid'];
$sql = "update sixin set flag = 1 where rid ='$uid'";
$query = mysqli_query($conn,$sql);
if($query){
    $sql = "select * from sixin,user where sixin.sid=user.uid and rid='$uid'";
    $query = mysqli_query($conn,$sql);
    while ($result = mysqli_fetch_array($query)){
        ?>
<div class="letter">
        <p>发件人:<?php echo $result['uname']?></p>
        <h3>内容</h3>
        <p>时间:<?php echo $result['stime']?></p>
        <p><?php echo $result['scontent']?></p>
        <p><a href="letterBack.php?rid=<?php echo $result['uid']?>">回复</a></p>
</div>
<?php
    }
}
?>

</body>
