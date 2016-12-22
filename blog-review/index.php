<a href="add.php">增加文章</a>
<?php
include "connect.php";

if(isset($_COOKIE['id'])){
    $name = $_COOKIE['name'];
    echo "<p>欢迎你,$name</p>";
    echo "<a href='unlogin.php'>注销</a>";
}else{
    echo "<a href='login.php'>未登录</a>";
}
$sql = "select * from blog order by bid desc";
$query = mysqli_query($link,$sql);
while ($arr = mysqli_fetch_array($query)){
    ?>
        <h3><a href="edit.php?bid=<?php echo $arr['bid']?>">标题:<?php echo $arr['title']?></a></h3><br>
        <a>修改</a>|<a href="delete.php?bid=<?php echo $arr['bid']?>">删除</a>
        <p><?php echo $arr['time']?></p>
        <p><?php echo $arr['content']?></p>
    <?php
}