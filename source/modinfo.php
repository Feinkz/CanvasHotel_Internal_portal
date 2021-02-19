<?php
require_once 'header.php';
require_once '../source/convert.php';?>
<meta charset="utf-8">
 <link href="../css/layout.css" rel="stylesheet" type="text/css" />
 <link href="../css/style.css" rel="stylesheet" type="text/css" />

<div class='content'>

<?php 
 /*   if (isset ($_POST['varmonth']))
    {
        $date=date_create_from_format('Y-m', $_POST['varmonth']);
        $oci_date =date_format($date, 'm.Y');
        
    }
    else 
        $oci_date=date("m.Y");
    
    convert($oci_date);
    
*/echo "<TABLE class='table_blur'>";
echo "<TR>";
/*echo "<TH>Имя Фамилия MOD </TH>";
echo "<TH>Использованная сумма</TH>";
echo "<TH>Остаток</TH>";
 $res=queryMysql("SELECT * FROM micros_user");
 $num=$res->num_rows;
for ($j=0; $j<$num; $j++){
  */ echo "<TR>";
    /*$sum=0;
    $r=$res->fetch_array(MYSQLI_ASSOC);
    echo "<TD>".$r['Name']."</TD>";*/
    $stid=queryOCIopera("SELECT ROOM,  FO_PERS, FO_STATUS FROM OPERA.ROOM  where ROOM > 200 and ROOM < 531 and FO_STATUS='OCC'");
    oci_execute($stid);
    $rooms=0;
    $sum=0;
    while ($row= oci_fetch_array($stid, OCI_BOTH)){
        $sum=$sum+$row['FO_PERS'];
        ++$rooms;
        /*echo "<TD>".$row['ROOM']."</TD>";*/
    }
    
    $stid2=queryOCIopera("SELECT * FROM OPERA.RESERVATION_NAME WHERE RESV_STATUS = 'RESERVED' and TRUNC(BEGIN_DATE) = to_date(sysdate, 'DD-MON-YY')");
    oci_execute($stid2);
    $arrexpect=0;
    while ($row2=oci_fetch_array($stid2, OCI_BOTH)){
        ++$arrexpect;
    }
    
     $stid3=queryOCIopera("SELECT * FROM OPERA.RESERVATION_NAME WHERE RESV_STATUS = 'CHECKED IN' and TRUNC(BEGIN_DATE) = to_date(sysdate, 'DD-MON-YY') AND GUEST_LAST_NAME_SDX != 'M262'");
    oci_execute($stid3);
    $arractual=0;
    while ($row3=oci_fetch_array($stid3, OCI_BOTH)){
        ++$arractual;
    }
    echo "Количество заселенных комнат: ".$rooms."<br>"; 
    echo "Количество проживающих гостей: ".$sum."<br>";
    $occupancy=($rooms/120)*100;
    echo "Заселяемость: ".$occupancy." %<br>";
    echo "Ожидаемые заезды: ".$arrexpect; 
    echo "     Заезды:   ".$arractual;
         
echo "</TR>";
            
  
echo "</TR></TABLE>";
oci_close($dbconnectopera); 
    ?>
    </div> 
<div class="Foot">
    
    Canvas Hotel Shymkent
    
    </div>    
    
</body>
</html>


