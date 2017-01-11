<style>
    #content{
        width: 800px;
        float: left;
    }
    #aside{
        width: 300px;
        float: right;
    }
    #search{

        width: 200px;
        height: 20px;
        margin-right: 20px;
    }
    #catalog{
        border: 1px solid;
        height: 200px;
        width: 200px;

        margin-right: 20px;
    }
    #catalog span{
        background: #ccc;
    }
</style>

<div id="content">
    <a href="index.php">显示全部</a>
    <br><br>
<?php
include "conn.php";
if(isset($_COOKIE['uid'])){
    $uname = $_COOKIE['uname'];
    echo "<a href='#'>欢迎，".$uname."</a>&nbsp;";
    echo "<a href='unlogin.php'>注销</a>";
    echo "<p><a href='add.php'>增加文章</a></p>";
}else{
    echo "<a href='login.php'>未登录，点击登录</a><br>";
    echo "<a href='reg.php'>注册</a>";
}
if(isset($_POST['sub'])){
    $keywords = $_POST['keywords'];
    $sql = "select * from blog,user,catalog where blog.uid=user.uid and catalog.cid=blog.cid and blog.title like '%".$keywords."%' order by time desc";
    $query = mysqli_query($conn,$sql);
}elseif (isset($_GET['cid'])){
    $cid=$_GET['cid'];
    $sql = "select * from blog,user,catalog where blog.uid=user.uid and catalog.cid=blog.cid and blog.cid='$cid' order by time desc";
    $query = mysqli_query($conn,$sql);
}else{
    $sql = "select * from blog,user,catalog where blog.uid=user.uid and catalog.cid=blog.cid order by time desc";
    $query = mysqli_query($conn,$sql);
}

while ($result = mysqli_fetch_array($query)){
    ?>
    <h3><a href="show.php?wid=<?php echo $result['wid']?>"><?php echo $result['title']?></a></h3>
    <p><a href="#">修改</a>|<a href="#">删除</a></p>
    <p>所属类别:<?php echo $result['cname']?></p>
    <p>作者：<?php echo $result['uname']?></p>
    <p>发布时间<?php echo $result['time']?></p>
    <p><?php echo $result['content']?></p>
    <hr>
<?php
}
?>
</div>
<div id="aside">
    <form action="index.php" method="post" id="search">
        <input type="text" name="keywords">
        <input type="submit" value="搜索" name="sub">
    </form>
    <div id="catalog">
        <h3>所有标签</h3>
        <?php
        $sql = "select * from catalog";
        $query = mysqli_query($conn,$sql);
        while ($result = mysqli_fetch_array($query)){
            ?>
            <span><a href="index.php?cid=<?php echo $result['cid']?>"><?php echo $result['cname']?></a></span>
            <?php
        }
        ?>
    </div>
</div>

