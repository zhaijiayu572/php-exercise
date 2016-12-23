<?php
include "conect.php";
if(isset($_POST['sub'])){
    $ca = $_POST['ca'];
    $sql = "insert into catalog(cname) values('$ca')";
    $query = mysqli_query($link,$sql);
    if($query){
        echo "<script>location='add.php'</script>";
    }
}
?>
<meta charset="utf-8">
<form action="catalog.php" method="post">
    分类:<input type="text" name="ca"><input type="submit" name="sub" value="添加">
</form>
