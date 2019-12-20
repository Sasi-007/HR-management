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
			EMPLOYEE LEAVE STATISTICS
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="registration.css">
		<link rel="stylesheet" href="leavestatistics.css">
        <script>
        </script>
		<style>
			* {
			box-sizing: border-box;
				}
			.container {
			border-radius: 55px;
			background-color: white;
			padding: 5px;
			}
			/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
			@media screen and (max-width: 600px) {
			.col-25, .col-75, input[type=submit] {
			width: 100%;
			margin-top: 0;
				}
			}
		</style>
    </head> 
    <body>
	<?php include('employee.php'); ?>
   <!-- !PAGE CONTENT! -->
	<div class="w3-main" style="margin-left:300px;margin-top:43px;">

		<!-- Header -->
		<header class="w3-container" style="padding-top:22px">
			<h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
		</header>
      
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12" style="padding-top:3.5%;">
                  <!-- <h5><b>Employee Name:</b>&nbsp;-->
				    <!--<table class='table  table-borderless'>-
					<thead>
					 <tr>
					 <th>NAME OF EMPLOYEE:</th>-->
					 	<!--<strong>NAME OF EMPLOYEE:</strong>-->
					 <div class="row">
						<div class="col-25">
							<label for="fname"><strong>NAME OF EMPLOYEE</strong></label>
						</div>
						
						
				
					
                   <?php 
				    $name=$_SESSION['NAME'];
          
					?>
					<div class="col-75">
							<input type="text" id="fname" name="name" value="<?php echo $name ?>"disabled>
					

					</div>
				   <br>
				    <div class="row">
						<div class="col-25">
							<label for="ID"><strong> Employee ID</strong></label>
						</div>
						<div class="col-75">
                   <?php
                    
                    $row=array();
                   // $con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
					$con=mysqli_connect("localhost","root","","test");
                    if(!$con)
                    {
                        echo"Database is not established";
                    }
                    $name=$_SESSION['NAME'];
                    $id=$_SESSION['ID'];
                    $query="select ID from register where  ID='$id';";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($result))
		            {
						//echo"&nbsp";
						$empid=$row[0];
						echo"<input type='text' id='ID' name='id' value='$row[0]' disabled>";
						//echo"$row[0]";
		            }
                   ?>                   
               
				   </div>
			  </div>
					<br>
					 <div class="row">
						<div class="col-25">
							<label for="number"> <strong> EMPLOYEE PH.NO</strong></label>
						</div>
						<div class="col-75">
				   <?php
                    
                    $row=array();
                   //$con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
					$con=mysqli_connect("localhost","root","","test");
                    if(!$con)
                    {
                        echo"Database is not established";
                    }
                    $name=$_SESSION['NAME'];
                    $id=$_SESSION['ID'];

                    $query="select 	PHONE_NO from register where ID='$id';";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($result))
		            {
						$phnum=$row[0];
					//echo"&nbsp";
			        echo"<input type='number' id='number' name='number' value='$row[0]' disabled>";
		            }
                   ?>      
				   </div>
			   </div>
				   <br>
				    <div class="row">
						<div class="col-25">
							<label for="Designation"> <strong>DESIGNATION</strong></label>
						</div>
						<div class="col-75">
				    
				   <?php 
						/*$id=$_SESSION['ID'];
						$con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
						//$con=mysqli_connect("localhost","root","","test");
						if(!$con)
						{
							echo"Database not established";
						}
						
						$query="SELECT  `DESIGNATION` FROM `register` WHERE `ID`='$id';";
						$result=mysqli_query($con,$query);
						$row=mysqli_fetch_array($result);
						$_SESSION['desig']=$row[0];
						 echo"<input type='text' id='designation' name='designation' value='$row[0]' disabled>";*/
				   ?>
				  </div>
			 </div>
				   <br>
				   <table>
				   
				   <tr>
				   <!--<th class="padding">-->
				  <center><h5><b>DATE  OF   THE  LEAVE</h5></center>
				   <!--</th>-->
				   </tr>
				   <tr>
				   <th>
                   Leave Taken FROM
				   </th>
				    <th>
                   Leave Taken To
				   </th>
				   </tr>
				   
				   <?php
                    
                    $row=array();
					//$con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
					$con=mysqli_connect("localhost","root","","test");
                    if(!$con)
                    {
                        echo"Database is not established";
                    }
                    $name=$_SESSION['NAME'];
                    $id=$_SESSION['ID'];
                    $phno=$_SESSION['PHNO'];
                    $query="SELECT `LEAVE_REQ_FROM`, `LEAVE_REQ_TO` FROM `leave_application` WHERE PHNO='$phno';";
                    $result=mysqli_query($con,$query);
                    
                    //echo"could not insert data:". mysqli_error($con);
                    if((mysqli_num_rows($result))>=1)
                    {
                       // echo"could not insert data:". mysqli_error($con);
                     while($row=mysqli_fetch_array($result))
		                {
							 echo"<tr>";
                             echo"<td>$row[0]</td>";
							 echo"<td>$row[1]</td>";
							 echo"</tr>";
                        }
                    }
                    else{
                        //echo"0";
						echo"<tr>";
                        echo"<td>0000-00-00</td>";
						echo"<td>0000-00-00</td>";
					    echo"</tr>";
                    }
                   ?>
				   
				   </table>
				   <br>
				   <center><h2>EMPLOYEE LEAVE COUNT</h2></center>
                 <!--  <h5><b>No. of Days Taken:</h5>-->
				 <?php
                    
                    $row=array();
                    $t=0;
                    //$con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
				   	$con=mysqli_connect("localhost","root","","test");
                    if(!$con)
                    {
                        echo"Database is not established";
                    }
                    $name=$_SESSION['NAME'];
                    $id=$_SESSION['ID'];
                    $phno=$_SESSION['PHNO'];

                    $query="select NO_OF_DAYS_RRQUIRED from leave_application where PHNO='$phno';";
                    $result=mysqli_query($con,$query);
                    //echo"could not insert data:". mysqli_error($con);
                    if((mysqli_num_rows($result))>=1)
                    {
                     while($row=mysqli_fetch_array($result))
		                {
			
                             $var=$row[0];
                             $t+=$var;
                             //echo $t;
                             global $n;
                             $n=4;
                             for($i=1;$i<=$t;$i++)
                             {  
                               
                                 
                                 if($n!=0)
                                 {
                                    --$n;
                                     $query1="UPDATE `register` SET `NO_OF_LEAVE_LEFT`='$n' WHERE PHONE_NO='$phno';";
                                    $result1=mysqli_query($con,$query1);
                                    if($n==0)
                                    {
                                         $query2="UPDATE `register` SET `NO_OF_LEAVE_LEFT`='$n' WHERE PHONE_NO='$phno';";
                                    $result1=mysqli_query($con,$query2);
                                    }
                                    
                                   
                                 }
                                
                                
                            }
                        }
                          //echo $t;
						  $chart1=$t;
                    }
                    else{
                        //echo"0";
						$chart1=0;
                       
                    }
                   ?> 
                <!--   <h5><b>NO. Of Days Leave Left: </h5>-->
                   <?php

                    GLOBAL $s;
                    $s=4;
                    $row=array();
					$con=mysqli_connect("localhost","id10477503_root","12345","id10477503_eleaveform");
				   	//$con=mysqli_connect("localhost","root","","test");
                    if(!$con)
                    {
                        echo"Database is not established";
                    }
                    $name=$_SESSION['NAME'];
                    $id=$_SESSION['ID'];
                    $phno=$_SESSION['PHNO'];
                    $query="select 	NO_OF_LEAVE_LEFT from register where PHONE_NO='$phno';";
                    $result=mysqli_query($con,$query);
                    
                    //echo"could not insert data:". mysqli_error($con);
                    if((mysqli_num_rows($result))==1)
                    {
                       // echo"could not insert data:". mysqli_error($con);
                     while($row=mysqli_fetch_array($result))
		                {
			
                            $_SESSION['leaveleft']=$row[0];
                            $leaveleft=$_SESSION['leaveleft'];
                          // echo $leaveleft;
                            $s=$s-$t;
                            
                            //echo $s;
							$chart2=$s;
                            $query1="UPDATE `register` SET `NO_OF_LEAVE_LEFT`='$s' WHERE PHONE_NO='$phno';";
                            $result1=mysqli_query($con,$query1);
                            //echo"could not insert data:". mysqli_error($con);
                        }
                     
                        //echo $query1;
                       
                    }
                    else{
                        //echo"0";
						$chart2=0;
                    }
                   ?> 
				   <div class="row">
						<div class="col-sm-12">
						<?php include('charts.php');?>
					</div>
				</div>
				   
                </div>
            </div>
        </div>
		
		</div>
	</div>
	
    </body>

</html>