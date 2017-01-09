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
				<li role="presentation"><a role="menuitem" tabindex="-1" href="operater.php">輸入操作員資訊</a></li>
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
	<!--搜尋-->
	<!--資料庫連線-->
	<?php
		$severname = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbname = "sa06";
		$conn = new mysqli ( $severname, $username, $password, $dbname );
		mysqli_set_charset ( $conn, "utf8" );
		$sql = "SELECT * FROM `process`";
		$result = $conn->query ( $sql );
		if ($result->num_rows > 0) {
		echo "<table id='searchTextResults' class='table table-striped table-bordered'> ";
		}
	?>
		
	<br><br><br>
			
	<!--Table-->
	<div ng-init="friends = [ {processID:'', orderID:'', operatorID:'', manufacFlow:'', parentmetalqty:'', positionNow:''}
	<?php
								while ( $row = $result->fetch_assoc () ) {
								echo ",{processID:'" . $row ["processID"] . "' ,orderID:'" . $row ["orderID"] . "' ,operatorID:'" . $row ["operatorID"] . "' 
								,manufacFlow:'" . $row ["manufacFlow"] . "' ,parentmetalqty:'" . $row ["parentmetalqty"] . "' ,positionNow:'" . $row ["positionNow"] . "' }";
								};
								?>]">
							</div><br>
							<label>請輸入關鍵字 </label><br><br><input ng-model="searchText"><br><br>
							<table id="searchTextResults">
								<tr>
								<th>訂單進度編號</th>
								<th>訂單編號</th>
								<th>製造流程</th>
								<th>站名</th>
								<th>現在位置</th>
								<th>操作員編號</th>
								</tr>
								<tr ng-repeat="friend in friends | filter:searchText">
								<td>{{friend.processID}} &nbsp&nbsp&nbsp&nbsp</td>
								<td>{{friend.orderID}} &nbsp&nbsp&nbsp&nbsp</td>
								<td>{{friend.operatorID}} &nbsp&nbsp&nbsp&nbsp</td>
								<td>{{friend.manufacFlow}} &nbsp&nbsp&nbsp&nbsp</td>
								<td>{{friend.parentmetalqty}} &nbsp&nbsp&nbsp&nbsp</td>
								<td>{{friend.positionNow}} &nbsp&nbsp&nbsp&nbsp</td>
								</tr>
							</table>
	
	<table class="table table-striped table-bordered">
		<tr>
			<td>訂單進度編號</td>
			<td>訂單編號</td>
			<td>製造流程</td>
			<td>站名</td>
			<td>現在位置</td>
			<td>操作員編號</td>
		</tr>
	</table>
	
	</div>
  </body>
</html>