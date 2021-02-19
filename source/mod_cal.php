<?php
require_once 'header.php';
require_once '../source/convert.php';
require_once '../source/dow.php';?>
<meta charset="utf-8">
 <link href="../css/layout.css" rel="stylesheet" type="text/css" />
 <link href="../css/style.css" rel="stylesheet" type="text/css" />

<div class='content'>
    <form action="../source/mod_cal.php" method="post">
       <input type='month' name='varmonth'>
        <input type="submit">
    
    </form>
<?php 
    if (isset ($_POST['varmonth']))
    {
        $date=date_create_from_format('Y-m', $_POST['varmonth']);
        $oci_date =date_format($date, 'm.Y');
        
    }
    else 
        $oci_date=date("m.Y");
    
    convert($oci_date);

       
    echo "<H1>График Дежурств</H1>";
    
echo "<TABLE class='table_blur'>";
echo "<TR>";
echo "<TH>Дата</TH>";
echo "<TH>День недели</TH>";
echo "<TH>ФИО Дежурного</TH>";

$res=queryMysql("SELECT micros_user.id, micros_user.Name, mod_cal.date, mod_cal.userid FROM mod_cal, micros_user where userid=micros_user.id");
 $num=$res->num_rows;
 
 
for ($j=0; $j<$num; $j++){
   echo "<TR>";
    $r=$res->fetch_array(MYSQLI_ASSOC);
    $newdate=date("d.m.Y", strtotime($r['date']));
    $nday=explode(".", $newdate);
    $dayweek=date("w", mktime(0,0,0,(int)$nday[1] ,(int)$nday[0],(int)$nday[2]));

    if ($dayweek==0 or $dayweek==6) {
    echo "<TD bgcolor='YELLOW'>".$newdate."</TD>";
    $nameday=dow($dayweek);
    echo "<TD bgcolor='YELLOW'>".$nameday."</TD>";
    echo "<TD bgcolor='YELLOW'>".$r['Name']."</TD>";
} else {
    echo "<TD>".$newdate."</TD>";
    $nameday=dow($dayweek);
    echo "<TD>".$nameday."</TD>";
    echo "<TD>".$r['Name']."</TD>";
}
}    

         
echo "</TR>";













   /*$month=explode('.', $oci_date);
   $cal= cal_days_in_month(CAL_GREGORIAN, (int) $month[0], (int) $month[1]);

   for ($k=1; $k<=$cal; $k++) {
     $weekd=date("w", mktime(0,0,0,(int)$month[0] ,$k,(int)$month[1]));
     if ($weekd==0 or $weekd==6) {
    echo "<TR>";
    echo "<TD bgcolor='YELLOW'>".$k.".".$month[0].".".$month[1]."</TD>";
    $nday=dow($k,$month);
    echo "<TD bgcolor='YELLOW'>".$nday."</TD>";
    echo "</TR>";
   }
   else {
    echo "<TR>";
    echo "<TD>".$k.".".$month[0].".".$month[1]."</TD>";
    $nday=dow($k,$month);
    echo "<TD>".$nday."</TD>";
    echo "</TR>";
   }
   } */     
  
echo "</TR></TABLE>";
oci_close($dbconnect); 
    ?>

    </div> 
<div class="Foot">
    
    Canvas Hotel Shymkent
    
    </div>    
    
</body>
</html>