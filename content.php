<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="index.css">

<?php
function getRss() {
  $RssDictionary = [
  "sina" => "http://rss.sina.com.cn/news/marquee/ddt.xml",
  "sohu" => "http://rss.news.sohu.com/rss/yule.xml",
  ];
  $rssSrc = $_GET["src"];
  // print_r($RssDictionary[$rssSrc]);
  return $RssDictionary[$rssSrc];
}
?>
</head>

<body>

<div class="content">
  <!-- <h1><?php echo $_GET["src"]; ?></h1> -->

<?php
include('lastRSS.php');        //载入类

$rssURL = getRss(); //指定RSS源
$rss = new lastRSS;            //实例化
$rss->cache_dir='cache';    //设置缓存目录，要手动建立
$rss->cache_time=3600;    //设置缓存时间。默认为0，即随访问更新缓存；建议设置为3600，一个小时
$rss->default_cp='UTF-8';    //设置字符编码，默认为UTF-8
 $rss->items_limit=20;        //设置输出数量，默认为10
$rss->date_format='U';        //设置时间格式。默认为字符串；U为时间戳，可以用date设置格式
$rss->stripHTML=false;        //设置过滤html脚本。默认为false，即不过滤
$rss->CDATA='content';        //设置处理CDATA信息。默认为nochange。另有strip和content两个选项
$rs=$rss->Get($rssURL);        //处理RSS并获取内容

// print_r($rs);                //输出
// $resultTitle = "<h1><a href=\"".$rs['link']."\">".$rs['title']."</a>"."<a href=\"".$rssURL."\">feed</a></h1>
// <div class=\"desc\">".$rs['description']."</div>\n";
$resultTitle = "<h1><a href=\"".$rs['link']."\">".$rs['title']."</a></h1>
<div class=\"desc\">".$rs['description']."</div>\n";
echo $resultTitle;

// $resultContent = "<ul>";
// foreach ($$rs['item'] as $$rsite) {
//   $resultContent = $resultContent."<li><h2>['".date('m-j', $rsItem[pubDate])."']<a href=\"".$rsItem['link']."\">".$rsItem['title']."</a>".
//   "</h2><div class=\"desc\">".substr($rsItem['description'], 0, 500)."</div></li>";
// }
// $resultContent = $resultContent."</ul>";

echo '<ul>';
foreach($rs['items'] as $rsItem)
{
echo '
<li>
<h2>
['.date('m-j',$rsItem[pubDate]).']
<a href="'.$rsItem['link'].'">'.$rsItem['title'].'</a>
</h2>
<div class="desc">'.substr($rsItem['description'],0,500).'</div>
</li>';
}
echo '</ul>';
?>

  <!-- end .content --></div>
</body>
</html>
