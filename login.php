<?php
SESSION_START();
require_once ('mysql_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Spartz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link rel="stylesheet" href="CSS/localbootstrap.css">
	<link rel="stylesheet" href="CSS/userCities.css">
  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.min.js"></script>
</head>
<style>
h1,h2,h3{color:orange}
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
  <div style="height:301px" style="text-align:center">
 
  <form class="form-horizontal" method="post" action="login.php">
    <div class="form-group">
	<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login Here</h3>
      <label class="control-label col-sm-2" for="email">User Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control"  name="uid" placeholder="Enter first name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-4">          
        <input type="text" class="form-control"  name="pass" placeholder="Enter last name" required>
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
		<button type="reset" class="btn btn-warning" id="myBtn">Reset</button>
	 </div>
    </div>
  </form>
  </div>
    </div>

</div>

 <div class="panel panel-primary" style="margin-top:-20px;border-radius:0px;background-color:#00A4D3">
      <div class="panel-heading" style="border-radius:0px;background-color:#00A4D3"><div class="col span_16" style="text-align:center;border-radius:0px">
			<i>Designed by: Anusha Bestha (abestha@neiu.edu)</i>
			</div></div>
</div>

</body>
</html>
<?php
require_once ('mysql_connect.php');

  if(isset($_POST["submit"]))
  {
	$userName=$_POST["uid"];
	$password=$_POST["pass"];
	if($userName!=''&&$password!='')
	{
		echo "entered";
		$checkLogin = "select userId from users where first_name='".$userName."'and last_name='".$password."'";
		$results = @mysql_query ($checkLogin);
		if (@mysql_num_rows($results)==1)  
		{//open php rows if
			while ($row = @mysql_fetch_assoc($results))
			{

			
					echo "<script>window.location ='placesVisited.php?userId=".$row['userId']."';</script>";
					$_SESSION['userId']=$row['userId'];
			}

			
		}//close php rows if
		else
					echo "<script>window.location ='login.php';</script>";
	}
  }
?>

