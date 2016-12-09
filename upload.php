<?php
    if(isset($_POST['sub'])){
        $file = $_FILES['file'];
        var_dump($file);
        $name = $file[''];
    }

?>
<meta charset="utf-8">
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="sub">
</form>
