<?php if(is_ajax()){
	 echo "";
}else{ ;?>
<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script>var $caches="<?php echo themeurl('/caches/cache.json')?>",js={css:function(a){var b,c;if(!a||0===a.length)throw new Error('argument "path" is required !');b=document.getElementsByTagName("head")[0],c=document.createElement("link"),c.href=a,c.rel="stylesheet",c.type="text/css",b.appendChild(c)},js:function(a){var b,c;if(!a||0===a.length)throw new Error('argument "path" is required !');b=document.getElementsByTagName("head")[0],c=document.createElement("script"),c.src=a,c.type="text/javascript",b.appendChild(c)}};js.css("<?php echo themeurl('/main.css')?>?v=61"),js.js("<?php echo themeurl('/main.js')?>?v=57");</script>
	</head>
	<body>
		<div id="wrap">
			<div id="backdrop"></div>
			<header id="bar" class="hidden">
				<h1><a nohover href="<?php $this->options->siteUrl(); ?>"><?php $this->options->t(); ?><small><?php $this->options->s(); ?></small></a></h1>
				<img src="<?php echo themeurl('/1.jpg')?>" data-src="<?php $this->options->logo() ?>" >
				<?php $this->options->dh() ?>
			</header>
			<div id="toggle"><span></span><span></span><span></span></div>
				<form id="search-form" method="post" action="./" role="search">
					<input id="search-input" type="text" name="s" class="ins-search-input" placeholder="想要查找什么...">
				</form>
			<section id="search"></section><a id="Ty" href="#"></a>
			<section id="main">
<?php };?>
