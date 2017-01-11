<?php
include "conn.php";
if (isset($_POST['sub'])){
    $cname=$_POST['cname'];
    $sql="select * from catalog where cname='$cname'";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_fetch_array($query);
    if($result){
        echo "<script>alert('已存在')</script>";
        echo "<script>location='addcatalog.php'</script>";
    }else{
        $sql="insert into catalog(cname) values ('$cname')";
        echo $sql;
        $query=mysqli_query($conn,$sql);
        if ($query){
            echo "<script>location='add.php'</script>";
        }


    }

}
?>
<meta charset="UTF-8">
<form action="addcatalog.php" method="post">
    分类名称： <input type="text" name="cname">
    <input type="submit" value="添加分类" name="sub">
</form>

