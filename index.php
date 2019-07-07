<?php
/**
 * 文字主题
 *
 * @package 拉屎6.1
 * @author 南蛰(Kiosr)
 * @version 6.1
 * @link http://moe.sb
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('h.php');
 ?>
<p class="center"><?php $this->archiveTitle(array(
			'category'  =>  _t('分类 %s 下的文章'),
			'search'	=>  _t('包含关键字 %s 的文章'),
			'tag'	   =>  _t('标签 %s 下的文章'),
			'author'	=>  _t('%s 发布的文章')
		), '', ''); ?></p>
<table>
	<tbody id="box" class="box">
<?php while($this->next()): ?>
		<tr>
			<td>
				<h2><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
              	<div><?php echo $this->category(',',''); ?></div>
				<p>
				<?php $this->date('M d,Y')?>
				</p>
			</td>
		</tr>
<?php $time=$this->created; endwhile; ?>
		<tr class="none">
			<td><i class="time"><?php echo timesince($time);?></i><?php $page=$this->pageLink('','next');?></td>
		</tr>
	</tbody>
</table>
		<div class="loadmore">加载<span id="more"></span>的文章</div>
<?php $this->need('f.php'); ?>
