<?php
echo "<table border='1'>";
for ($i=1;$i<10;$i++){
    echo '<tr>';
    for($k=1;$k<$i;$k++){
        echo '<td></td>';
    }
    for($j=9;$j>=$i;$j--){
        echo "<td>";
           echo $j."*".$i."=".$i*$j;
        echo "</td>";
    }
    echo "</tr>";
}
echo '</table>';