<?php defined('SYSPATH') or die('No direct script access.');

require APPPATH . 'vendor/PHPMailer/class.phpmailer.php';
require APPPATH . 'vendor/PHPMailer/class.smtp.php';
/**
 * Utility class for sending emails.
 */
class Mailer extends PHPMailer {
    const SMTP_HOST     = '';
    const SMTP_USERNAME = '';
    const SMTP_PASSWORD = '';
    const FROM_EMAIL    = 'noreply@tiger.com';

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
     * Sends the message.
     *
     * @param   string        $body       The message body
     * @return  bool
     */
    public function send($body = '')
    {
        /** DISABLE EMAILS TIL WE FIGURE OUT AN SMTP SERVER *****/
        return FALSE;

        $this->Body = $body;

        if ( ! parent::send()) {
            Log::instance()->add(Log::ERROR, $this->ErrorInfo);
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}
