<?php
include "conect.php";
if(isset($_GET['bid'])){
    $bid = $_GET['bid'];
    setcookie('bid',$bid);
    $sql = "update blog set hits=hits+1 where bid='$bid'";
    $query = mysqli_query($link,$sql);
    if($query){
        $sql = "select * from blog where bid='$bid'";
        $query = mysqli_query($link,$sql);
        while ($arr = mysqli_fetch_array($query)){
            ?>
            <meta charset="utf-8">
            <h4><a href="index.php">返回首页</a></h4>
            <h3><a href="edit.php?id=<?php echo $arr['bid']?>">标题:<?php echo $arr['title']?></a></h3><br>
            <p>当前访问量<?php echo $arr['hits']?></p>
            <p><?php echo $arr['content']?></p><br>
            <form action="edit.php" method="post">
                <textarea name="comment" cols="30" rows="10"></textarea>
                <input type="submit" name="sub" value="发表评论">
            </form>
            <h3>用户评论</h3>
            <hr>
            <?php
        }
        $sql = "select name,message from user,comment where user.id = comment.id and bid='$bid'";
        $query = mysqli_query($link,$sql);
        while ($result = mysqli_fetch_array($query)){
            ?>
            <p>用户：<?php echo $result['name']?></p>
            <p><?php echo $result['message']?></p><br>
            <?php
        }

    }else{
        echo "<script>alert('更新数据失败')</script>";
        echo "<script>location='index.php'</script>";
    }
}
if(isset($_POST['sub'])){
    if(isset($_COOKIE['id'])){
        $bid = $_COOKIE['bid'];
        $comment = $_POST['comment'];
        $id = $_COOKIE['id'];
        if($comment!=""){
            $sql = "insert into comment(bid,id,message) values('$bid','$id','$comment')";
            $query = mysqli_query($link,$sql);
            if($query){
                echo "<script>location='edit.php?bid=".$bid."'</script>";
            }else{
                echo "error";
            }
        }else{
            echo "<script>alert('评论不能为空，请重新输入')</script>";
            echo "<script>location='index.php'</script>";
        }
    }else{
        $bid = $_COOKIE['bid'];
        $url = $_SERVER['REQUEST_URI'];
        var_dump($url);
        $url = explode('/',$url);
        $last = count($url)-1;
        $url = $url[$last]."?bid=".$bid;
        echo "<script>alert('尚未登录,请登录')</script>";
        echo "<script>location='login.php?url=$url'</script>";
    }
}
?>
