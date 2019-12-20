 <?php
       
       session_start();
        if(isset($_POST['sub']))
        {//to run PHP script on submit
            if(!empty($_POST['check']))
            {
                // Loop to store and display values of individual checked checkbox.
               /* foreach($_POST['check'] as $selected)
                {
                        echo $selected."</br>";
                    
                }*/
               $con=mysqli_connect 
                ("localhost","root","","employeetracker");
                if(!$con)
                {
                    echo"Database is not connected";
                }
             $date=date("d-m-y");
             $day=date('l');
             $check=$_POST['check'];
             $len=sizeof($check);
             $email=$_SESSION['EMAIL'];
            for($i=0;$i<$len;$i++)
            {
            // $query="INSERT INTO `donetask`(`done`, `date`, `day`) VALUES ('$check[$i]','$date','$day')";
                $query="UPDATE `addtask` SET`done`='1' WHERE `name`='$check[$i]' and `email`='$email'";
             $result=mysqli_query($con,$query);
             //echo "could not insert".mysqli_error($con).mysqli_errno($con);
              // echo $query;
            }
                if($result)
                {
                  echo"<script>
                   location.href='dayplaner.php';
                  </script>";
                }
             }
            else
            {
               echo"<script>
               alert('please select the check box');
               location.href='dayplaner.php';
               </script>";
            }
         }
        ?>