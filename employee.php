
<html>
 <head>
	<title><?php session_start();
	echo $_SESSION['NAME']; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
	</style>
<!--<script type="text/javascript">
      /* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
      (function(d, m){
        var kommunicateSettings = {"appId":"2571c4767d302bbe1329d45e77a9fe030","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
      })(document, window.kommunicate || {});
  </script>-->
 </head>
<body style="background-color:#f9f6f7">
 <!--<div class="topnav  navbar-expand-sm" style="background-color:#EDC7B7;padding:10px;">
		<a class="navbar-brand" href="#"> </a>
		<!-- Brand/logo -
          <div style="background-color:#FFF;width:140px;float:left;padding:10px;" >
		<img style="width:120px;" src="logo.png" alt="logo" >
          </div>	 <div class="topnav-right">
			<a href="index.php" style="color:black;">Employee Login</a>
			&nbsp;
			<a href="adminlogin.php" class="active" style="color:black;">Admin Login</a>
		 </div>
	  </div>-->
<!-- Top container -->
<div class="w3-bar w3-top  w3-large" style="z-index:4;background-color:#f9f6f7;
">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey  w3-right" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
 <!-- <span class="w3-bar-item w3-left">Logo</span>-->
 <div style="background-color:#FFF;width:300px;float:left;padding:10px;" >
  <img style="width:100px;" src="logo.png" alt="logo" >
</div>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br><!-- class="w3-animate-left"-->
  <!--<div class="w3-container w3-row">
    <div class="w3-col s4">
      <i class="fas fa-user-circle fa-7x"></i>
    </div>
   <div class="w3-col s8 w3-bar">
	
		<span>Welcome, <strong>Mike</strong></span><br>
       
      <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>-
    </div>
  </div>-->
  <br>
  <br>
  <br>
  <center><i class="fas fa-user-circle fa-10x"></i></center>
  <br>
  <h3 class="w3-padding-12 "><center><?php echo "Welcome ".($_SESSION['NAME']) ?></h3></center>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" style="text-decoration:none" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="overview.php" style="text-decoration:none" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="leaveform.php" style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Apply Leave</a>
    <a href="excludingsundays.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fas fa-chart-pie"></i>  Leave Tracker</a>
    <a href="adtask.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fas fa-chart-pie"></i> Add Task</a>
     <a href="asstask.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fas fa-chart-pie"></i> Assign Task</a>
     <a href="asstasklist.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fas fa-chart-pie"></i> Assigned Task List</a>
     <a href="rectask.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding btn btn-primary">
     
     <?php
      $con=mysqli_connect("localhost","root","","employeetracker");
      if(!$con)
      {
          echo"Database is not connected";
      }
      $email=$_SESSION['EMAIL'];
      $query="SELECT `employeename`, `taskname`, `date`, `day`, `month`, `sendemployeeid`, `addtotask` FROM `assigntask` WHERE `addtotask`='0' and `employeename`='$email';";
      $result=mysqli_query($con,$query);
      if (mysqli_num_rows($result)>=1)
      {
         /* echo"<div class='toast' data-autohide='false'>";
          echo"<div class='toast-header'>";
          echo"<strong class='mr-auto text-primary'>Toast Header</strong>";
          echo"<small class='text-muted'>5 mins ago</small>";
          echo"<button type='button' class='ml-2 mb-1 close' data-dismiss='toast'>&times;</button>";
          echo"</div>";
          echo"<div class='toast-body'>";
          echo"Some text inside the toast body";
          echo"</div>";
          echo"</div>";
          echo"</div>";*/
     ?>
         <script>
      $(document).ready(function(){
      $('.toast').toast('show');
   });
</script>
        <?php
         $num=mysqli_num_rows($result);
         
        // echo"<em class='btn btn-info' style='background-color:blue'>Receive Task".$num."</em>";
          echo"Receive Task"."&nbsp;&nbsp;"."<span class='badge badge-light'>$num</span>";
      }
      else
      {
          //echo"<i class='fas fa-chart-pie'></i> ";
          echo"Receive Task"."&nbsp;&nbsp;"."<span class='badge badge-light'>0</span>";
      }
     ?>
    </a>
    <a href="dayplaner.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fas fa-chart-pie"></i>     Day Planer</a>
	<!--<a href="task.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fas fa-tasks"></i> Task Completed</a>-->
    <a href="hours.php"  style="text-decoration:none"  class="w3-bar-item w3-button w3-padding"><i class="fas fa-hourglass-start"></i>  Task Tracker</a>
	<a href="logout.php" style="text-decoration:none" class="w3-bar-item w3-button w3-padding"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>



 
 
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
  <!--  <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>-->
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>