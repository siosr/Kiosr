<?php if(is_ajax()){
	 echo "";
}else{ ;?>
<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>var $caches="<?php echo themeurl('/caches/cache.json')?>";
	    var smile= new Array("ฅ(๑˙˙๑)ฅ","(╯&gt;д&lt;)╯","(๑• ̀д•́ )✧","( •́ㅿ•̀ )","(๑￫ܫ￩)","_:(´ཀ&#x60;」 ∠):_","( ´◔ ‸◔&#x27;)","٩(ˊᗜˋ*)و","(=・ω・=)","(｀・ω・´)","(〜￣△￣)〜","(･∀･)","(°∀°)ﾉ","୧(๑•̀⌄•́๑)૭","( ´_ゝ｀)","(&quot;▔□▔)/","(ﾟдﾟ;)","（/TДT)/","(｡･ω･｡)","(ノ≧∇≦)ノ","(´･_･&#x60;)","Σ(っ °Д °;)っ","（￣へ￣）","ヽ(&#x60;Д´)ﾉ","(╯°口°)╯(┴—┴","_(:3」∠)_","٩͡[๏̯͡๏]۶","٩(×̯×)۶","(๑•̀ㅂ•́)و✧")
;</script>
	<link async href="<?php echo themeurl('/main.css')?>?v=239" rel="stylesheet" type="text/css">
	<script async src="<?php echo themeurl('/main.js')?>?v=215"></script>
	</head>
	<body>
		<div id="wrap">
			<div id="backdrop"></div>
			<div id="Tclose" class="Tbutton close">
				<span class="Ticon"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30"><path d="M23.563 21.676L16.887 15l6.676-6.676a1.334 1.334 0 0 0-1.887-1.887L15 13.113 8.324 6.438a1.334 1.334 0 0 0-1.887 1.887L13.113 15l-6.676 6.676a1.334 1.334 0 0 0 1.887 1.887L15 16.887l6.676 6.676a1.334 1.334 0 0 0 1.887-1.887z"></path></svg></span>
			</div>
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
