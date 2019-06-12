<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if(isset($_GET["c"]) && $_GET["c"] == "a"){
	$this->need('c.php');
}else{
	if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
	$this->need('h.php'); ?>
<small><?php echo $this->date('d M Y').' 字数统计:'.art_count($this->cid).' Hits:'.get_post_view($this) ?></small>
<h1 id="post"><?php $this->title() ?></h1>
<p class="view">by <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a><a style="float:right"class="link" href="<?php echo $this->options->siteUrl().$this->cid ?>.md" target="_blank">查看本文Markdown版本</a></p>
<article>
	<?php $this->content(); ?>
</article>
<p>tag:<?php $this->tags('', true, 'none'); ?></p>
<?php $this->thePrev('上一篇 : %s',''); ?><br>
<p><?php $this->theNext('下一篇 : %s',''); ?></p>
<?php $this->need('f.php');} ?>
