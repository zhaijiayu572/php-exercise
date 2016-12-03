<?php
echo "<table border='1'>";
for ($i=9;$i>0;$i--){
    echo '<tr>';
    for($j=$i;$j>0;$j--){
        echo "<td>".$i."*".$j."=".$i*$j."</td>";
    }
    echo "</tr>";
}
echo '</table>';