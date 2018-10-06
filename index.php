<?php require_once './c/f.php';?>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="<?php echo descript();?>" />
	  <meta name="keywords" content="<?php echo keyword();?>" />
    <link href="./css/mdui.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/mdui.min.js"></script>
	</head>
</html>
<div id="menu" class="<?php echo drawer_position();echo drawer_showing();?>" style="display: <?php echo drawer_enabled();?>;">
    <div style="padding: 5%;">
        <ul class="mdui-list">
            <h1><?php echo drawer_title();?></h1>
            <div class="mdui-divider"></div><br>
            <a href="javascript:;" onclick="window.location.href='./admin/'"><li class="mdui-list-item mdui-ripple"><i class="mdui-icon material-icons">account_circle</i>&emsp;&emsp;管理后台</li></a>
            <a href="javascript:;" onclick="window.location.href='./p/about.php'"><li class="mdui-list-item mdui-ripple"><i class="mdui-icon material-icons">info_outline</i>&emsp;&emsp;关于</li></a>
        </ul>
    </div>
</div>
<body style="background-image: url('./img/<?php echo background();?>');" class="<?php echo drawer_position_body();?>">
    <div class="mdui-shadow-2 mdui-card mdui-hoverable mdui-typo mdui-img-rounded mdui-color-white" style="margin: 2%; min-height: 90%; height: auto;" id="container"> 
        <div style="padding: 3%;">
            <button mdui-tooltip="{content: '管理'}" class="mdui-btn mdui-btn-icon mdui-ripple" style="float: right" onclick="window.location.href='./admin/'"><i class="mdui-icon material-icons">account_circle</i></button>
            <button mdui-tooltip="{content: '菜单'}" class="mdui-btn mdui-btn-icon mdui-ripple" style="float: left" mdui-drawer="{target: '<?php echo drawer_target();?>', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>&emsp;
            <button mdui-tooltip="{content: '后退'}" class="mdui-btn mdui-btn-icon mdui-ripple" style="float: left" onclick="javascript:history.back(-1);"><i class="mdui-icon material-icons">arrow_back</i></button>&emsp;
            <button mdui-tooltip="{content: '前进'}" class="mdui-btn mdui-btn-icon mdui-ripple" style="float: left" onclick="javascript:history.forward(1);"><i class="mdui-icon material-icons">arrow_forward</i></button>&emsp;
            <button mdui-tooltip="{content: '主页'}" class="mdui-btn mdui-btn-icon mdui-ripple" style="float: left" onclick="window.location.href='#m'"><i class="mdui-icon material-icons">home</i></button>
            <div id="h" class="mdui-text-center"></div>
            <div id="l" class="mdui-text-center">
                <h2><b>LOADING...</b></h2>
            </div>
            <div style="padding-top: 2%;" id="c"></div>
        </div>
    </div>
</body>
<footer>
    <div style="text-align: center; color: <?php echo footer_color()?>;" id="f"></div>
</footer>
<script src="./js/re.js"></script>