<?php
require_once("header.php");
$right = true;
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["button"]) && ($_POST["button"] == "create")) {
        if (!(isset($_POST["domain"]) && ($_POST["domain"] != ""))) {
            $right = false;
            $error = $error . "请输入域名！<br>";
        }
        if (!(isset($_POST["title"]) && ($_POST["title"] != ""))) {
            $right = false;
            $error = $error . "请输入标题！<br>";
        }
        if (!(isset($_POST["rank"]) && ($_POST["rank"] != ""))) {
            $right = false;
            $error = $error . "请输入自评rank！<br>";
        }
        if (!(isset($_POST["abstract"]) && ($_POST["abstract"] != ""))) {
            $right = false;
            $error = $error . "请输入问题描述！<br>";
        }
        if (!(isset($_POST["detail"]) && ($_POST["detail"] != ""))) {
            $right = false;
            $error = $error . "请输入详细说明！<br>";
        }
        if (!(isset($_POST["fix_method"]) && ($_POST["fix_method"] != ""))) {
            $right = false;
            $error = $error . "请输入漏洞修复方法！<br>";
        }
        if (!(isset($_POST["username"]) && ($_POST["username"] != ""))) {
            $right = false;
            $error = $error . "请输入您的姓名！<br>";
        }
        if (!(isset($_POST["gender"]) && ($_POST["gender"] != ""))) {
            $right = false;
            $error = $error . "请输入性别！<br>";
        }
        if (!(isset($_POST["email"]) && ($_POST["email"] != ""))) {
            $right = false;
            $error = $error . "请输入邮箱！<br>";
        }
        if (!(isset($_POST["phone"]) && ($_POST["phone"] != ""))) {
            $right = false;
            $error = $error . "请输入电话！<br>";
        }
        if ($right) {
            try {
                $query = $con->prepare("INSERT INTO Loophole (domain,title,rank,abstract,detail,fix_method,username,gender,email,phone,anonymous,submit_time)VALUES(?,?,?,?,?,?,?,?,?,?,?,NOW())");
                $query->execute(array(
                  htmlspecialchars($_POST["domain"]),
                  htmlspecialchars($_POST["title"]),
                  htmlspecialchars($_POST["rank"]),
                  htmlspecialchars($_POST["abstract"]),
                  htmlspecialchars($_POST["detail"]),
                  htmlspecialchars($_POST["fix_method"]),
                  htmlspecialchars($_POST["username"]),
                  htmlspecialchars($_POST["gender"]),
                  htmlspecialchars($_POST["email"]),
                  htmlspecialchars($_POST["phone"]),
                  isset($_POST["anonymous"])));
            } catch (PDOException $e) {
                echo "cannot Insert!: " . $e->getMessage();
                exit();
            }
            echo '<script>alert("提交成功！");</script><meta http-equiv="refresh" content="0;url=/">';
        } else {
          echo $error;
        }
        exit();
    }
}
?>
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

        <form class="form-horizontal" method="post">
        
        <div class="form-group">
          <label for="domain" class="col-sm-2 control-label">漏洞域名</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="domain" name="domain" placeholder="*.ustc.edu.cn">
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">漏洞标题</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="title" name="title" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="rank" class="col-sm-2 control-label">自评Rank</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="rank" name="rank" placeholder="1-20">
          </div>
        </div>

        <div class="form-group">
          <label for="abstract" class="col-sm-2 control-label">问题描述</label>
          <div class="col-sm-9">
              <textarea type="text" class="form-control" rows="5" id="abstract" name="abstract"
                        placeholder="对漏洞的简要描述，可以简单描述漏洞的危害和成因，不要透漏漏洞的细节"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="detail" class="col-sm-2 control-label">详细说明</label>
          <div class="col-sm-9">
              <textarea type="text" class="form-control" rows="5" id="detail" name="detail"
                        placeholder="对漏洞的详细描述，请尽量多的深入细节以方便对漏洞的理解"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="fix_method" class="col-sm-2 control-label">漏洞修复</label>
          <div class="col-sm-9">
              <textarea type="text" class="form-control" rows="5" id="fix_method" name="fix_method"
                        placeholder="建议的漏洞修复方案"></textarea>
          </div>
        </div>

            <!--<div class="form-group">
              <label class="col-sm-2 control-label">上传附件</label>
              <div class="col-sm-5">
                <input type="file" name="attachment"/>
              </div>
            </div>-->

        <div class="form-group">
          <label for="username" class="col-sm-2 control-label">姓名</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="username" name="username" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="gender" class="col-sm-2 control-label">性别</label>
          <div class="col-sm-3">
              <select class="form-control" id="gender" name="gender">
             <option value="1">男</option>
             <option value="2">女</option>
             <option value="3">保密</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">邮箱</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="email" name="email" placeholder="*@mail.ustc.edu.cn">
          </div>
        </div>

        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">手机</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="phone" name="phone" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="captcha" class="col-sm-2 control-label">验证码</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="captcha" name="captcha" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <div class="checkbox">
              <label>
                  <input type="checkbox" id="anonymous" name="anonymous" value="anonymous"> 匿名
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <div class="checkbox">
              <label>
                  <input type="checkbox" id="agree" name="agree"> 我已阅读并同意<a href="/">XXX</a>
              </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-2">
              <button id="submit" type="submit" name="button" class="btn btn-default" value="create">提交</button>
          </div>
        </div>

      </form>
    </div>
    <div>
      <div class="container">
        <span class="text-muted">Copyright &copy; 白帽子大赛 2015</span>
      </div>
    <div>

    <!-- 错误提示模态框 -->
    <div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="modal-error-label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
            <h4 class="modal-title" id="modal-error-label">
              您填写的信息有误
            </h4>
          </div>
          <div class="modal-body" id="error-message">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" 
              data-dismiss="modal">确定
            </button>
          </div>
        </div>
      </div>
    </div><!-- /.modal -->

  </body>
  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!--<script src="js/jquery.min.js"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {
          $('#domain').focus();
          //$('#inputBBB').markItUp(mySettings);
      });

      //前端验证表单

      $("#submit").on('click',function(event){
        var err=0,msg="";
        if($("#domain").val().length<=12||$("#domain").val().substr(-12,12)!=".ustc.edu.cn"){
          err=1;
          msg+="请输入以.ustc.edu.cn结尾的域名！<br>";
        }
        if($("#title").val()==""){
          err=1;
          msg+="标题不能为空！<br>";
        }
        if($("#rank").val()==""||isNaN($("#rank").val())||$("#rank").val()<1||$("#rank").val()>20){
          err=1;
          msg+="自评Rank需要为1-20的整数！<br>";
        }
        if($("#abstract").val()==""){
          err=1;
          msg+="问题描述不能为空！<br>";
        }
        if($("#detail").val()==""){
          err=1;
          msg+="详细说明不能为空！<br>";
        }
        if($("#fix_method").val()==""){
          err=1;
          msg+="漏洞修复不能为空！<br>";
        }
        if($("#username").val()==""){
          err=1;
          msg+="姓名不能为空！<br>";
        }
        if($("#email").val().length<=17||$("#email").val().substr(-17,17)!="@mail.ustc.edu.cn"){
          err=1;
          msg+="邮箱必须以@mail.ustc.edu.cn结尾！<br>";
        }
        if($("#phone").val().length!=11||isNaN($("#phone").val())){
          err=1;
          msg+="手机必须为11位数字！<br>";
        }
        if(!($("#agree")[0].checked)){
          err=1;
          msg+="提交前需勾选同意比赛条款！<br>";
        }
        if(err==1){
          $("#error-message").html(msg);
          $("#modal-error").modal('show');
          return false;
        }
      });
  </script>
</html>
