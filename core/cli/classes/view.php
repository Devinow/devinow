<?php

namespace CLI;

use Exception;
use Devinow\String\str;

class View{
    public $dir;

    public function __construct(){
        $this->dir = $GLOBALS['cli_dir'];
    }

    private function clean($text){
        if (!empty($text)) {
            $text=str_replace('*', '', $text);
            $text=str_replace('+', '', $text);
            $text=str_replace('=', '', $text);
            $text=str_replace('`', '', $text);
            $text=str_replace('"', '', $text);
            $text=str_replace("'", '', $text);
            $text=str_replace('!', '', $text);
            $text=str_replace('~', '', $text);
            $text=str_replace('@', '', $text);
            $text=str_replace('#', '', $text);
            $text=str_replace('$', '', $text);
            $text=str_replace('%', '', $text);
            $text=str_replace('^', '', $text);
            $text=str_replace('&', '', $text);
            $text=str_replace(')', '', $text);
            $text=str_replace('(', '', $text);
            $text=str_replace('|', '', $text);
            $text=str_replace('{', '', $text);
            $text=str_replace('}', '', $text);
            $text=str_replace('[', '', $text);
            $text=str_replace(']', '', $text);
            $text=str_replace(':', '', $text);
            $text=str_replace(';', '', $text);
            $text=str_replace('?', '', $text);
            $text=str_replace('؟', '', $text);
            $text=str_replace('،', '', $text);
            $text=str_replace('؛', '', $text);
            $text=str_replace('<', '', $text);
            $text=str_replace('>', '', $text);
            $text=str_replace(',', '', $text);
            $text=str_replace(' ', '', $text);
            $r=stripslashes(trim($text));
        } else {
            $r=null;
        }
        return $r;
    }

    public function create(string $name){
        $name_orig = str::low($name);
        $name = str::uppercase_words($name);
        if(!empty($this->clean($name))){
            $dir = $this->dir.'/resources/views/';
            $file = $dir.$name_orig.'.blade.php';

            if(!file_exists($file)){
                try{
                    $content = file_get_contents(__DIR__.'/../templates/view.php');
                    $content = str::replace($content,'ViewName',$name.' View');
                    file_put_contents($file,$content);

                    $msg = 'success-'.$name.' View Created';
                }catch(Exception $e){
                    $msg = 'error-Failed To Create'.$name.' View,'.$e;
                }
            }else{
                $msg = 'error-'.$name.' Is Exist,Please Use Another Name';
            }
        }else{
            $msg = 'error-Please Enter Correct Name For View';
        }
        
        return $msg;
    }

    public function remove(string $name){
        $name_orig = str::low($name);
        $name = str::uppercase_words($name);
        if(!empty($name=$this->clean($name))){
            $dir = $this->dir.'/resources/views/';
            $file = $dir.$name_orig.'.blade.php';

            if($name_orig != 'welcome' || $name_orig != '404' || $name_orig != 'generic'){
                if(file_exists($file)){
                    try{
                        unlink($file);
    
                        $msg = 'success-'.$name.' View Removed';
                    }catch(Exception $e){
                        $msg = 'error-Failed To Remove'.$name.' View,'.$e;
                    }
                }else{
                    $msg = 'error-'.$name.' Is Not Exist,Please Checking The View Name';
                }
            }else{
                $msg = 'error-You Can\'t Remove Base Views';
            }
        }else{
            $msg = 'error-Please Enter Correct Name For View';
        }
        
        return $msg;
    }
}

?>