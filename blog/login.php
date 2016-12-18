<?php
include "conect.php";
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $arr = ['=','%','&'];
    $bFlag = true;
    for($i=0;$i<strlen($pass);$i++){
        for($j=0;$j<count($arr);$j++){
            if($pass[$i]==$arr[$j]){
                $bFlag = false;
            }
        }
    }
    if($bFlag){
        $sql = "select * from user where name='$name' and pass='$pass'";
        $query = mysqli_query($link,$sql);
        $result = mysqli_fetch_array($query);
        if($result){
            setcookie('id',$result['id']);
            setcookie('name',$result['name']);
            echo "<script>alert('欢迎你".$result['name']."')</script>";
            echo "<script>location='index.php'</script>";
        }else{
            echo "<script>alert('用户名或密码错误')</script>";
            echo "<script>location='login.php'</script>";
        }
    }else{
        echo "<script>alert('输入的密码非法')</script>";
        echo "<script>location='login.php'</script>";
    }
}
?>
<meta charset="utf-8">
<form action="login.php" method="post">
    用户名:<input type="text" name="name"><br>
    密码:<input type="password" name="pass"><br>
    <input type="submit" name="sub">
</form>

