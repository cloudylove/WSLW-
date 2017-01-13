<!DOCTYPE html>
<html>
  <head>
    <title>輸入操作員-華新麗華資料收集平台</title>
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
	<!--Form-->
	<form class="form-horizontal" role="form" method="post" action="operaterAdd.php">
		<div class="form-group">
			<label for="parentmetalid" class="col-sm-3 control-label">操作員姓名</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="operatername" placeholder="輸入操作員姓名">
			</div>
		</div>
		<div class="form-group">
			<label for="parentmetalid" class="col-sm-3 control-label">操作員班表</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="operatertime" placeholder="輸入操作員班表">
			</div>
		</div>
		<div class="form-group">
			<label for="parentmetalid" class="col-md-3 control-label">工作位置</label>
			<div class="col-md-6">
				<input type="text" class="form-control" name="operaterposition" placeholder="輸入工作位置">
			</div>
		</div>
		<button type="submit" class="btn btn-default">確定</button>
	</form>
	</div>
  </body>
</html>