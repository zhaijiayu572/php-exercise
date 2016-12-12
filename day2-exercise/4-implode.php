<?php
    if(isset($_POST['sub'])){
        $news = $_POST['news'];
        $glue = ",";
        $str = implode($glue,$news);
        echo "转化字符串的结果为：$str";
    }
?>
<meta charset="utf-8">
<form action="4-implode.php" method="post">
    <p>请输入标题内容和日期</p>
    新闻标题：<input type="text" name="news[]">
    新闻内容：<input type="text" name="news[]">
    新闻日期：<input type="text" name="news[]">
    <input type="submit" name="sub" value="提交">
</form>
