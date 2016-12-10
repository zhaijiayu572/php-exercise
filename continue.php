<?php
//for($i=1;$i<10;$i++){
//    for($j=1;$j<=$i;$j++){
//        if($j%3==0){
//            continue;
//        }
//        echo $i."*".$j."=".$j*$i." ";
//    }
//    echo "</br>";  //continue
//}
for($i=1;$i<10;$i++){
    for($j=1;$j<=$i;$j++){
        if($j%3==0){
            break;
        }
        echo $i."*".$j."=".$j*$i." ";
    }
    echo "</br>";  //break
}