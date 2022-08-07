<!------ Include the below in your HEAD tag ---------->
<?php
include "include/head.php";
?>
<!------ Include the above in your HEAD tag ---------->
<body>

<?php


date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$timestamp = date('d-m-Y H:i:s');

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

?>
<!-- Image and text -->

<div class="container">
    <div class="row" style="margin-top:50px;">
        <!------ Include the below in your NAV tag ---------->
        <?php
        include "include/nav.php";
        ?>
        <!------ Include the above in your NAV tag ---------->

      
                    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">

                         

                <form method="post" action="pgRedirect.php">

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <em>Date: <?php echo date("jS F, Y", strtotime($timestamp)); ?></em>
                            </p>
                            <p>
                                <em>ORDER-ID #: <input id="ORDER_ID" tabindex="1" maxlength="20" size="11" style="border: none;background: #f5f5f5" 
                                                                        name="ORDER_ID" autocomplete="off"
                                                                        value="<?php echo  "ORDS" . rand(10000,99999999)?>"></em>
                            </p>
                              <p>
                                <em>CUST-ID #: <input id="CUST_ID" tabindex="1" maxlength="20" size="11" style="border: none;background: #f5f5f5" 
                                                                        name="CUST_ID" autocomplete="off"
                                                                        value="<?php echo  "CUST" . rand(10000,99999999)?>"></em>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="text-center">
                            <h1>Standard Checkout</h1>
                            <?php session_start(); $email=$_SESSION['rEmail'];echo"$email";
$_SESSION['number']=$_GET['number'];
							?>
                        </div>
                        </span>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Q</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                 
                                 
                                    <td class="text-right">
                                  
                                    <p>
                                        <strong>Tax: </strong>
                                    </p></td>
            
                                </tr>

                                <tr>
                                    <td><input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">   </td>
                                    <td><input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">  </td>

                                    <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                    <td class="text-center text-danger">
                                        <h4><strong><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php $number=$_GET['number']; echo"$number"?>" size="3" style="border: none;background: #f5f5f5" readonly ></strong></h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" value="CheckOut"  class="btn btn-success btn-lg btn-block">
                            Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                        </button></td>
                    </div>
</form>
                </div>
    


    </div>
    </body>