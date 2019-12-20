<?php
 //session_start();
 $con=mysqli_connect("localhost","root","","employeetracker");
if(!$con)
{
    echo"Database is not connected";
}
$name=$_POST["name"];
$email=$_POST["email"];
$ph=$_POST["phoneno"];
print_r($ph);
$address=$_POST["address"];
$doj=$_POST["doj"];
$dob=$_POST["dob"];
$religion=$_POST["religion"];
$reference=$_POST["reference"];
//$reference=$_POST["reference"];
$len=sizeof($name);
$len1=sizeof($ph);
echo $len1;
//$ema=sizeof($email);
//print_r($phoneno);
//echo $len;
//print_r($_POST['email']);
for($i=0;$i<$len;$i++)
{
    $query="INSERT INTO `employee_register`(`name`, `email_id`, `phoneno`, `address`, `doj`, `dob`, `religion`, `reference`, `password`) VALUES('$name[$i]','$email[$i]','$ph[$i]','$address[$i]','$doj[$i]','$dob[$i]','$religion[$i]','$reference[$i]','123')";
    $result=mysqli_query($con,$query);   
}
//echo "could not insert".mysqli_error($con).mysqli_errno($con);
  //echo $query;
     if($result)
     {
       echo"<script>
        location.href='employeelist.php';
       </script>";
     }
    else
    {
        echo"<script>
          alert('Database is not connected');
        location.href='admindashboard.php';
       </script>";  
    }
?>