<?php
	session_start();
	if(!isset($_SESSION['EMAIL']))
		echo"<script>location.href='index.php';</script>";
?>
<?php
	$f;
	$otp;
	if(isset($_POST['sendotp']))
	{
		$f=$_SESSION['mail'];
		//$otp=mt_rand("abcd");
		function random_code($limit)
     {
         return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
     }
 
//echo random_code(8);
		try{
			$con=mysqli_connect("localhost","id10068948_root1","root@123","id10068948_test");
			if(!$con)
			{
				echo"Not Connected";
			}
			$ran=random_code(8);
			$query="insert into otp values('$ran','$f')";
			$result=mysqli_query($con,$query);
			$to=$_SESSION['mail'];
			$txt="hello  ,this is masood ahmed and your otp is :"."$ran";
			//echo random_code(8);
			$subject="my first otp";
			$headers="From:ayishanaznee@gmail.com";
			mail($to,$subject,$txt,$headers);
			
			echo"<script>confirm('OTP HAS SEND TO YOUR MAIL ID');</script>";
		   }
		   catch(Exception $e)
		   {
			   echo"OTP FAILED BECAUSE OF";
		   }
		
	}
?>
<?php
    $f;
    $ran;
    if(isset($_POST['verify']))
    {
        $ran=$_POST['ot'];
        if(empty($ran))
        {
            echo"<script>alert('PLEASE ENTER THE OTP')</script>";
        }
        $con=mysqli_connect("localhost","id10068948_root1","root@123","id10068948_test");
        if(!$con)
        {
            echo"Not connected";
        }
        $query="select *from otp where OTP='$ran'";
        $result=mysqli_query($con,$query);
        //echo ("Could not insert data : " . mysqli_error($con) . " " . mysqli_errno($con));
        if(!empty($ran))
        {
            if(is_bool($result)==false)
            {
                if(mysqli_num_rows($result)==1)
                {
                 echo"<script>location.href='change.php';</script>";
                }
            }
            else
             {
                echo"<script>alert('INVALID OTP');</script>";
            }
        }
        
    }
?>
<html>
	<head>
		<title>Change password</title>
		 <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://kit.fontawesome.com/26c5aaea0c.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body style="background-color:#EEE2DC;">
         
  
	<?php
        
        ?>
	<?php
		/*if(isset($_POST['sendotp']))
		{
			require('textlocal.class.php');
			require('credential.php');

			$textlocal = new Textlocal(false,false,API_KEY);
			$a=$_POST['phone'];
			$numbers = array($a);
			$otp=mt_rand(10000,99999);
			$sender = 'TXTLCL';
			$message = 'HELLO'.$a."This is your otp:".$otp;

			try {
				$result = $textlocal->sendSms($numbers, $message, $sender);
				//print_r($result);
				echo"OTP SUCCESSFULLY SENT";
				setcookie('otp',$otp);
				} catch (Exception $e) {
						die('Error: ' . $e->getMessage());
						}
		}
		if(isset($_POST['verify']))
		{
			$otp=$_POST['otp'];
			
			if($_COOKIE['otp']== $otp)
			{
				echo"<script>location.href='index.php'</script>";
			}
			else{
				echo"please enter the correct otp";
			}
		}*/
?>
	<form action="" method="post">
	 <div class="row">
		<!--style="background-image:url(https://media.giphy.com/media/IbxRBOFw540eI/giphy.gif)"-->
		 <div class="col-sm-4">
		 </div>
		
		 <div class="col-sm-4" style="padding-top:15%;">
		 <div class="card bg-info" >
		 <div class="card-body ">
			<h4 class="card-tittle text-center text-danger">OTP VERIFICATION</h4>
			<!--<div class="form-group">
				<label for="phonenumber">PHONE NUMBER:&nbsp;<i class="fas fa-mobile-alt"></i></label>
				<input type="tel"  class="form-control" name="phone" /> 	
			</div>-->
			<div class="form-group">
				
				<input type="submit"  value="send OTP" class="form-control" name="sendotp" /> 	
			</div>
		
			<div class="form-group">
				<label for="phonenumber">OTP&nbsp;<i class="fas fa-mobile-alt"></i></label>
				<input type="password"  class="form-control" name="ot" /> 	
			</div>
			<div class="form-group">
				
				<input type="submit"  value="VERIFY" class="form-control" name="verify" /> 	
			</div>
			
			<!--<form action="" method="post">
			<div class="form-group">
				<label for="PASSWORD">CHANGE PASSWORD :</label>
				<i class="fas fa-unlock"></i><input type="PASSWORD" id="222" class="form-control" name="PASS" />
			</div>
			<div class="form-group">
				<label for="PASSWORD">CONFIRM PASSWORD :</label>
				<i class="fas fa-unlock"></i><input type="PASSWORD" id="220" class="form-control" name="PASSD" />
			</div>
			<div>
				<input type="submit" name="chng" class="btn btn-primary" />
			</div>
		 </div>
		 </div>
		 </div>
		</div>-->
		 </form>
		
	</body>
</html>
