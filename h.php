<?php if(is_ajax()){
	 echo "";
}else{ ;?>
<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>var $caches="<?php echo themeurl('/caches/cache.json')?>";</script>
	<link async href="<?php echo themeurl('/main.css')?>?v=273" rel="stylesheet" type="text/css">
	<script async src="<?php echo themeurl('/main.js')?>?v=325"></script>
	</head>
	<body>
		<div id="wrap">
			<div id="backdrop"></div>
			<div id="Tclose" class="Tbutton close">
				<span class="Ticon"></span>
			</div>
			<header id="bar" class="hidden">
				<h1><a nohover href="<?php $this->options->siteUrl(); ?>"><?php $this->options->t(); ?><small><?php $this->options->s(); ?></small></a></h1>
				<div class="nav menu"><?php m($this->options->dh);?><a id="s">搜索</a></div>
			</header>
			<section id="search">
				<form id="search-form" method="post" action="./" role="search">
					<input id="search-input" type="text" name="s" class="ins-search-input" placeholder="想要查找什么...">
					<b id="search-close"></b>
				</form>
				<div id="search-result"></div>
			</section><a id="Ty" href="#"></a>
			<section id="main">
<?php };?>
