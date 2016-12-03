<?php
    if(isset($_POST['sub'])){
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        if($num1 == ""){
            $result = "第一个空为空";
        }
        if($num2 == ""){
            $result = "第二个空为空";
        }
        if($num1!=""&&$num1!=""){
            if(!is_numeric($num1)){
                $result = "第一个空不是数字";
            }
            if(!is_numeric($num2)){
                $result = "第二个空不是数字";
            }
            if(is_numeric($num1)&&is_numeric($num2)){
                $calculate = $_POST["calculate"];
                if($calculate == "+"){
                    $result = $num1+$num2;
                }
                if($calculate == "-"){
                    $result = $num1-$num2;
                }
                if($calculate == "*"){
                    $result = $num1*$num2;
                }
                if($calculate == "/"){
                    $result = $num1*$num2;
                }
                if($calculate == "%"){
                    $result = $num1%$num2;
                }
            }
        }
    }
?>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="calculator.php" method="post">
    <table border="1">
        <tr>
            <td><input type="text" name="num1" value="<?php
                if(isset($num1)){
                    echo $num1;
                }
                ?>"></td>
            <td>
                <select name="calculate">
                    <option value="+" <?php if(isset($calculate)&&$calculate == "+") echo "selected"?> >+</option>
                    <option value="-" <?php if(isset($calculate)&&$calculate == "-") echo "selected"?> >-</option>
                    <option value="*" <?php if(isset($calculate)&&$calculate == "*") echo "selected"?> >✖️</option>
                    <option value="/" <?php if(isset($calculate)&&$calculate == "/") echo "selected"?> >/</option>
                    <option value="%" <?php if(isset($calculate)&&$calculate == "%") echo "selected"?> >%</option>
                </select>
            </td>
            <td><input type="text" name="num2" value="<?php
                if(isset($num2)){
                    echo $num2;
                }
                ?>"></td>
            <td><input type="submit" value="计算" name="sub"></td>
        </tr>
        <tr>
            <td rowspan="4">结果为<?php if(isset($result))echo $result?></td>
        </tr>
    </table>
</form>
</body>

