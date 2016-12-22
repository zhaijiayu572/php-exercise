<?php
include "connect.php";
if(isset($_GET['bid'])){
    $bid = $_GET['bid'];
    $sql = "update blog set hits=hits+1 where bid = '$bid'";
    $query = mysqli_query($link,$sql);
    if($query){
        $sql = "select * from blog where bid = '$bid'";
        $query = mysqli_query($link,$sql);
        $arr = mysqli_fetch_array($query);
        ?>
        <a href="index.php">返回首页</a>
        <h3>标题:<?php echo $arr['title']?></h3>
        <p>访问数:<?php echo $arr['hits']?></p>
        <p><?php echo $arr['content']?></p>
<?php
    }else{
        echo "<script>alert('更新数据失败')</script>";
    }
}
?>