<?php require_once("header.php"); ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>白帽子安全技术挑战赛</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>

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
        <h1>欢迎参加校园白帽子安全技术挑战赛</h1>
        <p class="lead">5月10日~5月30日，寻找校园网络的安全漏洞，丰厚奖品等你拿！</p>
        <p>
          <a class="btn btn-lg btn-primary" href="rule.php" role="button">比赛规则</a>
          <a class="btn btn-lg btn-success" href="submit.php" role="button">提交漏洞</a>
        </p>
      </div>

      <div>
        <h4>最新提交</h4>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                <th>提交时间</th>
                <th>域名</th>
                <th>漏洞标题</th>
                <th>提交者</th>
                <th>得分</th>
                </tr>
            </thead>
            <tbody>
<?php
$r=$con->query("select submit_time,domain,score,title,username,anonymous from Loophole where verified=1 order by submit_time desc limit 0,5");
if($r->rowcount()==0){
    echo '<tr><td colspan="5">暂无数据</td></tr>';
}
while($row=$r->fetch()) {
    echo '<tr>';
    echo '<td>'.$row['submit_time'].'</td>';
    echo '<td>'.$row['domain'].'</td>';
    echo '<td>'.$row['title'].'</td>';
    if($row['anonymous']){
        $name="<i>匿名</i>";
    }else{
        $name=$row['username'];
    }
    echo '<td>'.$name.'</td>';
    echo '<td>'.$row['score'].'</td>';
    echo '</tr>';
}
?>
            </tbody>
        </table>
      </div>

      <?php require("footer.php");?>

    </div>

  </body>
  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>
