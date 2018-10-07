<?php 
/**********    个人设置    **********/
// 网站的名称，显示在网站主页的标题位置。
$blog['name']='Material Bottle';
// 网站的副标题，也就是描述，显示在网站主页的标题下方位置。
$blog['intro']='OBottle 的质感设计分支版本';
// 每一页展示文章的最高数量，超出该数量的文章将会分到下一页。
$blog['frontposts']=1;

/**********    网站设置    **********/
// 网站的网址，结尾需要带上斜杠“/”。
$blog['host']='http://localhost/';
// 网站的关键词，用”,“分开，不空格，用来给予搜索引擎（如百度）优化 SEO。
// 精辟且符合网站主题的关键词可以使你的网站排名变得更加靠前。
$blog['keyword']='SomeBottle,Material,Blog';
// 网站的介绍，同关键词，也是提交给搜索引擎优化 SEO 的。
$blog['descript']='Material Bottle.';
// 缓存时间，单位是秒s。
$blog['cachetime']=120;
/**********    外观    **********/
// 主页的背景图片名称，必须带有后缀名，且必须位于根目录的 img 目录下。
$blog['background']='background-default.jpg';
// 底部版权信息（©️ 2018 XXX）的文字颜色，如果你的背景比较亮，就设置成黑色，如果你的背景比较暗，就设置成白色。
// 当然，也可以设置成你喜欢的颜色，这里可以直接使用颜色的英文单词，或者使用以”#“开头的 16 进制颜色代码。
$blog['footer_color']='#ddd';
// 管理后台的背景颜色（设置背景会在未来添加），接受的颜色有:
// red, orange, yellow, green, cyan, blue, purple, pink, teal.
$blog['adminUI_color']='blue';

/**********    菜单    **********/
// 是否启用菜单，是 true 则启用，是 false 则不启用。默认为 true，留空为 false。
$blog['drawer_enabled']='close';
// 设置菜单的位置，接受左和右，即 left 和 right。
$blog['drawer_position']='left';
// 管理菜单的开关方式，目前有两种:
// open 默认打开，close 默认关闭。
$blog['drawer_show']='close';
// 设置菜单的标题，显示在菜单的最上方。
$blog['drawer_title']='MDBottle';
?>
