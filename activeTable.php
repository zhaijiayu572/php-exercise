<?php
    if(isset($_POST['sub'])){
        $row = $_POST['row'];
        $line = $_POST['line'];
        if($row!=""&&$line!=""){
            echo '<table border=1>';
            for($i=0;$i<$row;$i++){
//                echo "<tr style='background: ".$i%2 == 0? 'red': 'blue'."'>";
                if($i%2 == 0){
                    echo "<tr style='background: red'>";
                }else{
                    echo "<tr style='background: blue'>";
                }
                for($j=0;$j<$line;$j++){
                    if($j%2 == 0){
                        echo "<td>".$j."</td>";
                        continue;
                    }
                    echo "<td >".$j."</td>";

                }
                echo "</tr>";
            }
            echo '</table>';
        }else{
            echo "无法创建表格";
        }

    }
?>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="activeTable.php" method="post">
    <p>输入行列生成表格</p>
    输入行: <input type="text" name="row">
    输入列: <input type="text" name="line">
    <input type="submit" name="sub">
    <input type="reset" name="reset">
</form>
</body>
