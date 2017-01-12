<!DOCTYPE html>
<html>
  <head>
    <title>查詢庫存-華新麗華資料收集平台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
				<li role="presentation"><a role="menuitem" tabindex="-1" href="orderEditF.php">修改訂單</a></li>
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
	<!--搜尋-->
	<form class="navbar-form navbar-center" role="search"  method="post" action="">
		<div class="form-group">
			<select class="form-control" name="stock" onchange="this.form.submit()">
				<option>請選擇倉儲</option>
				<option value="1" >備料倉</option>
				<option value="2" >成品倉</option>
			</select>
		</div>
	</form>
	<br><br><br>
	<!--Table-->
	<?php
		if ( $_POST["stock"] == 1 ) { 
			$sql = "SELECT * FROM `material`"; 
			$result = $conn->query ( $sql );
			if ($result->num_rows > 0) {
				echo "<table class='table table-striped table-bordered'><tr>
					<td>備料倉儲位編號</td><td>母材編號</td>";
				while($row = $result->fetch_assoc()) {
				echo "<tr><td>". $row ["materialID"] . "</td><td>". $row ["parentmetalID"] . "</td></tr>";
				}
				echo "</table>";
			}
		} if ( $_POST["stock"] == 2 ) { 
			$sql = "SELECT * FROM `finished`";
			$result = $conn->query ( $sql );
			if ($result->num_rows > 0) {
				echo "<table class='table table-striped table-bordered'><tr>
					<td>成品倉儲位編號</td><td>訂單進度編號</td>";
				while($row = $result->fetch_assoc()) {
				echo "<tr><td>". $row ["finishedID"] . "</td><td>". $row ["processID"] . "</td></tr>";
				}echo "</table>";
			}
		}
	?>
	</div>
  </body>
</html>