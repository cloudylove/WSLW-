<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "127.0.0.1";
    $username ="root";
    $password ="";
    $dbname ="sa06";

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");

    $new_orderid = $_POST["orderid"];
    $new_shipoutdate = $_POST["shipoutdate"];
	$new_parentmetalid = $_POST["parentmetalid"];
    $new_manufacflow = $_POST["manufacflow"];
    $new_parentmetalqty = $_POST["parentmetalqty"];
    $new_parentmetalwgt = $_POST["parentmetalwgt"];
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$sql="UPDATE `sa06`.`orderlist` SET `shipoutDate` = '$new_shipoutdate', `parentmetalID` = '$new_parentmetalid', `manufacFlow` = '$new_manufacflow', 
	`parentmetalqty` = '$new_parentmetalqty', `parentmetalwgt` = '$new_parentmetalwgt', `editTime` = CURRENT_TIMESTAMP WHERE `orderID` = '$new_orderid';";
	
    
	if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert(\"修改成功\");";
        echo "</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=order.php>';
    } else {
        echo "<script>";
        echo "alert(\"修改失敗!\");";
        echo "</script>";
		//echo "Error: " . $sql . "<br>" . $conn->error;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=order.php>';
    }

    $conn -> close();
} 

?>