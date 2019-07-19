<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if(isset($_GET["c"]) && $_GET["c"] == "a"){
	getgetCommentIp($_SERVER["REMOTE_ADDR"],$this->cid);
	$this->need('c.php');
}else{
	if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
	$this->need('h.php'); ?>
<h1 id="post"><?php $this->title() ?></h1>
<p><a><?php $this->date('M d,Y')?></a></p>
<article><?php $this->content(); ?></article>
<p class="tag-a"><i class="i tag"></i><?php $this->tags('', true, 'none'); ?><?php if($this->allow('comment')): ?><a id="response"><i class="i reply"></i><span id="pls"><?php $this->commentsNum(_t('0'), _t('1'), _t('%d')); ?></span>&nbsp;</a><?php endif; ?></p>
<?php $this->need('f.php');} ?>
