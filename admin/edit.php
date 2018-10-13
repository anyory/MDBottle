<?php
require_once './../c/f.php';
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE^E_WARNING);
session_start();
date_default_timezone_set("Asia/Shanghai");
$daten=date('Ymd');
$act=$_GET['t'];
$cof=$_GET['c'];
$edit=$_GET['e'];
$ptitle='';
$pcontent='';
$pdat='';
$tag='';
if($_SESSION['log']!=='yes'){
	header('Location: index.php');
	session_write_close();
	exit();
}
if(!is_numeric($edit)){$edit='';};
if(file_exists('./../p/'.$edit.'.php')){
	require './../p/'.$edit.'.php';
}else{
	$edit='';
}
function checkc(){
	global $edit;
	if($edit!==''){
require './../p/index.php';
$tops=explode(',',$tp);
if(in_array($edit,$tops)){
	return true;
}
	}
}
if($act=='out'){
	session_destroy();
	header('Location: index.php');
}else if($act=='del'){/*删除文章*/
	if($cof=='yes'){
	if(file_exists('./../p/index.php')){
	require './../p/index.php';
	if(array_key_exists($edit,$in)){
		unset($in[$edit]);
		unset($tagi[$edit]);
		/*删除置顶残留*/
		$tops=explode(',',$tp);
			if(in_array($edit,$tops)){
				$newtp='';
				foreach($tops as $key=>$val){
					if(intval($val)==intval($edit)){
						unset($tops[$key]);
					}
				}
				foreach($tops as $val){
					if(!empty($val)){
						$newtp=$newtp.$val.',';
					}
				}
				$rtp=preg_replace("/\t|,/",'',$newtp);
				if(empty($rtp)){
					$newtp='';
				}
				$tp=$newtp;
			}
		unlink('./../p/'.$edit.'.php');
		file_put_contents('./../p/index.php','<?php $inn='.$inn.';$in='.var_export($in,true).';$tp=\''.$tp.'\';$tagi='.var_export($tagi,true).';?>');
		echo "<script>window.open('edit.php','_self');</script>";
	}else{
		echo "<script>alert('该文章被吃了O_o');window.open('?e='.$edit,'_self');</script>";
	}
	}else{
		echo "<script>alert('你还没有任何文章Orz');window.open('edit.php','_self');</script>";
	}
	}else{
		echo "<script>if(confirm('真的要删除这篇文章吗=w=')){window.open('?e=".$edit."&t=del&c=yes','_self');}else{history.back(-1);};</script>";
	}
	exit();
}
session_write_close();
?>
<html>
	<head>
	  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	 	<link href="./../css/m.css" rel="stylesheet">
	 	<link href="./../css/mdui.css" rel="stylesheet">
	  	<script src="./../js/mdui.min.js"></script>
	  	<script src="https://cdn.bootcss.com/pagedown/1.0/Markdown.Converter.min.js"></script>
		<style>body{margin:0 auto}.input{font-family:'\5FAE\8F6F\96C5\9ED1';width:100%;max-width:500px;border:1px solid #ccc;padding:7px 0;border-radius:3px;padding-left:5px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s}h2{margin-top:30px}.input:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}.area{font-family:'\5FAE\8F6F\96C5\9ED1';background:#fff;border-bottom-color:#f63;border-bottom-width:0;border-top-width:0;border-left-width:0;border-right-width:0;color:#000;FONT-SIZE:20px;FONT-STYLE:normal;FONT-VARIANT:normal;FONT-WEIGHT:normal;HEIGHT:18px;LINE-HEIGHT:normal;resize:vertical;width:100%;max-width:500px;height:25%}.tagi{border-top-width:0;border-left-width:0;border-right-width:0}.s{width:100%;max-width:500px;text-align:left;margin:0 auto}a{color:grey}</style>
		<script src="./../js/jquery.min.js"></script>
		<script>
		$('input[id=smfile]').change(function() {
			$('#lefile').val($(this).val());
		});
		$('form').on('lefile', function (e) {
    		e.preventDefault()
		}
		</script>
	  	<title><?php if(!is_numeric($edit)){echo "撰写";} else {echo "编辑";};?></title>
	</head>
</html>
<script>var editnum<?php if(is_numeric($edit)){echo '='.$edit;}?>;</script>
<body style="background-color: <?php echo admin_color();?>">
	<button style="position: absolute; right: 20px;" mdui-tooltip="{content: '帮助'}" mdui-dialog="{target: '#help'}" class="mdui-btn mdui-btn-icon mdui-ripple"><i class="mdui-icon material-icons">help_outline</i></button>
	<div id="help" class="mdui-dialog">
				<div class="mdui-dialog-title"><i class="mdui-icon material-icons">help_outline</i> 帮助</div>
				<div class="mdui-dialog-content">
					<p>这里只简要说明了撰写与编辑页面的作用，详细的请查看 Material Bottle 的 Github Wiki。</p>
					<p>最下方的「(O_o)?」按钮有着很多作用，这取决于你点击它的次数。它一共有 6 个功能，依次排列在 1~6 六个数字上，以下是功能列表。</p>
					<div class="mdui-table-fluid">
						<table class="mdui-table">
							<thead>
								<tr>
									<th>Times</th>
									<th>Functions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>发布文章或页面</td>
								</tr>
								<tr>
									<td>2</td>
									<td>预览</td>
								</tr>
								<tr>
									<td>3</td>
									<td>读取草稿</td>
								</tr>
								<tr>
									<td>4</td>
									<td>保存草稿</td>
								</tr>
								<tr>
									<td>5</td>
									<td>注销登录</td>
								</tr>
								<tr>
									<td>≥6</td>
									<td>无操作</td
								</tr>
							</tbody>
						</table>
					</div>
					<p>其次是文章与页面的创建的区别，取决于填写的是日期还是网页链接。在「日期或页面链接」栏中，填入日期（格式诸如20181007）则为文章，填入页面地址（例如http://example.com/#example）则为页面。</p>
					<p>最后，如果需要备份，请直接下载网站根目录下的「p」目录即可。</p>
				</div>
				<div class="mdui-dialog-actions">
					<button class="mdui-btn mdui-ripple mdui-ripple-blue" mdui-dialog-confirm><span style="color: #2196F3">OK</button>
				</div>
			</div>
	<div class="mdui-container mdui-typo mdui-shadow-2 mdui-hoverable mdui-color-white mdui-img-rounded" style="margin-top: 3%; margin-bottom: 3%;">
		<div style="padding: 4%;">
			<h2 style="display: inline;"><strong><?php if(!is_numeric($edit)){echo "撰写";} else {echo "编辑";};?></strong></h2>
			<div style="float: right;">
				<?php if(is_numeric($edit)){?>
					<button mdui-tooltip="{content: '查看页面'}" onclick="window.location.href='./../#!<?php echo $edit;?>'" target="_self" class="mdui-btn mdui-btn-icon mdui-ripple mdui-shadow-2"><i class="mdui-icon material-icons">find_in_page</i></button>&emsp;<button mdui-tooltip="{content: '新建'}" onclick="window.location.href='edit.php'" target="_self" class="mdui-btn mdui-btn-icon mdui-ripple mdui-shadow-2"><i class="mdui-icon material-icons">description</i></button>&emsp;<button mdui-tooltip="{content: '删除'}" class="mdui-btn mdui-btn-icon mdui-shadow-2 mdui-ripple" onclick="window.location.href='edit.php?=<?php echo $edit;?>&t=del'" target="_self" style="color: #AAA"><i class="mdui-icon material-icons" style="color: black;">delete</i></button>&emsp;
				<?php }; ?>
				<?php if(!is_numeric($edit)){?>
					<button mdui-tooltip="{content: '编辑页面'}" mdui-dialog="{target: '#editinput'}" class="mdui-btn mdui-btn-icon mdui-shadow-2 mdui-ripple"><i class="mdui-icon material-icons">edit</i></button>&emsp;
				<?php }; ?>
				<div class="mdui-dialog mdui-locked" id="editinput">
					<div class="mdui-dialog-title"><i class="mdui-icon material-icons">edit</i>&emsp;编辑页面</div>
					<div class="mdui-dialog-content">
						<form>
							<div class="mdui-textfield mdui-textfield-floating-label">
								<label class="mdui-textfield-label">输入页面 ID 以跳转</label>
								<input id="idvalue" name="idvalue" class="mdui-textfield-input" type="text" onkeydown="if(event.keyCode==13){event.keyCode=0;event.returnValue=false;}">
							</div>
						</form>
					</div>
					<div class="mdui-dialog-actions">
						<button class="mdui-btn mdui-color-white mdui-ripple mdui-ripple-blue"><span style="color: #2196f3" mdui-dialog-close>CLOSE</span></button>
						<button class="mdui-btn mdui-color-blue-accent mdui-ripple mdui-ripple-white mdui-hoverable mdui-shadow-2" onclick="javascript:window.location.href='./edit.php?e=' + document.getElementById('idvalue').value;">GO</button>
					</div>
				</div>
				<button id="lefile" mdui-tooltip="{content: '上传图片'}" onclick="$('input[id=smfile]').click();" class="mdui-btn mdui-shadow-2 mdui-ripple mdui-btn-icon"><i class="mdui-icon material-icons">image</i></button>&emsp;
				<button id="bold" mdui-tooltip="{content: '粗体'}" onclick="document.getElementById('c').value = document.getElementById('c').value + '**粗体文字**';" class="mdui-btn mdui-shadow-2 mdui-ripple mdui-btn-icon"><i class="mdui-icon material-icons">format_bold</i></button>&emsp;
				<button id="em" mdui-tooltip="{content: '斜体'}" onclick="document.getElementById('c').value = document.getElementById('c').value + '*斜体文字*';" class="mdui-btn mdui-shadow-2 mdui-ripple mdui-btn-icon"><i class="mdui-icon material-icons">format_italic</i></button>&emsp;
				<button id="strike" mdui-tooltip="{content: '删除线'}" onclick="document.getElementById('c').value = document.getElementById('c').value + '~~删除文字~~';" class="mdui-btn mdui-shadow-2 mdui-ripple mdui-btn-icon"><i class="mdui-icon material-icons">strikethrough_s</i></button>&emsp;
				<button id="quote" mdui-tooltip="{content: '引用'}" onclick="document.getElementById('c').value = document.getElementById('c').value + '\n\n> 引用文字';" class="mdui-btn mdui-shadow-2 mdui-ripple mdui-btn-icon"><i class="mdui-icon material-icons">format_quote</i></button>&emsp;
				<button id="home" mdui-tooltip="{content: '主页'}" onclick="window.location.href='./../#m'" class="mdui-btn mdui-btn-icon mdui-ripple mdui-shadow-2 mdui-btn-icon"><i class="mdui-icon material-icons">home</i></button>
				</div>
			<br><br><div class="mdui-divider"></div>
			<div class="<?php if(!is_numeric($edit)){ echo "mdui-textfield mdui-textfield-floating-label"; } else { echo "mdui-textfield"; }; ?>">
				<label class="mdui-textfield-label">标题</label>
				<input class="mdui-textfield-input" type='text' class='tagi input' name='t' id='t' value='<?php echo $ptitle;?>' required>
			</div>
			<div class="mdui-textfield">
				<label class="mdui-textfield-label">内容</label>
				<textarea class="mdui-textfield-input" placeholder="写点什么吧..." rows='10' class='area' name='c' id='c' class='input' required><?php echo $pcontent;?></textarea>
			</div>
			<div class="mdui-textfield">
				<label class="mdui-textfield-label">日期或页面链接</label>
				<input class="mdui-textfield-input" type='text' class='tagi input' value='<?php if(!empty($pdat)){echo $pdat;}else{echo $daten;};?>' name='d' id='d' required>
			</div>
			<div class="mdui-textfield">
				<label class="mdui-textfield-label">标签</label>
				<input class="mdui-textfield-input" type='text' class='tagi input' name='a' id='a' value='<?php echo $tag;?>'>
			</div><br>
			<button href="javascript:;" onclick="edit()" class="mdui-btn mdui-color-blue-600 mdui-ripple mdui-shadow-2 mdui-hoverable" id='btn'>(O_o)?</button>
			&emsp;<label class="mdui-checkbox"><input type="checkbox" id='zd' <?php if(checkc()){echo 'checked="true"';}?>/><i class="mdui-checkbox-icon"></i>置顶</label>
			<form action="https://sm.ms/api/upload" id="fileinfo" method="post" enctype="multipart/form-data" style='display:none;'>
				<input type="file" name="smfile" id="smfile" style="display: none;" accept="image/*">
				<input type="hidden" name="ssl" value="true">
				<input type="hidden" name="format" value="json">
			</form>
			<input type="file" id="btn_file" style="display:none">
			<p class='s'></p>
		</div>
	</div>
</body>
<script src='./../js/f.js'></script>