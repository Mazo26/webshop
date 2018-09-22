<?php

require_once('class.phpmailer.php');
require_once('class.html2text.php');

class wl_mailer
{

    private $mail_obj = NULL;
    private $send_to_admin = false;
    private $admin_email = "";
    private $subject = "";
    private $html_email_content = "";
    private $send_to_email = array();
    private $send_to_cc = array();
    private $send_to_bcc = array();
    private $send_attachments = array();
    private $send_images = array();
    private $plain_email_content = "";

  public function __construct($username = '', $password = '', $sent_from = array('', ''), $reply_to = array('', ''), $host = 'mail.armon.rs', $port = 25, $priority = 3, $char_set = 'UTF-8')
	 //public function __construct($username = '', $password = '', $sent_from = array('', ''), $reply_to = array('', ''), $host = 'mail.belgradecreative.com', $port = 26, $priority = 3, $char_set = 'UTF-8')
    {
        $this->mail_obj = new PHPMailer(true);
        $this->mail_obj->IsSMTP();      // ovo govori klasi da koristi SMTP

        $this->mail_obj->Username = $username;  // SMTP account username
        $this->mail_obj->Password = $password; // SMTP account password
        $this->mail_obj->Host = $host;   // SMTP server
        $this->mail_obj->Port = $port;  // ovo je default port
        $this->mail_obj->CharSet = $char_set;  // CharSet koji ce da se korsitie
        $this->mail_obj->Priority = $priority;  // Moguce vrednosti :(1 = High, 3 = Normal, 5 = low)



        $this->mail_obj->SMTPDebug = 0;            // enables SMTP debug information (for testing)
        $this->mail_obj->SMTPAuth = true;         // ovo omogucava SMTP logovanje
		
		//$this->mail_obj->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail

        $this->mail_obj->AddReplyTo($reply_to[0], $reply_to[1]);
        $this->mail_obj->SetFrom($sent_from[0], $sent_from[1]);
    }

    public function start_debugger()
    {
        $this->mail_obj->SMTPDebug = 1;
    }

    public function stop_debugger()
    {
        $this->mail_obj->SMTPDebug = 0;
    }

    public function set_subject($subject)
    {
        $this->subject = $subject;
    }

    public function set_email_content($content)
    {
        $this->html_email_content = $content;
        $h2t = new html2text($content);
        $this->plain_email_content = $h2t->get_text();
    }

    public function add_admin($admin_email)
    {
        $this->send_to_admin = true;
        $this->admin_email = $admin_email;
    }

    public function add_address($send_to_email, $send_to_email_name)
    {
        $this->send_to_email[] = array($send_to_email, $send_to_email_name);
        $this->mail_obj->AddAddress($send_to_email, $send_to_email_name);
    }

    public function add_to_cc($send_to_email, $send_to_email_name)
    {
        $this->send_to_cc[] = array($send_to_email, $send_to_email_name);
        $this->mail_obj->AddCC($send_to_email, $send_to_email_name);
    }

    public function add_to_bcc($send_to_email, $send_to_email_name)
    {
        $this->send_to_bcc[] = array($send_to_email, $send_to_email_name);
        $this->mail_obj->AddBCC($send_to_email, $send_to_email_name);
    }

    public function add_image($image_path, $cid_name, $image_name)
    {
        $this->send_images[] = array("image_url" => $image_path, "cid_name" => $cid_name, "name" => $image_name);
    }

    public function add_attachment($attachment_path, $attachment_name)
    {
        $this->send_attachments[] = array("attachment_path" => $attachment_path, "attachment_name" => $attachment_name);
    }

    public function send_email()
    {
        if($this->send_to_admin)
        {
            $this->mail_obj->AddBCC($this->admin_email, '');
        }

        $this->mail_obj->Subject = $this->subject;
        $this->mail_obj->AltBody = $this->plain_email_content; // obavezno alternativni tekst ukoliko mail ne moze da se otvori kao html

        $this->mail_obj->MsgHTML($this->html_email_content);

        //=================================== SET LIST OF IMAGES ==================================
        if(sizeof($this->send_images) > 0)
        {
            for($i = 0; $i < sizeof($this->send_images); $i++)
            {
                $this->mail_obj->AddEmbeddedImage($this->send_images[$i]["image_url"], $this->send_images[$i]["cid_name"], $this->send_images[$i]["name"]);
            }
        }

        //=================================== SET LIST OF ATTACHMENTS =============================
        if(sizeof($this->send_attachments) > 0)
        {

            for($i = 0; $i < sizeof($this->send_attachments); $i++)
            {
                $this->mail_obj->AddAttachment($this->send_attachments[$i]["attachment_path"], $this->send_attachments[$i]["attachment_name"]);
            }
        }

        try
        {
            $this->mail_obj->Send();
            $this->mail_obj->ClearAddresses();
            $this->mail_obj->ClearAttachments();
        }
        catch(phpmailerException $e)
        {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        }
        catch(Exception $e)
        {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
    }

}