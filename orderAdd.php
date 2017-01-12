<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "127.0.0.1";
    $username ="root";
    $password ="";
    $dbname ="sa06";

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");

    $new_orderdate = $_POST["orderdate"];
    $new_shipoutdate = $_POST["shipoutdate"];
	$new_parentmetalid = $_POST["parentmetalid"];
    $new_manufacflow = $_POST["manufacflow"];
    $new_parentmetalqty = $_POST["parentmetalqty"];
    $new_parentmetalwgt = $_POST["parentmetalwgt"];
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$sql="INSERT INTO `orderlist`
	(`orderID`, `orderDate`, `shipoutDate`, `parentmetalID`, `manufacFlow`, `parentmetalqty`, `parentmetalwgt`, `editTime`, `editContent`) VALUES 
	(NULL,'$new_orderdate','$new_shipoutdate','$new_parentmetalid','$new_manufacflow','$new_parentmetalqty','$new_parentmetalwgt',CURRENT_TIMESTAMP,'NEW');";
    
	if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert(\"新增成功\");";
        echo "</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=order.php>';
    } else {
        echo "<script>";
        echo "alert(\"新增失敗!\");";
        echo "</script>";
		echo "Error: " . $sql . "<br>" . $conn->error;
        echo '<meta http-equiv=REFRESH CONTENT=1;url=order.php>';
    }

    $conn -> close();
} 

?>