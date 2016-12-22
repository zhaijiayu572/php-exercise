<?php
include "connect.php";
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $arr = ['%','=','&'];
    $isLegal = true;
    $sql = "select * from user where name = '$name'";
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($query);
    if($result){
        echo "<script>alert('用户名已存在')</script>";
        echo "<script>location='register.php'</script>";
    }else{
        if($pass==$repass){
            for($i=0;$i<strlen($pass);$i++){
                for($j=0;$j<count($arr);$j++){
                    if($pass[$i]==$arr[$j]){
                        $isLegal = false;
                    }
                }
            }
            if($isLegal){
                $sql = "insert into user(name,pass) values('$name','$pass')";
                $query = mysqli_query($link,$sql);
                if($sql){
                    echo "<script>alert('注册成功')</script>";
                    echo "<script>location='login.php'</script>";
                }else{
                    echo "error";
                }
            }else{
                echo "<script>alert('密码非法')</script>";
                echo "<script>location='register.php'</script>";
            }
        }else{
            echo "<script>alert('两次密码不一致')</script>";
            echo "<script>location='register.php'</script>";
        }
    }
    }

?>
<meta charset="utf-8">
<form action="register.php" method="post">
    用户名:<input type="text" name="name"><br>
    密码:<input type="password" name="pass"><br>
    再次输入密码:<input type="password" name="repass"><br>
    <input type="submit" value="注册" name="sub">
</form>
