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
	<!--Form-->
	<form class="form-horizontal" role="search">
		<!--SQL給流水號>
		<div class="form-group">
			<label for="orderid" class="col-sm-3 control-label">訂單編號</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="orderid" placeholder="SQL給流水號">
			</div>
		</div>-->
		
		<div class="form-group">
			<label for="parentmetalid" class="col-sm-3 control-label">查詢方式</label>
			<div class="col-sm-6">
			<select class="form-control">
				<option></option>
				<option value="operaterid">操作員編號</option>
				<option value="operatername">操作員姓名</option>
				<option value="operaterworkplace">工作位置</option>
			</select>
			</div>
		</div>
			
		
		
		
		<div class="form-group">
			<label for="parentmetalid" class="col-sm-3 control-label">輸入</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="searchoperater" placeholder="請輸入">
			</div>
		</div>
		
		<br>
		
		<button type="submit" class="btn btn-default">查詢</button>
		<br>
		<br>
		<br>
		
		<table class="table table-striped table-bordered">
		<tr>
			<td>操作員編號</td>
			<td>操作員姓名</td>
			<td>操作員班表</td>
			<td>工作位置</td>				
		</tr>
		<tr>
			<td>123</td>
			<td></td>
			<td></td>
			<td></td>			
		</tr>
	</table>
	</form>
	</div>
  </body>
</html>