<?php
$db_host = "localhost";
$db_user = "progressuser";
$db_pass = "Kzg1f10%";
$db_name = "progressdb";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($conn === false){
	echo mysqli_connect_error();
}


/* Total spent hours*/
$sql = "SELECT * from progress";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


/*Hours spen today*/

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$increaser = $_POST['spent_hours_today'];

	
$sqlupdate = "update progress set hours=$increaser";

mysqli_query($conn, $sqlupdate);

header("Refresh:0");


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Reset'])){

$sqlreset = "update progress set hours=0";
	
mysqli_query($conn, $sqlreset);


}
	


}

	
	
?>





<html>
	<link rel="stylesheet" href="css/progress.css">

	
<body class="align">

<div class="grid align__item">

<div class="register">
<form action="" method="post" class="form">
<div class="form__field">
	
<p>Progress in %</p>
	
<input type="text" name="all_spent_hours" readonly="readonly" id="all_spent_hours" value="<?php echo $row['hours'] * 0.40; ?>">
	
	
<form method="post">

<input type="submit" value="Spent hours today">
<p></p>
<br>
<input type="text" id="spent_hours_today" name="spent_hours_today" > 


</form>
	
	

<br>

<form action="progress.php" method="post">
    <input type="submit" name="Reset" value="Reset" />
</form>
	

</div>
</form>



</div>

</div>

</body>
</html>