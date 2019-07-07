<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
	$commentClass = '';
	if ($comments->authorId) {
		if ($comments->authorId == $comments->ownerId) {
			$commentClass .= ' comment-by-author';
		} else {
			$commentClass .= ' comment-by-user';
		}
	}

	$commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="<?php $comments->theId(); ?>" class=" <?php $comments->theId(); ?> comment-body<?php
if ($comments->levels > 0) {
	echo ' comment-child';
	$comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
	echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
<div class="commentator-comment">
<div class="name">
	<p>
		<span class="commentator-name"><strong class="author_name"><?php $comments->author(); ?></strong><?php getCommentAt($comments->coid); ?></span>
		<span class="comment-time"><?php echo timesince($comments->created); ?></span><span class="comment-reply"><a class="i reply" onclick="return TypechoComment.reply('comment-<?php $comments->coid();?>', <?php $comments->coid();?>, '@<?php echo $comments->author; ?>','<?php $comments->permalink(); ?>');" href="javascript:void(0)" rel="nofollow" data-theid="comment-<?php $comments->coid();?>"></a></span>
	</p>
</div>
	<div class="comment-chat" data-link="<?php $comments->permalink(); ?>">
		<div class="comment-comment">
			<?php $comments->content();?>
		</div>
	</div>
</div>
	<?php if ($comments->children) {?>
	<div class="comment-children">
		<?php $comments->threadedComments($options); ?>
	</div>
	<?php }?>
</li>
<?php } ?>
<div id="comments">
  <span id="hf"><?php echo $this->respondId?></span>
	<?php $this->comments()->to($comments); ?>
	<?php if($this->allow('comment')): ?>
	<p class="time"><?php $this->commentsNum(_t('0'), _t('1'), _t('%d')); ?></p>
	<div id="<?php $this->respondId(); ?>" class="respond">
		<div class="cancel-comment-reply" style="display:none"><span class="reply-name"></span><a href="javascript:void(0)" id="cancel-comment-reply-link" rel="nofollow" onclick="return TypechoComment.cancelReply();" nohover>×</a></div>
		<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
				<textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
				<div class="comment-input">
			<?php if($this->user->hasLogin()): ?>
			<p class="anu"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> | <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
			<?php else: ?>
					<input type="text" name="author" id="author" class="text" placeholder="Name *" value="<?php $this->remember('author'); ?>" required />
					<label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>></label>
					<input type="email" name="mail" id="mail" class="text" placeholder="Mail *" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
					<label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>></label>
					<input type="url" name="url" id="url" class="text" placeholder="Url" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
			<?php endif; ?>
					<button type="submit" id="submit">发射</button><input type="hidden" name="receiveMail" id="receiveMail" value="yes" />
				</div>
		</form>
	</div><br>
	<?php endif; ?>
  	<?php $comments->listComments(); ?>
  	<?php $comments->pageNav(); ?>
</div>
