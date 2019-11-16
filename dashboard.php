<?php
include ('dbconnection.php');

    session_start();
  $id = $_SESSION['pdid'];
   if(!isset($_SESSION['pdid']) || (trim($_SESSION['pdid']) == '')) {
       header("location: admin-member-payout.php");
      exit();
   }

 
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
                        $uid_700 = 0;
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
      $address = $row['ad'];
 
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
  

   $idr=0;

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

                      




                       $sql="SELECT * FROM member where sid='$id'";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)) {
                        
                        
                        $nameArray[] = $row['uid']; 
                        $namefn[] = $row['fn'].' '. $row['mn'].' '.$row['ln'];  
                        $hid1=$row['uid'];
                        $name = $row['fn'].' '. $row['mn'].' '.$row['ln'];
                        
                        $idr++;

                        $rp = "SELECT sum(amt) as stp FROM purchase where id='$hid1'";
                        $rresult = mysqli_query ($conn, $rp); 
                        $rrow = mysqli_fetch_assoc($rresult);
                        $tstp=$rrow['stp'];
                        if($tstp==""){
                        $tstp=0;
                        }
                        $sumpurchase += $tstp;
                        $tp[]=$tstp;
                       
                        
                        
                        
                            $sql2="SELECT * FROM member where sid= '$hid1'";
                            $result2 = mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_array($result2)) {
                            $sp2[] = $name;  
                            $idr++;
                            $nameArray2[] = $row2['uid']; 
                            $namefn2[] = $row2['fn'].' '. $row2['mn'].' '.$row2['ln']; 
                            $hid2=$row2['uid'];
                            $name2 = $row2['fn'].' '. $row2['mn'].' '.$row2['ln'];

                            $rp2 = "SELECT sum(amt) as stp FROM purchase where id='$hid2'";
                            $rresult2 = mysqli_query ($conn, $rp2); 
                            $rrow2 = mysqli_fetch_assoc($rresult2);
                            $tstp2=$rrow2['stp'];
                            if($tstp2==""){
                              $tstp2=0;
                            }
                            $sumpurchase2 += $tstp2;
                            $tp2[]=$tstp2;
                            

                                $sql3="SELECT * FROM member where sid= '$hid2'";
                                $result3 = mysqli_query($conn,$sql3);
                                while($row3 = mysqli_fetch_array($result3)) {
                                $sp3[] = $name2;
                                 $idr++;
                                 $namefn3[] = $row3['fn'].' '. $row3['mn'].' '.$row3['ln'];                          
                                $nameArray3[] = $row3['uid']; 
                                $hid3=$row3['uid'];
                                $name3 = $row3['fn'].' '. $row3['mn'].' '.$row3['ln'];
                                
                                $rp3 = "SELECT sum(amt) as stp FROM purchase where id='$hid3'";
                                $rresult3 = mysqli_query ($conn, $rp3); 
                                $rrow3 = mysqli_fetch_assoc($rresult3);
                                $tstp3=$rrow3['stp'];
                                if($tstp3==""){
                                $tstp3=0;
                                }
                                $sumpurchase3 += $tstp3;
                                $tp3[]=$tstp3;
                                
                                    $sql4="SELECT * FROM member where sid= '$hid3'";
                                    $result4 = mysqli_query($conn,$sql4);
                                    
                                    while($row4 = mysqli_fetch_array($result4)) {
                                     $sp4[] = $name3;
                                    $hid4=$row4['uid'];
                                    $idr++;
                                    $namefn4[] = $row4['fn'].' '. $row4['mn'].' '.$row4['ln']; 
                                    $nameArray4[] = $row4['uid'];
                                    $name4 = $row4['fn'].' '. $row4['mn'].' '.$row4['ln']; 
                                    
                                    $rp4 = "SELECT sum(amt) as stp FROM purchase where id='$hid4'";
                                    $rresult4 = mysqli_query ($conn, $rp4); 
                                    $rrow4 = mysqli_fetch_assoc($rresult4);
                                    $tstp4=$rrow4['stp'];
                                    if($tstp4==""){
                                    $tstp4=0;
                                    }
                                    $sumpurchase4 += $tstp4;
                                    $tp4[]=$tstp4;
                                                                          

                                        $sql5="SELECT * FROM member where sid= '$hid4'";
                                        $result5 = mysqli_query($conn,$sql5);
                                        while($row5 = mysqli_fetch_array($result5)) {
                                        $sp5[] = $name4;
                                        $hid5=$row5['uid'];
                                        $idr++;
                                        $namefn5[] = $row5['fn'].' '. $row5['mn'].' '.$row5['ln']; 
                                        $nameArray5[] = $row5['uid'];       
                                        $name5 = $row5['fn'].' '. $row5['mn'].' '.$row5['ln'];    

                                        $rp5 = "SELECT sum(amt) as stp FROM purchase where id='$hid5'";
                                        $rresult5 = mysqli_query ($conn, $rp5); 
                                        $rrow5 = mysqli_fetch_assoc($rresult5);
                                        $tstp5=$rrow5['stp'];
                                        if($tstp5==""){
                                        $tstp5=0;
                                        }
                                        $sumpurchase5 += $tstp5;
                                        $tp5[]=$tstp5;
                                        

                                            $sql6="SELECT * FROM member where sid= '$hid5'";
                                            $result6 = mysqli_query($conn,$sql6);
                                            while($row6 = mysqli_fetch_array($result6)) {
                                             $sp6[] = $name5;
                                            $hid6=$row6['uid'];
                                            $nameArray6[] = $row6['uid']; 
                                            $idr++;
                                            $namefn6[] = $row6['fn'].' '. $row6['mn'].' '.$row6['ln'];
                                            $name6 = $row6['fn'].' '. $row6['mn'].' '.$row6['ln'];

                                            $rp6 = "SELECT sum(amt) as stp FROM purchase where id='$hid6'";
                                            $rresult6 = mysqli_query ($conn, $rp6); 
                                            $rrow6 = mysqli_fetch_assoc($rresult6);
                                            $tstp6=$rrow5['stp'];
                                            if($tstp6==""){
                                            $tstp6=0;
                                            }
                                            $sumpurchase6 += $tstp6;
                                            $tp6[]=$tstp6;

                                                $sql7="SELECT * FROM member where sid= '$hid6'";
                                                $result7 = mysqli_query($conn,$sql7);
                                                while($row7 = mysqli_fetch_array($result7)) {
                                                 $sp7[] = $name6;
                                                $hid7=$row7['uid'];
                                                $nameArray7[] = $row7['uid'];
                                                $idr++;
                                                $namefn7[] = $row7['fn'].' '. $row7['mn'].' '.$row7['ln'];
                                                $name7 = $row7['fn'].' '. $row7['mn'].' '.$row7['ln'];    

                                                $rp7 = "SELECT sum(amt) as stp FROM purchase where id='$hid7'";
                                                $rresult7 = mysqli_query ($conn, $rp7); 
                                                $rrow7 = mysqli_fetch_assoc($rresult7);
                                                $tstp7=$rrow7['stp'];
                                                if($tstp7==""){
                                                $tstp7=0;
                                                }
                                                $sumpurchase7 += $tstp7;
                                                $tp7[]=$tstp7;

                                                    $sql8="SELECT * FROM member where sid= '$hid7'";
                                                    $result8 = mysqli_query($conn,$sql8);
                                                    while($row8 = mysqli_fetch_array($result8)) {
                                                     $sp8[] = $name7;
                                                    $hid8=$row8['uid'];
                                                    $nameArray8[] = $row8['uid'];
                                                    $idr++;
                                                    $namefn8[] = $row8['fn'].' '. $row8['mn'].' '.$row8['ln'];
                                                    $name8 = $row8['fn'].' '. $row8['mn'].' '.$row8['ln'];
                                                        
                                                    $rp8 = "SELECT sum(amt) as stp FROM purchase where id='$hid8'";
                                                    $rresult8 = mysqli_query ($conn, $rp8); 
                                                    $rrow8 = mysqli_fetch_assoc($rresult8);
                                                    $tstp8=$rrow8['stp'];
                                                    if($tstp8==""){
                                                    $tstp8=0;
                                                    }
                                                    $sumpurchase8 += $tstp8;
                                                    $t8[]=$tstp8;

                                                        $sql9="SELECT * FROM member where sid= '$hid8'";
                                                        $result9 = mysqli_query($conn,$sql9);


                                                        while($row9 = mysqli_fetch_array($result9 )) {
 
                                                         $sp9[] = $name8;
                                                        $hid9=$row9['uid'];
                                                        $nameArray9[] = $row9['uid'];
                                                        $idr++;
                                                        $namefn9[] = $row9['fn'].' '. $row9['mn'].' '.$row9['ln'];

                                                        $name9 = $row9['fn'].' '. $row9['mn'].' '.$row9['ln'];
                                                        
                                                        $rp9 = "SELECT sum(amt) as stp FROM purchase where id='$hid9'";
                                                        $rresult9 = mysqli_query ($conn, $rp9); 
                                                        $rrow9 = mysqli_fetch_assoc($rresult9);
                                                        $tstp9=$rrow9['stp'];
                                                        if($tstp9==""){
                                                        $tstp9=0;
                                                        }
                                                        $sumpurchase9 += $tstp9;
                                                        $t9[]=$tstp9;    

                                                            $sql10="SELECT * FROM member where sid= '$hid9'";
                                                            $result10 = mysqli_query($conn,$sql10);

                                                            while($row10 = mysqli_fetch_array($result10)) {

                                                             $sp10[] = $name9;
                                                            $hid10=$row10['uid'];
                                                            $nameArray10[] = $row10['uid'];
                                                            $idr++;
                                                            $namefn10[] = $row10['fn'].' '. $row10['mn'].' '.$row10['ln'];

                                                            $rp10 = "SELECT sum(amt) as stp FROM purchase where id='$hid10'";
                                                            $rresult10 = mysqli_query ($conn, $rp10); 
                                                            $rrow10 = mysqli_fetch_assoc($rresult10);
                                                            $tstp10=$rrow10['stp'];
                                                            if($tstp10==""){
                                                            $tstp10=0;
                                                            }
                                                            $sumpurchase10 += $tstp10;
                                                            $t10[]=$tstp10;    
                                                            }
                                                   } }
                                                }
                                            }
                                        }

                                    }

                                }

                            } 
                                                                      
                       }



 

$sql = "SELECT * FROM member WHERE uid = '$id'";
  $result=$conn->query($sql);

  while($row=$result->fetch_assoc()) {
  

      $uname= $row['uname'];
     
    


   }
                     
                 

            $sql = "SELECT sum(withdraw) as tot FROM withdraw WHERE id = '$id'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $twith = $row['tot'];
             
              }


              $hdat="";


               $sql = "SELECT * FROM member WHERE uid = '$id'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $hdat = $row['dat'];
             
              }

              if($hdat==""){
                $hdat="0000-00-00";
              }



               $sql = "SELECT sum(amt) as tot FROM purchase WHERE id = '$id'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $pr = $row['tot'];
             
              }

               $sql = "SELECT sum(qty) as tot FROM purchase WHERE id = '$id'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $multi = $row['tot'];
             
              }

              if($pr==""){
                $pr="0";
              }

              $pr=($pr*0.04);

              $sql = "SELECT count(sid) as dr FROM member WHERE sid = '$id'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
              $hdr = $row['dr'];
 

              }

 
              if($twith==""){
                $twith="0";
              }  

            
              $sql = "SELECT sum(one) as tot, sum(two) as tot2, sum(three) as tot3, sum(four) as tot4 FROM indirect WHERE id = '$id'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
             $tamt= $row['tot']+$row['tot2']+$row['tot3']+$row['tot4'];
     
              }
              if($tamt==""){
                $tamt="0";
              }

               



              $sql = "SELECT sum(one) as tot, sum(two) as tot2, sum(three) as tot3, sum(four) as tot4, sum(five) as tot5, sum(six) as tot6, sum(seven) as tot7, sum(eight) as tot8, sum(nine) as tot9 FROM rebates WHERE id = '$id'";
              $result=$conn->query($sql);

              while($row=$result->fetch_assoc()) {
             $idreb= $row['tot']+$row['tot2']+$row['tot3']+$row['tot4']+$row['tot5']+$row['tot6']+$row['tot7']+$row['tot8']+$row['tot9'];
     
              }
              if($idreb==""){
                $idreb="0";
              }  

          
               $tamt2 = ($tamt + $idreb + $pr + ($hdr * 150))-$twith;
 
               // $tamt2 = ($tamt + $idreb + $pr + ($hdr))-$twith;





                $sql = "SELECT * FROM member where uid='$id'";
                            $result = mysqli_query ($conn, $sql); 
                            $row = mysqli_fetch_assoc($result);
                            $autogen=$row['regen'];
                            

                            $autogen = $autogen+1;

                            $sql = "SELECT max(regen) as maxid FROM member";
                            $result = mysqli_query ($conn, $sql); 
                            $row = mysqli_fetch_assoc($result);
                            $maxreg=$row['maxid'];
                           


                            $sql = "SELECT count(uid) as cmem FROM member";
                            $result = mysqli_query ($conn, $sql); 
                            $row = mysqli_fetch_assoc($result);
                            $cmem=$row['cmem'];
                           // echo "<script>alert('$cmem');</script>";
                            $cmem=$cmem-1;

                            $bshare=0;
                            $sql="SELECT * FROM member where regen between'$autogen' and '$maxreg' order by regen desc";
                            $result = mysqli_query($conn,$sql);
                     
                                while($row = mysqli_fetch_array($result)) {
                        
                                $cmem--;

                                $bshare += $reward=20/$cmem;

                          
                                     
                                }

 
?>





<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | Natural Herbs</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Dashboard</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Dashboard</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="admin-view-login.php" class="dropdown-toggle">
            
              
            </a>
            
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Natures ID</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Natural Herbs - Member
                  <small>Active Member</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="dashboard-admin-view.php" class="btn btn-default btn-flat">Dashboard</a>
                </div>
                <div class="pull-right">
                  <a href="login.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="admin-member-login.php"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $uname;?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard-admin-view.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="updatenew.php"><i class="fa fa-gears"></i> <span>Edit Account</span></a></li>
        <li><a href="direct.php"><i class="fa fa-link"></i> <span>Direct Downlines</span></a></li>
        <li><a href="indirect.php"><i class="fa fa-group"></i> <span>Unilevel tree</span></a></li>
        <li><a href="register.php"><i class="fa fa-table"></i> <span>Register</span></a></li>
        <li><a href="admin-member-login.php"><i class="fa fa-mail-reply"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Welcome,


         <?php
                     
                      $sql = "SELECT * FROM member WHERE uid = '$id'";
                      $result = mysqli_query($conn,$sql);
                      
                       while($row = mysqli_fetch_array($result)) {
      
      echo $row['fn'].' '.$row['mn'].' '.$row['ln']; 
      
     
  }
  ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard-admin-view.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><?php echo $uname;?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">   
        <div class="col-lg-3 col-xs-12">      
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo '₱' . number_format(($hdr * 150),2,'.',',');  ?></h3>
              <p>Total Sponsor Income</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua"data-toggle="modal" data-target="#myModal12">
            <div class="inner">
              <h3><?php echo '₱' . number_format($tamt,2,'.',',');  ?></h3>
              <p>Total Indirect Income</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div> 
          </div>
        </div>
      

        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo '₱' . number_format($idreb,2,'.',','); ?></h3>
              <p>Total UniLevel Rebates</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>           
          </div>
        </div>


        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua"data-toggle="modal" data-target="#myModal20">
            <div class="inner">
              <h3><?php echo '₱' . number_format($pr,2,'.',','); ?></h3>
              <p>Total Personal Rebates</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>          
          </div>
        </div>



        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-red" data-toggle="modal" data-target="#myModal10">
            <div class="inner">
              <h3><?php echo '₱' . number_format($total_value,2); ?></h3>
              <p>Available Rebates - CLICK HERE</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>          
          </div>
        </div>


        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php  echo $idr; ?></h3>
              <p>Total Downline</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>            
          </div>
        </div>


        <div class="col-lg-3 col-xs-12" data-toggle="modal" data-target="#myModal100">
          <div class="small-box bg-aqua">
            <div class="inner">
             <h3><?php echo '₱' . number_format($bshare,2,'.',','); ?></h3>
              <p>Money Back Entry</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>          
          </div>
        </div>

        <div class="col-lg-3 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $hdat;  ?></h3>
              <p>Date Register</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>      
          </div>
        </div>


        <div class="col-lg-7 col-xs-12">
              <div class="box">
            <div class="box-header">
          <div class="box-body">
            <h3 class="no-margins font-extra-bold text-success">My Direct Invites</h4><br>
               <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>ID NUMBER</th>
                    <th>NAME</th>
                    <th>DATE REGISTER</th>
                    
                </tr>
                </thead>

                        <tbody>


                     <?php
                     
                      $sql="SELECT * FROM member where sid='$id'";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                                     
                          echo"</td>";
                         
                        echo"<tr>";
                           echo"<td>"; 
                           echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$row['uid'].'</h4></div>'; 
                     
                          echo"</td>";
                          echo"<td>"; 
                          echo'<div class="list-item">';
                               echo '<h4 class="no-margins font-extra-bold text-success">'. $row['fn'].' '.$row['mn'].' '.$row['ln'];
                          echo"</td>";
                          echo"<td>";
                          echo'<div class="list-item">'; 
                              echo '<h4 class="no-margins font-extra-bold text-success">'. $row['dat'];
                          echo"</td>";

                          
                      echo"</tr>";                   
                       }

                    ?>

                  
                    </table>

                </div>
        </div>
         
        </div>
</div>


            
<div class="col-lg-5 col-xs-12">
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <h3 class="no-margins font-extra-bold text-success">Withdrawal History</h4>
                    <table id="example2" class="footable table table-stripped toggle-arrow-tiny" data-page-size="8" data-filter=#filter>
                        

 
                <thead>
                <tr>
                    
                    <th><small>AMOUNT</small></th>
                    <th><small>DATE</th>  
                </tr>
                </thead>  

                        <tbody>


                     <?php
                     
                      $sql="SELECT * FROM withdraw where id='$id'";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
         
                         if($row['withdraw'] > 0){

                          $num+=1;
                      echo"<tr>";
                        
                          
                          echo"<td>"; 

                          
                            echo'<div class="list-item">';
                            echo'<h4 class="no-margins font-extra-bold text-danger">'.$row["withdraw"].'</h4></div>';                      
                          echo"</td>";

                          echo"<td>"; 
                              echo'<div class="list-item">';
                            echo'<h4 class="no-margins font-extra-bold text-danger">'.$row["dat"].'</h4></div>';  
                          echo"</td>";
                      echo"</tr>";                   
                       }
                     }
                    ?>


                         </tbody>   
                            <tfoot>
                                <?php
                                echo"<tr>";
                                echo'<td><h3 class="no-margins font-extra-bold text-danger">Overall Total</td>';
                                echo'<td><h3 class="no-margins font-extra-bold text-danger">₱'.number_format($twith,2,'.',',').'</h3></div></td>';
                                echo'<tr><td colspan="2"><ul class="pagination pull-right"></ul></td></tr>';                                           


                                ?>
                        </tfoot>      
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>

<div class="modal fade hmodal-danger" id="myModal10" tabindex="-1" role="dialog"  aria-hidden="true">           
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="color-line"></div>
                <div class="modal-header">
                    <h4 class="modal-title">Natural Herbs E-Wallet</h4>        
                        <h3> Amount Balance :  <?php echo '₱' . number_format($total_value,2); ?> </h3>                             
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" role="form">

                                <div class="form-group col-lg-12">
                                        <label>Amount</label>
                                        <input type="text" placeholder="Enter Amount" required="" value="" name="amt" id="amt" class="form-control">
                                </div>

                             
                                

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <!--  <button type="submit" class="btn btn-primary" name="save" id="save">Withdraw</button> -->



                                 <?php
                                
                                    if (isset($_POST['save'])) {
                                    $amt = $_POST['amt']; 
                                 
                                        //if($amt > number_format($tamt2,2)){

                                             //               echo "<script> alert('insuficient funds!');  </script>";         
                                                    

                                           // } else{
                                                $hdat = gmdate("Y-m-d");
                                                  $sql = "INSERT IGNORE INTO withdraw (id,dat,lc,rc,withdraw)
                                                  VALUES ('$id','$hdat','$lef','$reg','$amt')";
                                                   if ($conn->query($sql) === TRUE) {
                                                    
                                                    echo "<script> window.location.href = 'dashboard-admin-view.php'; </script>";   
                                                    }
                                                
                                         //   }       


                                    }
                            
                                ?>


                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade hmodal-danger" id="myModal11" tabindex="-1" role="dialog"  aria-hidden="true">       
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">My Direct Invites</h4>
                                
                            
                                </div>
                                    <div class="modal-body">
                                        <form action="#" method="POST" role="form">


                                            <div class="form-group col-lg-12">
                                            <label>List</label>
                                 
                                
                                 <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>Id Number</th>
                    <th>Name</th>
                    <th>Date Register</th>
                    
                </tr>
                </thead>

                        <tbody>


                     <?php
                     
                      $sql="SELECT * FROM member where sid='$id'";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                        

                         
                        echo"<tr>";
                           echo"<td>"; 
                              echo $row['uid'];
                          echo"</td>";
                          echo"<td>"; 
                               echo $row['fn'].' '.$row['mn'].' '.$row['ln'];
                          echo"</td>";
                          echo"<td>"; 
                              echo $row['dat'];
                          echo"</td>";

                          
                      echo"</tr>";                   
                       }

                    ?>

                  
                    </table>

                                </div>

                             
                                

                            <div class="modal-footer">
                               

                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>









                 <div class="modal fade hmodal-danger" id="myModal100" tabindex="-1" role="dialog"  aria-hidden="true">
                   
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">Money Back Entry</h4>
                                
                                <h3> Reward :  <?php echo '₱' . number_format($bshare,2,'.',','); ?> </h3>

                              

                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" role="form">


                                <div class="form-group col-lg-12">
                                <small>Redeem Rewards 1,000 up</small><br>
                                 <?php echo '₱' . number_format($bshare,2,'.',','); ?>
                                </div>

                             
                                

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"name="redeem"id="redeem">Redeem</button>


                                <?php
                                    if (isset($_POST['redeem'])) {
                                    

                                         echo "<script>alert('Cant redeem Now');</script>";    


                                    }
                            
                                ?>

                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

               <div class="modal fade hmodal-danger" id="myModal20" tabindex="-1" role="dialog"  aria-hidden="true">
                   
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">Personal Purchase</h4>
                            </div>

                            <div class="modal-body">
                                <form action="#" method="POST" role="form">

                                <div class="form-group col-lg-12">
                                <label>List</label>
                                 
                                
                                 <table id="example1" class="table table-striped">
                <thead>
                <tr>
                    <th>Item/s</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Date</th>
                </tr>
                </thead>

                        <tbody>


                     <?php
                        

                      $sql="SELECT  product.pn,purchase.price,purchase.qty,purchase.dat FROM purchase join product on purchase.pid=product.reg where purchase.id='$id'";
                      $result = mysqli_query($conn,$sql);
                      $num=0;
                       while($row = mysqli_fetch_array($result)) {
                        

                         
                        echo"<tr>";
                        
                          echo"<td>"; 
                               echo $row['0'];
                          echo"</td>";
                          echo"<td>"; 
                              echo $row['1'];
                          echo"</td>";
                          echo"<td>"; 
                              echo $row['2'];
                          echo"</td>";

                          echo"<td>"; 
                              echo $row['3'];
                          echo"</td>";
                          
                      echo"</tr>";                   
                       }

                    ?>

                  
                    </table>

                                </div>

                             
                                

                            <div class="modal-footer">
                               

                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
              





      




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Designed by <a href="https://www.facebook.com/jamille.tinaco"> Jamille Tinaco</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">NaturalHerbsPharm Corp</a>.</strong> All rights reserved.
  </footer>


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script>
  $(function () {


         $('#example1').dataTable( {

            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });


   
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

</body>

</html>
