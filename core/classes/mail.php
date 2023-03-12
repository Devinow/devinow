<?php

namespace Core\Classes;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail
{
    protected $mail;

    public function __construct(){
        $this->mail = new PHPMailer(false);
        $this->setup();
    }

    public function setup(){
        try{
            if($_ENV['MAIL_DEBUGG']=='true') $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mail->isSMTP();
            $this->mail->Host       = $_ENV['MAIL_HOST'];
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $_ENV['MAIL_USERNAME'];
            $this->mail->Password   = $_ENV['MAIL_PASSWORD'];
            if($_ENV['MAIL_PORT']=='465'){
                $secure = 'tls';
            }elseif($_ENV['MAIL_PORT']=='587'){
                $secure = 'ssl';
            }else{
                $secure = '';
            }
            $this->mail->SMTPSecure = $secure;
            $this->mail->Port       = $_ENV['MAIL_PORT'];
            if(empty($_ENV['MAIL_FROM'])){
                $from = $_ENV['MAIL_USERNAME'];
            }else{
                $from = $_ENV['MAIL_FROM'];
            }
            $this->mail->CharSet = 'UTF-8';
            $this->mail->setFrom($from, $_ENV['APP_NAME']);
            $this->mail->addReplyTo($_ENV['MAIL_USERNAME'], $_ENV['APP_NAME']);
            $this->mail->Priority = 1;
            $this->mail->AddCustomHeader("X-MSMail-Priority: High");
        }catch(Exception $e){
            die('Error:'.$e);
        }
    }

    public function send($data){
        try{
            //Recipients
            $this->mail->addAddress($data['to']);

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $data['subject'];
            $this->mail->Body    = make($data['view'], array('data'=>$data['body']));

            if($this->mail->send()){
                $r = true;
            }else{
                $r = false;
            }

            $this->mail->ClearAddresses();
        }catch(Exception $e) {
            $r = false;
        }
    }
}

?>