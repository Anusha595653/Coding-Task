<?php
require_once ('mysql_connect.php');
$cityid=$_GET['cityid'];
$cityname=$_GET['cityname'];
$state=$_GET['state'];
$userid=$_GET['userid'];
?>

<html>
<body>
<?php
$d1="insert into register(userId,cityId,cityName,state)values('".$userid."','".$cityid."','".$cityname."','".$state."')";
$results1 = @mysql_query ($d1);
echo "<script>window.location.href='allCities.php?userId=".$userid."';window.alert('City registerd for you');</script>";	
?>

 <script type="text/javascript">

</script>

</body>
</html>