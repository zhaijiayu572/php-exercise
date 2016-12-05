<?php
    if(isset($_POST['sub'])){
        $select = $_POST['select'];
        $ai = rand(1,3);
        if($ai == "1"){
            $result = "电脑出的是石头";
            if($select ==1){
                $result .= " 平局";
            }
            if($select == 2){
                $result .= " 获胜";
            }
            if($select == 3){
                $result .= " 失败";
            }
        }
        if($ai == '2'){
            $result = "电脑出的是剪刀";
            if($select ==2){
                $result .=  " 平局";
            }
            if($select == 3){
                $result .=  " 获胜";
            }
            if($select == 1){
                $result .= " 失败";
            }
        }
        if($ai == '3'){
            $result = "电脑出的是布";
            if($select ==3){
                $result .=  " 平局";
            }
            if($select == 1){
                $result .=  " 获胜";
            }
            if($select == 2){
                $result .=  " 失败";
            }
        }
    }
?>
<head>
    <meta charset="utf-8">
</head>
<body>
<form action="game.php" method="post">
    <select name="select">
        <option value="1">石头</option>
        <option value="2">剪刀</option>
        <option value="3">布</option>
    </select>
    <input type="submit" name="sub">
    <span><?php if(isset($result))echo $result ?></span>

</form>
</body>
