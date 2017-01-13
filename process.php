<!DOCTYPE html>
<html>
  <head>
    <title>查詢訂單進度-華新麗華資料收集平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script	src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  </head>
  <body>
	<!--登出鍵-->
	<?php
	session_start();
	if (isset ( $_SESSION ['username'] )!=null) {
		?><a href="logout.php"><button type="button" class="btn btn-link"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>登出</button></a>
	<?php
	}
	else {
		echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
	}
	?>
	
	<div class="container col-md-8 col-md-offset-2 navbar-collapse-center">
		<a href="index2.php"><img src="img/waisln.jpg" alt="華新麗華資料收集平台" class="img-responsive center-block"></a>
	<!--nav-->	
	<ul class="nav nav-pills navbar-center">
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			訂單<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="orderAddF.php">新增訂單</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="order.php">顯示訂單</a></li>
			</ul>
		</li>
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			訂單進度<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="process.php">查詢訂單進度</a></li>
			</ul>
		</li>
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			操作員<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="operaterF.php">輸入操作員資訊</a></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="searchoperater.php">查詢操作員資訊</a></li>
			</ul>
		</li>
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			機台<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="machine.php">查詢機台資料</a></li>
			</ul>
		</li>
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			庫存<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="stock.php">庫存查詢</a></li>
			</ul>
		</li>
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			問題<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="feedback.php">問題回報</a></li>
			</ul>
		</li>
	</ul>
	<br><br><br>
	<!--頁面提示小標籤-->
	<!--資料庫連線-->
	<?php
		error_reporting(0);
		$severname = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbname = "sa06";
		$conn = new mysqli ( $severname, $username, $password, $dbname );
		mysqli_set_charset ( $conn, "utf8" );
	?>
	<!--搜尋Form-->
	<form class="form-horizontal" role="form"  method="post" action="">
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input type="text" class="form-control" name="processsh" placeholder="請輸入訂單編號" >
			</div>
		</div>
		<button type="submit" class="btn btn-default">搜尋</button>
	</form>
	<br>
	<!--搜尋結果Table-->
	<?php
		if ( $_POST["processsh"] != null ) { 
			$new_processsh = $_POST["processsh"];
			$sql = "SELECT * FROM `process` WHERE `orderID` like '$new_processsh'"; 
		} else {
			$sql = "SELECT * FROM `process`";
		}
		$result = $conn->query ( $sql );
		if ($result->num_rows > 0) {
			echo "<table class='table table-striped table-bordered'><tr><td>筆數</td>
			<td>訂單編號</td><td>製造流程</td><td>母材數量</td><td>現在位置</td><td>狀態</td><td>更新時間</td>";
		 // output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>". $row ["number"] . "</td><td>". $row ["orderID"] ."</td>
					<td>". $row ["manufacFlow"] ."</td><td>". $row ["parentmetalqty"] ."</td><td>". $row ["positionNow"] ."</td>
					<td>". $row ["SE"] ."</td><td>". $row ["time"] ."</td></tr>";
		}
			 echo "</table>";
		} else {
			 echo "<table class='table table-striped table-bordered'><tr><td>筆數</td>
			<td>訂單編號</td><td>製造流程</td><td>母材數量</td><td>現在位置</td><td>狀態</td><td>更新時間</td></table>";
		}
	?>
	</div>
  </body>
</html>