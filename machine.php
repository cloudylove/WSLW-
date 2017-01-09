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

		
		<div class="form-group">
			<label for="parentmetalid" class="col-sm-4 control-label">查詢方式</label>
			<div class="col-sm-4">
			<select class="form-control">
				<option>請選擇</option>
				<option value="machineid">機台編號</option>
				<option value="power">電源開關</option>
				<option value="machinestatus">機台狀態</option>
				<option value="machineparameter">機台參數</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="parentmetalid" class="col-sm-4 control-label">輸入</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="machinesearch" placeholder="請輸入關鍵字">
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-default">查詢</button>
		<br>
		<br>
		<br>
		<!--Table-->
		<table class="table table-striped table-bordered">
			<tr>
				<td>機台編號</td>
				<td>電源開關</td>
				<td>機台狀態</td>
				<td>機台參數</td>				
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