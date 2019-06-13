<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
	$logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('logo'), _t('图片链接'));
	$form->addInput($logo);
	$t = new Typecho_Widget_Helper_Form_Element_Text('t', NULL, NULL, _t('标题'), _t('Kiosr'));
	$form->addInput($t);
	$s = new Typecho_Widget_Helper_Form_Element_Text('s', NULL, NULL, _t('副标题'), _t('魔法'));
	$form->addInput($s);
  $dh = new Typecho_Widget_Helper_Form_Element_Textarea('dh', NULL, NULL, _t('导航'), _t('导航'));
  $form->addInput($dh);
}
function getCommentAt($coid){
	$db   = Typecho_Db::get();
	$prow = $db->fetchRow($db->select('parent')
		->from('table.comments')
		->where('coid = ? AND status = ?', $coid, 'approved'));
	$parent = $prow['parent'];
	if ($parent != "0") {
		$arow = $db->fetchRow($db->select('author')
			->from('table.comments')
			->where('coid = ? AND status = ?', $parent, 'approved'));
		$author = $arow['author'];
		if($author){
			$href   = ' 回复 <a class="at" uid="'.$parent.'" onclick="scrollt(\'comment-'.$parent.'\'); return false;">@'.$author.'</a>';
		}else{
			$href   = '<a href="javascript:void(0)">评论审核中···</a>';
		}
		echo $href;
	} else {
		echo "";
	}
}
function themeurl($i){
return Helper::options()->themeUrl.$i;
}
function is_ajax()
{
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        if ('xmlhttprequest' == strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            return true;
        }
    }
    return false;
}
function timesince($older_date,$comment_date = false) {
$chunks = array(
array(86400 , '天'),
array(3600 , '小时'),
array(60 , '分钟'),
array(1 , '秒'),
);
$newer_date = time();
$since = abs($newer_date - $older_date);
for ($i = 0, $j = count($chunks); $i < $j; $i++){
$seconds = $chunks[$i][0];
$name = $chunks[$i][1];
if (($count = floor($since / $seconds)) != 0) break;
}
$output = $count.$name.'前';

return $output;
}
function art_count ($cid){
$db=Typecho_Db::get ();
$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
$text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
$num = mb_strlen($text,'UTF-8');
$time = ceil($num / 300);
return $num.' - 阅读大约需要'.$time.'分钟';
}
function get_post_view($archive) {
	$db = Typecho_Db::get();
	$cid = $archive->cid;
	if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
		$db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
	}
	$exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
	if ($archive->is('single')) {
		$cookie = Typecho_Cookie::get('contents_views');
		$cookie = $cookie ? explode(',', $cookie) : array();
		if (!in_array($cid, $cookie)) {
			$db->query($db->update('table.contents')
				->rows(array('views' => (int)$exist+1))
				->where('cid = ?', $cid));
			$exist = (int)$exist+1;
			array_push($cookie, $cid);
			$cookie = implode(',', $cookie);
			Typecho_Cookie::set('contents_views', $cookie);
		}
	}
	return $exist;
}
function themeInit($archive){
	if ($archive->is('single')){$archive->content = url($archive->content);};
 	Helper::options()->commentsMaxNestingLevels = 30;
	Helper::options()->commentsAntiSpam = false; 
    if ($archive->is('archive', 404)){$path_info = trim($archive->request->getPathinfo(), '/');
	if(strpos($path_info,".md") > 0){
		$right = strpos($path_info, '.');
		$id=substr($path_info, 0, $right);
		$db = Typecho_Db::get();
		$t = $db->fetchRow($db->select('title','text')->from('table.contents')->where('cid = ?', $id));
		header( "HTTP/1.1 200 OK" );
		echo '<h3>'.$t['title'].'</h3>'.'<pre style="word-wrap: break-word; white-space: pre-wrap;">'.htmlentities(strtr($t['text'],array("<!--markdown-->" => ''))).'</pre>';
	exit;
	}}
}
function url($content){
  $content = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#','<a$1 class="link" href="$2$3"$5 target="_blank">', $content);
  $content = preg_replace('#<img(.*?) src="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?) alt="(.*?)"(.*?)>#','<div style="display: inline-block;position:relative"><img$1 src="'.themeurl('/1.jpg').'" data-src="$2$3"$5$7><div></div></div>', $content);
  $content = preg_replace('#<pre>([\s\S]*?)<\/pre>#','<div style="background:#eeeeee;border:1px solid #e5e5e5;border-bottom-width:0;padding:0 5px;">Code</div><pre>$1$2$3</pre>', $content);
  return $content;}
function getSubstr($str, $leftStr, $rightStr)
{
	$left = strpos($str, $leftStr);
	$right = strpos($str, $rightStr,$left);
	if($left < 0 or $right < $left) return '';
	return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}
function getGravatar($i){
if(preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$i)){
	$img = curl_init();
	curl_setopt($img, CURLOPT_URL, "https://ptlogin2.qq.com/getface?appid=0&imgtype=3&uin=".$i."&tdsourcetag=s_pctim_aiomsg");
	curl_setopt($img, CURLOPT_HEADER, 0);
	curl_setopt($img, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($img, CURLOPT_RETURNTRANSFER, 1);
	$img_url = curl_exec($img);
	curl_close($img);
	$img_url_a = getSubstr($img_url,"\":\"","\"})");
	return $img_url_a;
}else{
	$host = 'https://sdn.geekzu.org/';
	$url = '/avatar/';
	$size = '80';
	$rating = Helper::options()->commentsAvatarRating;
	$hash = md5(strtolower($i));
	$avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=monsterid';
	return $avatar;
	}
}
class cacheFile
{
	private $_dir;
	const EXT = '.json';
	public function __construct()
	{
		$this->_dir = dirname(__FILE__).'/caches/';
	}
	public function cacheData($key, $value = '', $path = '')
	{
		$filePath = $this->_dir.$path.$key.self::EXT;
		if ($value !== '') {
			if (is_null($value)) {
				return unlink($filePath);
			}
			$dir = dirname($filePath);
			if (!is_dir($dir)) {
				mkdir($dir, 0777);
			}
			return file_put_contents($filePath, $value);
		}
		if (!is_file($filePath)) {
			return false;
		} else {
			echo $filePath;
			return json_decode(file_get_contents($filePath), true);
		}
	}
}
$TheFile = dirname(__FILE__).'/caches/cache.json';
$cacheFile = new cacheFile();
$vowels = array("[", "{","]","}","<",">","\r\n", "\r", "\n","-","'",'"','`'," ",":",";",'\\',"	");
Typecho_Widget::widget('Widget_Contents_Post_Recent','pageSize=10000')->to($archives);
	while($archives->next()):
	$output .= '{"this":"post","link":"'.$archives->permalink.'","title":"'.$archives->title.'","comments":"'.$archives->commentsNum0.'","text":"'.str_replace($vowels, "",$archives->text).'"},';
	endwhile;
Typecho_Widget::widget('Widget_Contents_Page_List')->to($pages);
	while($pages->next()):
	$output .= '{"this":"page","link":"'.$pages->permalink.'","title":"'.$pages->title.'","comments":"'.$pages->commentsNum0.'","text":"'.str_replace($vowels, "",$pages->text).'"},';
	endwhile;
Typecho_Widget::widget('Widget_Metas_Tag_Cloud','ignoreZeroCount=1&limit=10000')->to($tags); 
	while ($tags->next()):
	$output .= '{"this":"tag","link":"'.$tags->permalink.'","title":"'.$tags->name.'","comments":"0","text":"'.str_replace($vowels, "",$tags->description).'"},';
	endwhile;
Typecho_Widget::widget('Widget_Metas_Category_List')->to($category); 
	while ($category->next()):
	$output .= '{"this":"category","link":"'.$category->permalink.'","title":"'.$category->name.'","comments":"0","text":"'.str_replace($vowels, "",$category->description).'"},';
	endwhile;
	$output = substr($output,0,strlen($output)-1);
$data = '['.$output.']';
if (file_exists($TheFile)) {
  if ( time() - filemtime( $TheFile) > 30){
  $cacheFile->cacheData('cache', $data);
  };
} else {
  $cacheFile->cacheData('cache', $data);
};
