<?php
require_once 'header.php';
require_once '../source/convert.php';?>
<meta charset="utf-8">
 <link href="../css/layout.css" rel="stylesheet" type="text/css" />
 <link href="../css/style.css" rel="stylesheet" type="text/css" />

<div class='content'>
    <form action="../source/modfb.php" method="post">
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
    
    echo "<H1>Расходы Менеджеров</H1>";
    
echo "<TABLE class='table_blur'>";
echo "<TR>";
echo "<TH>Имя Фамилия MOD </TH>";
echo "<TH>Использованная сумма</TH>";
echo "<TH>Остаток</TH>";
 $res=queryMysql("SELECT * FROM micros_user");
 $num=$res->num_rows;
for ($j=0; $j<$num; $j++){
   echo "<TR>";
    $sum=0;
    $r=$res->fetch_array(MYSQLI_ASSOC);
    echo "<TD>".$r['Name']."</TD>";
    $stid=queryOCI("SELECT  tendermediatotal, tendermediaid FROM LOCATION_ACTIVITY_DB.tender_media_fp_total where  to_date((to_char(businessdate, 'MM.YYYY')), 'MM.YY') = to_date('".$oci_date."','MM.YY') AND tendermediaid=".$r['microsid']);
    oci_execute($stid);
    $sum=0;
    while ($row= oci_fetch_array($stid, OCI_BOTH)){
        $sum=$sum+$row['TENDERMEDIATOTAL'];
    }
    echo "<TD>".$sum=round($sum)."</TD>";
    echo "<TD>".$ostatok=5000-(int)$sum."</TD>";
            }
         
echo "</TR>";
            
  
echo "</TR></TABLE>";
    
/*  echo "<H1>Ужины MOD </H1>";  
    
    
    echo "<TABLE class='table_blur'>";
echo "<TR>";
echo "<TH>Имя Фамилия MOD </TH>";
echo "<TH>Использованная сумма</TH>";
echo "<TH>Остаток</TH>";
echo "<TH>Количество Дежурств</TH>";
 $res2=queryMysql("SELECT * FROM mod_dinner");
 $num2=$res2->num_rows;
for ($j=0; $j<$num2; $j++){
   echo "<TR>";
    $sum2=0;
    $r2=$res2->fetch_array(MYSQLI_ASSOC);
    echo "<TD>".$r2['Name']."</TD>";
    $stid2=queryOCI("SELECT  tendermediatotal, tendermediaid FROM LOCATION_ACTIVITY_DB.tender_media_fp_total where  to_date((to_char(businessdate, 'MM.YYYY')), 'MM.YY') = to_date('".$oci_date."','MM.YY') AND tendermediaid=".$r2['microsid']);
    oci_execute($stid2);
    $sum2=0;
    $col=0;
    while ($row2= oci_fetch_array($stid2, OCI_BOTH)){
        $sum2=$sum2+$row2['TENDERMEDIATOTAL'];
        $col++;
    }
    echo "<TD>".$sum2=round($sum2)."</TD>";
    echo "<TD>".$ostatok2=$col*10000-$sum2."</TD>";
    echo "<TD>".$col."</TD>";
            }
         
echo "</TR>";*/
            
  
echo "</TR></TABLE>";
oci_close($dbconnect); 
    ?>
    </div> 
<div class="Foot">
    
    Canvas Hotel Shymkent
    
    </div>    
    
</body>
</html>


