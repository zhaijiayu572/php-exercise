<?php
include "conect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "update blog set hits=hits+1 where bid='$id'";
    $query = mysqli_query($link,$query);
    if($query){
        $sql = "select * from blog where bid='$id'";
        $query = mysqli_query($link,$sql);
        $arr = mysqli_fetch_array($query);
        while ($result = mysqli_fetch_array($query)){
            ?>
            <h3><a href="edit.php?id=<?php echo $result['bid']?>">标题:<?php echo $result['title']?></a></h3><br>
            <p><?php echo $result['hits']?></p>
            <p><?php echo $result['content']?></p><br>

            <?php
        }

    }else{
        echo "<script>alert('更新数据失败')</script>";
        echo "<script>location='index.php'</script>";
    }
}