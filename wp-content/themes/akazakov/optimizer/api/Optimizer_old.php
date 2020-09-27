<?
$wd = getcwd();
chdir(__DIR__);
chdir("../");
require_once 'minify/src/Minify.php';
require_once 'minify/src/CSS.php';
require_once 'minify/src/JS.php';
require_once 'minify/src/Exception.php';
require_once 'minify/src/ConverterInterface.php';
require_once 'minify/src/Converter.php';
require_once 'minify/src/Exceptions/BasicException.php';
require_once 'minify/src/Exceptions/FileImportException.php';
require_once 'minify/src/Exceptions/IOException.php';
chdir($wd);

use MatthiasMullie\Minify;

class Optimizer{
	
	public $cacheFolder = "/optimizer/cache/";
	
	public $excludeScriptsSrc = array("admin-bar.min.js", "150828645374452.js");
	public $excludeInlineScriptsKeys = array("customize-support","575382269470771");
	
	public $url_protocols = array("http://", "https://","//");
	public $jsCodeToRemove = array("'use strict';", "// The customizer requires postMessage and CORS (if the site is cross domain)");
	
	public $excludeStylesSrc = array("dashicons.min.css", "admin-bar.min.css");
	public $excludeInlineStylesKeys = array();
	public $cssCodeToRemove = array();
	
	public $excludeImagesFromBase64Converting = array(
													"sprite.png",
													"header.jpg",
													"bg_header_blok.png",
													);
	
	public function minifyCss($code){
		$code = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code);
		$code = str_replace(': ', ':', $code);
		$code = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $code);
		return $code;
	}

   // remove tabs, spaces, newlines, etc.
 //  $html = str_replace(array(PHP_EOL, "\t"), '', $html);

   //remove all spaces
//   $html = preg_replace('|\s\s+|', ' ', $html);


	public function minifyJs($code){
		$minifier = new Minify\JS();
		$minifier->add($code);
		$result = $minifier->minify();
		return $result;
	}
	
	function minify_html($code){
		$code = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code);
		$code = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $code);
		return $code;
	}

	public function get_scripts($files, $resultFile, $addsCode, $minify = 1){
		$pathToResultFile = str_replace(get_site_url()."/", "", $resultFile);
		if(is_array($files)){
			foreach($files as &$path_to_file){
				$path_to_file = str_replace(get_site_url()."/", "", strtok($path_to_file, "?"));
			}
			if(file_exists($pathToResultFile)){
				$resultFileTime = filemtime($pathToResultFile);
				foreach($files as $path_to_file){
					$fileTime = filemtime($path_to_file);
					if($resultFileTime < $fileTime){
						//echo $path_to_file." resultFileTime: ".$resultFileTime." fileTime: ".$fileTime."<br>";
						$RebuildCache = 1; break;	
					}
				}
			}
			else{
				$RebuildCache = 1;
			}
		}
		else if(!file_exists($pathToResultFile) and $addsCode){
			$RebuildCache = 1;
		}
		//$RebuildCache = 1;// Debug !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if($RebuildCache){
			//echo "Do new<br>";
			if(is_array($files)){
				foreach($files as $path_to_file){
					$code.= file_get_contents($path_to_file)."\n";
				}
			}
			$url_parts = explode("/", $pathToResultFile);
			array_pop($url_parts);
			$dir = implode("/", $url_parts);
			if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			//echo "addsCode: ".$addsCode;
			$code = str_replace($this->jsCodeToRemove, "",$code.$addsCode);
		
			if($minify){
				$code = $this->minifyJs($code);
			}
			file_put_contents($pathToResultFile, $code);
		}
		$scripts_str = '<script defer src="'.$resultFile.'"></script>';
		return $scripts_str;
	}

	public function get_styles($files, $resultFile){
		$pathToResultFile = str_replace(get_site_url()."/", "", $resultFile);
		if(is_array($files)){
			foreach($files as $pf_key=>$path_to_file){
				$files[$pf_key] = str_replace(get_site_url()."/", "", strtok($path_to_file, "?"));
				//echo "path_to_file: ".$path_to_file."<br>";
			}
			if(file_exists($pathToResultFile)){
				$resultFileTime = filemtime($pathToResultFile);
				foreach($files as $path_to_file){
					//echo "path_to_file2: ".$path_to_file."<br>";
					$fileTime = filemtime($path_to_file);
					if($resultFileTime < $fileTime){
						//echo $path_to_file." resultFileTime: ".$resultFileTime." fileTime: ".$fileTime."<br>";
						$RebuildCache = 1; break;	
					}
				}
			}
			else{
				$RebuildCache = 1;
			}
		}
		else if(!file_exists($pathToResultFile) and $addsCode){
			$RebuildCache = 1;
		}
		//$RebuildCache = 1;// Debug !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if($RebuildCache){
			//echo "Do new<br>";
			foreach($files as $path_to_file){
				//echo "path_to_file l: ".$path_to_file."<br>";
				$code.= file_get_contents($path_to_file);
			}
			$url_parts = explode("/", $pathToResultFile);
			array_pop($url_parts);
			//echo "url_parts: <pre>"; print_r($url_parts); echo "</pre>";
			$dir = implode("/", $url_parts);
			//echo "dir: <pre>"; print_r($dir); echo "</pre>";
			if (!file_exists($dir)) {
				mkdir($dir, 0777, true);
			}
			file_put_contents($pathToResultFile, $this->minifyCss($code));
		}
		$result['html'] = '<noscript>';
		//https://developers.google.com/web/tools/lighthouse/audits/preload
		// has browsers support problems https://caniuse.com/#feat=link-rel-preload
		$result['html'].= '<link rel="stylesheet" href="'.$resultFile.'" type="text/css">';
		//$result['html'].= '<link rel="preload" as="style" href="'.$resultFile.'">';
		$result['html'].= '</noscript>';
		$result['stylesJsCode'] = '
			(function( $ ) {
				$(function() {
					$(\'head\').append(\'<link rel="stylesheet" href="'.$resultFile.'"/>\');
				});
			})(jQuery);
		';
		//$(\'head\').append(\'<link rel="preload" as="style" href="'.$resultFile.'"/>\');
		return $result;
	}
	
	public function get_url($url){
		$ch = curl_init($url);
		$agent = 'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)';
		curl_setopt($ch,CURLOPT_USERAGENT,$agent);
		
		//set the header params
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
		$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Keep-Alive: 300";
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$header[] = "Accept-Language: en-us,en;q=0.5";
		$header[] = "Pragma: ";
		//assign to the curl request.
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 0);
		//curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);       
		curl_close($ch);
		return $output;
	}

	public function check_local_url($url){
		$isLocalUrl = true;
		foreach($this->url_protocols as $p){
			if (strpos($url, $p) !== false) {
				//echo "url: ".$url." strpos for: ".$p." ".strpos($url, $p)."<br>";
				$isLocalUrl = false;
			}
		}
		return $isLocalUrl;
	}

	public function find_resources($dom){
		$domain = $this->getWpDomain();
		//search scripts
		foreach($dom->find('script') as $script){
			if(strlen($script->src) > 0){
				foreach($this->excludeScriptsSrc as $exclusion){
					if (strpos($script->src, $exclusion) !== false) {
						//echo "exclusion: ".$exclusion." // ".$script->src."<br>";
						continue 2;	
					}
				}
				if(strpos($script->src, $domain) !== false or $isLocalUrlByProtocol = $this->check_local_url($script->src)){
					if(function_exists("plugins_url") and $isLocalUrlByProtocol){
						$src_array = explode(str_replace(get_site_url(), "", plugins_url()), $script->src);
						array_shift($src_array);
						$script->src = plugins_url().implode("", $src_array);
					}
					$resources['scripts']['local'][] = $script;
					$script->outertext = '';
//					$dom->load($dom->save());
				}
				else{
					$script->defer = "defer";
					$resources['scripts']['remote'][] = $script;
				}
			}
			else{
				$doInline = 1;
				foreach($this->excludeInlineScriptsKeys as $exclusion){
					if (strpos($script->outertext, $exclusion) !== false) {
						//echo "exclusion: ".$exclusion."<br>";
						$script->outertext = str_replace($this->jsCodeToRemove, "",$script->outertext);
						$doInline = 0;
						break;	
					}
				}
				if($doInline){
					$resources['scripts']['inline'][] = $script;
					$script->outertext = '';
				}
			}
		}
		//search css
		foreach($dom->find('link[rel="stylesheet"]') as $style){
			if(strlen($style->href) > 0){
				foreach($this->excludeStylesSrc as $exclusion){
					if (strpos($style->href, $exclusion) !== false) {
						//echo "exclusion: ".$exclusion." // ".$script->src."<br>";
						continue 2;	
					}
				}
				if(strpos($style->href, $domain) !== false or $isLocalUrlByProtocol = $this->check_local_url($style->href)){
					if(function_exists("plugins_url") and $isLocalUrlByProtocol){
						$src_array = explode(str_replace(get_site_url(), "", plugins_url()), $style->href);
						array_shift($src_array);
						$style->href = plugins_url().implode("", $src_array);
					}
					$resources['styles']['local'][] = $style;
					$style->outertext = '';
//					$dom->load($dom->save());
				}
				else{
					$resources['styles']['remote'][] = $style;
				}
			}
			else{
				$doInline = 1;
				foreach($this->excludeInlineStylesKeys as $exclusion){
					if (strpos($style->outertext, $exclusion) !== false) {
						//echo "exclusion: ".$exclusion."<br>";
						$style->outertext = str_replace($this->cssCodeToRemove, "",$style->outertext);
						$doInline = 0;
						break;	
					}
				}
				if($doInline){
					$resources['styles']['inline'][] = $style;
					$style->outertext = '';
				}
			}
		}

		return $resources;
	}

	public function prepare_resources($objects){
		if(is_array($objects)){
			foreach($objects as $object){
				if(strlen($object->src) > 0){
					//echo "src: ".$script->src."<br>";
					$reuslt['src'][] = $object->src;
				}
				if(strlen($object->href) > 0){
					//echo "src: ".$script->src."<br>";
					$reuslt['src'][] = $object->href;
				}
				else{
					//echo "<pre>".$script->innertext."</pre>";
					$reuslt['inline_code'].= $object->innertext."\n";
				}
			}
		}
		if(strlen($reuslt['inline_code'])>0 or is_array($reuslt['src'])){
			return $reuslt;
		}
		else{
			return false;	
		}
	}

	public function check_time($index, $operation){
		if ($GLOBALS['time_start']){
			$time_end = microtime(true);
			$GLOBALS['site_time'][$index] = number_format($time_end-$GLOBALS['time_start'], 3, '.', '');
		}
		else {
			$GLOBALS['time_start'] = microtime(true);
		}
		if($operation == "show"){
			if($GLOBALS['site_time']['all']>site_time_limit OR $GLOBALS['debug_mode'] == 'debug'){
				$site_time_str = "<div class='clr'></div>site_time: <pre>".var_export($GLOBALS['site_time'], true)."</pre><br /><div class='clr'></div>";
//				if (wwn == 'L'){
					echo $site_time_str;
//				}
//				else {
					/*
					$mail_message = "uri: ".trim(base_url, "/").$_SERVER['REQUEST_URI']."<HR><br>";
					$mail_message.= "page_id: ".$GLOBALS['cur_page_array']['page_id']."<HR>".$site_time_str."<br>";
					$mail_title = "Perfomance problem on ".base_url;
					send_mail(array(0=>array(email=>recipient_me, name=>recipient_me)), $mail_title, $mail_message, NULL, NULL, error_email, error_email, "base64", 0);
					*/
//				}
			}
		}
	}
	
	public function getWpDomain(){
		return $domain = str_replace($this->url_protocols, "", get_site_url());
	}

	public function convertImagesToBase64($image){	
		$domain = $this->getWpDomain();
		$image_url_parts = explode("/", $image);
		$imageFileName = array_pop($image_url_parts);
		if(!in_array($imageFileName, $this->excludeImagesFromBase64Converting)){
			//check if image local
			if(strpos($image, $domain) !== false or $isLocalUrlByProtocol = $this->check_local_url($image)){
				//echo "wp_upload_dir(): <pre>"; print_r(wp_upload_dir()); echo "<br>";
				$wp_upload_dir = wp_upload_dir();
				$upload_dir = str_replace(get_site_url()."/", "", $wp_upload_dir['baseurl']);
				//echo "upload_dir: <pre>"; print_r($upload_dir); echo "<br>";
				if(function_exists("wp_upload_dir") and $isLocalUrlByProtocol and strpos($image, $upload_dir) !== false ){
					// image in wp_upload_dir
					$src_array = explode($upload_dir, $image);
					//echo "src_array: <pre>"; print_r($src_array); echo "<br>";
					array_shift($src_array);
					$image = get_site_url()."/".$upload_dir.implode("", $src_array);
					$imageSelector = $image;
				}
				else if($isLocalUrlByProtocol){
					// image in theme folder
					$imageSelector = $image;
					$image = get_template_directory_uri()."/".$image;
				}
			}
			else{
				
			}
			//echo "image: <pre>"; print_r($image); echo "</pre>";

			$iExt = false;
			if(substr($image,-4)==".jpg"){
				$iExt = "jpeg";
			}
			else if(substr($image,-4)==".gif"){
				$iExt = "gif";
			}
			else if(substr($image,-4)==".png"){
				$iExt = "png";
			}
			if($iExt){
				return array(
					'base64Code' => "data:image/".$iExt.";base64,".base64_encode(file_get_contents($image)),
					'imageSelector' => $imageSelector
				 );
			}
			else{
				return false;	
			}
		}
	}

	public function convertHtmlImagesToBase64($dom, $skipImagesSelectrors){
		$this->check_time(__FUNCTION__." start", "check");
		$skipImages = array();	
		foreach($skipImagesSelectrors as $selector){
			$p = 0;
			foreach($dom->find($selector['selector']) as $image){
				$p++;
				if(is_array($selector['positions'])){
					if($image->src and in_array($p,$selector['positions'])){
						$skipImages[] = $image->src;
					}
				}
				else if($image->src){
					$skipImages[] = $image->src;
				}
			}
		}
		
		//echo "skipImages: <pre>"; print_r($skipImages); echo "</pre><br>";
		
		foreach($dom->find("img") as $img_obj){
			$image = $img_obj->src;
			
			if(!in_array($image, $skipImages)){
				//echo "image: ".$image."<br>";
				if( $convertResult = $this->convertImagesToBase64($image) ){
					$img_obj->src = $convertResult['base64Code'];
				}
			}			
		}
		$this->check_time(__FUNCTION__." end", "check");
		return $dom;
	}

	
/*
	$imageFolders = array(
				array('path'=>"images"), 
				array('path'=>"wp-content\/uploads", 'skipFirstImages'=>1),
	);
*/
	//skipFirstImages - count of first images
	public function convertCssImagesToBase64($code, $imageFolders){
		$this->check_time(__FUNCTION__." start", "check");
	
		foreach($imageFolders as $folder){
			preg_match_all('/'.$folder['path'].'\/[-\w\/\.]*/uie', $code, $matches);
			foreach($matches[0] as $image){
				if($folder['skipFirstImages'] <= 0){
					if( $convertResult = $this->convertImagesToBase64($image) ){
						$code = str_replace($convertResult['imageSelector'], $convertResult['base64Code'], $code);
					}
				}
				else{
					$folder['skipFirstImages']--;	
				}
			}
			//echo "matches: (".$folder['path'].") <pre>"; print_r($matches); echo "</pre>";
		}
		//$html = preg_replace('/images\/[-\w\/\.]*/ie','"data:image/".((substr("\\0",-4)==".png")?"png":"gif").";base64,".base64_encode(file_get_contents("'.get_template_directory_uri().'/\\0"))',$html);
		$this->check_time(__FUNCTION__." end", "check");
		return $code;
	}

	public function makeCacheFileName(){
		$domain = $this->getWpDomain();
		$pagePath = str_replace($domain."/", "", $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$cacheFileName = str_replace("/","_",$pagePath);
		if($cacheFileName == ''){
			$cacheFileName = "home";	
		}
		return $cacheFileName;
	}

	public function makePathToCacheFile(){
		$cacheFileName = $this->makeCacheFileName();
		$pathToCacheFile = str_replace(get_site_url()."/", "", get_template_directory_uri()).$this->cacheFolder.$cacheFileName;
		return $pathToCacheFile;

	}
	
	public function getCachedPage(){
		$pathToCacheFile = $this->makePathToCacheFile();
		if(file_exists($pathToCacheFile)){
			return file_get_contents($pathToCacheFile);
		}
		else{
			return false;	
		}
	}
	
	public function saveCachedPage($code){
		$pathToCacheFile = $this->makePathToCacheFile();
		file_put_contents($pathToCacheFile, $code);
	}
	
}
?>