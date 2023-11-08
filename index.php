

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
    <meta name="renderer" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="stylesheet" href="https://unpkg.com/mdui@2.0.1/mdui.css">
<script src="https://unpkg.com/mdui@2.0.1/mdui.global.js"></script>
<link rel="stylesheet" href="https://unpkg.com/mdui@1.0.2/dist/css/mdui.min.css"/>
    <title>今日佛罗里达</title><style>
        .main{
            margin:5%;
        }
    </style>
</head>
<body>

    <div class="mdui-appbar">
  <div class="mdui-toolbar mdui-color-theme">
    <a href="javascript:;" class="mdui-btn mdui-btn-icon">
      <i class="mdui-icon material-icons">menu</i>
    </a>
    <a href="javascript:;" class="mdui-typo-title">今日佛州</a>
    <div class="mdui-toolbar-spacer"></div>
    
    <a href="javascript:;" class="mdui-btn mdui-btn-icon">
      <i class="mdui-icon material-icons">more_vert</i>
    </a>
  </div>
</div><div class="main">
    <form method="POST" action="">
        <label for="date"><div class="mdui-typo-subheading-opacity">请输入你的生日</div></label>
        <div class="mdui-textfield">
  <input class="mdui-textfield-input" type="date" id="date" name="date" placeholder="你的生日"/>
        <button class="mdui-btn mdui-btn-raised" type="submit" name="submit" value="Convert and Search">搜索</button>
    
        </div>
       <div class="mdui-typo-caption-opacity">消息源为CNN，以下内容不代表本工具立场。</div> 
        
    </form>
    <div class="mdui-panel" mdui-panel>
    <?php
    

    
if(isset($_POST['submit'])) {
    $userDate = $_POST['date'];
    $formattedDate = date("F j", strtotime($userDate));
    $keyword = "CNN A Florida man \" " . $formattedDate ."\"";
    $searchQuery = "https://yandex.eu/search/?text=" . urlencode($keyword);
    
    // 获取页面内容
    $htmlContent = file_get_contents($searchQuery);
    
   // echo($htmlContent);

    // 提取所有h2标签
    $dom = new DOMDocument();
    @$dom->loadHTML($htmlContent);
    $xpath = new DOMXPath($dom);
    $Tags = $xpath->query('//span[@class="ExtendedText-Full"]');
    
    $it=0;
    // 输出h2标签内容
    foreach ($Tags as $tag) {
        $it+=1; if($it>0){
            
        ?> <div class="mdui-panel-item mdui-panel-item-open">
    <div class="mdui-panel-item-header">
        <?php echo  "#".( $it-0); ?>
    </div>
    <div class="mdui-panel-item-body">
      <?php echo  $tag->nodeValue . "</div>
  </div>"; }
    }
}
?></div></div>
    <script>
</script><script src="https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js"></script>
</body>
</html>
