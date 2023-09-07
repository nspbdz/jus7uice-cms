<?php 
	/*
		Created by : Fredy (jus7uicec@gmail.com)
		Description : Digunakan sebagai fungsi (non class) tambahan untuk laravel
	*/
	
	# untuk membuat slug URL
	function create_slug($input) {
		$input = filter_var($input, FILTER_SANITIZE_STRING);
		$input = trim($input);
		$input = str_replace("-", "", $input); 
		$input = preg_replace("/ /","-",$input);
		$input = preg_replace("/[^+A-Za-z0-9\.\-]/", "", $input); 
		$input = str_replace("--", "-", $input); 
		$input = str_replace(".", "", $input); 
		return strtolower($input);	}

	# keperluan debug nilai variable
	function debug($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';	}

	# untuk memotong string dalam panjang karakter tertentu
	function truncate ($text, $length = 200, $ending = "...") {
		if (strlen($text) <= $length) { return $text; } else { 
			$truncate = substr($text, 0, $length - strlen($ending)).$ending; 
			return $truncate;
		} 	}
	
	# alternatif untuk "mysql_real_escape_string" , htmlentities dan htmlspecialchars
	function str_encode($string,$escape=""){
		if($escape!="") $string = strip_tags($string);
		$content = str_replace("'","&#039;",$string);
		$content = str_replace('"','&quot;',$content);
		$content = htmlspecialchars($content,ENT_QUOTES);
		return $content;	}
	
	# alternatif untuk "html_entity_decode" dan "htmlspecialchars_decode"
	function str_decode($string,$escape=""){
		$content = htmlspecialchars_decode($string,ENT_QUOTES);
		$content = str_replace("&#039;","'",$content);
		$content = str_replace('&quot;','"',$content);
		if($escape!="") $content = strip_tags($content);
		return $content;	}
	
	# membuat inisial. cth: Mac Donald = MD
	function make_initials($name="") {
		
		$words = explode(' ', $name);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        }
		
		# if in single word
		
		preg_match_all('#([A-Z]+)#', $name, $capitals);
        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }
        return strtoupper(substr($name, 0, 2));
	}
	
	# membuat string
	function make_randstr($length=6) {
		$chars = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz";
		srand((double)microtime()*rand(1,9)*1000000); $i = 0; $pass = '';
		while ($i < $length) { $num = rand() % strlen($chars); $tmp = substr($chars, $num, 1); $pass = $pass . $tmp; $i++; }
		return $pass;	}
		
	# membuat angka random
	function make_randnum($length=6) {
		$chars = "0123456789";
		srand((double)microtime()*rand(1,9)*1000000); $i = 0; $pass = '';
		while ($i < $length) { $num = rand() % strlen($chars); $tmp = substr($chars, $num, 1); $pass = $pass . $tmp; $i++; }
		return $pass;	}
	
	# membuat huruf-angka random
	function make_randchar($length=6) {
		$chars = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789";
		srand((double)microtime()*rand(1,9)*1000000); $i = 0; $pass = '';
		while ($i < $length) { $num = rand() % strlen($chars); $tmp = substr($chars, $num, 1); $pass = $pass . $tmp; $i++; }
		return $pass;	}	
	function make_password($length=6) {
		$chars = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz123456789!@#$%&";
		srand((double)microtime()*rand(1,9)*1000000); $i = 0; $pass = '';
		while ($i < $length) { $num = rand() % strlen($chars); $tmp = substr($chars, $num, 1); $pass = $pass . $tmp; $i++; }
		return $pass;	}	
	
	# membuat kode referral
	function make_referral_code($length=8) {		
		$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$res = "";
		for ($i = 0; $i < $length; $i++) {
			 $res .= $chars[mt_rand(0, strlen($chars)-1)];
		}
		return $res;	
	}	
	
	# get IP
	function get_ip() {
	   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //check ip from share internet
		 $ip=$_SERVER['HTTP_CLIENT_IP'];
	   } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  //to check ip is pass from proxy
		 $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	   } else {
		 $ip=$_SERVER['REMOTE_ADDR'];
	   }
	   return $ip;	}
	
	
	# menyembunyikan alamat email ketika halaman web di View Source
	function hide_mail($email) { 
		$character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz'; $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999); for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])]; $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";'; $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));'; $script.= 'document.getElementById("'.$id.'").innerHTML="<span><a href=\"mailto:"+d+"?subject=Kontak CS Kartu Merah Putih\">"+d+"</a></span>"'; $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>'; return '<span id="'.$id.'">[javascript protected]</span>'.$script; }
	
	# menyembunyikan suatu string ketika halaman web di View Source
	function hide_this($string) { 
		$character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz'; $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999); for ($i=0;$i<strlen($string);$i+=1) $cipher_text.= $key[strpos($character_set,$string[$i])]; $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";'; $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));'; $script.= 'document.getElementById("'.$id.'").innerHTML="<span>"+d+"</span>"'; $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>'; return '<span id="'.$id.'">[javascript protected]</span>'.$script; }
	
	function get_protocol(){
		if(isset($_SERVER['HTTPS'])){$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";}
		else{$protocol = 'http'; }
		return $protocol;
	}
	
	# mendapatkan jenis extensi file
	function get_extension($str){ 
		$array = explode(".",$str);		
		return end($array);
	}
	
	# replacer
	function alfanumeric_only($string) { return $result = preg_replace("/[^a-zA-Z0-9]+/", "", $string); }	
	function numeric_only($string) { return $result = preg_replace("/[^0-9]+/", "", $string); }	
	function password_allowchar($str) { return preg_match('/^[A-Za-z0-9_~\-!@#\$%\^&*\(\)]+$/',$str);	}	
	function remove_space($string) { return $string = preg_replace('/\s+/', '', $string);	}
	function remove_link($string) { return $result = preg_replace("/<\\/?a(\\s+.*?>|>)/","",$string);	}	
	
	function clean_name($string) {
		$string = trim(preg_replace("/[^A-Za-z ]/", "", $string));
		return $string;
	}
	
	function clean_phone($string) {
		$string = trim(preg_replace("/[^0-9]/", "", $string));
		$area_code = "62";
		if(substr($string,0,2)==$area_code){
			$string = str_replace($area_code,'0',$string);
		}
		return $string;
	}

	function clean_phone_int($string) {
		$string = trim(preg_replace("/[^0-9]/", "", $string));
		return $string;
	}

	function clean_string($string) {
		$string = trim(preg_replace("/[[:blank:]]+/", " ", $string));
		$string = trim(preg_replace("/[^A-Za-z0-9 @ \- _ , . ]/", "", $string));
		return $string;
	}

	function clean_number($string) {
		$string = trim(preg_replace('/[^0-9]/', '', $string));
		return $string;
	}
	
	# Clean Amount (IDR)
	function clean_amount_idr($string) {
		$string = trim(preg_replace('/[^0-9.,]/', '', $string));
		$string = str_replace('.','',$string);
		$string = str_replace(',','.',$string);
		return $string;
	}
	
	# render money
	function money($amount, $decimal = 2, $dec_thou_separator = ',.') {
		$dec = empty($dec_thou_separator) ? ',' : substr($dec_thou_separator, 0, 1);
		$thou = empty($dec_thou_separator) ? ',' : substr($dec_thou_separator, 1, 1);
		if(isset($amount) && $amount != 0){
			if(is_double($amount) || is_numeric($amount)) return number_format($amount, $decimal, $dec, $thou);
		}else{
			return number_format(0, $decimal, $dec, $thou);
		}
	}
	
	# mendapatkan nama host dari sebuah URL
	function get_hostname_from_url($url){ preg_match('@^(?:http://)?([^/]+)@i',$url, $matches);return $matches[1];	}		
	
	# membuat masking beberapa bagian dari suatu kata atau kalimat
	function create_masking($string, $mask_chr_count=4, $unmask_chr_from_last=0){ return preg_replace('/.{' . $mask_chr_count . '}(?=.{' . $unmask_chr_from_last . '}$)/', str_repeat('*', $mask_chr_count), $string);}
	
	# masking string mejadi tanda bintang "*"
	function mask_password($password){
		$s=""; $pp = strlen($password); for($i=1;$i<=$pp;$i++) $s .= "*";
		return $s; }	
	
	# masking email address
	function hide_email($email){
		if(strstr($email,'@')){
			$em   = explode("@",$email);
			$name = implode('@',array_slice($em, 0, count($em)-1));			
			$len  = floor(strlen($name)/2);
			return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em); 
		}
		return $email;
	}

  
	
	# untuk timeline - time ago
	function timeago($date='1999-01-01')
	{
		if(is_numeric($date))$ptime = $date; else $ptime = strtotime($date);
		$etime = time() - $ptime;
		if ($etime < 1){return '0 seconds';}
		$a = array( 365 * 24 * 60 * 60  =>  'year',
					 30 * 24 * 60 * 60  =>  'month',
						  24 * 60 * 60  =>  'day',
							   60 * 60  =>  'hour',
									60  =>  'minute',
									 1  =>  'second'
					);
		$a_plural = array( 'year'   => 'years','month'=>'months','day'=>'days','hour'=>'hours','minute'=>'minutes','second'=>'seconds');
		foreach ($a as $secs => $str){
		$d = $etime / $secs;
		if ($d >= 1){$r = round($d);return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
		}}
	}
	

	function isJson($string) {
		json_decode($string);
		return (json_last_error() == JSON_ERROR_NONE);
	}

	function role_menu($restrical_path=[], $path=''){
		if(is_array($restrical_path) && count($restrical_path)){
			if(in_array($path,$restrical_path)){
				return false;
			}
		}
		return true;
	}
	
	/* add URL parameter */
	function update_query_string($url, $array_parameter){
		$link="0";
		// if (filter_var($url, FILTER_VALIDATE_URL)){
			$query = http_build_query($array_parameter);
			/* jika pada url sudah ada query string */
			if(strpos($url, '?')){
				$link = $url.'&'.$query;
			} else {
				$link = $url.'?'.$query;
			}			
		// }
		return $link;
	}
	
	function getAppPath($path){
		$_path = str_replace(base_path(),'',$path);
		$_path = str_replace('\\','',$_path); //debug($$_path);
		$_path = str_replace('//','/',$_path); //debug($$_path);
		$_path = str_replace('/app','app',$_path); //debug($$_path);
		$_path = str_replace('/','\\',$_path); //debug($$_path);
		
		return $_path;
	}
?>