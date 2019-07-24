<title><?php $this->archiveTitle(array(
			'category'  =>  _t('分类 %s 下的文章'),
			'search'	=>  _t('包含关键字 %s 的文章'),
			'tag'	   =>  _t('标签 %s 下的文章'),
			'author'	=>  _t('%s 发布的文章')
		), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php if(is_ajax()){
   echo "";
}else{ ;?>
			</section>
			<footer>
				<div class="tool Topen">
					<div id="Tsidebar" class="Tbutton">
						<span class="Ticon"></span>
					</div>
					<div id="Tcomments" class="Tbutton" onclick="commentlist(); return false;">
						<span class="Ticon"></span><span id="tips">0</span>
					</div>
					<div id="Ttop" class="Tbutton">
						<span class="Ticon"></span>
					</div>
				</div>
			</footer>
		</div>
	</body>
</html>
<?php };?>
