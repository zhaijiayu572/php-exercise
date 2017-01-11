<?php
if(isset($_COOKIE['uid'])){
    setcookie('uid',null);
    setcookie('uname',null);
    echo "<script>alert('注销成功')</script>";
    echo "<script>location='index.php'</script>";
}else{
    echo "<script>location='index.php'</script>";
}