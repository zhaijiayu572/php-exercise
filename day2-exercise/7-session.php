<?php
    session_start();
    if(isset($_SESSION['user'])){
        echo "session已经启动";
        if(isset($_POST['add'])){
            array_push($_SESSION['user'],array(
                'number' => count($_SESSION['user'])+1,
                'name' => $_POST['name'],
                'age' => $_POST['age']
            ));

        }
        if(isset($_POST['del'])) {
            array_pop($_SESSION['user']);
        }
        $user = $_SESSION['user'];
        echo "<table border='1' align='center'>";
        echo "<tr><th>编号</th><th>姓名</th><th>年龄</th></tr>";
        foreach ($user as $num => $arr){
            echo "<tr>";
            foreach ($arr as $key => $value){
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }else{
        echo "session未启动";
        if(isset($_POST['add'])){
            $_SESSION['user'] = array();
            array_push($_SESSION['user'],array(
                'number' => count($_SESSION['user'])+1,
                'name' => $_POST['name'],
                'age' => $_POST['age']
            ));
        }
        if(isset($_POST['del'])){
            echo '当前无数据';
        }
        echo "<table border='1' align='center'>";
        echo "<tr><th>编号</th><th>姓名</th><th>年龄</th></tr>";
        foreach ($user as $num => $arr){
            echo "<tr>";
            foreach ($arr as $key => $value){
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }


?>
<meta charset="utf-8">
<form action="7-session.php" method="post">
    <input type="text" name="name">
    <input type="text" name="age">
    <input type="submit" name="add" value="增加">
    <input type="submit" name="del" value="删除">
</form>

