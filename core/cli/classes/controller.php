<?php

namespace CLI;

use Exception;
use Devinow\String\str;

class Controller{
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
        $name = str::delete(str::uppercase_words($name),'Controller');
        if(!empty($this->clean($name))){
            $dir = $this->dir.'/app/controllers/';
            $file = $dir.$name.'Controller.php';

            if(!file_exists($file)){
                try{
                    $content = file_get_contents(__DIR__.'/../templates/controller.php');
                    $content = str::replace($content,'ControllerName',$name.'Controller');
                    file_put_contents($file,$content);

                    $msg = 'success-'.$name.' Controller Created';
                }catch(Exception $e){
                    $msg = 'error-Failed To Create'.$name.' Controller,'.$e;
                }
            }else{
                $msg = 'error-'.$name.' Is Exist,Please Use Another Name';
            }
        }else{
            $msg = 'error-Please Enter Correct Name For Controller';
        }
        
        return $msg;
    }

    public function remove(string $name){
        $name = str::delete(str::uppercase_words($name),'Controller');
        if(!empty($name=$this->clean($name))){
            $dir = $this->dir.'/app/controllers/';
            $file = $dir.$name.'Controller.php';

            if($name != 'Controller' || $name != 'Base'){
                if(file_exists($file)){
                    try{
                        unlink($file);
    
                        $msg = 'success-'.$name.' Controller Removed';
                    }catch(Exception $e){
                        $msg = 'error-Failed To Remove'.$name.' Controller,'.$e;
                    }
                }else{
                    $msg = 'error-'.$name.' Is Not Exist,Please Checking The Controller Name';
                }
            }else{
                $msg = 'error-You Can\'t Remove Base Controller Class';
            }
        }else{
            $msg = 'error-Please Enter Correct Name For Controller';
        }
        
        return $msg;
    }
}

?>