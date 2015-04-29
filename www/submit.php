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
      <div class="float-element">

        <h3>提交漏洞</h3>
        <hr>
        <div class="tips">
          <p>
            一些说明
          </p>
        </div>

        <form class="form-horizontal">
          
          <div class="form-group">
            <label for="inputAAA" class="col-sm-2 control-label">AAA</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="inputAAA" placeholder="Please input AAA">
            </div>
          </div>

          <div class="form-group">
            <label for="inputBBB" class="col-sm-2 control-label">BBB</label>
            <div class="col-sm-4">
              <textarea type="text" class="form-control" rows="5" id="inputBBB" placeholder="Please input BBB"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
              <button type="submit" class="btn">Submit</button>
            </div>
          </div>

        </form>


      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <span class="footer-text text-muted">Copyright &copy; 白帽子大赛 2015</span>
      </div>
    </footer>
  </body>
  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!--<script src="js/jquery.min.js"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <script>
      $(document).ready(function () {
          $('#打开网页后光标首先定位到的输入框').focus();
          $('#inputBBB').markItUp(mySettings);
      });

  </script>
</html>
