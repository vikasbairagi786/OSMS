<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
$sql = "SELECT max(request_id) FROM submitrequest_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$submitrequest = $row[0];

$sql = "SELECT max(rno) FROM assignwork_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$assignwork = $row[0];

$sql = "SELECT * FROM technician_tb";
$result = $conn->query($sql);
$totaltech = $result->num_rows;

?>
   <div class="col-sm-9 col-md-10"> <!-- Start Dashboard 2nd Column -->
    <div class="row text-center mx-5">
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
       <div class="card-header">Requests Received</div>
       <div class="card-body">
        <h4 class="card-title"><?php echo $submitrequest; ?></h4>
        <a class="btn text-white" href="request.php">View</a>
       </div>
      </div>
     </div>
   
   
<?php include('includes/footer.php')?>