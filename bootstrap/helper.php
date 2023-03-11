<?php

use Devinow\Blade\Blade;

function view($path, array $data = []){
    $view = __DIR__.'/../resources/views';
    $cache = __DIR__.'/../storage/cache';

    $blade = new Blade($view, $cache);
    echo $blade->view()->make($path, $data)->render();
}

function make($filename, $data){
    extract($data);

    ob_start();

    include __DIR__.'/../resources/mails/'.$filename.'.php';

    $content=ob_get_contents();

    ob_end_clean();

    return $content;
}

function slug($value){
    $value=preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '',mb_strtolower($value));

    $value=preg_replace('![^'.preg_quote('_').'\s]+!u', '',$value);

    return trim($value, '-');
}

function redirect($go) {
    if(not_empty($go) && $go != 10) {
        $r=header('Location: '.$go);
    }else{
        $r=null;
    }
    return $r;
}

function mb_str_word_count($str='ERR',$f=0) {
	if (empty($str) || $str == 'ERR') {
		return null;
	} else {
            $as = explode(" ", $str);

            switch ($f) {
                case 0:
                    $r = count($as);
                    break;
                case 1:
                case 2:
                    $r = array_values($as);
                    break;
                default:
                    $r = null;
                    break;
            }

            return $r;
	}
}

function err($name) {
    if(not_empty($name)) {
        return trigger_error($name,E_USER_ERROR);
    }else{
        return null;
    }
}

function not_empty($var) {
    return !empty($var);
}

function clean($text){
	if(not_empty($text)) {
	    	$text=str_replace('/','',$text);
	    	$text=str_replace('*','',$text);
	    	$text=str_replace('+','',$text);
	    	$text=str_replace('-',' ',$text);
	    	$text=str_replace('_',' ',$text);
	    	$text=str_replace('=','',$text);
	    	$text=str_replace('`','',$text);
	    	$text=str_replace('"','',$text);
	    	$text=str_replace("'",'',$text);
	    	$text=str_replace('!','',$text);
	    	$text=str_replace('~','',$text);
	    	$text=str_replace('@','',$text);
	    	$text=str_replace('#','',$text);
	    	$text=str_replace('$','',$text);
	    	$text=str_replace('%','',$text);
	    	$text=str_replace('^','',$text);
	    	$text=str_replace('&','',$text);
	    	$text=str_replace(')','',$text);
	    	$text=str_replace('(','',$text);
	    	$text=str_replace('|','',$text);
	    	$text=str_replace('{','',$text);
	    	$text=str_replace('}','',$text);
	    	$text=str_replace('[','',$text);
	    	$text=str_replace(']','',$text);
	    	$text=str_replace(':','',$text);
	    	$text=str_replace(';','',$text);
	    	$text=str_replace('?','',$text);
		$text=str_replace('؟','',$text);
		$text=str_replace('،','',$text);
		$text=str_replace('؛','',$text);
	    	$text=str_replace('<','',$text);
	    	$text=str_replace('>','',$text);
	    	$text=str_replace(',','',$text);
		$text=str_replace(' ','',$text);
	    	$text=str_replace('.','',$text);
		$text=str_replace('insert','',$text);
		$text=str_replace('into','',$text);
		$text=str_replace('limit','',$text);
		$text=str_replace('offset','',$text);
		$text=str_replace('select','',$text);
	    	$text=str_replace('from','',$text);
	    	$text=str_replace('delete','',$text);
        	$text=str_replace('where','',$text);
	    	$text=str_replace('update','',$text);
		$text=str_replace('set','',$text);
		$r=stripslashes(trim($text));
	}else{
        $r=null;
	}
	return $r;
}

?>
