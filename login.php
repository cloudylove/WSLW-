<?php
session_start ();
$username = "sa06";
$password = "kevinhsu";

if ($_POST['managerid'] == $username && $_POST['managerpwd'] == $password ) {
	$_SESSION ['username'] = $username;
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index2.html>';
} else {
	echo "Login Failed.";
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
}
?>

