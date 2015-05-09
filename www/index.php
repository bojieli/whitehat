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
        <p class="lead">5月10日~5月24日，寻找校园网络的安全漏洞，丰厚奖品等你拿！</p>
        <p>
          <a class="btn btn-lg btn-primary" href="rule.php" role="button">比赛规则</a>
          <a class="btn btn-lg btn-success" href="submit.php" role="button">提交漏洞</a>
        </p>
      </div>

      <div>
        <h4>白帽子排行榜</h4>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                <th>排名</th>
                <th>提交者</th>
                <th>漏洞数量</th>
                <th>总得分</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $r=$con->query("select e.email, e.total_score, e.cnt, sec_to_time(e.total_time) as time_penalty, l.username, l.anonymous from (select email, sum(score) as total_score, count(*) as cnt, sum(timediff(submit_time, '2015-05-10 00:00:00')) as total_time from Loophole where verified=1 group by email) e left join Loophole l on e.email=l.email and l.verified=1 left join Loophole l1 on l.email=l1.email and l1.verified=1 and l.id<l1.id where l1.id is null order by total_score desc, cnt desc, total_time desc");
            if($r->rowcount()==0){
                echo '<tr><td colspan="4">暂无数据</td></tr>';
            }
            $rcnt=$rrank=1;
            $rlastscore=$rlastcnt=0;
            while($row=$r->fetch()) {
                echo '<tr>';
                if($row['total_score']!=$rlastscore||$row['cnt']!=$rlastcnt)$rrank=$rcnt;
                echo '<td>'.$rrank.'</td>';
                $rcnt++;
                $rlastscore=$row['total_score'];
                $rlastcnt=$row['cnt'];
                if($row['anonymous']){
                    $name="<i>匿名</i>";
                }else{
                    $name=$row['username'];
                }
                echo '<td>'.$name.'</td>';
                echo '<td>'.$row['cnt'].'</td>';
                echo '<td>'.$row['total_score'].'</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>

      <div>
        <h4>最新提交</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="15%">提交时间</th>
                    <th width="15%">域名</th>
                    <th width="40%">漏洞标题</th>
                    <th width="20%">提交者</th>
                    <th width="10%">得分</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $r=$con->query("select submit_time,domain,score,title,username,anonymous from Loophole where verified=1 order by submit_time desc");
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
      </div>

      <?php require("footer.php");?>

    </div>

  </body>
  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>
