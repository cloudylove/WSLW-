<!DOCTYPE html>
<html>
  <head>
    <title>查詢操作員-華新麗華資料收集平台</title>
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
	<!--Form-->
	<form class="form-horizontal" role="search"  method="post" action="">
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
			<select class="form-control" name="operater">
				<option>請選擇查詢方式</option>
				<option value="1">操作員編號</option>
				<option value="2">操作員姓名</option>
				<option value="3">工作位置</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-4 col-sm-offset-4">
				<input type="text" class="form-control" name="operatersh" placeholder="請輸入關鍵字">
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-default">查詢</button>
		<br>
		<br>
		<br>
		
		<?php
		$new_operatersh = $_POST['operatersh'];
		if ( $_POST["operater"] == 1 ) { 
			$sql = "SELECT * FROM `operater` WHERE `operaterID` LIKE $new_operatersh"; 
			$result = $conn->query ( $sql );
			if ($result->num_rows > 0) {
				echo "<table class='table table-striped table-bordered'><tr><td>操作員編號</td>
					<td>操作員姓名</td><td>操作員班表</td><td>工作位置</td>";
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>". $row ["operaterID"] . "</td><td>". $row ["operaterName"] . "</td><td>". $row ["operaterTime"] ."</td>
					<td>". $row ["operaterPosition"] ."</td></tr>";
				}
				echo "</table>";
			}
		} if ( $_POST["operater"] == 2 ) { 
			$sql = "SELECT * FROM `operater` WHERE `operaterName` LIKE BINARY '$new_operatersh'"; 
			$result = $conn->query ( $sql );
			if ($result->num_rows > 0) {
				echo "<table class='table table-striped table-bordered'><tr><td>操作員編號</td>
					<td>操作員姓名</td><td>操作員班表</td><td>工作位置</td>";
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>". $row ["operaterID"] . "</td><td>". $row ["operaterName"] . "</td><td>". $row ["operaterTime"] ."</td>
					<td>". $row ["operaterPosition"] ."</td></tr>";
				}
				echo "</table>";
			} 
		} if ( $_POST["operater"] == 3 ) { 
			$sql = "SELECT * FROM `operater` WHERE `operaterPosition` LIKE '$new_operatersh'"; 
			$result = $conn->query ( $sql );
			if ($result->num_rows > 0) {
				echo "<table class='table table-striped table-bordered'><tr><td>操作員編號</td>
					<td>操作員姓名</td><td>操作員班表</td><td>工作位置</td>";
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>". $row ["operaterID"] . "</td><td>". $row ["operaterName"] . "</td><td>". $row ["operaterTime"] ."</td>
					<td>". $row ["operaterPosition"] ."</td></tr>";
				}
				echo "</table>";
			}
		}
	?>
	</form>
	</div>
  </body>
</html>