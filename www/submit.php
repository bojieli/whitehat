<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">

    <title>白帽子大赛 | 提交漏洞</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="markitup/skins/markitup/style.css"/>
    <link rel="stylesheet" type="text/css" href="markitup/sets/markdown/style.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="markitup/jquery.markitup.js"></script>
    <script type="text/javascript" src="markitup/sets/markdown/set.js"></script>
  </head>

  <body>
    <div class="container">
      <h3>提交漏洞</h3>
      <hr>
      <div>
        <p>
          一些说明
        </p>
      </div>

      <form class="form-horizontal">
        
        <div class="form-group">
          <label for="domain" class="col-sm-2 control-label">漏洞域名</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="domain" placeholder="*.ustc.edu.cn">
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">漏洞标题</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="title" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="rank" class="col-sm-2 control-label">自评Rank</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="rank" placeholder="1-20">
          </div>
        </div>

        <div class="form-group">
          <label for="abstract" class="col-sm-2 control-label">问题描述</label>
          <div class="col-sm-9">
            <textarea type="text" class="form-control" rows="5" id="abstract" placeholder="对漏洞的简要描述，可以简单描述漏洞的危害和成因，不要透漏漏洞的细节"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="detail" class="col-sm-2 control-label">详细说明</label>
          <div class="col-sm-9">
            <textarea type="text" class="form-control" rows="5" id="detail" placeholder="对漏洞的详细描述，请尽量多的深入细节以方便对漏洞的理解"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="fix_method" class="col-sm-2 control-label">漏洞修复</label>
          <div class="col-sm-9">
            <textarea type="text" class="form-control" rows="5" id="fix_method" placeholder="建议的漏洞修复方案"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">上传附件</label>
          <div class="col-sm-5">
            <input type="file" name="attachment"/>
          </div>
        </div>

        <div class="form-group">
          <label for="username" class="col-sm-2 control-label">姓名</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="username" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="gender" class="col-sm-2 control-label">性别</label>
          <div class="col-sm-1">
            <select class="form-control" id="gender">
             <option value="1">男</option>
             <option value="2">女</option>
             <option value="3">保密</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">邮箱</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="email" placeholder="*@mail.ustc.edu.cn">
          </div>
        </div>

        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">手机</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="phone" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="captcha" class="col-sm-2 control-label">验证码</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="captcha" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <div class="checkbox">
              <label>
                <input type="checkbox" id="anonymous"> 匿名
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <div class="checkbox">
              <label>
                <input type="checkbox"> 我已阅读并同意<a href="/">XXX</a>
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-2">
            <button type="submit" class="btn btn-default">提交</button>
          </div>
        </div>

      </form>
    </div>
    <div>
      <div class="container">
        <span class="text-muted">Copyright &copy; 白帽子大赛 2015</span>
      </div>
    <div>
  </body>
  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!--<script src="js/jquery.min.js"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {
          $('#打开网页后光标首先定位到的输入框').focus();
          //$('#inputBBB').markItUp(mySettings);
      });

  </script>
</html>
