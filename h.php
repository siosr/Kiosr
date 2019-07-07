<?php if(is_ajax()){
	 echo "";
}else{ ;?>
<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="<?php echo themeurl('/main.css')?>?v=183" rel="stylesheet" type="text/css">
	<script>var $caches="<?php echo themeurl('/caches/cache.json')?>";</script>
	<script src="<?php echo themeurl('/main.js')?>?v=164"></script>
	</head>
	<body>
		<div id="wrap">
			<div id="backdrop"></div>
			<header id="bar" class="hidden">
				<h1><a nohover href="<?php $this->options->siteUrl(); ?>"><?php $this->options->t(); ?><small><?php $this->options->s(); ?></small></a></h1>
				<?php $this->options->dh() ?>
				<div id="nav" class="menu"><?php getExplode($this->options->fl);?></div>
			</header>
			<section id="search">
				<form id="search-form" method="post" action="./" role="search">
					<input id="search-input" type="text" name="s" class="ins-search-input" placeholder="想要查找什么...">
					<b id="search-close">×</b>
				</form>
				<div id="search-result"></div>
			</section><a id="Ty" href="#"></a>
			<section id="main">
<?php };?>
