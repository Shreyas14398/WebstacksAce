<?php
session_start();
if(!isset($_SESSION['log1']))
{
	echo '<center><h2 style="font-weight:800; color:#c62b52">This page cannot be viewed because you are NOT LOGGED IN</h2></center>';
	echo '<center><h3><a href="login.php">Click here to login</a></h3></center>';
   die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Leaderboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="logo.jpg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style type="text/css">
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 25px;
    border: 20px;
    margin: 20px;
}

tr:nth-child(even){background-color: #d38fe8;}

th {
    background-color: #0069c0 ;
    color: white;
}
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
</head>
<body>
	<?php
	$db=new mysqli('localhost','root','','leaderboard');
	if (isset($_POST['logout'])) 
	 {
	 	session_unset();
	 	session_destroy();
	 	echo '<script type="text/javascript">alert("Logged out Successfully");</script>';
		echo("<script>location.href ='login.php';</script>");
	 }
	?>
	<section class="login-block">
    <div class="container">
	<div class="row ">
		<div class="col login-sec">
		    <h2 style="display: inline-block;" class="text-center">Leaderboard</h2><button style="float: right;" name="logout" type="submit" class="btn btn-danger">Logout</button>

	<form method="post" action="leaderboard.php">
	<table>
	<thead>
		<th>Rank</th>
		<th>Name</th>
		<th>Score</th>
		<?php
			$i=0;
			$stat="SELECT * FROM display";
			$viewresult=$db->query($stat);
  			if($viewresult->num_rows > 0)
  			{
  				while($rows=$viewresult->fetch_assoc())
  				{$i++;
  			?>
  			<tr>
  				<td><?php echo $rows["sno"];?></td>
  				<td><?php echo $rows["name"];?></td>
  				<td><?php echo $rows["score"];?></td>
  			</tr>
  		<?php 
  	}
  }
  ?>
	</thead>
</table>
<center></center>
</form>
</div></div></div></section>
</body>
</html>