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
						<span class="Ticon"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30"><path d="M25.095 8.003H4.905a1.437 1.437 0 0 0 0 2.874h20.19a1.437 1.437 0 0 0 0-2.874zM16.927 19.122H4.905a1.437 1.437 0 0 0 0 2.874h12.022a1.437 1.437 0 0 0 0-2.874z"></path></svg></span>
					</div>
					<div id="Tclose" class="Tbutton close">
						<span class="Ticon"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30"><path d="M23.563 21.676L16.887 15l6.676-6.676a1.334 1.334 0 0 0-1.887-1.887L15 13.113 8.324 6.438a1.334 1.334 0 0 0-1.887 1.887L13.113 15l-6.676 6.676a1.334 1.334 0 0 0 1.887 1.887L15 16.887l6.676 6.676a1.334 1.334 0 0 0 1.887-1.887z"></path></svg></span>
					</div>
					<div id="Tcomments" class="Tbutton" onclick="commentlist(); return false;">
						<span class="Ticon"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30"><path d="M14.954 2.667C8.179 2.667 2.667 8.199 2.667 15c0 2.189.568 4.324 1.643 6.188l-1.535 5.201a.673.673 0 0 0 .836.835l5.201-1.534a12.273 12.273 0 0 0 6.142 1.643c6.826 0 12.38-5.533 12.38-12.333-.001-6.801-5.554-12.333-12.38-12.333zM6.872 20.84l-.289-.454A9.965 9.965 0 0 1 5.026 15c0-5.5 4.454-9.974 9.928-9.974C20.48 5.026 24.975 9.5 24.975 15s-4.495 9.974-10.021 9.974a9.888 9.888 0 0 1-5.34-1.557l-.453-.29-3.246.958.957-3.245z"></path></svg></span><span id="tips">0</span>
					</div>
					<div id="Ttop" class="Tbutton">
						<span class="Ticon"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30"><path d="M6.378 16.627l7.191-7.191v14.412c0 .728.592 1.32 1.32 1.32s1.32-.592 1.32-1.32V9.217l7.412 7.411c.497.498 1.37.498 1.867 0a1.321 1.321 0 0 0 0-1.867l-9.555-9.555c-.497-.498-1.37-.498-1.867 0L4.511 14.76a1.321 1.321 0 0 0 0 1.867c.497.498 1.37.498 1.867 0z"></path></svg></span>
					</div>
				</div>
				<p><small>Typecho @ Kiosr</small></p>
			</footer>
		</div>
	</body>
</html>
<?php };?>
