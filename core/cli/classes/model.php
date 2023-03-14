<?php

namespace CLI;

use Exception;
use Devinow\String\str;

class Model{
    public $dir;

    public function __construct(){
        $this->dir = $GLOBALS['cli_dir'];
    }

    private function clean($text){
        if (!empty($text)) {
            $text=str_replace('/', '', $text);
            $text=str_replace('*', '', $text);
            $text=str_replace('+', '', $text);
            $text=str_replace('-', ' ', $text);
            $text=str_replace('_', ' ', $text);
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
            $text=str_replace('.', '', $text);
            $r=stripslashes(trim($text));
        } else {
            $r=null;
        }
        return $r;
    }

    public function create(string $name){
        $name = str::uppercase_words(str::delete($name,'Model'));
        if(!empty($this->clean($name))){
            $dir = $this->dir.'/app/models/';
            $file = $dir.$name.'.php';

            if(!file_exists($file)){
                try{
                    $content = file_get_contents(__DIR__.'/../templates/model.php');
                    $content = str::replace($content,'ModelName',$name);
                    $content = str::replace($content,'TableName',str::low($name));
                    file_put_contents($file,$content);

                    $msg = 'success-'.$name.' Model Created';
                }catch(Exception $e){
                    $msg = 'error-Failed To Create'.$name.' Model,'.$e;
                }
            }else{
                $msg = 'error-'.$name.' Is Exist,Please Use Another Name';
            }
        }else{
            $msg = 'error-Please Enter Correct Name For Model';
        }
        
        return $msg;
    }

    public function remove(string $name){
        $name = str::uppercase_words(str::delete($name,'Model'));
        if(!empty($name=$this->clean($name))){
            $dir = $this->dir.'/app/models/';
            $file = $dir.$name.'.php';

            if($name != 'Model' || $name != 'Config'){
                if(file_exists($file)){
                    try{
                        unlink($file);
    
                        $msg = 'success-'.$name.' Model Removed';
                    }catch(Exception $e){
                        $msg = 'error-Failed To Remove'.$name.' Model,'.$e;
                    }
                }else{
                    $msg = 'error-'.$name.' Is Not Exist,Please Checking The Model Name';
                }
            }else{
                $msg = 'error-You Can\'t Remove Base Model Class';
            }
        }else{
            $msg = 'error-Please Enter Correct Name For Model';
        }
        
        return $msg;
    }
}

?>
