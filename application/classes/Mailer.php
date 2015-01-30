<?php defined('SYSPATH') or die('No direct script access.');

require APPPATH . 'vendor/PHPMailer/class.phpmailer.php';
require APPPATH . 'vendor/PHPMailer/class.smtp.php';
/**
 * Class used as the parent of all Mailing classes.
 */
class Mailer extends PHPMailer {
    const SMTP_HOST     = '';
    const SMTP_USERNAME = '';
    const SMTP_PASSWORD = '';
    const FROM_EMAIL    = '';

    /*public static function factory()
    {
        return new Mailer();
    }*/

    public function __construct()
    {
        //$mail->SMTPDebug = 3;                 // Enable verbose debug output                             

        $this->isSMTP();
        $this->isHTML(TRUE);                    // Set email format to HTML

        $this->Host = self::SMTP_HOST;
        $this->SMTPAuth = TRUE;                              
        $this->Username = self::SMTP_USERNAME;                 
        $this->Password = self::SMTP_PASSWORD;        
        $this->SMTPSecure = 'tls'; 
        $this->Port = 587;                      // Enable TLS encryption, `ssl` also accepted  

        $this->From = self::FROM_EMAIL;
    }

    /**
     * @param   string        $body       The message body
     * @return  bool
     */
    public function send($body = '')
    {
        $this->Body = $body;
        return TRUE; // Disable emails momentarily.
        if ( ! parent::send()) {
            Log::instance()->add(Log::ERROR, $this->ErrorInfo);
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $this->ErrorInfo;
            return FALSE;
        } 
        else {
            //echo 'Message has been sent';
            return TRUE;
        }
    }
}