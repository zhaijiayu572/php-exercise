<?php
if(isset($_GET['uri'])){
    $uri = $_GET['uri'];
}else{
    $uri = 'index.php';
}

if(isset($_POST['sub'])){
    include 'conn.php';
    $uname = $_POST['user'];
    $pass = $_POST['pass'];
    $uri = $_POST['uri'];
    $sql = "select * from user where uname='$uname' and pass='$pass'";
    $query = mysqli_query($conn,$sql);
    if($result = mysqli_fetch_array($query)){
        setcookie('uid',$result['uid'],time()+180);
        setcookie('uname',$result['uname'],time()+180);
        echo "<script>alert('登录成功')</script>";
        echo "<script>location='".$uri."'</script>";
    }
}
?>
<form method="post" action="login.php">
    <input type="hidden" name="uri" value="<?php echo $uri?>">
    用户名:<input type="text" name="user"><br>
    密码：<input type="password" name="pass"><br>
    <input type="submit" name="sub" value="登录">
    <a href="reg.php">注册</a>
</form>

