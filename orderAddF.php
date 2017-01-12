<!DOCTYPE html>
<html>
  <head>
    <title>新增訂單-華新麗華資料收集平台</title>
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
	<!--Form-->
	<form class="form-horizontal" role="form"  method="post" action="orderAdd.php">
		<div class="form-group">
			<label for="orderdate" class="col-sm-3 control-label">訂貨日期</label>
			<div class="col-sm-6">
				<input type="date" class="form-control" name="orderdate" placeholder="輸入訂貨日期">
			</div>
		</div>
		<div class="form-group">
			<label for="shipoutdate" class="col-sm-3 control-label">出貨日期</label>
			<div class="col-sm-6">
				<input type="date" class="form-control" name="shipoutdate" placeholder="輸入出貨日期">
			</div>
		</div>
		<div class="form-group">
			<label for="parentmetalid" class="col-md-3 control-label">母材編號</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="parentmetalid" placeholder="輸入母材編號">
			</div>
		</div>
		<div class="form-group">
			<label for="manufacflow" class="col-md-3 control-label">製造流程</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="manufacflow" placeholder="輸入製造流程">
			</div>
		</div>
		<div class="form-group">
			<label for="parentmetalqty" class="col-md-3 control-label">數量</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="parentmetalqty" placeholder="輸入數量">
			</div>
		</div>
		<div class="form-group">
			<label for="parentmetalwgt" class="col-md-3 control-label">重量</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="parentmetalwgt" placeholder="輸入重量">
			</div>
		</div>
		<button type="submit" class="btn btn-default">確定</button>
	</form>
	</div>
  </body>
</html>