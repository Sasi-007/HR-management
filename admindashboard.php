<?php
   session_start();
  if(!isset($_SESSION['NAME']))
   {
       echo"<script>
          location.href='adminlogin.php';
       </script>";
   }
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admindashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="login.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Name" name="name[]" value="" placeholder="Name of the employee" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="email" name="email[]" value="" placeholder="Email" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="number" class="form-control" id="PhoneNumber" name="phoneno[]" value="" placeholder="Phone Number" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="Address" name="address[]" value="" placeholder="Address" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="date" class="form-control" id="Date of joining" name="doj[]" value="" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="date" class="form-control" id="Date of Birth" name="dob[]" value="" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="religion" name="religion[]" value="" placeholder="Religion" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"><input type="text" class="form-control" id="Reference" name="reference[]" value="" placeholder="Reference" required></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"> <div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div><br><br><br><br><br><br><br><br>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
    
    
</script>

</head>

<body style="background-color:#f9f6f7">
<div class="panel panel-default" style="background-color:#f9f6f7">
  <!--<div class="panel-heading">Add Employees</div>-->

    <?php
   include('navbar.php');
    
    ?>
    
        
    
<div class="panel-body">
  
 <!-- <div id="education_fields"></div>-->
 <form name="admin" action="adminregtask.php" method="post"> 
    <div class="col-sm-3 nopadding">
      <div class="form-group">
       <input type="text" class="form-control" id="Name" name="name[]" value="" placeholder="Name of the employee" required>
       </div>
   </div>
 <div class="col-sm-3 nopadding">
   <div class="form-group">
    <input type="text" class="form-control" id="Email" name="email[]" value=""  placeholder="Email" required>
   </div>
 </div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="number" class="form-control" id="PhoneNumber" name="phoneno[]" value="" placeholder="Phone Number">
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Address" name="address[]" value="" placeholder="Address" required>
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="date" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Employee Date Of Joining"  id="Date of joining" name="doj[]" required value="" >
  </div>
  <script>
   $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="date" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Employee Date Of Birth" id="Date of Birth" name="dob[]" value="" required>
  </div>
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Religion" name="religion[]" value="" placeholder="Religion" required>
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Reference" name="reference[]" value="" placeholder="Reference" required>
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <div class="input-group">
        
     <!-- <select class="form-control" id="educationDate" name="educationDate[]">
      
        <option value="">Date</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
      </select>-->
      <div class="input-group-btn">
        <a class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
      </div>
    </div>
  </div>
</div>
    <br>
    <br>
    <br><br><br><br><br><br>          
     <div id="education_fields"></div>

          <div class="form-group">
         <input type="submit"    name="submit" class="form-control btn btn-primary "/>
         </div> 
      </form>
<div class="clear"></div>
    

  </div>
    
</div>   
    
</body>
</html>