<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
	$t = new Typecho_Widget_Helper_Form_Element_Text('t', NULL, NULL, _t('标题'), _t('Kiosr'));
	$form->addInput($t);

	$s = new Typecho_Widget_Helper_Form_Element_Text('s', NULL, NULL, _t('副标题'), _t('魔法'));
	$form->addInput($s);

    $dh = new Typecho_Widget_Helper_Form_Element_Textarea('dh', NULL, NULL, _t('导航'), _t('导航'));
    $form->addInput($dh);

	$fl = new Typecho_Widget_Helper_Form_Element_Text('fl', NULL, NULL, _t('目录'), _t('输入目录ID及需要显示的名称 如 1,默认分类;'));
	$form->addInput($fl);
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
			$href   = ' <a class="at" uid="'.$parent.'" onclick="scrollt(\'comment-'.$parent.'\'); return false;">@'.$author.'</a>';
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
function themeInit($archive){
	$db = Typecho_Db::get();
	if ($archive->is('single')){$archive->content = url($archive->content);};
 	Helper::options()->commentsMaxNestingLevels = 30; /*评论30层*/
	Helper::options()->commentsAntiSpam = false; 
	$parser = new HyperDown();
    if ($archive->is('archive', 404)){
    	$path_info = trim($archive->request->getPathinfo(), '/');
		if(strpos($path_info,".md") > 0){
			$right = strpos($path_info, '.');
			$id=substr($path_info, 0, $right);
			$t = $db->fetchRow($db->select('title','text')->from('table.contents')->where('cid = ?', $id));
			header( "HTTP/1.1 200 OK" );
			echo '<h3>'.$t['title'].'</h3>'.'<pre style="word-wrap: break-word; white-space: pre-wrap;">'.htmlentities(strtr($t['text'],array("<!--markdown-->" => ''))).'</pre>';
		exit;
		}
		if($archive->request->isPost()){
			if($path_info=="kiosr.sb"){
				$text = $_POST['text'];//新的评论内容
				$coid = $_POST['coid'];//评论id
				$cid = $_POST['cid'];//文章id
				$created=$db->fetchRow($db->select('created')->from('table.comments')->where('cid = ?', $cid)->where('coid = ?', $coid));//取出评论时间戳
				$timeD = (time()-$created['created']);//接收到请求的时间戳减去评论时间戳
				if( $timeD < 60 &&$timeD > 0 ){//小于60秒
					$update = $db->update('table.comments')->rows(array('text'=>$text))->where('cid = ?', $cid)->where('coid = ?', $coid);//执行修改
					$updateRows = $db->query($update);//执行结果
					if($updateRows == "1"){
						$updateRows ='1::text::'.$parser->makeHtml($text);
					}else if($updateRows == "0"){
						$updateRows ='0::text::0';
					}else{
						$updateRows ='2::text::0';
					}
				}else{
					$updateRows = '3::text::草泥马臭傻逼';
				}
              	header( "HTTP/1.1 200 OK" );
				echo $updateRows;//打印执行结果
			}
			exit;
		}
	}
}


function url($content){
  $content = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#','<a$1 href="$2$3"$5 target="_blank">', $content);
  $content = preg_replace('#<img(.*?) src="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#','<div style="max-width:100%;display:inline-block;background:rgb(181, 191, 194) none repeat scroll 0% 0%;border-radius:5px"><img$1 class="ani" data-src="$2$3"></div>', $content);
  return insert_spacing($content);}
function getSubstr($str, $leftStr, $rightStr)
{
	$left = strpos($str, $leftStr);
	$right = strpos($str, $rightStr,$left);
	if($left < 0 or $right < $left) return '';
	return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}

function img(){
	return "data:image/svg+xml,%3Csvg viewBox='0 0 1024 1024' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M811 640V341H213v278l60-56 115 98 226-196 197 175zm85-384v512H128V256h768z' fill='%23999'/%3E%3C/svg%3E";
}
function insert_spacing($str) {
  $str = preg_replace('/([\x{4e00}-\x{9fa5}]+)([A-Za-z0-9_]+)/u', '${1} ${2}', $str);
  $str = preg_replace('/([A-Za-z0-9_]+)([\x{4e00}-\x{9fa5}]+)/u', '${1} ${2}', $str);
  return $str;
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

function getCatList($a,$b) {
	if($a){
		$db = Typecho_Db::get();
		$items = $db->fetchAll($db->select()->from('table.metas')->where('type = ?','category'));
		$list = getTree($items,$a,"");
	    echo "<div>"."<ul><li>".$b.$list."</li></ul></div>";
	}
}
function getTree($data, $id, $i) {
	$html = '';
	foreach($data as $k => $v){
	   if($v['parent'] == $id){
			$html .= "<li><a href=\"".Helper::options()->siteUrl.$v['slug']."\" class=\"item\">".$v['name']."</a>"; 
			$html .= getTree($data, $v['mid'],"");
			$html = $html."</li>";
		}
	}
	return $html ? '<em></em><ul'.$i.'>'.$html.'</ul>' : $html ;
}
function getExplode($str){
	if($str){
		$arr = explode("；",$str);
		foreach($arr as $u){
		    $strarr = explode("，",$u);
		        getCatList($strarr[0],$strarr[1]);
		}
    }
}
if(!file_exists($flag)) {
  touch($flag);
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
  if ( time() - filemtime( $TheFile) > 600){
  $cacheFile->cacheData('cache', $data);
  }; //5分钟300秒，时间可以自己调整
} else {
  $cacheFile->cacheData('cache', $data);
};
}
