<?php
    if(isset($_POST['sub'])){
        for($i=0;$i<7;$i++){
            $rand = rand(0,99);
            $str .= $rand.",";
        }
    }
?>
<meta charset="utf-8">
<table width="400px" align="center">
    <form action="Number-generator.php" method="post">
        <caption><input type="submit" name="sub" value="单击生成随机号码"></caption>
        <tr>
            <td><?php echo $str ?></td>
        </tr>
    </form>
</table>
