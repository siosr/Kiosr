<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if(isset($_GET["c"]) && $_GET["c"] == "a"){
	$this->need('c.php');
}else{
	if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
	$this->need('h.php'); ?>
<small><?php echo $this->date('d M Y').' 字数统计:'.art_count($this->cid).' Hits:'.get_post_view($this) ?></small>
<h1 id="post"><?php $this->title() ?></h1>
<p class="view"><a href="<?php $this->author->permalink(); ?>"><i class="i user"></i><?php $this->author(); ?></a> | <a href="<?php echo $this->options->siteUrl().$this->cid ?>.md" target="_blank"><i class="i md" ></i>Markdown</a></p>
<article><?php $this->content(); ?></article>
<p><i class="i tag"></i><?php $this->tags('', true, 'none'); ?></p>
<?php $this->thePrev('上一篇 : %s',''); ?><br>
<?php $this->theNext('下一篇 : %s',''); ?>
<?php $this->need('f.php');} ?>
