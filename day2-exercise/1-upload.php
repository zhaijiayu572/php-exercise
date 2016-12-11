<?php
    if(isset($_POST['sub'])){
        $file = $_FILES['file'];
        $name = $file['name'];
        $arr = explode('.',$name);
        $number = count($arr)-1;
        $hz = $arr[$number];
    }
?>
<meta charset="utf-8">
<form method="post" action="1-upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="sub" value="检测">
    <p><?php if(isset($_POST['sub']))echo "上传文件的扩展名为: $hz"?></p>
</form>
