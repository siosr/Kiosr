<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('h.php'); ?>
<h1><?php $this->title() ?></h1>
<article>
	<?php $this->content(); ?>
</article>
<?php $this->need('f.php'); ?>
