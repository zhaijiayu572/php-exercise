<?php
$student = array(
    "lilei" => 89,
    "Peter" => 90,
    "top" => 69
);
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    if(array_key_exists($name,$student)){
        echo "<script>alert('学生的成绩是".$student[$name]."分')</script>";
    }else{
        echo "<script>alert('该学生不存在')</script>";
    }
}
?>
<meta charset="utf-8">
<form action="10-queryGrade.php" method="post">
    <p>请输入姓名</p>
    <input type="text" name="name">
    <input type="submit" name="sub" value="查询">
</form>
