<?php
if(isset($_POST['sub'])){
    $name = $_POST['name'];
    $checkName = array_unique($name);
    if($name == $checkName){
        echo "<script>alert('分组成功')</script>";
    }else{
        echo "<script>alert('姓名有重复')</script>";
    }
}
?>
<meta charset="utf-8">
<form action="9-checkRepate.php" method="post">
    姓名1<input type="text" name="name[]">
    姓名2<input type="text" name="name[]">
    姓名3<input type="text" name="name[]">
    <input type="submit" name="sub" value="提交">
</form>