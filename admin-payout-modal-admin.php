<?php
include("dbconnection.php"); 
 
 $uid = $_POST['userid'];
 $main_purchase = $_POST['mainpur'];
 $level_1 = $_POST['lvl1'];
 $level_2 = $_POST['lvl2'];
 $level_3 = $_POST['lvl3'];
 $level_4 = $_POST['lvl4'];
 $level_5 = $_POST['lvl5'];
 $level_6 = $_POST['lvl6'];
 $level_7 = $_POST['lvl7'];
 $level_8 = $_POST['lvl8'];
 $level_9 = $_POST['lvl9'];
 $indirect_1 = $_POST['lvl1_in'];
 $indirect_2 = $_POST['lvl2_in'];
 $indirect_3 = $_POST['lvl3_in'];
 $indirect_4 = $_POST['lvl4_in'];
 $indirect_5 = $_POST['lvl5_in'];

 $main_purchase700 = $_POST['mainpur700'];
 $level_1700 = $_POST['lvl1700'];
 $level_2700 = $_POST['lvl2700'];
 $level_3700 = $_POST['lvl3700'];
 $level_4700 = $_POST['lvl4700'];
 $level_5700 = $_POST['lvl5700'];
 $level_6700 = $_POST['lvl6700'];
 $level_7700 = $_POST['lvl7700'];
 $level_8700 = $_POST['lvl8700'];
 $level_9700 = $_POST['lvl9700'];
 $indirect_1700 = $_POST['lvl1_in700'];
 $indirect_2700 = $_POST['lvl2_in700'];
 $indirect_3700 = $_POST['lvl3_in700'];
 $indirect_4700 = $_POST['lvl4_in700'];
 $indirect_5700 = $_POST['lvl5_in700'];

 $total_value = $_POST['total']; 
        $insert = $conn->query("INSERT INTO admin_withdraw (uid,main_purchase,level_1,level_2,level_3,level_4,level_5,level_6,level_7,level_8,level_9,indirect_1,indirect_2,indirect_3,indirect_4,indirect_5,status_new) VALUES('$uid','$main_purchase','$level_1','$level_2','$level_3','$level_4','$level_5','$level_6','$level_7','$level_8','$level_9','$indirect_1','$indirect_2','$indirect_3','$indirect_4','$indirect_5','new' )");  
        $insert2 = $conn->query("INSERT INTO admin_withdraw (uid,main_purchase,level_1,level_2,level_3,level_4,level_5,level_6,level_7,level_8,level_9,indirect_1,indirect_2,indirect_3,indirect_4,indirect_5,status_new) VALUES('$uid','$main_purchase700','$level_1700','$level_2700','$level_3700','$level_4700','$level_5700','$level_6700','$level_7700','$level_8700','$level_9700','$indirect_1700','$indirect_2700','$indirect_3700','$indirect_4700','$indirect_5700','700' )"); 
      
       
        
 
      
        $hdat = gmdate("Y-m-d");
             $sql = $conn->query("INSERT IGNORE INTO withdraw (id,dat,lc,rc,withdraw,stat)
           VALUES ('$uid ','$hdat','0','0','$total_value','done')");
        
          
     $results1 = $conn->query("UPDATE rebates SET notify_payout='' where id =  '$uid' and notify_payout = 'notify'");
     $results2 = $conn->query("UPDATE new_purchase SET notify_payout='' where id =  '$uid' and notify_payout = 'notify'");
  if( $insert && $insert2 && $hdat && $results1 && $results2   ){
  	echo "Success"; 
  }   
    