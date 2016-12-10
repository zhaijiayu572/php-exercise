<?php
    if(isset($_POST['sub'])){
        $file = $_FILES['file'];
        $name = $file['name'];
        $arr = ['jpg','docx','txt'];
        $isIllegality = false;
        $a = explode('.',$name);
        $number = count($a)-1;
        $str = $a[$number];

        for($i=0;$i<count($arr);$i++){
            if($str==$arr[$i]){
                $isIllegality = true;
                break;
            }
        }
        if(!$isIllegality){
            move_uploaded_file($file['tmp_name'],"./img/$name");
        }else{
            echo "上传文件非法";
        }

    }

?>
<meta charset="utf-8">
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="sub">
</form>
