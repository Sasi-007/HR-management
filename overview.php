 <?php include('employee.php'); ?>
 <?php
    
    if(!isset($_SESSION['EMAIL']))
    {
        echo"<script>location.href='index.php'</script>";
    }
?>
   
 <!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:10px;">
 <!-- Header -->
 <?php
     $con=mysqli_connect("localhost","root","","employeetracker");
      if(!$con)
      {
          echo"Database is not connected";
      }
      $email=$_SESSION['EMAIL'];
     // $query="SELECT DISTINCT `employeename`, `taskname`, `date`, `day`, `month`, `sendemployeeid`, `addtotask` FROM `assigntask` WHERE `addtotask`='0' and `employeename`='$email';";
    $query="SELECT DISTINCT `sendemployeeid`  FROM `assigntask` WHERE `addtotask`='0' and `employeename`='$email'";
      $result=mysqli_query($con,$query);
      if (mysqli_num_rows($result)>=1)
      {
          while($row=mysqli_fetch_array($result))
          {
          $num=mysqli_num_rows($result);
          /*echo"<div class='container' align='right' style='margin-top:0px;'>";
          echo"<div class='toast' data-autohide='false'>";
          echo"<div class='toast-header'style='height:60px;'>";
          echo"<strong class='mr-auto text-primary'>Notification</strong>";
          echo"<button type='button' class='ml-2 mb-1 close' data-dismiss='toast'>&times;</button>";
          echo"</div>";
          echo"<div class='toast-body' align='left' style='height:50px;'>";
          //for($i=0;$i<$num;$i++)
          {
          echo"<span ><strong>You have Received Task from"." ".$row['sendemployeeid']."</strong></span>";
          echo"<br>";
        
          }
          echo"</div>";
          echo"</div>";
          echo"</div>";*/
        ?>
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog " role="document" style="height:400px;width:300px;float:right">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel">Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php  echo"<span ><strong>You have Received Task from"." ".$row['sendemployeeid']."</strong></span>";  ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="rectask.php" class="btn btn-primary">View</a>
      </div>
    </div>
  </div>
</div>
         <?php
          }
      }
    ?>
     <script>
     /* $(document).ready(function(){
      $('.toast').toast('show');
   });*/
</script>
 <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fas fa-tachometer-alt"></i> My Dashboard</b></h5>
  </header>

 <a href="excludingsundays.php"><div class="w3-row-padding w3-margin-bottom" style="display:inline">
    <div class="w3-quarter" style="display:inline">
      <div class="w3-container w3-white w3-padding-16">
		<img src="pie.png" alt="pie chart"/>
        <div class="w3-clear"></div>
        <center><h4><strong>Leave Tracker</strong></h4>
      </div>
    </div></a>
    <!--<div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Views</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Shares</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>
</div>-->