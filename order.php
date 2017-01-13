<!DOCTYPE html>
<html>
  <head>
    <title>訂單顯示-華新麗華資料收集平台</title>
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
	<!--Table-->
	<?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "sa06";
                $conn = new mysqli ( $servername, $username, $password, $dbname );
                mysqli_set_charset ( $conn, "utf8" );
                
                $sql = "SELECT * FROM `orderlist` ORDER BY `orderlist`.`orderID` DESC";
	            $result = $conn->query ( $sql );
				
                if ($result->num_rows > 0) {
					if(isset($_SESSION['username'])){
						while ( $row = $result->fetch_assoc () ) {
							?>
							<table class="table table-striped table-bordered">
							<tr>
								<td>流水號</td>
								<td><?php echo $row["orderID"]?></td>
							</tr>
							<tr>
								<td>訂貨日期</td>
								<td><?php echo $row["orderDate"]?></td>
							</tr>
							<tr>
								<td>出貨日期</td>
								<td><?php echo $row["shipoutDate"]?></td>
							</tr>
							<tr>
								<td>母材編號</td>
								<td><?php echo $row["parentmetalID"]?></td>
							</tr>
							<tr>
								<td>製造流程</td>
								<td><?php echo $row["manufacFlow"]?></td>
							</tr>
							<tr>
								<td>數量</td>
								<td><?php echo $row["parentmetalqty"]?></td>
							</tr>
							<tr>
								<td>重量</td>
								<td><?php echo $row["parentmetalwgt"]?></td>
							</tr>
							<tr>
								<td>編輯時間</td>
								<td><?php echo $row["editTime"]?></td>
							</tr>
							<tr>
								<td>
								<form class="form-horizontal" method="post" action="processAdd.php">
											<input type="hidden" name="button" value="<?php echo $row["orderID"]?>">
									<button type="submit" class="btn btn-info">匯入訂單進度</button>
								</form>
								</td>
								<td>
								<form class="form-horizontal" method="post" action="orderEditF.php">
											<input type="hidden" name="button2" value="<?php echo $row["orderID"]?>">
									<button type="submit" class="btn btn-info">修改訂單資料</button>
								</form>
								</td>
							</tr>
							</table><?php
						}
					}
					else {
						while ( $row = $result->fetch_assoc () ) {
							?>
							<table class="table table-striped table-bordered">
							<tr>
								<td>流水號</td>
								<td><?php echo $row["orderID"]?></td>
							</tr>
							<tr>
								<td>訂貨日期</td>
								<td><?php echo $row["orderDate"]?></td>
							</tr>
							<tr>
								<td>出貨日期</td>
								<td><?php echo $row["shipoutDate"]?></td>
							</tr>
							<tr>
								<td>母材編號</td>
								<td><?php echo $row["parentmetalID"]?></td>
							</tr>
							<tr>
								<td>製造流程</td>
								<td><?php echo $row["manufacFlow"]?></td>
							</tr>
							<tr>
								<td>數量</td>
								<td><?php echo $row["parentmetalqty"]?></td>
							</tr>
							<tr>
								<td>重量</td>
								<td><?php echo $row["parentmetalwgt"]?></td>
							</tr>
							<tr>
								<td>編輯時間</td>
								<td><?php echo $row["editTime"]?></td>
							</tr>
							<tr>
								<td>
								<form class="form-horizontal" method="post" action="processAdd.php">
											<input type="hidden" name="button" value="<?php echo $row["orderID"]?>">
									<button type="submit" class="btn btn-info">匯入訂單進度</button>
								</form>
								</td>
								<td>
								<form class="form-horizontal" method="post" action="orderEditF.php">
											<input type="hidden" name="button2" value="<?php echo $row["orderID"]?>">
									<button type="submit" class="btn btn-info">修改訂單資料</button>
								</form>
								</td>
							</tr>
							</table><?php
						}
					}
                } else {
                    echo "0 results";
                }
                $conn->close ();
            ?>
	<button type="button" onclick="location.href='orderAddF.php'" class="btn btn-primary">返回</button>
	<br><br><br>
	</div>
  </body>
</html>