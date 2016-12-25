<?php
include "connect.php";
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $arr = ['=','&','%'];
    $isLegal = true;
    for($i=0;$i<strlen($pass);$i++){
        for($j=0;$j<count($arr);$j++){
            if($pass[$i]==$arr[$j]){
                $isLegal = false;
            }
        }
    }
    if($isLegal){
        $sql = "select * from user where name='$name' and pass='$pass'";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_array($query);
        if($result){
            setcookie('id',$result['id'],time()+60);
            setcookie('name',$result['name']);
            echo "<script>alert('登录成功！')</script>";
            echo "<script>location='index.php'</script>";
        }else{
            echo "<script>alert('登录失败')</script>";
            echo "<script>location='login.php'</script>";
        }
    }else{
        echo "<script>alert('密码非法')</script>";
        echo "<script>location='login.php'</script>";
    }
}
?>
<meta charset="utf-8">
<form action="login.php" method="post">
    用户名:<input type="text" name="name"><br>
    密码:<input type="password" name="pass"><br>
    <input type="submit" value="登录" name="sub">
</form>
