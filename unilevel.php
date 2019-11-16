<?php
include ('dbconnection.php');

    session_start();
  $id = $_SESSION['pdid'];
   if(!isset($_SESSION['pdid']) || (trim($_SESSION['pdid']) == '')) {
       header("location: login.php");
      exit();
   }

   $sql = "SELECT * FROM member WHERE uid = '$id'";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()) {
  

    $uname= $row['uname'];
      
    $fulln= $row['fn'].' '.$row['mn'].' '.$row['ln']; 
     


   }

   $idr=0;

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
                        $sp[] = $fulln;  
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
                                                    $sumpurchase8 += $tst8;
                                                    $t8[]=$tstp8;

                                                        $sql9="SELECT * FROM member where sid= '$hid8'";
                                                        $result9 = mysqli_query($conn,$sql9);
                                                        while($row9 = mysqli_fetch_array($result8)) {
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
                                                        $sumpurchase9 += $tst9;
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
                                                            $sumpurchase10 += $tst10;
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
                     

 
           


?>

<!DOCTYPE html>

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->


    <!-- Logo -->
   

    <!-- Main content -->
  <form method="post">  
    
        
            

          
           


               <table id="" class="table table-striped table-bordered table-hover">
                <thead
                <tr>
                    <th><h4 class="no-margins font-bold text-success">ID NUMBER</th>
                    <th><h4 class="no-margins font-extra-bold text-success">FULLNAME</th>
                    <th><h4 class="no-margins font-extra-bold text-success">SPONSORNAME</th>
                    <th><h4 class="no-margins font-extra-bold text-success">TOTAL PURCHASE</th>
                    
                </tr>
                </thead>

                        <tbody>


                     <?php
                        $footer="";
                        $footerval="";
                        $text1 = $_POST['text1'];
                 
                        if($text1 == '1'){
                        $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 3% :</label>'; 
                        $footerval=$sumpurchase * 0.03;
                        foreach ($nameArray as $key => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray[$key].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn[$key].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp[$key].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp[$key].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }

                        if($text1 == '2'){
                        $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 3% :</label>'; 
                        $footerval=$sumpurchase2 * 0.03;
                        foreach ($nameArray2 as $key2 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray2[$key2].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn2[$key2].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp2[$key2].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp2[$key2].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }

                        if($text1 == '3'){
                        $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 4% :</label>'; 
                        $footerval=$sumpurchase3 * 0.04;    
                        foreach ($nameArray3 as $key3 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray3[$key3].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn3[$key3].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp3[$key3].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp3[$key3].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }

                        if($text1 == '4'){
                            $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 2% :</label>'; 
                        $footerval=$sumpurchase4 * 0.02;
                        foreach ($nameArray4 as $key4 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray4[$key4].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn4[$key4].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp4[$key4].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp4[$key4].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }

                        if($text1 == '5'){
                             $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 1% :</label>'; 
                        $footerval=$sumpurchase5 * 0.01;
                        foreach ($nameArray5 as $key5 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray5[$key5].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn5[$key5].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp5[$key5].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp5[$key5].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }


                        if($text1 == '6'){
                             $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 1% :</label>'; 
                        $footerval=$sumpurchase6 * 0.01;
                        foreach ($nameArray6 as $key6 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray6[$key6].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn6[$key6].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp6[$key6].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp6[$key6].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }

                        if($text1 == '7'){
                            $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 1% :</label>'; 
                        $footerval=$sumpurchase7 * 0.01;
                        foreach ($nameArray7 as $key7 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray7[$key7].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn7[$key7].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp7[$key7].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp7[$key7].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }



                        if($text1 == '8'){
                            $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 1% :</label>'; 
                        $footerval=$sumpurchase8 * 0.01;
                        foreach ($nameArray8 as $key8 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray8[$key8].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn8[$key8].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp8[$key8].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp8[$key8].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }


                        if($text1 == '9'){
                            $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 1% :</label>'; 
                        $footerval=$sumpurchase9 * 0.02;
                        foreach ($nameArray9 as $key9 => $value){
                            echo"<tr>";
                            echo"<td>";
                            echo'<div class="list-item">';
                           echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray9[$key9].'</h4></div>';  
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn9[$key9].'</h4></div>'; 
                               
                            echo"</td>";
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$sp9[$key9].'</h4></div>'; 
                               
                            echo"</td>"; 
                            echo"<td>"; 
                                echo'<h4 class="no-margins font-extra-bold text-success">'.$tp9[$key9].'</h4></div>';     
                                
                            echo"</td>";    
                            echo"</tr>";

                           }


                        }


                        // if($text1 == '10'){
                        //     $footer= '<label class="no-margins font-extra-bold text-success">Total Rebates 1% :</label>'; 
                        // $footerval=$sumpurchase10 * 0.01;
                        // foreach ($nameArray10 as $key10 => $value){
                        //     echo"<tr>";
                        //     echo"<td>";
                        //     echo'<div class="list-item">';
                        //    echo'<h4 class="no-margins font-extra-bold text-success">'.$nameArray10[$key10].'</h4></div>';  
                        //     echo"</td>";
                        //     echo"<td>"; 
                        //         echo'<h4 class="no-margins font-extra-bold text-success">'.$namefn10[$key10].'</h4></div>'; 
                               
                        //     echo"</td>";
                        //     echo"<td>"; 
                        //         echo'<h4 class="no-margins font-extra-bold text-success">'.$sp10[$key10].'</h4></div>'; 
                               
                        //     echo"</td>"; 
                        //     echo"<td>"; 
                        //         echo'<h4 class="no-margins font-extra-bold text-success">'.$tp10[$key10].'</h4></div>';     
                                
                        //     echo"</td>";    
                        //     echo"</tr>";




                        //    }


                        // }





                    ?>
                    </table>
                    
                          <?php echo $footer .' '.$footerval; ?>     
                    
                     
                     
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  

  <!-- Control Sidebar -->
 
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
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

</body>

</html>
