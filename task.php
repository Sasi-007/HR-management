<?php
    session_start();
    if(!isset($_SESSION['EMAIL']))
    {
        echo"<script>location.href='index.php'</script>";
    }
?>
<html>
	<head>
		<title>
            Task Completed
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		<link rel="stylesheet" href="css/timePicker.css">
		<script src="//code.jquery.com/jquery.min.js"></script>
		<script src="js/jquery-timepicker.js"></script>
		<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
		<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
		<!--DATE PLUGGIN-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
		
	</head>
	<body>
	<?php include('employee.php'); ?>
		<div class="w3-main" style="margin-left:300px;margin-top:20px;">
            <div id="cd" class ="container" style="padding:0.5%">
				<center><h3><strong>Today Completed Task</strong></center>
				<table class="table">
					<tr>
						<th>
							Name Of The Task
 						</th>
						<th>
							Timmings
 						</th>
					</tr>
					
					</table>
						<form action="taskvalidation.php"  method="post">
				
							<div class="row form-group">
								<div class="col-25 form-group">
									<textarea type="text"   rows="2" cols="30" name="taskname" class="form-control" required ></textarea>
								</div>	
								<div style="padding-left:520px">
								 <div class="col-25 form-group" >
									
									<label>Start Time:</label>&nbsp;<input type="datetime-local" name="starttime" id="date" placeholder="date" required />
										
								 </div>
								<div>
									<div>
										<label>End Time:</label>&nbsp;<input type="datetime-local" name="endtime" id="date" placeholder="date" required />
									</div>
								</div>	
							</div> 
						 </div>
                            <div class="row form-group" id="222">
                                <div id="222">
                                </div>
                            </div>
                        
                             
                            </div>
                 <input type="submit" name="submit"   value="submit" class="form-control" id="submit"/>
	 </form>
     <!--<button id="12">Add</button>-->
<script>
$(document).ready(function(){
  $("#12").click(function(){
    $("#222").append("<div class='col-25 form-group'><textarea type='text'   rows='2' cols='30' name='taskname' class='form-control' required ></textarea></div>");
    $("#20").append(" <div class='col-25 form-group' ><label>Start Time:</label>&nbsp;<input type='datetime-local' name='starttime' id='date' placeholder='date' required /></div>");
    $("20").append("<div class='col-25 form-group' ><label>end time:</label>&nbsp;<input type='datetime-local' name='endtime' id='date' placeholder='date' required /></div>");
  });
});
</script>
</div>
		<footer class="w3-container w3-padding-16 w3-light-grey">

		 </footer>
	</body>
</html>