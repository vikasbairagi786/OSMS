<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
<head>
<script type="text/javascript">  
    $(function () {  
        $(document).keydown(function (e) {  
            return (e.which || e.keyCode) != 116;  
        });  
    });  
</script>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

?>

<!DOCTYPE html>
<html lang="en">
<!------ Include the below in your HEAD tag ---------->
<?php
include "include/head.php";
?>
<!------ Include the above in your HEAD tag ---------->
<body class="jumbotron">

  <!------ Include the below in your NAV tag ---------->
  <?php
  include "include/nav.php";
  ?>
  <!------ Include the above in your NAV tag ---------->

<?php
if($isValidChecksum == "TRUE") {

        if ($_POST["STATUS"] == "TXN_SUCCESS")
         { // if success
        
            echo '<div class="jumbotron text-center">
                    <i class="fas fa-check-circle" style="font-size: 78px;color:#4bc14e;"></i>
                      <h1>Thank You for your purchase!</h1>
                      <small style="padding:10px;background:#ddd;color:#7f7f7f;border-radius:5px;">Transation# '.$_POST["TXNID"].'</small>
                      <a href="../CheckStatus.php" class="btn btn-success"><i class="fas fa-arrow-circle-left" ></i> Back</a> 
                    </div>';


?>
                    <div class="container-fluid">
                      <div class="row ">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <h4>Your transation status has been successfully processed.</h4>

                          <ul class="list-group">
                            
                                <?php
                                    $i = 0;

                                  if (isset($_POST) && count($_POST)>0 )
                                  { 
                                    foreach($_POST as $paramName => $paramValue) {
                                    $i++;

                                       if($i !==3 && $i !==6 && $i !==8 && $i !==10 && $i !==12 && $i !==14) // hidden array values (3=>TXNID,6=>CURRENCYINR,8=>STATUS,10=>RESPMSG,12=>BANKTXNID) 
                                       {
                                        echo '<li class="list-group-item">
                                                  <small>(Array no. '.$i.')</small>
                                                  <strong>'.$paramName.'</strong>
                                                  <span class="badge">'.$paramValue.'</span>
                                              </li>';
$number=$_GET['number'];
                                                     if($paramValue>0)
                                                      {
                                                        $db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "newosms";
$db_port = 3306;
$id= $_POST["TXNID"];
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);
                                                        $email=$_GET['email'];
                                                        $sql = "INSERT INTO transaction (email, price, tid)
VALUES ('$email', '$number', '$id')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  include"mail.php";
  $edit = mysqli_query($conn,"update assignwork_tb set payment='Done' where requester_email='$email'");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
// Create Connection


                                                        /*
                                                        include"connection.php";
                                                        $id= $_POST["TXNID"];
                                                        $email=$_GET['email'];
                                                        $query = "SELECT * FROM `user` WHERE email = '$email'";
                                                              $result = mysqli_query($con, $query);
                                                              //echo mysqli_fetch_array($result);
                                                              while($rows = mysqli_fetch_array($result)) 
                                                                {
                                                                 $available_cr= $rows['credit'];

                                                                }
                                                        //echo"$paramValue";
                                                        
                                                        
                                                        $credit = "$available_cr"+'300';
                                                        $cost="1500";
                                                        $edit = mysqli_query($con,"update user set credit='$credit',cost='$cost' where email='$email'");
                                                        if($edit)
                                                            {
                                                              //  mysqli_close($con); 
                                                            echo"your credit 300 updated successfully";
                                                            $html="Thank You For Take A Membership You have Sucessfully Credited 300 Credit";
                                                          include"payment_mail.php";
                                                            $query = "INSERT INTO `transaction`(`email`,`tid`,`price`,`credit`) VALUES('$email','$id','$cost','300')";
                                                            $query_run = mysqli_query($con,$query);
                                                          
                                                        
                                                            // header('Location:alumni_update.php');
                                                                
                                                            }*/
                                                      }
                                                  
                                                  else if($paramValue==8000)
                                                      {
                                                        include"connection.php";
                                                        $id= $_POST["TXNID"];
                                                        $email=$_GET['email'];
                                                        $query = "SELECT * FROM `user` WHERE email = '$email'";
                                                              $result = mysqli_query($con, $query);
                                                              //echo mysqli_fetch_array($result);
                                                              while($rows = mysqli_fetch_array($result)) 
                                                                {
                                                                 $available_cr= $rows['credit'];

                                                                }
                                                        
                                                        $credit = "$available_cr"+'3600';
                                                        $cost = "8000";
                                                        $edit = mysqli_query($con,"update user set credit='$credit',cost='$cost' where email='$email'");
                                                        if($edit)
                                                            {
                                                              $html="Thank You For Take A Membership You have Sucessfully Credited 3600 Credit";
                                                              include"payment_mail.php";
                                                              $query = "INSERT INTO `transaction`(`email`,`tid`,`price`,`credit`) VALUES('$email','$id','$cost','3600')";
                                                              $query_run = mysqli_query($con,$query);
                                                            if($query_run)
                                                            {
                                                              //  mysqli_close($con); 
                                                            echo"your credit 3600 updated successfully";
                                                            // header('Location:alumni_update.php');
                                                            }   
                                                            }

                                                      }
                                                     else if($paramValue==3000)
                                                      {
                                                        include"connection.php";
                                                        $id= $_POST["TXNID"];
                                                        $email=$_GET['email'];
                                                        $query = "SELECT * FROM `user` WHERE email = '$email'";
                                                              $result = mysqli_query($con, $query);
                                                              //echo mysqli_fetch_array($result);
                                                              while($rows = mysqli_fetch_array($result)) 
                                                                {
                                                                 $available_cr= $rows['credit'];

                                                                }
                                                                $credit = "$available_cr"+'900';
                                                                $cost = "3000";
                                                        $edit = mysqli_query($con,"update user set credit='$credit',cost='$cost' where email='$email'");
                                                       if($edit)
                                                            {
                                                              $html="Thank You For Take A Membership You have Sucessfully Credited 900 Credit";
                                                              include"payment_mail.php";
                                                              $query = "INSERT INTO `transaction`(`email`,`tid`,`price`,`credit`) VALUES('$email','$id','$cost','900')";
                                                              $query_run = mysqli_query($con,$query);
                                                            if($query_run)
                                                            
                                                              //  mysqli_close($con); 
                                                            echo"your credit 900 updated successfully";
                                                            // header('Location:alumni_update.php');
                                                              
                                                            }

                                                      }
                                                     else if($paramValue==5000)
                                                      {
                                                        include"connection.php";
                                                        $id= $_POST["TXNID"];
                                                        $email=$_GET['email'];
                                                        $query = "SELECT * FROM `user` WHERE email = '$email'";
                                                              $result = mysqli_query($con, $query);
                                                              //echo mysqli_fetch_array($result);
                                                              while($rows = mysqli_fetch_array($result)) 
                                                                {
                                                                 $available_cr= $rows['credit'];

                                                                }
                                                                $credit = "$available_cr"+'1800';
                                                                $cost = "5000";
                                                        $edit = mysqli_query($con,"update user set credit='$credit',cost='$cost' where email='$email'");
                                                        if($edit)
                                                            {
                                                              $html="Thank You For Take A Membership You have Sucessfully Credited 1800 Credit";
                                                              include"payment_mail.php";
                                                              $query = "INSERT INTO `transaction`(`email`,`tid`,`price`,`credit`) VALUES('$email','$id','$cost','1800')";
                                                              $query_run = mysqli_query($con,$query);
                                                            if($query_run)
                                                              //  mysqli_close($con); 
                                                            echo"your credit 1800 updated successfully";
                                                            // header('Location:alumni_update.php');
                                                                
                                                            }

                                                      }
                                                     
                                                    
                                        continue;
                                       }
                                        

                                    }
                                  }
                                  

                                ?>


                        </ul>
                        </div>
                        
                      </div>
                    </div>


<?php        
        }
        else {
        //if failure

           echo '<div class="jumbotron text-center">
                <i class="fas fa-times-circle text-danger" style="font-size: 78px;"></i>
                  <h1>Transaction status failure!</h1> 
                   <a href="kart.php" class="btn btn-success"><i class="fas fa-arrow-circle-left" ></i> Back</a> 
                </div>';
?>

        <div class="container-fluid">
                      <div class="row ">
                     
                        <div class="col-md-8" style="margin-left: 300px;">
                          <h4>Your transation status has been failed.</br>
                            Paytm Responce code:
                           <a href="https://developer.paytm.com/assets/Transaction%20response%20codes%20and%20messages.pdf" target="_blank">PDF</a> </h4></br>
                        

                          <ul class="list-group">
                            <?php
                                 
                                   

                                  if (isset($_POST) && count($_POST)>0 )
                                  { 

                               
                                       
                                    echo '<li class="list-group-item">
                                                  <strong>RESPCODE</strong>
                                                  <span class="badge">'.$_POST['RESPCODE'].'</span>
                                              </li>';

                                    echo '<li class="list-group-item">
                                                  <strong>RESPMSG</strong>
                                                  <span class="badge">'.$_POST['RESPMSG'].'</span>
                                              </li>';
                                     
                                  
                                 
                                }
                                  

                                ?>


                        </ul>
                        </div>
                        
                      </div>
                    </div>


<?php
        }
?>




<?php
}
else {
       //if checksum not match
 
           echo '<div class="jumbotron text-center">
                <i class="fas fa-times-circle text-danger" style="font-size: 78px;"></i>
                  <h1>Checksum mismatched.!</h1> 
                     <small style="padding:10px;background:#ddd;color:#7f7f7f;border-radius:5px;">Process transaction is suspicious. Someone altered the transaction details.</small> 
                      <a href="kart.php" class="btn btn-success"><i class="fas fa-arrow-circle-left" ></i> Back</a> 
                </div>';
}

?>

  

</body>
</html>
