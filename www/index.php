<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">

    <title>白帽子大赛</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted"></h3>
      </div>

      <div class="jumbotron">
        <h1>欢迎参加白帽子大赛</h1>
        <p class="lead">这里说些什么的</p>
        <p><a class="btn btn-lg btn-success" href="submit.php" role="button">提交漏洞</a></p>
      </div>

      <div>
        <h4>最新提交</h4>
        <table class="table table-striped table-bordered table-hover">
			   	<thead>
			      <tr>
			        <th>提交时间</th>
			        <th>漏洞标题</th>
			        <th>提交者</th>
			      </tr>
			   	</thead>
			   	<tbody>
			      <tr>
			        <td>2015-05-02</td>
			        <td>新浪微博android客户端本地提权</td>
			        <td>张三</td>
			      </tr>
			      <tr>
			        <td>2015-05-01</td>
			        <td>12306网络设备多处弱口令</td>
			        <td>李博杰</td>
			      </tr>
			      <tr>
			        <td>2015-04-30</td>
			        <td>爱奇艺旗下某站存储型xss（可打大量用户cookies）</td>
			        <td><i>匿名</i></td>
			      </tr>
			      <tr>
			        <td>2015-04-29</td>
			        <td>YY浏览器设计缺陷导致存在本地文件读取/特殊命令执行</td>
			        <td><i>匿名</i></td>
			      </tr>
			      <tr>
			        <td>2015-04-28</td>
			        <td>中国移动10086.cn某站点存在命令执行漏洞</td>
			        <td>崔颢</td>
			      </tr>
			  	</tbody>
				</table>
      </div>

      <div>
	      <div class="container">
	        <span class="text-muted">Copyright &copy; 白帽子大赛 2015</span>
	      </div>
    	</div>

    </div>

  </body>
  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>