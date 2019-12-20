
 <?php
  include("employee.php");
?>
<html lang="en">
<head>
  <title>Add Task</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="w3-main" style="margin-left:300px;margin-top:20px;">
  <div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Add Task</div>
    <div class="panel-body">


        <form method="post" action="addtaskval.php" >


      	<div class="input-group control-group after-add-more">
          <input type="text" name="addmore[]" class="form-control" placeholder="Enter The Task Here" required>
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
            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here" required>
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