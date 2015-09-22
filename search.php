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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">	
  <link rel="stylesheet" href="CSS/localbootstrap.css">
  <link rel="stylesheet" href="CSS/userCities.css">
  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
     $('#example').DataTable();
});
</script>
<script>
function selectaction(cityid,cityname,state,userid)
{
	  
    window.location.href='register.php?cityid='+cityid+'&cityname='+cityname+'&state='+state+'&userid='+userid;  	
}
</script>

</head>
<style>
h1,h2,h3{color:orange}
body{background-color:#D8DDD8}
</style>
<body>
<div class="container">
  <div class="jumbotron" style="background-color:#00A4D3;border-radius:0px;height:auto;margin-top:-40px">
  <div class="row" style="overflow:auto" >
    <div class="col-sm-2 col-md-4">
    <h2><img src="Images/spartz_logo.png" class="img-responsive" style="width:250px;"></h2> 
  </div>
    <div class="col-sm-2 col-md-8" >
	
    </div>
  </div>
<ul class="nav nav-tabs">
  <li role="presentation" class="active" style="color:white"><a href="placesVisited.php">Home</a></li>
  <li role="presentation" style="color:white"><a href="allCities.php">All Cities</a></li>
  <li role="presentation" style="color:white"><a href="login.php">Logout</a></li>
</ul>
  </div>


 <div class="panel panel-primary" style="margin-top:-20px; border-radius:0px;">

<div class="panel-body" >
<h3>List of All Cities within 100 mi radius of city "<?php echo $_GET['cityname'];?>"</h3>
<div style="height:301px" style="text-align:center">

 <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>State</th>
		<th>Distance</th>
		<th>Register</th>
            </tr>
        </thead>
	<tbody>
  
<?php
$userId=$_SESSION['userId'];
$cityId=$_GET['cityid'];
$lat=$_GET['lat'];
$lng=$_GET['lng'];

$getCities="select
	*, (
      3959 * acos (
      cos ( radians(".$lat.") )
      * cos( radians( lat ) )
      * cos( radians( lng ) - radians(".$lng.") )
      + sin ( radians(".$lat.") )
      * sin( radians( lat ) )
    )
) as distance
from cities
having distance <=100
ORDER BY distance asc";
		$results = @mysql_query($getCities);
		
		if (@mysql_num_rows($results)>0) 
		{
			while ($row = @mysql_fetch_assoc($results))
			{	
				$distance=round($row['distance'],2);
				echo "<tr><td>".$row['cityId']."</td>";
				echo "<td>".$row['cityName']."</td>";
				echo "<td>".$row['state']."</td>";
				echo "<td>".$distance."</td>";
				echo "<td><button class='btn btn-primary' onclick=selectaction('".$row['cityId']."','".$row['cityName']."','".$row['state']."','".				$userId."')>Register</button></td></tr>";
			}
		}
?>
</tbody>
</table>

  </div>
    </div>

</div>

 <div class="panel panel-primary" style="margin-top:-20px;border-radius:0px;background-color:#00A4D3">
      <div class="panel-heading" style="border-radius:0px;background-color:#00A4D3"><div>
		
	</div><div class="col span_16" style="text-align:center;border-radius:0px">
			<i>Designed by: Anusha Bestha (abestha@neiu.edu)</i>
			</div></div>
</div>

</body>
</html>


