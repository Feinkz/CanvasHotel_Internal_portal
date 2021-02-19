<?php

function dow($day){

switch ($day) {
    case 0:$d='Воскресенье';break;
    case 1:$d='Понедельник';break;
    case 2:$d='Вторник';break;
    case 3:$d='Среда';break;
    case 4:$d='Четверг';break;
    case 5:$d='Пятница';break;
    case 6:$d='Суббота';break;
    
}

return($d);

}

?>