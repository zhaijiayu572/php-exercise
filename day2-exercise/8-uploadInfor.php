<?php
    if(isset($_POST['sub'])){
        $file = $_FILES['file'];
        $type = explode("/",$file['type'])[1];
    }
?>
<meta charset="utf-8">
<form method="post" action="8-uploadInfor.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="sub">
</form>
<?php
if(isset($_POST['sub'])){
    echo "<p>上传文件信息</p>";
    echo "<p>文件名<span>".$file['name']."</span></p>";
    echo "<p>文件类型<span>".$type."</span></p>";
    echo "<p>文件大小<span>".$file['size']."字节</span></p>";
}

?>
