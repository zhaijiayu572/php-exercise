<a href="add.php">增加文章</a>
<form action="index.php" method="get">
    <input type="text" name="search">
    <input type="submit" name="sub" value="搜索">
</form>
<?php
if(isset($_GET['sub'])){
    $search = $_GET['search'];
    $w = "title like '%$search%'";
}else{
    $w =1;
}

include "conect.php";
$sql = "select * from blog where $w order by bid DESC ";
$query = mysqli_query($link,$sql);
while ($result = mysqli_fetch_array($query)){
    ?>
    <h3><a href="edit.php?id=<?php echo $result['bid']?>">标题:<?php echo $result['title']?></a></h3>
    <a href="update.php?id=<?php echo $result['bid']?>">修改</a>|<a href="del.php?id=<?php echo $result['bid']?>">删除</a><br>
    <p><?php echo $result['time']?></p>
    <p><?php echo $result['content']?></p><br>

<?php
}
?>