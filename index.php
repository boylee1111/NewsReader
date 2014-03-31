<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!-- TemplateBeginEditable name="doctitle" -->
<link rel="stylesheet" type="text/css" href="index.css">

<title>News Reader</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>

<div class="container">
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php?src=sina">新闻要闻</a></li>
      <li><a href="index.php?src=sohu">娱乐新闻</a></li>
      <li>
      	<select name="province" onchange="self.location.href=options[selectedIndex].value">
      		<option value="index.php">请选择省份</option>
      		<option value="index.php?src=北京">北京</option>
      		<option value="index.php?src=上海">上海</option>
      	</select>
      </li>
   </div>
  <frame src=<?php include('content.php')?>
  <!-- end .container --></div>
</body>
</html>
