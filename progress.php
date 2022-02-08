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
<body>
	
	<br>
	
<label for="all_spent_hours">Progress in %</label>
<input type="text" name="all_spent_hours" id="all_spent_hours" value="<?php echo $row['hours'] * 0.40; ?>">
	
	
	
	
<form method="post">
	
	<label for="spent_hours_today">Spent hours today</label>
	<input type="text" id="spent_hours_today" name="spent_hours_today" > 
	
	
	<button>Add values</button>
	
</form>


	
<form action="progress.php" method="post">
    <input type="submit" name="Reset" value="Reset" />
</form>
	
	
</body>
</html>