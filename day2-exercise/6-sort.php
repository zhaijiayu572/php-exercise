<?php
$arr = array('2012 MacBook Pro','2009 iMac','2001 MacBook Air','2007 iPad1');
for($i=0;$i<count($arr);$i++) {
    $a = explode(" ", $arr[$i]);
    $year[$i] = $a[0];
}
sort($year);
$sortArr = array();
foreach ($year as $key => $value){
    for($i=0;$i<count($arr);$i++){
        if(strstr($arr[$i],$value)){
            $sortArr[$key] = $arr[$i];
        }
    }
}
?>
<meta charset="utf-8">
<table border="1">
    <tr>
        <td>1</td>
        <td>
            <?php
            echo $arr[0];
            if(isset($_POST['normal'])){
                echo $sortArr[0];
            }
            if(isset($_POST['inverted'])){
                echo $sortArr[3];
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>
            <?php
            echo $arr[1];
            if(isset($_POST['normal'])){
                echo $sortArr[1];
            }
            if(isset($_POST['inverted'])){
                echo $sortArr[2];
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td>
            <?php
            echo $arr[2];
            if(isset($_POST['normal'])){
                echo $sortArr[2];
            }
            if(isset($_POST['inverted'])){
                echo $sortArr[1];
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td>
            <?php
            echo $arr[3];
            if(isset($_POST['normal'])){
                echo $sortArr[3];
            }
            if(isset($_POST['inverted'])){
                echo $sortArr[0];
            }
            ?>
        </td>
    </tr>
    <tr>
        <form action="6-sort.php" method="post">
            <td>
                <input type="submit" name="normal" value="正序">
                <input type="submit" name="inverted" value="倒序">
            </td>
        </form>
    </tr>
</table>
