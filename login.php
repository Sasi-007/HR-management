<?php
			session_start();
		
			if(isset($_POST['submit']))
			{
				$row=array();
				$email=$_POST['email'];
				$password=$_POST['password'];
				 $con=mysqli_connect("localhost","root","","employeetracker");
				//$con=mysqli_connect("localhost","root","","employeetracker");
                if(!$con)
                {
                    echo"Database connection is not established";
                }
                $query="select * from employee_register where email_id='$email' and password='$password';";
                $result=mysqli_query($con,$query);
                //echo"could not insert data:". mysqli_error($con);
                if(mysqli_num_rows($result)==1)
                {
                    $row=mysqli_fetch_array($result);
					$_SESSION['NAME']=$row[0];
                    $_SESSION['EMAIL']=$row[1];
                    $name=$_SESSION['NAME'];
					$email=$_SESSION['EMAIL'];
                     //echo"could not insert data:". mysqli_error($con);
                     
                       echo"<script>
							//alert('password correct');
                            location.href='overview.php';
                       </script>";  
						
                }
                else
				{
                    echo"<script>
                        alert('wrong ID or Password');
						location.href='index.php';
                    </script>";
                }
				
			  }
		 
	
            		
     ?>
     <?php
	/*if(isset($_POST['forget']))
	{
			//session_start();
			//echo"<script>console.log('hii')</script>";
			$ab=$_POST['email'];
			
			if(!(($ab)==''))
			{
				
				$con=mysqli_connect("localhost","root","","employeetracker");
				if(!$con)
					echo"Not connected";
				$cdd="SELECT * FROM employee_register WHERE email_id='$ab' ";
				$result=mysqli_query($con,$cdd);	
				//echo ("Could not insert data : " . mysqli_error($con) . " " . mysqli_errno($con));
				//echo $cdd;
				if(is_bool($result)== false)
				{
					if(mysqli_num_rows($result)==1)
					{
						$row=mysqli_fetch_array($result);
						$_SESSION['MAIL']=$row['email_id'];
						$_SESSION['name']=$row['name'];
						echo"<script>location.href='verify.php';</script>";
					   
					}
					else
					{
						echo"<script>
					alert('EMAIL  IS INVALID');
                    location.href='index.php';
					</script>";
					}
					
				}
				else
				{
					echo"<script>alert('email is invalid');
                    location.href='index.php';</script>";
                    
				}
			}
			if((($ab)==''))
			{
		
			 //echo"<script>window.location.href='change.php';</script>";
			 echo"<script>alert('Enter your email id ');
             location.href='index.php';</script>";
            
			}
			//session_start();
			//$ab=$_POST['email'];
			//$bb=$_POST['PASSword'];
			//$be=md5($bb);
			
			//echo mysqli_error($con);
			//if(mysqli_num_rows($result)==1)
			//{
			//	$row=mysqli_fetch_array($result);
			//	$_SESSION['mail']=$row[0];
			//	$_SESSION['name']=$row[1];
			//	echo "<script>location.href='home.php';</script>";
		//	}	
			//else
			//{
				//echo"<script>
				//	alert('EMAIL AND PASSWORD IS INVALID');
					//</script>";
			//}
			
		
	}*/
				
?>

