<?php
 include ('dbconnection.php');

$text1 = trim($_POST['text1']);
$stat = $_POST['stat'];

print_r($_POST);


echo $text1;




$x=1;

$y=1;



while($y <= $text1 ){



$x=1;

$p=1;

   while($x <= 90000000) {

    $res = mt_rand(100000, 900000);

  

    if ($result = $conn->query("SELECT * FROM tbpin where id='$res'")) {

          if($result->num_rows !=0){          

          }else{

                $x= 90000000;

                while ( $p <= 90000000) {

                    $res2 = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 7)), 0, 7);
                    $res2 = 'NEW'.$stat.'-'.$res2;
                
                    if ($result2 = $conn->query("SELECT * FROM tbpin where pin='$res2'")) {

                        if($result2->num_rows !=0){ 

                        }else{

                         $p = 90000000;
                          if($stat == '1500'){
                            $status_new = '1500';
                          }elseif($stat == '700'){
                            $status_new =  '700';
                          }else{
                            $status_new =  '2500';
                          }   
                         


                         $sql = "INSERT IGNORE INTO tbpin (id,pin,status)

                         VALUES ('$res','$res2', '$status_new')";

                        if ($conn->query($sql) === TRUE) { 

                        } 

                        } 
                    } 

                    $p++; 

                }



                



            

          }



        $result->close();    

    }



$x++;

}





$y++;

}
 
  echo'code successfully created!';
