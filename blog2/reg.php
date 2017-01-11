<?php
include 'conn.php';
if(isset($_POST['sub'])){
    $uname = $_POST['user'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
    if($pass == $rpass){
        $sql = "insert into user(uname,pass) values('$uname','$pass')";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo "<script>alert('注册成功')</script>";
            echo "<script>location='login.php'</script>";
        }else{
            echo '注册失败';
        }
    }
}
?>
<form method="post" action="reg.php">
    用户名:<input type="text" name="user"><br>
    密码：<input type="password" name="pass"><br>
    再次输入：<input type="password" name="rpass"><br>
    <input type="submit" name="sub" value="注册">
</form>
