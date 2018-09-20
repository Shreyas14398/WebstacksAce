<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Webstacks</title>
	<link rel="shortcut icon" type="image/png" href="logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style type="text/css">
		.login-block
		{
			float:left;
			width:100%;
			padding : 50px 0;
		}

		.container
		{
			background:#D3D3D3;
			border-radius: 10px; 
			width: 40%; 
			height: 40%;
		}
		.login-sec
		{
			padding: 50px 30px; 
			position:relative;
		}
		.login-sec h2,h4
		{
			margin-bottom:30px;
			font-weight:800; 
			font-size:30px; 
			color: #0069c0;
		}
		.login-sec h2:after
		{
			content:" "; 
			width:100px; 
			height:5px; 
			background:#6ec6ff; 
			display:block; 
			margin-top:20px; 
			border-radius:3px; 
			margin-left:auto;margin-right:auto
		}
		.btn-login
		{
			background: #0069c0; 
			color:#fff; 
			font-weight:600;
		}
	</style>
	<script type="text/javascript">
    function validate()
    {
      var temp=document.forms["logindetails"]["uname"].value;
      var temp1=document.forms["logindetails"]["pword"].value;
      if(temp=="" || temp1=="")
      {
        alert("Please fill all the fields");
        return false;
      }
    }
  </script>
</head>
<body>
	
	<?php
		$db=new mysqli('localhost','root','','leaderboard');
		if(isset($_POST['login']))
		{
			$var1=$_POST['uname'];
			$var2=$_POST['pword'];
			if(($var1=="kumar" && $var2=="pswd1234") )//|| ($var1=="loginid2" && $var2=="pswd2468"))
			{
				$_SESSION['log1']=$_POST['uname'];
				$_SESSION['psd1']=$_POST['pword'];
				echo("<script>location.href ='leaderboard.php';</script>");
			}
			else
			{
				echo '<script text=type/javascript>alert("Invalid..Please try again")</script>';
			}
		}
	?>
<section class="login-block">
    <div class="container">
	<div class="row ">
		<div class="col login-sec">
		    <h2 class="text-center">Login</h2>
<form class="login-form" method="post" action="login.php" name="logindetails">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" class="form-control" placeholder="" name="uname">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" class="form-control" placeholder="" name="pword">
  </div>
    
    <button type="submit" class="btn btn-login float-right" name="login" onclick="return validate()">Submit</button>
</form>
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#dem">Check login details here</button>
  </div>
    
    <div id="dem" class="collapse">
    	<div class="container-fluid" style="position: relative;">
    <h3 style="font-weight: 600; color: #0069c0">Note these:</h3>
    <h6 style="font-weight: 500; color: #c62b52">Leaderboard can't be seen without login...wanna try?<a href="leaderboard.php">Check this</a><br></h6>
    <h6 style="font-weight: 200; color: #c62b52">Username:<div style="font-weight: 800;"> kumar</div>Password:<div style="font-weight: 800"> pswd1234</div></h6>
	</div>
</div>
</div>
    </div>

</section>
</body>
</html>