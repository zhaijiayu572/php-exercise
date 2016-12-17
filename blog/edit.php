<?php
include "conect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "update blog set hits=hits+1 where bid='$id'";
    $query = mysqli_query($link,$sql);
    if($query){
        $sql = "select * from blog where bid='$id'";
        $query = mysqli_query($link,$sql);
        while ($arr = mysqli_fetch_array($query)){
            ?>
            <h4><a href="index.php">返回首页</a></h4>
            <h3><a href="edit.php?id=<?php echo $arr['bid']?>">标题:<?php echo $arr['title']?></a></h3><br>
            <p>当前访问量<?php echo $arr['hits']?></p>
            <p><?php echo $arr['content']?></p><br>

            <?php
        }

    }else{
        echo "<script>alert('更新数据失败')</script>";
        echo "<script>location='index.php'</script>";
    }
}