<?php 
//https://www.booking.com/hotel/kz/shymkent.ru.html
//https://www.booking.com/hotel/kz/megapolis-shymkent.ru.html
//https://www.booking.com/hotel/kz/kainar.ru.html
//https://www.booking.com/hotel/kz/aidana-plaza-shymkent.ru.html
//https://www.booking.com/hotel/kz/rixos-khadisha-shymkent.ru.html
//https://www.booking.com/hotel/kz/canvas-shymkent.ru.html


function Parcing ($hotel) {

     switch ($hotel){
        case 1: $url='https://www.booking.com/hotel/kz/canvas-shymkent.ru.html'; break;
        case 2: $url='https://www.booking.com/hotel/kz/shymkent.ru.html'; break;
        case 3: $url='https://www.booking.com/hotel/kz/megapolis-shymkent.ru.html'; break;
        case 4: $url='https://www.booking.com/hotel/kz/kainar.ru.html'; break;
        case 5: $url='https://www.booking.com/hotel/kz/aidana-plaza-shymkent.ru.html'; break;
        case 6: $url='https://www.booking.com/hotel/kz/rixos-khadisha-shymkent.ru.html'; break;
     }
   
    $ch = curl_init ($url);
   
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt ($ch, CURLOPT_URL, $url);
   $result=curl_exec($ch);
        
   
    curl_close($ch);
/////////////////////////////////////////////////////////////    
    preg_match('|<li class="clearfix one_col" data-question="hotel_clean">.*?</li>|sei',$result, $m);
    $str=implode('',$m);
    
        
    preg_match_all('|<p class="review_score_value">(.*?)</p>|si',$str, $r); 
    $res=implode ("", $r[1]);
    $clean=floatval(str_replace(',','.',$res));
    
        
       
 /////////////////////////////////////////////////////////////   
     preg_match('|<li class="clearfix one_col" data-question="hotel_comfort">.*?</li>|sei',$result, $m);
     $str=implode('',$m);
    
    preg_match_all('|<p class="review_score_value">(.*?)</p>|si',$str, $r); 
    $res=implode ("", $r[1]);
    $comfort=floatval(str_replace(',','.',$res));
       
/////////////////////////////////////////////////////////////    
     preg_match('|<li class="clearfix one_col" data-question="hotel_services">.*?</li>|sei',$result, $m);
    $str=implode('',$m);
    
    preg_match_all('|<p class="review_score_value">(.*?)</p>|si',$str, $r); 
    $res=implode ("", $r[1]);
    $services=floatval(str_replace(',','.',$res));
    
   
///////////////////////////////////////////////////////////    
     preg_match('|<li class="clearfix one_col" data-question="hotel_staff">.*?</li>|sei',$result, $m);
    $str=implode('',$m);
    
    preg_match_all('|<p class="review_score_value">(.*?)</p>|si',$str, $r); 
    $res=implode ("", $r[1]);
    $staff=floatval(str_replace(',','.',$res));
    
        
////////////////////////////////////////////////////////////    
     preg_match('|<li class="clearfix one_col" data-question="hotel_value">.*?</li>|sei',$result, $m);
    $str=implode('',$m);
    
    preg_match_all('|<p class="review_score_value">(.*?)</p>|si',$str, $r); 
    $res=implode ("", $r[1]);
    $value=floatval(str_replace(',','.',$res));
    
        
//////////////////////////////////////////////////////////    
     preg_match('|<li class="clearfix one_col" data-question="hotel_wifi">.*?</li>|sei',$result, $m);
    $str=implode('',$m);
    
    preg_match_all('|<p class="review_score_value">(.*?)</p>|si',$str, $r); 
    $res=implode ("", $r[1]);
    $wifi=floatval(str_replace(',','.',$res));
    
      
///////////////////////////////////////////////////////////    
     preg_match('|<li class="clearfix one_col" data-question="hotel_location">.*?</li>|sei',$result, $m);
    
    $str=implode('',$m);
    
    preg_match_all('|<p class="review_score_value">(.*?)</p>|si',$str, $r); 
    $res=implode ("", $r[1]);
    $location=floatval(str_replace(',','.',$res));
    
            
 /////////////////////////////////////////////////////////////   
      preg_match('|<div class="reviews_panel_header_score ">.*?</div>|sei',$result, $m);
    $x=implode('',$m);
    preg_match_all('|<span class="review-score-badge" role="link" aria-label=.*?>(.*?)</span>|sei', $x, $rt);
$total1=implode('',$rt[1]);
    $total=floatval(str_replace(',','.',$total1));
    
    
  
    
      //$total=floatval(str_replace(',','.',$str));
    
    
 ///////////////////////////////////////////////////////////////////////////////////////// 
 
    
    return array ($clean, $comfort, $services, $staff, $value, $wifi, $location, $total);
    
    
}
    ?>
    
    
    
