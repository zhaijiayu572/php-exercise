<?php
include "conect.php";
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    if($pass == $repass){
        $sql = "select * from user where name='$name'";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_array($query);
        if($result){
            echo "<script>alert('用户名已存在')</script>";
            echo "<script>location='reg.php'</script>";
        }else{
            $sql = "insert into user(id,name,pass) values(null,'$name','$pass')";
            $query = mysqli_query($link,$sql);
            if($query){
                echo "<script>alert('注册成功')</script>";
                echo "<script>location='login.php'</script>";
            }else{
                echo "error";
            }
        }
    }else{
        echo "<script>alert('两次输入的密码不一致')</script>";
        echo "<script>location='reg.php'</script>";
    }
}
?>
<meta charset="utf-8">
<form action="reg.php" method="post">
    用户名:<input type="text" name="name"><br>
    密码:<input type="password" name="pass"><br>
    再次输入密码:<input type="password" name="repass"><br>
    <input type="submit" name="sub" value="注册">
</form>
