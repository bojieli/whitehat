<?php
require_once("header.php");
require_once("sendmail.php");
session_start();
session_destroy();
$right = true;
$error = '<meta charset="utf-8">';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        if (!is_numeric($_POST["id"])) {
            $right = false;
            $error = $error . "需要漏洞 ID！<br>";
        }
        if (!(isset($_POST["type"]))) {
            $right = false;
            $error = $error . "请输入漏洞类型！<br>";
        } else {
            $type = intval($_POST["type"]);
            switch ($type) {
            case 1:
                $domain = $_POST["domain"];
                break;
            case 2:
                $domain = $_POST["device"];
                break;
            case 3:
                $domain = $_POST["app"];
                break;
            default:
                $right = false;
                $error = $error . "未知漏洞类型！<br>";
            }
        }
        if ($domain == "") {
            $right = false;
            $error = $error . "请输入漏洞靶标！<br>";
        }
        if (!(isset($_POST["title"]) && ($_POST["title"] != ""))) {
            $right = false;
            $error = $error . "请输入漏洞标题！<br>";
        }
        if (!(isset($_POST["detail"]) && ($_POST["detail"] != ""))) {
            $right = false;
            $error = $error . "请输入详细说明！<br>";
        }
        if (!(isset($_POST["fix_method"]) && ($_POST["fix_method"] != ""))) {
            $right = false;
            $error = $error . "请输入漏洞修复方法！<br>";
        }
        if (!(isset($_POST["review_status"])) || $_POST["review_status"] == 0) {
            $right = false;
            $error = $error . "请输入评审结果！<br>";
        }
        if (!(isset($_POST["reviewer"]))) {
            $right = false;
            $error = $error . "请输入评审者！<br>";
        }
        if (!(isset($_POST["captcha"]) && isset($_SESSION["code"]) && ($_POST["captcha"] == $_SESSION["code"]))) {
            $right = false;
            $error = $error . "验证码有误！<br>";
        }

        if (!is_numeric($_POST['vector-score']) || $_POST['vector-score'] <= 0 || $_POST['vector-score'] > 10) {
            $right = false;
            $error = $error . "危害分数有误！<br>";
        }
        $vector_score = $_POST['vector-score'];
        $target_rank = intval($_POST["target-rank"]);
        if ($target_rank == 0 || $target_rank < 100 || $target_rank > 500) {
            $right = false;
            $error = $error . "靶标价值有误！<br>";
        }

        if ($right) {
            $total_score = round($vector_score * $target_rank);
            try {
                $query = $con->prepare("UPDATE Loophole SET domain_type=?, domain=?, vector=?, target_rank=?, score=?, title=?, detail=?, fix_method=?, reviewer=?, verified=?, review_msg=?, review_time=? WHERE id=?");
                $query->execute(array(
                  htmlspecialchars($_POST["type"]),
                  htmlspecialchars($domain),
                  htmlspecialchars($_POST["vector"]),
                  intval($_POST["target-rank"]),
                  $total_score,
                  htmlspecialchars($_POST["title"]),
                  htmlspecialchars($_POST["detail"]),
                  htmlspecialchars($_POST["fix_method"]),
                  htmlspecialchars($_POST["reviewer"]),
                  intval($_POST["review_status"]),
                  htmlspecialchars($_POST["review_msg"]),
                  date("Y-m-d H:i:s", time()),
                  intval($_POST["id"]),
                ));
            } catch (PDOException $e) {
                echo "Database Error: cannot Insert!: " . $e->getMessage();
                exit();
            }
            $mail_title =
              ($_POST['review_status'] == 1 ? "[审核通过] ":"[审核未通过] ").
              htmlspecialchars($_POST["title"]);

            $mail_content =
                ($_POST['review_status'] == 1 ? 
                "恭喜您在白帽子安全技术挑战赛中提交的漏洞已被审核通过，获得 $total_score 分！<br><br>" : 
                "很遗憾，您在白帽子安全技术挑战赛中提交的漏洞未被审核通过。原因是：".htmlspecialchars($_POST["review_msg"])."<br><br>").
              "<b>漏洞ID:</b> ".htmlspecialchars($_POST["id"])."<br><br>".
              "<b>靶标:</b> ".htmlspecialchars($domain)." ($target_rank 分)<br><br>".
              "<b>标题:</b> ".htmlspecialchars($_POST["title"])."<br><br>".
              "<b>危害向量:</b> ".htmlspecialchars($_POST["vector"])."<br><br>".
              "<b>得分: $total_score</b> = $target_rank * $vector_score<br><br>".
              "<b>审核意见:</b> ".htmlspecialchars($_POST["review_msg"])."<br><br>".
              "<b>详细说明:</b> ".htmlspecialchars($_POST["detail"])."<br><br>".
              "<b>修复方法:</b> ".htmlspecialchars($_POST["fix_method"])."<br><br>".
              "如果您对审核结果有任何疑问，请回复本邮件联系我们。";

            sendmail($_POST['email'], $_POST['username'], $mail_title, $mail_content);
            sendmail('whitehat@ustclug.org', 'staff', $mail_title, $mail_content);

            echo '<meta charset="utf-8"><script>alert("提交成功！");</script><meta http-equiv="refresh" content="0;url=/">';
        } else {
          echo $error;
        }
        exit();
    }
}
else {
    if (!is_numeric($_GET['id'])) {
        echo "ID not specified";
        exit();
    }
    $id = intval($_GET['id']);
    $query = $con->prepare("SELECT * FROM Loophole WHERE id=?");
    $query->execute(array($id));
    if ($query->rowcount() == 0) {
        echo "ID does not exist";
        exit();
    }
    $row = $query->fetch();
    if ($row['id'] != $id) {
        echo "ID does not match DB";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">

    <title>白帽子安全技术挑战赛 | 提交漏洞</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
      <!--<link rel="stylesheet" type="text/css" href="markitup/skins/markitup/style.css"/>
      <link rel="stylesheet" type="text/css" href="markitup/sets/markdown/style.css">
      <link rel="stylesheet" type="text/css" href="markitup/image_upload/image_upload.css">-->
      <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="bower_components/bootstrap-markdown-editor/dist/css/bootstrap-markdown-editor.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
      .tips {
          margin: 20px 0;
          padding: 15px;
          border: 1px #ddd dashed;
          border-radius: 8px;
          font-size: 16px;
          color: #999;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h3>审核漏洞</h3>
      <hr>
<?php
    if ($row['verified'] != 0) {
        echo '<div class="alert alert-danger">'.
            '<p>此漏洞已经由 '
            .$row['reviewer']
            .' 于 '.$row['review_time']
            .' 审核'
            .($row['verified'] == 1 ? '通过' : '不通过')
            .'。</p>'.
            '<p>如果需要更新审核信息，将重新发送审核通过邮件。</p></div>';
    }
?>
      <div class="alert alert-info">
        <p>请评定漏洞危害等级，填写审核者、审核理由。</p>
      </div>

      <form class="form-horizontal" action="review.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>">

        <div class="form-group">
          <label for="type" class="col-sm-2 control-label">靶标类型</label>
          <div class="col-sm-3">
            <select name="type" id="type" class="form-control">
                <option value="1" <?php if($row['domain_type']==1) echo 'selected' ?>>网站</option>
                <option value="2" <?php if($row['domain_type']==2) echo 'selected' ?>>设备</option>
                <option value="3" <?php if($row['domain_type']==3) echo 'selected' ?>>应用</option>
            </select>
          </div>
        </div>

        <div class="form-group target" id="domain-target">
          <label for="domain" class="col-sm-2 control-label">靶标域名</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="domain" name="domain" placeholder="*.ustc.edu.cn" autocomplete="off" value="<?=$row['domain']?>">
          </div>
        </div>

        <div class="form-group target" id="device-target" style="display:none">
          <label for="domain" class="col-sm-2 control-label">设备名称</label>
          <div class="col-sm-3">
              <select name="device" id="device" class="form-control" id="device" name="device" autocomplete="off">
              </select>
          </div>
        </div>

        <div class="form-group target" id="app-target" style="display:none">
          <label for="domain" class="col-sm-2 control-label">应用名称</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="app" name="app" autocomplete="off" value="<?=$row['domain']?>">
          </div>
        </div>

        <div class="form-group">
          <label for="title" class="col-sm-2 control-label">漏洞标题</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="title" name="title"
                placeholder="对漏洞的简要描述，可以简单描述漏洞的危害和成因，不要透漏漏洞的细节" value="<?=$row['title']?>">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">漏洞危害<br /><span style="font-weight:normal">(<a href="http://www.first.org/cvss/cvss-guide.html" target="_blank">详细说明</a>)</span></label>
          <div class="col-sm-4">
            <div>
                <label for="base-av" class="control-label"><span class="label label-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="This metric reflects how the vulnerability is exploited.  The more remote an attacker can be to attack a host, the greater the vulnerability score." data-title="Access Vector" id="base-av">攻击途径</span></label>
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="需要攻击者拥有受攻击系统的物理访问权限或者本地(shell)账号" id="rb-av-l">
                        <input type="radio" name="rb-av" value="r000">本地
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="需要攻击者拥有校内网络的访问权限" id="rb-av-a">
                        <input type="radio" name="rb-av" value="r001">校内
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="受攻击系统 Internet 上" id="rb-av-n">
                        <input type="radio" name="rb-av" value="r002">Internet
                    </label>
                </div>
            </div>

            <div>
                <label for="base-ac" class="control-label"><span class="label label-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="This metric measures the complexity of the attack required to exploit the vulnerability once an attacker has gained access to the target system.  The lower the required complexity, the higher the vulnerability score." data-title="Access Complexity" id="base-ac">攻击复杂度</span></label>
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="存在特定的攻击条件" id="rb-ac-h">
                        <input type="radio" name="rb-ac" value="r010">高
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="存在部分特定的攻击条件" id="rb-ac-m">
                        <input type="radio" name="rb-ac" value="r011">中
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="不存在特定的攻击条件或特殊情况" id="rb-ac-l">
                        <input type="radio" name="rb-ac" value="r012">低
                    </label>
                </div>
            </div>

            <div>
                <label for="base-au" class="control-label"><span class="label label-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="This metric measures the number of times an attacker must authenticate to a target in order to exploit a vulnerability. The fewer authentication instances that are required, the higher the vulnerability score." data-title="Authentication" id="base-au">攻击者认证</span></label>
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="攻击者需要验证两次以上，即使每次都使用相同的账号。" id="rb-au-m">
                        <input type="radio" name="rb-au" value="r020">多次认证
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="攻击者需要一次验证。(例如通过终端登录或使用网页/客户端的session验证)" id="rb-au-s">
                        <input type="radio" name="rb-au" value="r021">单次认证
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="攻击时无需验证" id="rb-au-n">
                        <input type="radio" name="rb-au" value="r022">无
                    </label>
                </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div>
                <label for="base-c" class="control-label"><span class="label label-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="This metric measures the impact on confidentiality of a successfully exploited vulnerability.  Increased confidentiality impact increases the vulnerability score." data-title="Confidentiality Impact" id="base-c">机密性影响</span></label>
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="对系统的机密性无影响" id="rb-c-n">
                        <input type="radio" name="rb-c" value="r030">无影响
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="有大量的信息泄露，但范围有限" id="rb-c-p">
                        <input type="radio" name="rb-c" value="r031">部分影响
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="全部信息泄露，攻击者可读取所有系统数据" id="rb-c-c">
                        <input type="radio" name="rb-c" value="r032">完全影响
                    </label>
                </div>
            </div>

            <div>
                <label for="base-i" class="control-label"><span class="label label-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="This metric measures the impact to integrity of a successfully exploited vulnerability.  Increased integrity impact increases the vulnerability score." data-title="Integrity Impact" id="base-i">完整性影响</span></label>
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="对系统的完整性无影响" id="rb-i-n">
                        <input type="radio" name="rb-i" value="r040">无影响
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="可能对一些系统文件或信息进行修改，但攻击者不能控制修改哪些信息，或攻击者能修改的数据范围有限。" id="rb-i-p">
                        <input type="radio" name="rb-i" value="r041">部分影响
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="完全影响系统的完整性" id="rb-i-c">
                        <input type="radio" name="rb-i" value="r042">完全影响
                    </label>
                </div>
            </div>

            <div>
                <label for="base-a" class="control-label"><span class="label label-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="This metric measures the impact to availability of a successfully exploited vulnerability. Increased availability impact increases the vulnerability score." data-title="Availability Impact" id="base-a">可用性影响</span></label>
                <div class="btn-group btn-group-sm" data-toggle="buttons">
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="top" title="对系统可用性无影响" id="rb-a-n">
                        <input type="radio" name="rb-a" value="r050">无影响
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="top" title="降低性能或导致一些资源访问中断" id="rb-a-p">
                        <input type="radio" name="rb-a" value="r051">部分影响
                    </label>
                    <label class="btn btn-default" data-toggle="tooltip" data-placement="top" title="导致受攻击资源的完全宕掉" id="rb-a-c">
                        <input type="radio" name="rb-a" value="r052">完全影响
                    </label>
                </div>
            </div>

          </div>
        </div>


        <div class="form-group">
          <label for="score" class="col-sm-2 control-label">漏洞得分</label>
          <div class="col-sm-9">
          <h4><label class="label label-default" id="target-rank"><?php echo $row['target_rank'] ?></label> × <label class="label label-default" id="score">0</label> = <label class="label label-default" id="total-score"><?php echo $row['score'] ?></label> <span style="font-size:12px">（根据靶标名称和漏洞危害自动生成）</span></h4>
            <input type="hidden" id="input-target-rank" name="target-rank" value="<?php echo $row['target_rank'] ?>">
            <input type="hidden" id="vector-score" name="vector-score" value="0">
            <input type="hidden" id="vector" name="vector" value="<?php echo $row['vector'] ?>">
          </div>
        </div>
 
        <div class="form-group">
          <label for="detail" class="col-sm-2 control-label">详细说明</label>
          <div class="col-sm-9">
              <div type="text" rows="10" id="detail-edit"
              placeholder="对漏洞的详细描述，请尽量多的深入细节以方便对漏洞的理解"><?=$row['detail']?></div>
              <textarea hidden="hidden" name="detail" id="detail"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="fix_method" class="col-sm-2 control-label">漏洞修复</label>
          <div class="col-sm-9">
              <div type="text" rows="10" id="fix_method-edit" name="fix_method"
              placeholder="建议的漏洞修复方案"><?=$row['fix_method']?></div>
              <textarea hidden="hidden" name="fix_method" id="fix_method"></textarea>
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
            <input disabled type="text" class="form-control" id="username" name="username" placeholder="" value="<?=$row['username']?>">
          </div>
        </div>

        <div class="form-group">
          <label for="gender" class="col-sm-2 control-label">性别</label>
          <div class="col-sm-3">
              <select disabled class="form-control" id="gender" name="gender">
             <option value="1" <?php if($row['gender']==1) echo 'selected' ?>>男</option>
             <option value="2" <?php if($row['gender']==2) echo 'selected' ?>>女</option>
             <option value="3" <?php if($row['gender']==3) echo 'selected' ?>>保密</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">邮箱</label>
          <div class="col-sm-3">
            <input disabled type="text" class="form-control" id="email" name="email" placeholder="*@mail.ustc.edu.cn" value="<?=$row['email']?>">
          </div>
        </div>

        <div class="form-group">
          <label for="phone" class="col-sm-2 control-label">手机</label>
          <div class="col-sm-3">
            <input disabled type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?=$row['phone']?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <div class="checkbox">
              <label>
                <input disabled type="checkbox" id="anonymous" name="anonymous" value="anonymous" <?php if($row['anonymous']) echo 'checked' ?>> 匿名
              </label>
            </div>
            <p class="help-block">匿名与否决定了您的姓名是否展示在首页，不影响最终评奖</p>
          </div>
        </div>

        <div class="form-group">
          <label for="reviewer" class="col-sm-2 control-label">审核者</label>
          <div class="col-sm-3">
          <input type="text" class="form-control" id="reviewer" name="reviewer" placeholder="内部统计用" value="<?=$row['reviewer']?>">
          </div>
        </div>

        <div class="form-group">
          <label for="review_msg" class="col-sm-2 control-label">审核理由</label>
          <div class="col-sm-9">
              <div type="text" rows="5" id="review_msg-edit" name="review_msg"><?=$row['review_msg']?></div>
              <textarea hidden="hidden" name="review_msg" id="review_msg"></textarea>
              <p class="help-block">如果修改了漏洞评分，需要写修改原因；<br>如果审核不通过，需要说明不通过原因；<br>还可以写针对该漏洞的点评。无修改审核通过可以留空。</p>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
              <img id="captcha-pic" title="点击刷新" src="captcha/captcha.php"
                   onclick="this.src='captcha/captcha.php?'+Math.random();captcha_ok=0;"/>
          </div>
        </div>

        <div class="form-group" id="captcha-form">
          <label for="captcha" class="col-sm-2 control-label">验证码</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="captcha" name="captcha" placeholder="" onblur="check_captcha();">
          </div>
        </div>

        <div class="form-group">
          <input type="hidden" id="review_status" name="review_status">
          <div class="col-sm-offset-2 col-sm-4">
              <button id="submit-pass" type="submit" class="btn btn-default btn-primary" value="create">审核通过</button>
              <button id="submit-decline" type="submit" class="btn btn-default" value="create">审核不通过</button>
          </div>
        </div>

      </form>
    </div>
    <?php require("footer.php");?>

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
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  -
  <!--<script type="text/javascript" src="markitup/jquery.markitup.js"></script>
  <script type="text/javascript" src="markitup/sets/markdown/set.js"></script>-->
  <script type="text/javascript" src="js/jquery.form.min.js"></script>
  <!--<script type="text/javascript" src="markitup/image_upload/image_upload.js"></script>-->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/cvss2.js"></script>
  <script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
  <script type="text/javascript" src="js/data.js"></script>

  <script type="text/javascript" src="bower_components/ace-builds/src-min/ace.js"></script>
  <script type="text/javascript" src="bower_components/bootstrap-markdown-editor/dist/js/bootstrap-markdown-editor.js"></script>
  <script type="text/javascript" src="js/marked.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          var editorsettings = {
              fontSize: '14px',
              // Activate the preview:
              preview: true,
              imageUpload: true, // Activate the option
              uploadPath: 'upload.php',
              // This callback is called when the user click on the preview button:
              onPreview: function (content, callback) {
                callback(marked(content));
              },
              fullscreen: false
          };
          $('#detail-edit').markdownEditor(editorsettings);
          $('#fix_method-edit').markdownEditor(editorsettings);
          $('#review_msg-edit').markdownEditor(editorsettings);
          var domainList = [];
          for (domain in domainScores) {
              domainList.push(domain);
          }
          $('#domain').typeahead({
              source: domainList,
              minLength: 2,
              items: 10
          });
          for (device in deviceScores) {
              $('#device').append('<option value="' + device + '"' +
                + (device == "<?=$row['domain']?>" ? ' selected ' : '')
                + '>'
                + device
                + '</option>');
          }
      });

      function update_total_score() {
          $("#total-score").text(Math.round($("#target-rank").text() * $("#score").text()));
      }

      $("#type").on('change', function(event){
          $(".target").hide();
          switch ($("#type").val()) {
          case '1':
              $("#domain-target").show();
              $("#domain").change();
              break;
          case '2':
              $("#device-target").show();
              $("#device").change();
              break;
          case '3':
              $("#app-target").show();
              $("#app").change();
              break;
          }
      });
      $("#type").change();

      $("#domain").on('change', function(event){
          domain = $("#domain").val().trim();
          if (domain in domainScores)
              rank = domainScores[domain];
          else
              rank = 100;
          $("#target-rank").text(rank);
          update_total_score();
      });

      $("#device").on('change', function(event){
          device = $("#device").val().trim();
          if (device in deviceScores)
              rank = deviceScores[device];
          else
              rank = 0;
          $("#target-rank").text(rank);
          update_total_score();
      });

      $("#app").on('change', function(event){
          $("#target-rank").text(300);
          update_total_score();
      });

      //前端验证表单

      function do_submit(){
          var err=0,msg="";
          $("#detail").val($('#detail-edit').markdownEditor('content'));
          $("#fix_method").val($('#fix_method-edit').markdownEditor('content'));
          $("#review_msg").val($('#review_msg-edit').markdownEditor('content'));
        switch ($("#type").val()) {
        case '1':
            if($("#domain").val().length<=12||$("#domain").val().substr(-12,12)!=".ustc.edu.cn"){
              err=1;
              msg+="请输入以 .ustc.edu.cn 结尾的域名！<br>";
            }
            break;
        case '2':
            break;
        case '3':
            if ($("#app").val().trim() == "") {
                err=1;
                msg+="请输入应用名称！<br>";
            }
            break;
        }

        if($("#vector").val() == ""){
          err=1;
          msg+="请选择漏洞危害！<br>";
        }
        if($("#total-score").text()==0){
          err=1;
          msg+="有危害的才叫漏洞，请选择漏洞危害！<br>";
        }

        $("#input-target-rank").val($("#target-rank").text());
        $("#vector-score").val($("#score").text());

        if($("#title").val()==""){
          err=1;
          msg+="漏洞标题不能为空！<br>";
        }
        if($("#detail").val()==""){
          err=1;
          msg+="详细说明不能为空！<br>";
        }
        if($("#fix_method").val()==""){
          err=1;
          msg+="漏洞修复不能为空！<br>";
        }
        if($("#reviewer").val()=="") {
          err=1;
          msg+="请填写审核者昵称！<br>";
        }
        if(!captcha_ok){
          err=1;
          msg+="验证码有误！<br>";
        }

        if(err==1){
          $("#error-message").html(msg);
          $("#modal-error").modal('show');
          return false;
        }
      }

      $("#submit-pass").on('click', function(){
          $("#review_status").val(1);
          return do_submit();
      });
      $("#submit-decline").on('click', function() {
          $("#review_status").val(2);
          return do_submit();
      });

      //ajax验证码
      var captcha_ok=0;
      function check_captcha(){
        $.post("captcha/check.php",{captcha:$("#captcha").val()},function(data,status){
          if(status=="success"){
            if(data=="0"){//验证码错误
              $("#captcha-form").addClass("has-error");
              $("#captcha-pic")[0].src='captcha/captcha.php?'+Math.random();
              captcha_ok=0;
            }else{//正确
              $("#captcha-form").removeClass("has-error");
              captcha_ok=1;
            }
          }
        });
      }
  </script>
</html>
<?php }
