<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin page</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="login.css">
  <script>
			
            function shw()
			{
				
                var x=document.getElementById('shwpwd').type;
                if(x=="text")
                {
                    document.getElementById('shwpwd').type="password";
                }
                else
                {
                    document.getElementById('shwpwd').type="text";
                }
		
			}
	</script>
    
    </head>
<body style="background-color:#EEE2DC;">
    <!--<script type="text/javascript">
      /* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
      (function(d, m){
        var kommunicateSettings = {"appId":"2571c4767d302bbe1329d45e77a9fe030","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
      })(document, window.kommunicate || {});
  </script>-->
	  <div class="topnav  navbar-expand-sm" style="background-color:#EDC7B7;padding:10px;">
		<a class="navbar-brand" href="#"> </a>
		<!-- Brand/logo -->
          <div style="background-color:#FFF;width:140px;float:left;padding:10px;" >
		<img style="width:120px;" src="logo.png" alt="logo" >
          </div>	 <div class="topnav-right">
			<a href="index.php" style="color:black;">Employee Login</a>
			&nbsp;
			<a href="adminlogin.php" class="active" style="color:black;">Admin Login</a>
		 </div>
	  </div>
	<div class="w3-main" style="margin-left:0px">
		<div class="w3-hide-large" style="margin-top:83px"></div>	  
       <div class ="container-fluid" style="padding:5% ;padding-left:13.5%" >
                <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-4 "  style="padding-top:2.5%">
                            <form action="login1.php" method="post">
                                 
                                <div class="form-group">
                                         <label for="ID NO"><strong>Admin ID</strong></label><input type="email"  name="email" class="form-control"  required/>
                                </div>
                                <div class="form-group">
                                         <label for="password"><strong>Password</strong></label><input type="password"  id="shwpwd" name="password" class="form-control"  required/>
                                </div>
                                <div class="form-group">
                                         <input type="checkbox"   onclick="shw()"/><label for="password">&nbsp;<strong>Show Password</strong></label>
                                </div>
                                <div class="form-group">
                                         <input type="submit"  name="submit" class="form-control btn btn-primary" required/>
                                </div>
                            </form>
                    </div>
                </div>
        </div>
	</div>   
</body>
</html>