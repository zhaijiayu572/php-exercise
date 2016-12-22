<?php
if(isset($_COOKIE['id'])){
    setcookie('id',null);
    setcookie('name',null);
    echo "<script>alert('注销成功')</script>";
    echo "<script>location='index.php'</script>";
}