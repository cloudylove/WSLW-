<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $servername = "127.0.0.1";
    $username ="root";
    $password ="";
    $dbname ="sa06";

    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn,"utf8");

    $new_operatername = $_POST["operatername"];
	$new_operatertime = $_POST["operatertime"];
    $new_operaterposition = $_POST["operaterposition"];    
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	$sql="INSERT INTO `operater`
	(`operaterID`, `operaterName`, `operaterTime`, `operaterPosition`) VALUES 
	(NULL,'$new_operatername','$new_operatertime','$new_operaterposition');";
	
    
	if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert(\"新增成功\");";
        echo "</script>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=operater.php>';
    } else {
        echo "<script>";
        echo "alert(\"新增失敗!\");";
        echo "</script>";
		/*echo "Error: " . $sql . "<br>" . $conn->error;*/
        echo '<meta http-equiv=REFRESH CONTENT=1;url=operater.php>';
    }

    $conn -> close();
} 

?>