<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico">

    <title>白帽子安全技术挑战赛 | 比赛规则</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    h1,h2,h3{
      font-weight: bold;
    }
    p{
      text-indent:2em;
    }
    </style>
  </head>

  <body>

    <div class="container">
      <h1>比赛规则</h1>
      <hr>

      <h2>一、赛制介绍</h2>

      <h3>大赛简介</h3>

<p>随着校园信息化的发展和学生隐私意识的增强，信息安全问题越来越受到学生关注。然而，校园网络中的一些系统长期没有更新维护，可能存在安全漏洞，对学生数据的保密性、完整性和网络服务的可用性构成了威胁。</p>
<p>不同于利用安全漏洞 “闷声发大财” 的 “黑帽黑客”，“白帽子” 是一群技术高超、坚持正义的黑客，在不影响系统正常运行的前提下探索、发现系统中的漏洞，并及时提醒系统的开发者去修复。</p>
<p>不同于基于模拟环境的 CTF 比赛，本次大赛基于中国科学技术大学校内的真实网络服务，参赛者需要通过渗透指定的设备、应用或网站，发现、利用并报告可对数据保密性、完整性或服务可用性造成破坏的安全漏洞。</p>

      <h3>赛制安排</h3>

<ol>
<li>5月10日起开放在线提交漏洞平台和靶标列表。靶标列表以外的安全漏洞不计入比赛成绩。</li>
<li>提交的漏洞将于24小时内被人工审核、评定 rank，审核通过的漏洞将展示在漏洞提交平台首页。重复提交的漏洞将不会被审核通过。</li>
<li>比赛期间 LUG 将举办信息安全技术讲座，具体时间地点另行通知，请关注 BBS、LUG 邮件列表、QQ 群等。</li>
<li>5月24日排行榜封榜。我们将在一周内联系获奖的同学，颁发奖品。</li>
<li>一周后，我们会邀请分数位列前茅的同学参加 LUG 每周小聚，分享经验。</li>
<li>漏洞被修复后，漏洞的详细信息将在漏洞平台公开。比赛结束后漏洞提交平台仍然开放，成为校园信息安全问题的报告平台。</li>
</ol>

      <h3>奖品设置</h3>

<p>奖品按照比赛名次发放：</p>
<ul>
  <li>一等奖x2：<strong>iPod Shuffle 2GB</strong> 或 <strong>500GB USB 3.0 移动硬盘</strong></li>
  <li>二等奖x5：<strong>LUG 2015 纪念衫一件</strong></li>
  <li>参与奖x20：<strong>白帽子一顶</strong></li>
</ul>
如果我们资金充裕，奖品会更多更丰厚哟～

      <h3>参赛对象</h3>

<p>拥有科大学生邮箱（@mail.ustc.edu.cn）的全日制在校学生（本科生、研究生、博士生）。</p>
<p>报名方式：在比赛平台提交漏洞时，准确填写身份信息和联系方式。由于身份信息、联系方式填写错误导致的问题，组委会不承担责任。</p>


      <h3>主办单位</h3>

<p>校团委、社团管指委、校学生 Linux 用户协会</p>

      <h2>二、参赛说明</h2>

      <h3>排行榜计分方式</h3>

<p>排行榜按照每个邮件地址所审核通过的漏洞报告的得分之和排序。得分相同的，按照罚时从少到多排序。罚时是从比赛开始到每个漏洞提交的时间之和。</p>

<p>一个有效漏洞的得分等于靶标权重与漏洞 rank 的乘积。如果在同一个靶标发现了多个漏洞，只计 rank 最高的那个漏洞。</p>

<p>如果一个漏洞影响了多个靶标，参赛者须对每个靶标分别提交报告，视为不同的漏洞。</p>

      <h3>参赛须知</h3>

<ol>
<li>不准使用 DDoS、流量洪水、资源耗尽、暴力破解密码、社会工程学等攻击方法，违者视为无效，并按照学校有关规定处理。</li>
<li>不准利用漏洞窃取、篡改、删除数据，或影响网络服务的可用性，违者取消参赛资格，并按照学校有关规定处理。</li>
<li>CSRF 攻击、未造成危害的服务器敏感信息泄露不视为漏洞。</li>
<li>未经比赛组委会同意，不得公开发布或讨论未修复的漏洞，违者视为无效。原则上组委会将在漏洞被修复后公开发现的漏洞。</li>
<li>不准对靶标以外的校园网络服务、校园网络基础设施或校外网站发起攻击，违者视为无效，并按照学校有关规定处理。</li>
<li>靶标服务的开发者、管理员、维护者或拥有系统较高访问权限的人不准攻击自己参与开发或维护的服务，违者视为无效。</li>
<li>渗透过程中不得入侵管理员或用户的个人电脑、个人网络存储，违者视为无效。</li>
</ol>

      <h3>补充说明</h3>

<ol>
<li>漏洞提交平台不提供漏洞修改功能。如果需要修改已经提交的漏洞，请重新提交，并注明这是一次修改，组委会将采纳这个新的漏洞报告，并删除旧的漏洞报告。</li>
<li>漏洞提交后将把所提交的内容发邮件给漏洞报告者。为防收不到邮件，建议漏洞报告者自留底稿。漏洞审核情况也采用邮件方式通知，请注意查收邮件。</li>
<li>靶标的子域名、子网站视为靶标的一部分。靶标本身是云服务的，客户的网站不视为靶标的一部分（例如利用某个 freeshell 上应用程序的漏洞，拿到 root 不算数）。</li>
<li>提交页面上显示的靶标价值、漏洞危害程度、漏洞得分仅供参考。组委会可能在不事先通知的情况下随时修改靶标价值；在审核时组委会也会参考参赛者提交的漏洞危害程度，重新评定漏洞危害程度。</li>
<li>在同一个靶标上使用相似的渗透方法达到相似的效果的，认为是重复提交，重复提交不予审核通过。重复提交的判定权和解释权归组委会所有。因此在提交漏洞前，应首先查看漏洞列表。</li>
</ol>

      <h2>三、靶标列表</h2>

      <h3>1）设备类</h3>

<p>下表中同种设备有多台的，视作单个靶标。</p>
<p>未在下表中列出的设备不作为靶标，不得尝试渗透。</p>
<p>渗透过程中严禁对设备进行破坏，并尽量不要影响他人的正常使用。如果对设备造成破坏，将按照校规校纪严肃处理。</p>

<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr><th>设备名称</th><th>漏洞示例</th><th>权重</th></tr>
  </thead>
  <tbody>
    <tr><td>图书馆书目查询机</td><td>进入查询机的 root shell</td><td>300</td></tr>
    <tr><td>图书馆自助借/还书机</td><td>没有使用校园卡就借书成功</td><td>500</td></tr>
    <tr><td>图书馆电子阅读机</td><td>打开电子阅读机的C盘目录</td><td>300</td></tr>
    <tr><td>校园一卡通卡片</td><td>向洗澡的小钱包里凭空增加1元钱</td><td>500</td></tr>
    <tr><td>ustcnet 无线热点</td><td>对其他无线用户实施 ARP 欺骗</td><td>300</td></tr>
  </tbody>
</table>


      <h3>2）应用类</h3>
<p>靶标范围为掌上科大 <a href="http://i.ustc.edu.cn/m/">http://i.ustc.edu.cn/m/</a> 上的应用。</p>
<p>一个应用的 iOS/Android/Windows Phone 版，视为不同的应用。应用的权重均为 300。</p>

      <h3>3）网站类</h3>
<p>所有拥有 *.ustc.edu.cn 域名的网站均可作为靶标。未在下表中列出的网站，权重为 100。</p>

<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr><th>网站名称</th><th>域名</th><th>权重</th></tr>
  </thead>
  <tbody>
    <tr><td>网络通</td><td>wlt.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>BBS</td><td>bbs.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>电子邮件</td><td>email.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>科大云</td><td>cloud.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>瀚海星云校园云存储</td><td>cloudfile.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>个人主页和 FTP</td><td>home.ustc.edu.cn/staff.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>主页代理服务器</td><td>revproxy.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>内容管理系统（科大及各院系主页、新闻网）</td><td>wcm.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>Grid 搜索</td><td>grid.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>教务处 (不包括综合教务系统)</td><td>teach.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>综合教务系统</td><td>mis.teach.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>研究生教务系统</td><td>yjs.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>研究生在线</td><td>gradschool.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>招生在线</td><td>zsb.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>网络教学平台</td><td>bb.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>睿课网</td><td>rec.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>图书馆</td><td>lib.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>校园一卡通</td><td>ecard.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>校园信息门户</td><td>i.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>正版软件</td><td>ms.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>科大开源软件镜像</td><td>mirrors.ustc.edu.cn</td><td>500</td></tr>
    <tr><td>LUG 主页</td><td>lug.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>科大博客</td><td>blog.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>Freeshell</td><td>freeshell.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>GitLab</td><td>gitlab.lug.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>网络启动服务</td><td>pxe.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>ACM 训练系统</td><td>acm.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>LUG 权威 DNS</td><td>dns.lug.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>校园活动平台</td><td>huodong.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>心理咨询中心</td><td>smile.ustc.edu.cn</td><td>200</td></tr>
    <tr><td>学生会</td><td>stunion.ustc.edu.cn</td><td>300</td></tr>
    <tr><td>研究生会</td><td>gradunion.ustc.edu.cn</td><td>300</td></tr>
  </tbody>
</table>

<p>注：不允许攻击的网站和系统：</p>
<ul>
<li>校园网、安徽省教育网的交换机、路由器等网络设备</li>
<li>没有列出在上述列表中，又没有 *.ustc.edu.cn 域名的网站</li>
</ul>

    </div>

    <?php require("footer.php");?>
  </body>
  <!-- Bootstrap core JavaScript -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</html>
