<?php
if(isset($_COOKIE['id'])){
    setcookie('name',null);
    setcookie('id',null);
    echo "<script>alert('注销成功')</script>";
    echo "<script>location='index.php'</script>";
}