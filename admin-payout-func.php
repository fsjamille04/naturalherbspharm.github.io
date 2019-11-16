<?php
include("dbconnection.php"); 
error_reporting(0);

$id = $_POST['userid'];

$idr=0;

$mainsumpurchase = 0;

$nameArray = array();
$nameArray = array();
$nameArray2 = array();
$nameArray3 = array();
$nameArray4 = array();
$nameArray5 = array();
$nameArray6 = array();
$nameArray7 = array();
$nameArray8 = array();
 $nameArray9 = array();
 $nameArray10 = array();


$namefn = array();
$namefn2 = array();
$namefn3 = array();
$namefn4 = array();
$namefn5 = array();
$namefn6 = array();
$namefn7 = array();
$namefn8 = array();
$namefn9 = array();
$namefn10 = array();


$sp = array();
$sp2 = array();
$sp3 = array();
$sp4 = array();
$sp5 = array();
$sp6 = array();
$sp7 = array();
$sp8 = array();
$sp9 = array();
$sp10 = array();

$tp = array();
$tp2 = array();
$tp3 = array();
$tp4 = array();
$tp5 = array();
$tp6 = array();
$tp7 = array();
$tp8 = array();
$tp9 = array();
$tp10 = array();

$main = 0;
$lvl1 = 0;
$lvl2 = 0;
$lvl3 = 0;
$lvl4 = 0;
$lvl5 = 0;
$lvl6 = 0;
$lvl7 = 0;
$lvl8 = 0;
$lvl9 = 0;

$indirect_1 = 0;
$indirect_2 = 0;
$indirect_3 = 0;
$indirect_4 = 0;
$indirect_5 = 0;


$sumpurchase = 0;
$sumpurchase2 = 0;
$sumpurchase3 = 0;
$sumpurchase4 = 0;
$sumpurchase5 = 0;
$sumpurchase6 = 0;
$sumpurchase7 = 0;
$sumpurchase8 = 0;
$sumpurchase9 = 0;
$sumpurchase10 = 0;


$indirect_count = 0;
$indirect_count1 = 0;
$indirect_count2 = 0;
$indirect_count3 = 0;
$indirect_count4 = 0;

$sumindirect = 0;
$sumindirect1 = 0;
$sumindirect2 = 0;
$sumindirect3 = 0;
$sumindirect4 = 0;

$maintstp700=0;
$mainsumpurchase700 = 0;
$sumindirect700 = 0;

$lvl0PSnew = 0;
$lvl1PSnew = 0;
$lvl2PSnew = 0;
$lvl3PSnew = 0;
$lvl4PSnew = 0;
$lvl5PSnew = 0;
$lvl6PSnew = 0;
$lvl7PSnew = 0;
$lvl8PSnew = 0;
$lvl9PSnew = 0;

$lvl0PS700 = 0;
$lvl1PS700 = 0;
$lvl2PS700 = 0;
$lvl3PS700 = 0;
$lvl4PS700 = 0;
$lvl5PS700 = 0;
$lvl6PS700 = 0;
$lvl7PS700 = 0;
$lvl8PS700 = 0;
$lvl9PS700 = 0;

$lvl1indinew = 0;
$lvl2indinew = 0;
$lvl3indinew = 0;
$lvl4indinew = 0;
$lvl5indinew = 0;

$lvl1indi700 = 0;
$lvl2indi700 = 0;
$lvl3indi700 = 0;
$lvl4indi700 = 0;
$lvl5indi700 = 0;

$main_700 = 0;
$value_main_purchase_700 = 0;
$sumindirect_700 = 0;
$lvl1_700 = 0;
$lvl2_700 = 0;
$lvl3_700 = 0;
$lvl4_700 = 0;
$lvl5_700 = 0;
$indirect_1_700 = 0;
$indirect_2_700 = 0;
$indirect_3_700 = 0;
$indirect_4_700 = 0;
$indirect_5_700 = 0;

$count1new = 0;
$count2new = 0;
$count3new = 0;
$count4new = 0;
$count5new = 0; 
$count1700 = 0;
$count2700 = 0;
$count3700 = 0;
$count4700 = 0;
$count5700 = 0; 



$first = mysqli_fetch_assoc(mysqli_query ($conn,"SELECT status_new  FROM member where uid='$id' ")); 
$first_stat = $first['status_new'];
   

$personal0 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$id' "); 
while( $personal0row = mysqli_fetch_assoc($personal0)){
    if($first_stat == '700'){
        $lvl0PS700 += $personal0row['amt'];  
    }else{
        if( $personal0row['status_new'] == 'new' ){
            $lvl0PSnew += $personal0row['amt'];  
        }
        if( $personal0row['status_new'] == '700' ){
            $lvl0PS700 += $personal0row['amt'];  
        }
    } 
}

$indirect1 = mysqli_query ($conn,"SELECT uid as dr, status_new FROM member WHERE sid = '$id' "); 
while( $indirect1row = mysqli_fetch_assoc($indirect1)){   
    if($first_stat == '700'){ 
        $count1700++;  
    }else{ 
        if( $indirect1row['status_new'] == 'new' ){
            $count1new++;  
        }
        if( $indirect1row['status_new'] == '700' ){
            $count1700++;  
        }
    }    
}

$sql="SELECT * FROM member where sid='$id'  ";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {


$nameArray[] = $row['uid']; 
$namefn[] = $row['fn'].' '. $row['mn'].' '.$row['ln'];  
$hid1=$row['uid'];
$name = $row['fn'].' '. $row['mn'].' '.$row['ln'];
 
 

$personal1 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid1' "); 
while( $personal1row = mysqli_fetch_assoc($personal1)){
    if($first_stat == '700'){ 
        $lvl1PS700 += $personal1row['amt'];   
    }else{ 
        if( $personal1row['status_new'] == 'new' ){
            $lvl1PSnew += $personal1row['amt'];  
        }
        if( $personal1row['status_new'] == '700' ){
            $lvl1PS700 += $personal1row['amt'];  
        }
    }
}

$indirect2 = mysqli_query ($conn,"SELECT uid as dr, status_new FROM member WHERE sid = '$hid1' "); 
while( $indirect2row = mysqli_fetch_assoc($indirect2)){
    if($first_stat == '700'){ 
        $count2700++;   
    }else{ 
        if( $indirect2row['status_new'] == 'new' ){
            $count2new++;  
        }
        if( $indirect2row['status_new'] == '700' ){
            $count2700++;  
        }
    }    
}



    $sql2="SELECT * FROM member where sid= '$hid1'  ";
    $result2 = mysqli_query($conn,$sql2);
    while($row2 = mysqli_fetch_array($result2)) {
    $sp2[] = $name;  
    
    $nameArray2[] = $row2['uid']; 
    $namefn2[] = $row2['fn'].' '. $row2['mn'].' '.$row2['ln']; 
    $hid2=$row2['uid'];
    $name2 = $row2['fn'].' '. $row2['mn'].' '.$row2['ln'];

    $personal2 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid2' "); 
    while( $personal2row = mysqli_fetch_assoc($personal2)){
        if($first_stat == '700'){ 
            $lvl2PS700 += $personal2row['amt'];   
        }else{ 
            if( $personal2row['status_new'] == 'new' ){
                $lvl2PSnew += $personal2row['amt'];  
            }
            if( $personal2row['status_new'] == '700' ){
                $lvl2PS700 += $personal2row['amt'];  
            }
        }    
    }
   
    $indirect3 = mysqli_query ($conn,"SELECT uid as dr, status_new FROM member WHERE sid = '$hid2' "); 
    while( $indirect3row = mysqli_fetch_assoc($indirect3)){
        if($first_stat == '700'){ 
            $count3700++;   
        }else{
            if( $indirect3row['status_new'] == 'new' ){
                $count3new++;  
            }
            if( $indirect3row['status_new'] == '700' ){
                $count3700++;  
            }
        }    
    }
    

        $sql3="SELECT * FROM member where sid= '$hid2'  ";
        $result3 = mysqli_query($conn,$sql3);
        while($row3 = mysqli_fetch_array($result3)) {
        $sp3[] = $name2;
         
         $namefn3[] = $row3['fn'].' '. $row3['mn'].' '.$row3['ln'];                          
        $nameArray3[] = $row3['uid']; 
        $hid3=$row3['uid'];
        $name3 = $row3['fn'].' '. $row3['mn'].' '.$row3['ln'];
        
        $personal3 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid3' "); 
        while( $personal3row = mysqli_fetch_assoc($personal3)){
            if($first_stat == '700'){ 
                $lvl3PS700 += $personal3row['amt'];   
            }else{ 
                if( $personal3row['status_new'] == 'new' ){
                    $lvl3PSnew += $personal3row['amt'];  
                }
                if( $personal3row['status_new'] == '700' ){
                    $lvl3PS700 += $personal3row['amt'];  
                }
            }    
        }
       
        $indirect4 = mysqli_query ($conn,"SELECT  uid  as dr, status_new FROM member WHERE sid = '$hid3' "); 
        while( $indirect4row = mysqli_fetch_assoc($indirect4)){
            
            if($first_stat == '700'){ 
                $count4700++;   
            }else{
                if( $indirect4row['status_new'] == 'new' ){
                    $count4new++;  
                }
                if( $indirect4row['status_new'] == '700' ){
                    $count4700++;  
                }
            }
        }
        
            $sql4="SELECT * FROM member where sid= '$hid3'  ";
            $result4 = mysqli_query($conn,$sql4);
            
            while($row4 = mysqli_fetch_array($result4)) {
             $sp4[] = $name3;
            $hid4=$row4['uid'];
            
            $namefn4[] = $row4['fn'].' '. $row4['mn'].' '.$row4['ln']; 
            $nameArray4[] = $row4['uid'];
            $name4 = $row4['fn'].' '. $row4['mn'].' '.$row4['ln']; 
            
            $personal4 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid4' "); 
            while( $personal4row = mysqli_fetch_assoc($personal4)){
                if($first_stat == '700'){ 
                    $lvl4PS700 += $personal4row['amt'];   
                }else{ 
                    if( $personal4row['status_new'] == 'new' ){
                        $lvl4PSnew += $personal4row['amt'];  
                    }
                    if( $personal4row['status_new'] == '700' ){
                        $lvl4PS700 += $personal4row['amt'];  
                    }
                }    
            }
             
            $indirect5 = mysqli_query ($conn,"SELECT  uid  as dr, status_new FROM member WHERE sid = '$hid4' "); 
            while( $indirect5row = mysqli_fetch_assoc($indirect5)){
                
                if($first_stat == '700'){ 
                    $count5700++;   
                }else{
                    if( $indirect5row['status_new'] == 'new' ){

                        $count5new++;  
                    }
                    if( $indirect5row['status_new'] == '700' ){
                        $count5700++;  
                    }
                }    
            }
                                                  

                $sql5="SELECT * FROM member where sid= '$hid4' ";
                $result5 = mysqli_query($conn,$sql5);
                while($row5 = mysqli_fetch_array($result5)) {
                $sp5[] = $name4;
                $hid5=$row5['uid'];
                
                $namefn5[] = $row5['fn'].' '. $row5['mn'].' '.$row5['ln']; 
                $nameArray5[] = $row5['uid'];       
                $name5 = $row5['fn'].' '. $row5['mn'].' '.$row5['ln'];    

                $personal5 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid5' "); 
                while( $personal5row = mysqli_fetch_assoc($personal5)){
                    if($first_stat == '700'){ 
                        $lvl5PS700 += $personal5row['amt'];   
                    }else{ 
                        if( $personal5row['status_new'] == 'new' ){
                            $lvl5PSnew += $personal5row['amt'];  
                        }
                        if( $personal5row['status_new'] == '700' ){
                            $lvl5PS700 += $personal5row['amt'];  
                        }
                    }    
                }
                

                    $sql6="SELECT * FROM member where sid= '$hid5' ";
                    $result6 = mysqli_query($conn,$sql6);
                    while($row6 = mysqli_fetch_array($result6)) {
                     $sp6[] = $name5;
                    $hid6=$row6['uid'];
                    $nameArray6[] = $row6['uid']; 
                    
                    $namefn6[] = $row6['fn'].' '. $row6['mn'].' '.$row6['ln'];
                    $name6 = $row6['fn'].' '. $row6['mn'].' '.$row6['ln'];

                    $personal6 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid6' "); 
                    while( $personal6row = mysqli_fetch_assoc($personal6)){
                        if($first_stat == '700'){ 
                            $lvl6PS700 += $personal6row['amt'];   
                        }else{ 
                            if( $personal6row['status_new'] == 'new' ){
                                $lvl6PSnew += $personal6row['amt'];  
                            }
                            if( $personal6row['status_new'] == '700' ){
                                $lvl6PS700 += $personal6row['amt'];  
                            }
                        }    
                    }

                        $sql7="SELECT * FROM member where sid= '$hid6' ";
                        $result7 = mysqli_query($conn,$sql7);
                        while($row7 = mysqli_fetch_array($result7)) {
                         $sp7[] = $name6;
                        $hid7=$row7['uid'];
                        $nameArray7[] = $row7['uid'];
                        
                        $namefn7[] = $row7['fn'].' '. $row7['mn'].' '.$row7['ln'];
                        $name7 = $row7['fn'].' '. $row7['mn'].' '.$row7['ln'];    

                        $personal7 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid7' "); 
                        while( $personal7row = mysqli_fetch_assoc($personal7)){
                            if($first_stat == '700'){ 
                                $lvl7PS700 += $personal7row['amt'];   
                            }else{ 
                                if( $personal7row['status_new'] == 'new' ){
                                    $lvl7PSnew += $personal7row['amt'];  
                                }
                                if( $personal7row['status_new'] == '700' ){
                                    $lvl7PS700 += $personal7row['amt'];  
                                }
                            }    
                        }

                            $sql8="SELECT * FROM member where sid= '$hid7'  ";
                            $result8 = mysqli_query($conn,$sql8);
                            while($row8 = mysqli_fetch_array($result8)) {
                             $sp8[] = $name7;
                            $hid8=$row8['uid'];
                            $nameArray8[] = $row8['uid'];
                            
                            $namefn8[] = $row8['fn'].' '. $row8['mn'].' '.$row8['ln'];
                            $name8 = $row8['fn'].' '. $row8['mn'].' '.$row8['ln'];
                                
                            $personal8 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid8' "); 
                            while( $personal8row = mysqli_fetch_assoc($personal8)){
                                if($first_stat == '700'){ 
                                    $lvl8PS700 += $personal8row['amt'];   
                                }else{ 
                                    if( $personal8row['status_new'] == 'new' ){
                                        $lvl8PSnew += $personal8row['amt'];  
                                    }
                                    if( $personal8row['status_new'] == '700' ){
                                        $lvl8PS700 += $personal8row['amt'];  
                                    }
                                }       
                            }
                                $sql9="SELECT * FROM member where sid= '$hid8'  ";
                                $result9 = mysqli_query($conn,$sql9);
                                while($row9 = mysqli_fetch_array($result9)) {
                                 $sp9[] = $name8;
                                $hid9=$row9['uid'];
                                $nameArray9[] = $row9['uid'];
                                
                                $namefn9[] = $row9['fn'].' '. $row9['mn'].' '.$row9['ln'];
                                $name9 = $row9['fn'].' '. $row9['mn'].' '.$row9['ln'];
                                
                                $personal9 = mysqli_query ($conn,"SELECT  amt , status_new  FROM new_purchase where id='$hid9' "); 
                                while( $personal9row = mysqli_fetch_assoc($personal9)){
                                    if($first_stat == '700'){ 
                                        $lvl9PS700 += $personal9row['amt'];   
                                    }else{ 
                                        if( $personal9row['status_new'] == 'new' ){
                                            $lvl9PSnew += $personal9row['amt'];  
                                        }
                                        if( $personal9row['status_new'] == '700' ){
                                            $lvl9PS700 += $personal9row['amt'];  
                                        }
                                    }    
                                }
                                    
                           } }
                        }
                    }
                }

            }

        }

    } 
                                              
}

 
 


$sql = "SELECT * FROM member WHERE uid = '$id' ";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  
      $fullname= $row['fn'].' '.$row['mn'].' '.$row['ln'] ;
      $pick_up = $row['pick_up'];
 
   }
       
   
      
 

$query = "SELECT  uid,main_purchase as main,level_1 as lvl1,level_2 as lvl2,level_3 as lvl3,level_4 as lvl4,level_5 as lvl5,level_6 as lvl6,level_7 as lvl7,level_8  as lvl8,level_9 as lvl9,indirect_1 as indirect1,indirect_2 as indirect2,indirect_3 as indirect3,indirect_4 as indirect4,indirect_5 as indirect5 , status_new FROM admin_withdraw where uid =  '".$id."' ";
$result2 = mysqli_query ($conn, $query);

    while ($getrow = mysqli_fetch_assoc($result2)) {
        if( $getrow['status_new'] =='new' ){
            $uid = $getrow['uid'];
            $main += $getrow['main'];
            $lvl1 += $getrow['lvl1'];
            $lvl2 += $getrow['lvl2'];
            $lvl3 += $getrow['lvl3'];
            $lvl4 += $getrow['lvl4'];
            $lvl5 += $getrow['lvl5'];
            $lvl6 += $getrow['lvl6'];
            $lvl7 += $getrow['lvl7'];
            $lvl8 += $getrow['lvl8'];
            $lvl9 += $getrow['lvl9'];
            $indirect_1 += $getrow['indirect1'];
            $indirect_2 += $getrow['indirect2'];
            $indirect_3 += $getrow['indirect3'];
            $indirect_4 += $getrow['indirect4'];
            $indirect_5 += $getrow['indirect5'];   
        }
        if( $getrow['status_new'] =='700' ){
            $uid_700 += $getrow['uid'];
            $main_700 += $getrow['main'];
            $lvl1_700 += $getrow['lvl1'];
            $lvl2_700 += $getrow['lvl2'];
            $lvl3_700 += $getrow['lvl3'];
            $lvl4_700 += $getrow['lvl4'];
            $lvl5_700 += $getrow['lvl5']; 
            $indirect_1_700 += $getrow['indirect1'];
            $indirect_2_700 += $getrow['indirect2'];
            $indirect_3_700 += $getrow['indirect3'];
            $indirect_4_700 += $getrow['indirect4'];
            $indirect_5_700 += $getrow['indirect5'];
        }
        
    }  
$ec_d = $_POST['date1']  ; 
$ec_d = date("M jS, Y", strtotime($ec_d));
$ec_d2= $_POST['date2'];
$ec_d2 = date("M jS, Y", strtotime($ec_d2));  
// NEW 
$mainsumpurchasenew = (floor($lvl0PSnew)-floor($main)) ;
$lvl1PSnew = (floor($lvl1PSnew)-floor($lvl1))  ;
$lvl2PSnew = (floor($lvl2PSnew)-floor($lvl2))  ;
$lvl3PSnew = (floor($lvl3PSnew)-floor($lvl3)) ;
$lvl4PSnew = (floor($lvl4PSnew)-floor($lvl4)) ;
$lvl5PSnew = (floor($lvl5PSnew)-floor($lvl5)) ;
$lvl6PSnew = (floor($lvl6PSnew)-floor($lvl6)) ;
$lvl7PSnew = (floor($lvl7PSnew)-floor($lvl7)) ;
$lvl8PSnew = (floor($lvl8PSnew)-floor($lvl8)) ;
$lvl9PSnew = (floor($lvl9PSnew)-floor($lvl9)) ; 
$sumindirect = $count1new - $indirect_1  ;
$lvl2indinew = $count2new - $indirect_2  ;
$lvl3indinew = $count3new - $indirect_3 ;
$lvl4indinew = $count4new - $indirect_4 ; 
$lvl5indinew = $count5new - $indirect_5  ; 

$value_main_purchase = $mainsumpurchasenew*0.04;
$value_unli_sum1 = $lvl1PSnew*0.03;
$value_unli_sum2 = $lvl2PSnew*0.03;
$value_unli_sum3 = $lvl3PSnew*0.04;
$value_unli_sum4 = $lvl4PSnew*0.02;
$value_unli_sum5 = $lvl5PSnew*0.01;
$value_unli_sum6 = $lvl6PSnew*0.01;
$value_unli_sum7 = $lvl7PSnew*0.01;
$value_unli_sum8 = $lvl8PSnew*0.01;
$value_unli_sum9 = $lvl9PSnew*0.02;

$value_indi_1st = $sumindirect * 200;
$value_indi_2nd = $lvl2indinew * 50;
$value_indi_3rd = $lvl3indinew * 30;
$value_indi_4th = $lvl4indinew * 10; 
$value_indi_5th = $lvl5indinew * 10;
// End New

// 700

$mainsumpurchase700 = ($lvl0PS700-$main_700) ;
$lvl1PS700 = (floor($lvl1PS700)-floor($lvl1_700))  ;
$lvl2PS700 = (floor($lvl2PS700)-floor($lvl2_700))  ;
$lvl3PS700 = (floor($lvl3PS700)-floor($lvl3_700)) ;
$lvl4PS700 = (floor($lvl4PS700)-floor($lvl4_700)) ;
$lvl5PS700 = (floor($lvl5PS700)-floor($lvl5_700)) ;
 
$sumindirect_700 = $count1700-$indirect_1_700  ;
$lvl2indi700 = $count2700-$indirect_2_700  ;
$lvl3indi700 = $count3700-$indirect_3_700 ;
$lvl4indi700 = $count4700-$indirect_4_700 ; 
$lvl5indi700 = $count5700-$indirect_5_700  ; 

$value_main_purchase_700 = $mainsumpurchase700*0.02;
$value_unli_sum1_700 = $lvl1PS700*0.02;
$value_unli_sum2_700 = $lvl2PS700*0.01;
$value_unli_sum3_700 = $lvl3PS700*0.02;
$value_unli_sum4_700 = $lvl4PS700*0.01;
$value_unli_sum5_700 = $lvl5PS700*0.02;
 

$value_indi_1st_700 = $sumindirect_700 * 60;
$value_indi_2nd_700 = $lvl2indi700 * 20;
$value_indi_3rd_700 = $lvl3indi700 * 10;
$value_indi_4th_700 = $lvl4indi700 * 5; 
$value_indi_5th_700 = $lvl5indi700 * 5;

// End 700
// total 
$total1_indi = $value_indi_1st + $value_indi_1st_700 ;
$total2_indi = $value_indi_2nd + $value_indi_2nd_700 ;
$total3_indi = $value_indi_3rd + $value_indi_3rd_700 ;
$total4_indi = $value_indi_4th + $value_indi_4th_700 ;
$total5_indi = $value_indi_5th + $value_indi_5th_700 ;

$totalmain = $value_main_purchase + $value_main_purchase_700;
$total1_personal = $value_unli_sum1 + $value_unli_sum1_700 ;
$total2_personal = $value_unli_sum2 + $value_unli_sum2_700 ;
$total3_personal = $value_unli_sum3 + $value_unli_sum3_700 ;
$total4_personal = $value_unli_sum4 + $value_unli_sum4_700 ;
$total5_personal = $value_unli_sum5 + $value_unli_sum5_700 ;
$total6_personal = $value_unli_sum6;
$total7_personal = $value_unli_sum7;
$total8_personal = $value_unli_sum8;
$total9_personal = $value_unli_sum9;


$total_value =  $totalmain + $total1_personal + $total2_personal + $total3_personal + $total4_personal + $total5_personal +$total6_personal + $total7_personal + $total8_personal + $total9_personal + $total1_indi  + $total2_indi + $total3_indi + $total4_indi + $total5_indi;
 


$print = '<div id="unilevel">
            <div class="col-lg-12 text-left">
                <input type="hidden" name="idMember"  id="idMember" data-id="'.$id.'">
                <span>
                    <strong>Natural Herbs</strong> 
                    Tagum City<br>
                </span> 
                 <span><strong>Invoice Date:</strong> '."{$ec_d}".' - '."{$ec_d2}".'
                    </span><br >
                 <span><strong> ID NO. : '."{$id}".' </strong></span> <br > 
                 <span><strong> Name: '."{$fullname}".' </strong></span> <br >  
                 <span><strong> Pick Up: '."{$pick_up }".' </strong></span>   
            </div>
            <div class = "col-md-12">
                 <table class="payout_table text-center"> 
                     <thead> 
                        <tr> 
                             <th>Indirect Referrals</th>  
                             <th>1500</th> 
                             <th>700</th> 
                             <th>Total</th>
                         </tr> 
                     </thead> 
                     <tbody> 
                         <tr> 
                            <td>1st Level <strong></strong></td> 
                            <td> 200 x '. $sumindirect .' = '. $value_indi_1st .' </td> 
                            <td> 60 x '. $sumindirect_700 .' = '. $value_indi_1st_700 .'  </td> 
                            <td> '. $total1_indi .'  </td> 
                             
                         </tr> 
                         <tr> 
                            <td>2nd Level <strong></strong></td>  
                            <td> 50 x '. $lvl2indinew .' = '. $value_indi_2nd .' </td> 
                            <td> 20 x '. $lvl2indi700 .' = '. $value_indi_2nd_700 .'  </td>  
                            <td> '. $total2_indi .'  </td> 
                           
                         </tr> 
                         <tr> 
                            <td>3rd Level <strong></strong></td> 
                            <td> 30 x '. $lvl3indinew .' = '. $value_indi_3rd .' </td> 
                            <td> 10 x '. $lvl3indi700 .' = '. $value_indi_3rd_700 .' </td>  
                            <td> '. $total3_indi .'  </td> 
                              
                         </tr> 
                         <tr> 
                            <td>4th Level <strong></strong></td> 
                            <td> 10 x '. $lvl4indinew .' = '. $value_indi_4th .' </td> 
                            <td> 5 x '. $lvl4indi700 .' = '. $value_indi_4th_700 .' </td> 
                            <td> '. $total4_indi .'  </td> 
                            
                         </tr> 
                         <tr> 
                            <td>5th Level <strong></strong></td> 
                            <td> 10 x '. $lvl5indinew .' = '. $value_indi_5th .' </td> 
                            <td> 5 x '. $lvl5indi700 .' = '. $value_indi_5th_700 .' </td>
                            <td> '. $total5_indi .'  </td> 
                              
                         </tr> 
                    </tbody> 
                 </table>
                 <table class="payout_table  text-center" id="unilvl_bonus2"> 
                     <thead> 
                        <tr> 
                             <th>Personal Sales</th>  
                             <th>1500</th> 
                             <th>700</th> 
                             <th>Total</th> 
                         </tr> 
                     </thead> 
                     <tbody>
                         <tr> 
                             <td>Personal </td> 
                             <td><strong>4%</strong> * '.$mainsumpurchasenew.'</td> 
                             <td><strong>2%</strong> * '.$mainsumpurchase700.'</td>  
                             <td>'.number_format($totalmain,2).'</td>  
                           
                         </tr>
                         <tr> 
                             <td>1st Level </td> 
                             <td><strong>3%</strong> * '.$lvl1PSnew .'</td> 
                             <td><strong>2%</strong> * '.$lvl1PS700.'</td>  
                             <td>'.number_format($total1_personal,2).'</td>  
                           
                         </tr> 
                         <tr> 
                             <td>2nd Level </td>  
                              <td><strong>3%</strong> * '.$lvl2PSnew.'</td> 
                              <td><strong>1%</strong> * '.$lvl2PS700.'</td>
                            <td>'.number_format($total2_personal,2).'</td>  
                         </tr> 
                         <tr> 
                             <td>3rd Level </td> 
                             <td><strong>4%</strong> * '. $lvl3PSnew .'</td>  
                             <td><strong>2%</strong> * '. $lvl3PS700 .'</td>  
                            <td>'.number_format($total3_personal,2).'</td>  
                         </tr> 
                         <tr> 
                             <td>4th Level</td> 
                             <td> <strong>2%</strong> * '. $lvl4PSnew .'</td>  
                             <td> <strong>1%</strong> * '. $lvl4PS700  .'</td>   
                           <td>'.number_format($total4_personal,2).'</td>  
                         </tr> 
                         <tr> 
                             <td>5th Level</td> 
                             <td> <strong>1%</strong> * '. $lvl5PSnew .'</td>  
                             <td> <strong>2%</strong> * '. $lvl5PS700 .'</td>  
                            <td>'.number_format($total5_personal,2).'</td>  
                         </tr> 
                          <tr> 
                             <td>6th Level </td> 
                             <td><strong>1%</strong> * '. $lvl6PSnew .'</td>  
                             <td> 0 </td>
                              <td>'.number_format($total6_personal,2).'</td>  
                         </tr> 
                          <tr> 
                             <td>7th Level </td> 
                             <td><strong>1%</strong> * '. $lvl7PSnew .'</td>  
                             <td>0 </td>
                            <td>'.number_format($total7_personal,2).'</td>  
                         </tr> 
                          <tr> 
                             <td>8th Level </td> 
                             <td> <strong>1%</strong> * '. $lvl8PSnew .'</td>  
                             <td>0 </td>
                             <td>'.number_format($total8_personal,2).'</td>  
                         </tr> 
                          <tr> 
                             <td>9th Level </td> 
                             <td> <strong>2%</strong> * '. $lvl9PSnew .'</td>  
                             <td>0 </td>
                            <td>'.number_format($total9_personal,2).'</td>  
                         </tr>
                       
                    </tbody> 
                 </table>
                 </div>

            
                <div class="col-md-12  " style="border-bottom: 2px solid #000 !important; ">
                 <h4> <strong> TOTAL: </strong>'.number_format($total_value ,2).' </h4>
                 
                </div>  
                 
            </div>
            
            <div id="unilevel" style="margin-top: 80px;">
            <div class="col-lg-12 text-left"> 
                <input type="hidden" name="idMember"  id="idMember" data-id="'.$id.'">
                <span>
                    <strong>Natural Herbs</strong> 
                    Tagum City<br>
                </span> 
                 <span><strong>Invoice Date:</strong> '."{$ec_d}".' - '."{$ec_d2}".'
                    </span><br >
                 <span><strong> ID NO. : '."{$id}".' </strong></span> <br > 
                 <span><strong> Name: '."{$fullname}".' </strong></span> <br >  
                 <span><strong> Pick Up: '."{$address }".' </strong></span>  
            </div>
            <div class = "col-md-12">
                   <h4> <strong> TOTAL: </strong>'.number_format($total_value ,2).' </h4>
                 </div>

            
                <div class="col-md-12 text-left">
                    <input type="text"  class="fix_input" id="printed_name" style="border-bottom: 2px solid #000 !important; border: 0; margin-bottom: 10px;margin-left: 350px;">
                    <p class="text-center">Signature Over Printed Name </p>

                    <input type="text" class="fix_input" id="printed_name" style="border-bottom: 2px solid #000 !important; border: 0;  margin-left: 350px;">
                    <p class="text-center">Date Signature </p>
                </div>  
            </div>
            
            <input type="hidden" name="first_stat" id="first_stat" value="'. $first_stat.'"> 
            <input type="hidden" name="date" id="date" value="'. $ec_d  .' '. $ec_d2.'"> 
            <input type="hidden" name="uid" id="uid" value="'.$id.'"> 
            <input type="hidden" name="fullname" id="fullname" value="'. $fullname .'"> 
            <input type="hidden" name="lvl1_in" id="lvl1_in" value="'.$sumindirect.' "> 
            <input type="hidden" name="lvl2_in" id="lvl2_in" value="'.$lvl2indinew.' "> 
            <input type="hidden" name="lvl3_in" id="lvl3_in" value="'.$lvl3indinew.' "> 
            <input type="hidden" name="lvl4_in" id="lvl4_in" value="'.$lvl4indinew.' "> 
            <input type="hidden" name="lvl5_in" id="lvl5_in" value="'.$lvl5indinew.'"> 

            <input type="hidden" name="mainpur" id="mainpur" value="'.$mainsumpurchasenew.'"> 
            <input type="hidden" name="lvl1" id="lvl1" value="'.$lvl1PSnew.'"> 
            <input type="hidden" name="lvl2" id="lvl2" value="'.$lvl2PSnew.'"> 
            <input type="hidden" name="lvl3" id="lvl3" value="'.$lvl3PSnew.'"> 
            <input type="hidden" name="lvl4" id="lvl4" value="'.$lvl4PSnew.'"> 
            <input type="hidden" name="lvl5" id="lvl5" value="'.$lvl5PSnew.'"> 
            <input type="hidden" name="lvl6" id="lvl6" value="'.$lvl6PSnew.'"> 
            <input type="hidden" name="lvl7" id="lvl7" value="'.$lvl7PSnew.'"> 
            <input type="hidden" name="lvl8" id="lvl8" value="'.$lvl8PSnew.'"> 
            <input type="hidden" name="lvl9" id="lvl9" value="'.$lvl9PSnew.'">  

            <input type="hidden" name="lvl1_in700" id="lvl1_in700" value="'.$sumindirect_700.' "> 
            <input type="hidden" name="lvl2_in700" id="lvl2_in700" value="'.$lvl2indi700.' "> 
            <input type="hidden" name="lvl3_in700" id="lvl3_in700" value="'.$lvl3indi700.' "> 
            <input type="hidden" name="lvl4_in700" id="lvl4_in700" value="'.$lvl4indi700.' "> 
            <input type="hidden" name="lvl5_in700" id="lvl5_in700" value="'.$lvl5indi700.'"> 

            <input type="hidden" name="mainpur700" id="mainpur700" value="'.$mainsumpurchase700.'"> 
            <input type="hidden" name="lvl1700" id="lvl1700" value="'.$lvl1PS700.'"> 
            <input type="hidden" name="lvl2700" id="lvl2700" value="'.$lvl2PS700.'"> 
            <input type="hidden" name="lvl3700" id="lvl3700" value="'.$lvl3PS700.'"> 
            <input type="hidden" name="lvl4700" id="lvl4700" value="'.$lvl4PS700.'"> 
            <input type="hidden" name="lvl5700" id="lvl5700" value="'.$lvl5PS700.'"> 
            <input type="hidden" name="lvl6700" id="lvl6700" value="'.$lvl6PS700.'"> 
            <input type="hidden" name="lvl7700" id="lvl7700" value="'.$lvl7PS700.'"> 
            <input type="hidden" name="lvl8700" id="lvl8700" value="'.$lvl8PS700.'"> 
            <input type="hidden" name="lvl9700" id="lvl9700" value="'.$lvl9PS700.'"> 
            <input type="hidden" name="total" id="total" value="'.$total_value .'">  ';

                            



echo $print;

 

     
