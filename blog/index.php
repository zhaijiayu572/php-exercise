<div id="top">
    <a href="add.php">增加文章</a>
    <a href="test.php">aaa</a>
    <a href="index.php">显示所有</a>
</div>
<form action="index.php" method="post">
    <input type="text" name="key">
    <input type="submit" name="sub" value="搜索">
</form>
<style>
    #top{
        width: 100%;
        height: 50px;
        float: left;
    }
    .article{
        margin-top: 50px;
        height: 800px;
        width: 400px;
        float: left;
    }
    #cata{
        width: 400px;
        height: 200px;
        float: right;
    }
</style>
<?php
include "conect.php";
if(isset($_COOKIE['id'])){
    $name = $_COOKIE['name'];
    echo "<p>欢迎你,$name</p>";
    echo "<a href='unlogin.php'>注销</a>";
}else{
    echo "<a href='login.php'>未登录</a>";
}
if(isset($_POST['sub'])){
    $key = $_POST['key'];
    $sql = "select * from blog,user,catalog where blog.id=user.id and blog.cid = catalog.cid and title like '%$key%' order by blog.bid desc";
}else{
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
        $sql = "select * from blog,user,catalog where blog.id=user.id and blog.cid = catalog.cid and blog.cid='$cid' order by blog.bid desc";
    }else{
        $sql = "select * from blog,user,catalog where blog.id=user.id and blog.cid = catalog.cid order by blog.bid desc";
    }
}

$query = mysqli_query($link,$sql);
echo "<div class='article'>";
while ($arr = mysqli_fetch_array($query)){
    ?>
        <h3><a href="edit.php?bid=<?php echo $arr['bid']?>">标题:<?php echo $arr['title']?></a></h3><br>
        <a href="update.php?bid=<?php echo $arr['bid']?>&id=<?php $arr['id']?>">修改</a>|
        <a href="del.php?bid=<?php echo $arr['bid']?>&id=<?php echo $arr['id']?>">删除</a><br>
        <span><?php echo $arr['time']?></span>
        <span>作者:<?php echo $arr['name']?></span>
        <span>文章分类:<?php echo $arr['cname']?></span>
        <p><?php echo $arr['content']?></p>


    <?php
}
echo "</div>";
include "conect.php";
$sql = "select * from catalog";
$query = mysqli_query($link,$sql);
echo "<div id='cata'>";
while ($arr = mysqli_fetch_array($query)){
    ?>
    <a href="index.php?cid=<?php echo $arr['cid']?>"><?php echo $arr['cname']?></a><br>
    <?php
}
echo "</div>";