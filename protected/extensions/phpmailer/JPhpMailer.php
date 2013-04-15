<?php

/**
 * JPhpMailer class file.
 *
 * @version alpha 2 (2010-6-3 16:42)
 * @author jerry2801 <jerry2801@gmail.com>
 * @required PHPMailer v5.1
 *
 * A typical usage of JPhpMailer is as follows:
 * <pre>
 * Yii::import('ext.phpmailer.JPhpMailer');
 * $mail=new JPhpMailer;
 * $mail->IsSMTP();
 * $mail->Host='smpt.163.com';
 * $mail->SMTPAuth=true;
 * $mail->Username='yourname@yourdomain';
 * $mail->Password='yourpassword';
 * $mail->SetFrom('name@yourdomain.com','First Last');
 * $mail->Subject='PHPMailer Test Subject via smtp, basic with authentication';
 * $mail->AltBody='To view the message, please use an HTML compatible email viewer!';
 * $mail->MsgHTML('<h1>JUST A TEST!</h1>');
 * $mail->AddAddress('whoto@otherdomain.com','John Doe');
 * $mail->Send();
 * </pre>
 */

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'class.phpmailer.php';

class JPhpMailer extends PHPMailer
{
    public function __construct()
    {
        $this->IsSMTP();
        $this->Host = 'localhost';
        $this->SMTPAuth = false;
        $this->Username = '';
        $this->Password = '';
        $this->SetFrom('dotgain@doublehops.com', 'Damien');
        $this->Subject = 'New message from Dotgain';
        $this->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        $this->MsgHTML('<h1>Dotgain update</h1>');
    }
}
