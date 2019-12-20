  <?php
			
			     session_start();
                
                  {
					  $name=$_SESSION['NAME'];
					  $email=$_SESSION['EMAIL'];
					  $datefrom= $_POST['leave_required_from'];
					  $dateto= $_POST['leave_required_to'];
                      $reason=$_POST['reason'];
                      $date=$_SESSION['DATE'];
					  $date1=date_create($datefrom);
					  $date2=date_create($dateto);
					  $diff=date_diff($date1,$date2);
					  $no_of_days= $diff->format("%a");
					  $no_of_days_taken=$no_of_days+1;
					  $_SESSION['LEAVE']=$no_of_days_taken;
					  $taken_days=$_SESSION['LEAVE'];
					  //echo $taken_days;
					  $con=mysqli_connect("localhost","root","","employeetracker");
					  if(!$con)
                      {
                          echo"Database is not connected";
                      } 
						
					 $query="INSERT INTO `leave_applied`(`employee_name`, `employee_email_id`, `date_from`, `date_to`, `reason`, `submission_date`, `NO_OF_DAYS_LEAVETAKEN`) VALUES ('$name','$email','$datefrom','$dateto','$reason','$date','$no_of_days_taken');";
                     $result=mysqli_query($con,$query); 
                     // echo "could not insert".mysqli_error($con).mysqli_errno($con);
					 if(is_bool($result)==false)
					 {
                        echo"<center><h4>Please Re-enter the details again</h4></center>";
                     }
                     else
					 {
						echo"<script>alert('submitted successfully')</script>";
                        echo"<script>location.href='overview.php'</script>";
                     }
                    
                  }
             ?>