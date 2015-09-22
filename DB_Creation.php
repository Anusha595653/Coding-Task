 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SAMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">	
  <link rel="stylesheet" href="CSS/localbootstrap.css">
  <link rel="stylesheet" href="CSS/userCities.css">
  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.min.js"></script>
</head>
<style>
h1,h2{color:orange}
body{background-color:#D8DDD8}
</style>
<body>
<br>
<div class="container">
  <div class="jumbotron" style="background-color:#00A4D3;border-radius:0px;height:auto;margin-top:-40px">
  <div class="row" style="overflow:auto" >
    <div class="col-sm-2 col-md-4">
    <h2><img src="Images/spartz_logo.png" class="img-responsive" style="width:250px;"></h2> 
  </div>
    <div class="col-sm-2 col-md-8" >
	
    </div>
  </div>
  </div>

   
 <div class="panel panel-primary" style="margin-top:-20px; border-radius:0px;">

      <div class="panel-body" >
	  <br><br><br>
  <div style="height:301px" >
 
  <form class="form-horizontal" method="post" action="">
  
    <div class="form-group">
		<h3 style="color:orange;font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Database Configuration</h3>
   
      <label class="control-label col-sm-2" for="email">Host:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control"  name="host">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Database Name:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control"  name="dbn">
      </div>
    </div>


  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		 </div>
    </div></form>
  </div>
    </div>
<?php
if(isset($_POST["submit"])&&isset($_POST["dbn"]))
{
	$conn=mysql_connect("localhost","root","root");
	$sql="CREATE DATABASE ".$_POST["dbn"];
	if(mysql_query($sql,$conn))
	{
	 
	$db_result=mysql_select_db($_POST["dbn"]);
	if($db_result)
	{
	 

	$cities ="CREATE TABLE  ".$_POST['dbn'].".`cities` (`cityId` integer auto_increment primary key ,`cityName` varchar(50) not null ,`state` char(2) not null ,`status` varchar(15) not null,`lat` float(10,8) not null,`lng` float(10,8) not null ) ENGINE = MYISAM";
$resCities = @mysql_query ($cities);

		$users ="CREATE TABLE  ".$_POST['dbn'].".`users` (`userId` integer auto_increment primary key ,`first_name` varchar(50) not null ,`last_name` varchar(50) not null ) ENGINE = MYISAM";
$resUsers = @mysql_query ($users);

		$register ="CREATE TABLE  ".$_POST['dbn'].".`register` (`userId` integer not null ,`cityName` varchar(50) not null ,`state` char(2) not null ,foreign key (userId) references users(userId)) ENGINE = MYISAM";
$resregister = @mysql_query ($register);

		
$FileName = "mysql_connect.php";
$FileHandle = fopen($FileName, 'w') or die("can't open file");
$code="<?php  # mysql_connect.php
//required for all pages
// Define constants for connection
define ('DB_USER', 'root');      // replace xxxx with your mysql username    
define ('DB_PASSWORD', 'root');  // replace yyyy with your mysql password
define ('DB_HOST', 'localhost');
define ('DB_NAME', '".$_POST['dbn']."');      // replace zzzzzz with your database name

// Connect to DB and select main DB
\$dbc = @mysql_connect( DB_HOST, DB_USER, DB_PASSWORD) or
die('Could not connect to  MySQL: '. mysql_error());

@mysql_select_db(DB_NAME) or
die('Could not select the database: '. mysql_error());

?>
";
fwrite($FileHandle, $code);
fclose($FileHandle);
 
		echo "<script>window.location.href='login.php';window.alert('Database created successfully');</script>";
	}
	else
	{
	echo "<script>window.location.href='DB_Creation.php';window.alert('Database already exists');</script>";	
	}
}
else
	{
 	
	}
}
else
{
	echo "<p style='color:red>Please Enter the Details";	
}
 ?>
<div class="panel panel-primary" style="margin-top:-20px;border-radius:0px;background-color:#00A4D3">
      <div class="panel-heading" style="border-radius:0px;background-color:#00A4D3"><div class="col span_16" style="text-align:center;border-radius:0px">
			<i>Designed by: Anusha Bestha (abestha@neiu.edu)</i>
			</div></div>
</div>
</body>
</html>
