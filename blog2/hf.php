<?php
require "conn.php";
function reply($arr,$str,$conn){
    $pflag = $arr['pflag'];
    $str.="&lt;";
    $sql = "select * from comment,user where pid=$pflag and comment.uid=user.uid";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);
    $pflag = $result['pflag'];
    echo "<p>".$arr['uname']."</p>";
    echo "<p>".$str.$result['uname'].":".$result['pcon']."</p>";
    if($pflag!=0){
        reply($result,$str,$conn);
    }
}
$sql = "select * from comment,user where comment.uid = user.uid";
$query = mysqli_query($conn,$sql);
while ($result=mysqli_fetch_array($query)){
    if($result['pflag']!=0){
        $pflag = $result['pflag'];
        reply($result,'',$conn);


        continue;
    }
    ?>
    <p id="user"><?php echo $result['uname']?></p>
    <span><?php echo $result['ptime']?></span>
    <p class="content"><?php echo $result['pcon']?></p>
    <span><a href="reply.php?pid=<?php echo $result['pid']?>&uid=<?php $uid = $_COOKIE['uid']; echo $uid?>&wid=<?php echo $result['wid']?>">回复</a></span>
    <hr>
    <?php
}
?>

