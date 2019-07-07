![QQ20190517-3.jpg][1]

> **新**的文字主题

预览地址：https://moe.sb

参考的单页：Minimal GitHub：https://github.com/pages-themes/minimal

文章列表/文章页(几乎完全抄袭)：Mayx https://mabbs.github.io/

完全抄袭的Tip：Typecho-Theme-Aria https://eriri.ink/archives/Typecho-Theme-Aria.html

主题支持：
 - 全站PJAX(大部分拖慢速度都改为异步加载)
 - 评论AJAX
 - 搜索AJAX
 - 实时搜索结果
 - 图片缓加载
 - 滑动式手机端菜单(凑数(左划右划
 -~~顶部向下滑动滑出搜索框~~ 太鸡肋删除了
 - 评论列表异步加载
 - 文章的md版本(有能力可以拓展更多功能
 - 前端缓存(二次页面文章请求不在是真实请求,而是返回缓存
 - 可部分自定义的分类目录

主题压缩JS、CSS后,~~不足40KB~~已经接近45kb.不依赖JQ,不依赖前端框架,不引用外部JS库

~~应该是Typecho里最小的PJAX主题了.=w=~~ 已经不是了,最初始的pjax已经优化到js只有8kb,添加些许功能后涨到15kb

###0x01.使用主题前需要设置：###

1.后台->设置->评论->`启用分页`并将`第一页`作为默认显示。
2.后台->设置->评论->将 `较新的` 评论显示在前面。
3.后台->设置->评论->评论提交->将 `开启反垃圾保护` 关闭。
4.后台->设置->永久链接->使用`地址重写`功能。
5.后台->设置->永久链接->自定义文章路径->个性化定义->`/{cid}.html`。
6.后台->设置->永久链接->自定义文章路径->分类路径->`/{slug}/`。

###0x02.本站的主题设置->导航：###

    <ul class="menu">
     <li><a href="https://moe.sb/">主页<strong>HOME</strong></a></li>
     <li><a href="https://moe.sb/about.sb">关于<strong>ABOUT</strong></a></li>
     <li><a href="https://moe.sb/60.sb">友链<strong>LINKS</strong></a></li>
     <li><a href="https://moe.sb/donate.sb">赞助<strong>DONAT</strong></a></li>
     <li><a href="https://moe.sb/153.sb">留言<strong>BBS</strong></a></li>
     <li><a href="https://moe.sb/diary.sb">日志<strong>DIARY</strong></a></li>
     <li><a id="s">搜索<strong>SEARCH</strong></a></li>
    </ul>

###0x03.本站的主题设置->目录：###
`2，<a href="https://moe.sb/mofa/">魔法</a>；`

`分类id，<a>任意的分类名称<a>；`（逗号,分号均为中文字符,可填写多个分类,匹配分类id下所有子分类
 
 如：
 `分类id，<a>任意的分类名称<a>；分类id，<a>任意的分类名称<a>；分类id，<a>任意的分类名称<a>；···`

  [1]: https://moe.sb/usr/uploads/2019/05/1463344748.jpg
