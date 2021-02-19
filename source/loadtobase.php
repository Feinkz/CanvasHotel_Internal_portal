<?php
require_once '/var/www/canvashotel/source/parcing.php';
require_once '/var/www/canvashotel/source/function.php';

$date=date ("y-m-d");  

for ($i=1; $i<=6; $i++)
    {
        $var=Parcing ($i);
     $res=queryMysql("INSERT INTO `booking` (`id`, `id_hotel`, `clean`, `comfort`, `services`, `staff`, `value`, `wifi`, `location`, `total`, `date`) VALUES (NULL, '".$i."', '".$var[0]."', '".$var[1]."', '".$var[2]."', '".$var[3]."', '".$var[4]."', '".$var[5]."', '".$var[6]."', '".$var[7]."', '".$date."')");
    
   
    }


?>


