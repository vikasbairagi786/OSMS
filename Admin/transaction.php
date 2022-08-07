<?php
define('TITLE', 'Tra');
define('PAGE', 'transaction');
include('includes/header.php');
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 } 
?>

<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
 
  <?php 
  {
   // $startdate = $_REQUEST['startdate'];
   // $enddate = $_REQUEST['enddate'];
    $sql = "SELECT * FROM transaction";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
     echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
     echo '<table class="table">';
      echo '<thead>';
       echo '<tr>';
        echo '<th scope="col">ID</th>';
        echo '<th scope="col">Email</th>';
        echo '<th scope="col">Price</th>';
        echo '<th scope="col">Tid</th>';
       
       echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      while($row = $result->fetch_assoc()){
       echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['price'].'</td>';
        echo '<td>'.$row['tid'].'</td>';
       
       echo '</tr>';
      }
      echo '<tr>';
       echo '<td>';
        echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">';
       echo '</td>';
      echo '</tr>';
      echo '</tbody>';
     echo '</table>';
    } else {
     echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
    }
   }
  ?>
</div>


<?php include('includes/footer.php')?>