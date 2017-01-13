<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "127.0.0.1";
    $username ="root";
    $password ="";
    $dbname ="sa06";

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");

	$new_button = $_POST["button"];
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$sql="INSERT INTO `process` (`orderID`, `manufacFlow`, `parentmetalqty`, `time`)
	(SELECT `orderID`, `manufacFlow`, `parentmetalqty`, `editTime` FROM `orderlist` WHERE `orderlist`.`orderID`= $new_button );";
	
	if ($conn->multi_query($sql) === TRUE) {
        echo "<script>";
        echo "alert(\"成功;";
        echo "</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=order.php>';
    } else {
        echo "<script>";
        echo "alert(\"失敗!\");";
        echo "</script>";
		//echo "Error: " . $sql . "<br>" . $conn->error;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=order.php>';
    }

    $conn -> close();

} 
?>