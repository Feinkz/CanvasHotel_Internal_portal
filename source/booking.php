<?php
require_once 'header.php';
require_once 'function.php'?>
<meta charset="utf-8">
 <link href="../css/layout.css" rel="stylesheet" type="text/css" />
 <link href="../css/style.css" rel="stylesheet" type="text/css" />
<div class='content'>
     <form action="../source/booking.php" method="post">
       <input type='date' name='bdate'>
        <input type="submit">
    
    </form>
    
<?php
    if (isset ($_POST['bdate']))
    {
        $date=$_POST['bdate'];
               
    }
    else       
        $date=date ("Y-m-d");


echo $date;
   echo "<TABLE class='table_blur'>";
echo "<TR><TH></TH><TH>Чистота</TH><TH>Комфорт</TH><TH>Сервис</TH><TH>Персонал</TH><TH>Цена/Качество</TH><TH>Wi-FI</TH><TH>Расположение</TH><TH>Оценка</TH></TR>";
$res=queryMysql("SELECT * FROM hotels");
 $num=$res->num_rows;
for ($j=0; $j<$num; $j++){

    $r=$res->fetch_array(MYSQLI_ASSOC);
    echo "<TR><TH>".$r['short_name']."</TH>";
        $res2=queryMysql("SELECT * FROM booking WHERE id_hotel=".$r['id']." AND date=STR_TO_DATE('".$date."','%Y-%m-%d')");
        $num2=$res2->num_rows;
            for ($k=0; $k<$num2; $k++){
                $r2=$res2->fetch_array(MYSQLI_ASSOC);
                   
                    echo "<TD>".$r2['clean']."</TD>";
                    echo "<TD>".$r2['comfort']."</TD>";
                    echo "<TD>".$r2['services']."</TD>";
                    echo "<TD>".$r2['staff']."</TD>";
                    echo "<TD>".$r2['value']."</TD>";
                    echo "<TD>".$r2['wifi']."</TD>";
                    echo "<TD>".$r2['location']."</TD>";
                    echo "<TH>".$r2['total']."</TH>";
            } 

    echo "</TR>";
    
}
  
echo "</TABLE>";
    
 ?>   
    
</div>

<div class="Foot">
    
    Canvas Hotel Shymkent
    
    </div>    
    
</body>
</html>
