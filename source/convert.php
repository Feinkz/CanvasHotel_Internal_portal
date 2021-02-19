<?php

function convert($cdate){
    $date=explode(".", $cdate);
      switch ($date[0]){
        case 1: $m='Январь'; break;
        case 2: $m='Февраль'; break;
        case 3: $m='Март'; break;
        case 4: $m='Апрель'; break;
        case 5: $m='Май'; break;
        case 6: $m='Июнь'; break;
        case 7: $m='Июль'; break;
        case 8: $m='Август'; break;
        case 9: $m='Сентябрь'; break;
        case 10: $m='Октябрь'; break;
        case 11: $m='Ноябрь'; break;
        case 12: $m='Декабоь'; break;
    }
    echo "<H1>".$m."</H1>";
}




?>