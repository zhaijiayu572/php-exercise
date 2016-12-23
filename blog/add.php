<?php
include "conect.php";
if(isset($_COOKIE['id'])){
    if(isset($_POST['sub'])){
        $id = $_COOKIE['id'];
        $content = $_POST['content'];
        $title = $_POST['title'];
        $ca = $_POST['ca'];
        $sql = "insert into blog(title,content,time,cid,id) values('$title','$content',now(),'$ca','$id')";
        $query = mysqli_query($link,$sql);
        if($query){
            echo "<script>alert('发表成功！')</script>";
            echo "<script>location='index.php'</script>";
        }else{
            echo "<script>alert('发表失败')</script>";
            echo "<script>location='index.php'</script>";
        }
    }
}else{
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/',$url);
    $last = count($url)-1;
    $url = $url[$last];
    echo "<script>alert('尚未登录,请登录')</script>";
    echo "<script>location='login.php?url=$url'</script>";
}
?>
<meta charset="utf-8">
<form method="post" action="add.php">
    标题:<input type="text" name="title">
    <select name="ca">
        <?php
            $sql = "select * from catalog ";
            $query = mysqli_query($link,$sql);
            while ($arr = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $arr['cid']?>"><?php echo $arr['cname']?></option>
                <?php
            }
        ?>
    </select>
    <br>
    内容:<textarea name="content" cols="30" rows="10"></textarea>
    <input type="submit" name="sub" value="发表">
</form>
