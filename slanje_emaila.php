<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require_once "template/wlmailer/mail_config.php";
require_once "template/wlmailer/wl_mailer.class.php";

$wl_mailer = new wl_mailer($host_email, $host_password, array($sender_email, $sender_name), array($sender_email, $sender_name));

$wl_mailer->add_address('mazo.creed26@gmail.com', '');

$template = file_get_contents('template/email/email_template.html');
$content_template = file_get_contents('template/email/content_kontakt.html');


$content_template = str_replace('{ime}',$name, $content_template);
$content_template = str_replace('{email}',$email, $content_template);
$content_template = str_replace('{naslov_poruke}',$subject, $content_template);
$content_template = str_replace('{poruka}',$message, $content_template);
$template = str_replace('{content}',$content_template, $template);
$template = str_replace('{logo}','cid:logo', $template);
$wl_mailer->add_image('template/email/slike/logo.jpg','logo','logo.jpg');
$template = str_replace('{fb}','cid:fb', $template);
$wl_mailer->add_image('template/email/slike/fb.jpg','fb','fb.jpg');
$template = str_replace('{tw}','cid:tw', $template);
$wl_mailer->add_image('template/email/slike/tw.jpg','tw','tw.jpg');
$template = str_replace('{goo}','cid:goo', $template);
$wl_mailer->add_image('template/email/slike/goo.jpg','goo','google.jpg');

$wl_mailer->set_email_content($template);
$wl_mailer->set_subject('SHOP ');
$wl_mailer->send_email();

header('Location:index.php');
?>
