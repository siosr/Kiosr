![QQ20190517-3.jpg][1]

> **新**的文字主题

参考的单页：Minimal GitHub：https://github.com/pages-themes/minimal

文章列表/文章页(几乎完全抄袭)：Mayx https://mabbs.github.io/

~~因为没有征求到作者的同意,所以主题暂时自测使用(其实微信好友都还没有通过...)~~

已经同意了

主题支持：
 - 全站PJAX(大部分拖慢速度都改为异步加载)
 - 评论AJAX
 - 搜索AJAX
 - 实时搜索结果
 - 图片缓加载
 - 滑动式手机端菜单(凑数
 - 顶部向下滑动滑出搜索框
 - 评论列表异步加载
 - 文章的md版本(有能力可以拓展更多功能


主题压缩JS、CSS后,不足40KB.不依赖JQ,不依赖前端框架,不引用外部JS库

应该是Typecho里最小的PJAX主题了.=w=

###0x01.使用主题前需要设置：###

1.后台->设置->评论->`启用分页`并将`第一页`作为默认显示。
2.后台->设置->评论->将 `较新的` 评论显示在前面。
3.后台->设置->评论->评论提交->将 `开启反垃圾保护` 关闭。
4.后台->设置->永久链接->使用`地址重写`功能。
5.后台->设置->永久链接->自定义文章路径->个性化定义->`/{cid}.html`。
6.后台->设置->永久链接->自定义文章路径->分类路径->`/{slug}/`。

###0x02.本站的主题设置->导航：###

    <p>さくらこうじ さいか</p>
    <ul class="menu">
         <li><a href="https://moe.sb/">主页<strong>HOME</strong></a></li>
         <li><a href="https://moe.sb/about.sb">关于<strong>ABOUT</strong></a></li>
         <li><a href="https://moe.sb/60.sb">友链<strong>LINKS</strong></a></li>
         <li><a href="https://moe.sb/donate.sb">赞助<strong>DONAT</strong></a></li>
         <li><a href="https://moe.sb/59.sb">主题<strong>THEME</strong></a></li>
         <li><a href="https://moe.sb/diary.sb">日志<strong>DIARY</strong></a></li>
    </ul>





  [1]: https://moe.sb/usr/uploads/2019/05/1463344748.jpg
