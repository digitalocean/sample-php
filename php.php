<?php
$databaseHost = 'stu-do-user-14623249-0.b.db.ondigitalocean.com';
	$databaseName = 'defaultdb';
	$databaseUsername = 'doadmin';
	$databasePassword = 'AVNS_c16XxROSTRMnvh_Ihto';

	$con = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);

if (isset($_POST['btn'])) {
	if ($con) {
echo "Success";
	}
	else{
		echo "Not Connected";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
</head>
<body>
<form method="post">
	<button type="submit" name="btn" >Check</button>
</form>
</body>
</html>
