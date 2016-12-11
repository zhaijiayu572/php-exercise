<?php
    if(isset($_POST['sub'])){
        $date = $_POST['date'];
        $schedule = array(
            "01-01" => "出去浪",
            "02-02" => "在家歇",
            "03-03" => "继续浪"
        );
        $count = 0;
        foreach ($schedule as $key => $value){
            if($date == $key){
                echo "<script>alert('".$value."')</script>";
                break;
            }else{
                $count++;
            }
        }
        if($count == count($schedule)){
            echo "<script>alert('无日程安排')</script>";
        }
    }
?>
<meta charset="utf-8">
<form action="2-dateQuery.php" method="post">
    <p>输入查询日期</p>
    <input type="text" name="date">
    <input type="submit" name="sub" value="提交">
    <input type="reset" name="reset" value="重置">
</form>
