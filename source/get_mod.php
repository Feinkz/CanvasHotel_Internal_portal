<?php
     
require_once 'function.php';
    
 $oci_date=date("m.Y");
    


$result = queryMysql("SELECT * FROM micros_user");

 $res = array();  
$user=array ();
    while ($r=$result->fetch_array(MYSQLI_ASSOC)) {
        
        $user["microsid"]=$r["microsid"];
        $user["Name"]=$r["Name"];
      
         $stid=queryOCI("SELECT  tendermediatotal, tendermediaid FROM LOCATION_ACTIVITY_DB.tender_media_fp_total where  to_date((to_char(businessdate, 'MM.YYYY')), 'MM.YY') = to_date('".$oci_date."','MM.YY') AND tendermediaid=".$r['microsid']);
    oci_execute($stid);
    $sum=0;
    while ($row= oci_fetch_array($stid, OCI_BOTH)){
        $sum=$sum+$row['TENDERMEDIATOTAL'];
    }
      $user["sum"]=round($sum);
          array_push($res,$user);        
    }
   
    echo json_encode($res);
    

?>
    



