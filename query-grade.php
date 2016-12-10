<?php
    if(isset($_POST['sub'])){
        $grade = $_POST['grade'];
        if($grade>=80){
            echo "<script>alert('成绩优秀')</script>";
        }elseif ($grade>=60&&$grade<80){
            echo "<script>alert('成绩良好')</script>";
        }else{
            echo "<script>alert('不合格')</script>";
        }
    }
?>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="query-grade.php" method="post">
    <h3>请输入要查询的成绩</h3>
    分数<input type="text" name="grade">
    <input type="submit" name="sub">
    <input type="reset" name="reset">
</form>
</body>
