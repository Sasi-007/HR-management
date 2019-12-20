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
            LEAVE FORM
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
        <script>
            form2.submit();
        </script>
		<style>
		hr {
			border: 1px solid #f1f1f1;
			margin-bottom: 25px;
			}
		* {
				box-sizing: border-box;
			}
			.container {
			border-radius: 5px;
			background-color: white;
			padding: 5px;
			}
			input[type=text], select, textarea {
			width: 100%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
			}

		label {
			padding: 12px 12px 12px 0;
			display: inline-block;
			}
		input[type=submit] {
			background-color: light blue;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
			}

		input[type=submit]:hover {
		background-color: blue;
		}
		.col-25 {
		float: left;
		width: 25%;
		margin-top: 6px;
		}	
		.col-75 {
		float: left;
		width: 75%;
		margin-top: 6px;
		}	
		/* Clear floats after the columns */
		.row:after {
		content: "";
		display: table;
		clear: both;
		}	
		/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) 
		{
			.col-25, .col-75, input[type=submit] {
				width: 100%;
				margin-top: 0;
				}
		}
	</style>
    </head> 
    <body>
	<?php include('employee.php'); ?>

		<div class="w3-main" style="margin-left:300px;margin-top:20px;">
				
            <div class ="container" style="padding:1.5%">

                <div class="row">
                  
			
                    <div class="col-sm-12 " style="padding-top:1.5%">
					
						<form action="leaveformvalidation.php" method="post" >
                            
								<div class="row form-group">
									<div class="col-25 form-group">
										<label for="Designation"> <strong>&nbsp;&nbsp;&nbsp;Employee Name</strong></label>
									</div>
									<div class="col-75 form-group">
										<input type="text"  name="name" class="form-control" value="<?php
											$name=$_SESSION['NAME'];
											echo $name;?>"disabled/>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-25 form-group">
										<label for="Designation"> <strong>&nbsp;&nbsp;&nbsp;Employee Email ID</strong></label>
									</div>
									<div class="col-75 form-group">
										<input type="text"  name="name" class="form-control" value="<?php
											$email=$_SESSION['EMAIL'];
											echo $email;?>"disabled/>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-25 form-group">
										<label for="Designation"> <strong>&nbsp;&nbsp;&nbsp;Date</strong></label>
									</div>
									<div class="col-25 form-group">
										<label for="date from"> <strong>&nbsp;&nbsp;&nbsp;From</strong></label>
										<input type='date'   name='leave_required_from' class='form-control' required/>
										
									</div>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<div class="col-25 form-group">
										<label for="date to"> <strong>&nbsp;&nbsp;&nbsp;TO</strong></label>
										<input type='date'   name='leave_required_to' class='form-control' required>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-25 form-group">
										 <label for="reason"><strong>&nbsp;&nbsp;&nbsp;Reason</strong></label>
									</div>
									<div class="col-75 form-group">
										<textarea type="text"   rows="4" cols="50"name="reason" class="form-control" required ></textarea>
									</div>
								</div>
                                <div class="form-group">
                                        <label for="name"><strong>SUBMISSION DATE</label>
										 <input type="text"  name="name" class="form-control" value=" <?php
											  date_default_timezone_set('Asia/Kolkata');
												$date1= date("Y-m-d"); 
											$_SESSION['DATE']=$date1;
											echo $date1;
										 ?>"
										 disabled/>
									   <?php
									  // date_default_timezone_set('Asia/Kolkata');
									   //$date1= date("Y-m-d"); 
									   //echo $date1;
									   ?>
                                </div>
                                <div class="form-group">
                                    <input type="submit"    name="submit" class="form-control btn btn-primary "/>
                                </div>                            
                            </form>
							
                        </div>         
                    
                </div>
        </div>
		 <footer class="w3-container w3-padding-16 w3-light-grey">
 
		 </footer>
	</div>
	
            <?php
                 if(isset($_POST['submit']))
                  {
                      //$name=$_POST['name'];
                     // $id=$_POST['id'];
                     // $designation=$_POST['designation'];
                     // $leave_required_on=$_POST['leave_required_on'];
                     // $no_of_days_required=$_POST['no_of_days_required'];
					  $days=$_SESSION['days'];
                      $reason=$_POST['reason'];
                      //$phno=$_POST['phno'];
                      $address=$_POST['address'];
                      //$date= $_POST['leave_required_on'];
                      $datefrom= $_POST['leave_required_on'];
					  
                       //$date1=$_POST['date1'];
                     $con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
					 if($days==1)
					 {
						$dateto=$_POST['leave_required_on'];
					 }
					 else
					{
						$date=date_create($datefrom);
						$str=strval($days);
						date_add($date,date_interval_create_from_date_string(($str."days")));
						$dateto= date_format($date,"Y-m-d");
					}
					$con=mysqli_connect("localhost","root","","test");	
					$con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
                    if(!$con)
                    {
                        echo"Database is not connected";
                    }
					
                    //$query="INSERT INTO `leave_application`(`NAME_OF_EMPLOYEE`, `EMPLOYEE_ID`, `DESIGNATION`,  `REASON`, `PHNO`, `ADDRESS`) VALUES ('$name','  $id',' $designation','$reason',' $phno',' $address');";
                //  $query="UPDATE `leave_application` SET `NAME_OF_EMPLOYEE`='$name',`EMPLOYEE_ID`='$id',`DESIGNATION`='$designation','LEAVE_REQ_ON'='$date',`REASON`='$reason',`PHNO`='$phno',`ADDRESS`='$address',`date`='$date1' ;";
				$query="INSERT INTO `leave_application`(`NAME_OF_EMPLOYEE`, `EMPLOYEE_ID`, `DESIGNATION`, `LEAVE_REQ_FROM`, `NO_OF_DAYS_RRQUIRED`, `REASON`, `PHNO`, `ADDRESS`, `date`,`LEAVE_REQ_TO`) VALUES ('$name','$id','$designation','$datefrom','$days','$reason','$phno','$address','$date1','$dateto');";
                 // echo $query;
                    $result=mysqli_query($con,$query); 
                 //  echo "could not insert".mysqli_error($con).mysqli_errno($con);
                    if(is_bool($result)==false)
                    {
                        echo"<center><h4>Please Re-enter the details again</h4></center>";
                    }
                    else
					{
						echo"<script>alert('submitted successfully')</script>";
                        echo"<script>location.href='employee_choice.php'</script>";
                    }
                    
                  }
             ?>
			
    </body>

</html>
