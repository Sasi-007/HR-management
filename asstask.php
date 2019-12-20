<?php
  include("employee.php");
?>
<html lang="en">
<head>
  <title>Assign Task</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <style>
  input[type=text]:focus
      {
          background-color: lightblue;
      }
  </style>
</head>
<body>
<div class="w3-main" style="margin-left:300px;margin-top:20px;">
  <div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Assign Task</div>
    <div class="panel-body">


        <form method="post" action="asstaskval.php" >


      	<div class="input-group control-group after-add-more">
         <input type="text" style=" width:30%;padding:12px 32px;margin: 4px 2px;" name="empaddmore[]" placeholder="Enter The Employee ID Here" required>
          <input type="text" style=" width:30%;padding:12px 32px;margin: 4px 186px;" name="addmore[]" placeholder="Enter The Task Here" required>
          <div class="input-group-btn"> 
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
          </div>
        </div>
        <br>
       <input type="submit" class="form-control" style="color:blue;" name="submit" />
        </form>


        <!-- Copy Fields -->
        <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
           <input type="text" style=" width:30%;padding:12px 32px;margin: 4px 2px;" name="empaddmore[]" placeholder="Enter The Employee ID Here" required>
           <input type="text" style=" width:30%;padding:12px 32px;margin: 4px 195px;" name="addmore[]" placeholder="Enter The Task Here" required>
            <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>


    </div>
  </div>
 </div>
</div>
<script type="text/javascript">


    $(document).ready(function() {


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });


</script>


</body>
</html>