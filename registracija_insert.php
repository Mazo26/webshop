<?php

include 'template/konekcija.php';

if($_POST){
	$ime = $_POST["ime"];
	$prezime = $_POST["prezime"];
	$email = $_POST["email"];
	$adresa = $_POST["adresa"];
	$telefon = $_POST["telefon"];
	$repait_password = $_POST["repait_password"];
	$password = $_POST["password"];

	require_once "template/wlmailer/mail_config.php";
	require_once "template/wlmailer/wl_mailer.class.php";


	if($email!=''){
		if($password==$repait_password){

			$sql = "INSERT INTO korisnici VALUES (NULL,'".$ime."','".$prezime."','".$email."','".md5($password)."','".$adresa."','".$telefon."',0)";

			mysqli_query($conn, $sql);

			$id = mysqli_insert_id();


			$wl_mailer = new wl_mailer($host_email, $host_password, array($sender_email, $sender_name), array($sender_email, $sender_name));

			$wl_mailer->add_address($email, '');

			$template = file_get_contents('template/email/email_template.html');
			$content_template = file_get_contents('template/email/email_registracija.html');


			$provera = md5('Au!k_'.$id.'_58T');
			$link = 'localhost/aleksandar_oljaca/shop/aktivacija.php?id='.$id.'&provera='.$provera.'';

			$content_template = str_replace('{link}',$link, $content_template);

			$template = str_replace('{content}',$content_template, $template);
			$template = str_replace('{logo}','cid:logo', $template);
			$wl_mailer->add_image('template/email/slike/logo.jpg','logo','logo.jpg');
			$template = str_replace('{fb}','cid:fb', $template);
			$wl_mailer->add_image('template/email/slike/fb.jpg','fb','fb.jpg');
			$template = str_replace('{tw}','cid:tw', $template);
			$wl_mailer->add_image('template/email/slike/tw.jpg','tw','tw.jpg');
			$template = str_replace('{goo}','cid:goo', $template);
			$wl_mailer->add_image('template/email/slike/goo.jpg','goo','google.jpg');

			$wl_mailer->add_attachment('template/email/Prezentacija.doc','Prezentacija.doc');

			$wl_mailer->set_email_content($template);
			$wl_mailer->set_subject('SHOP - registracija ');
			$wl_mailer->send_email();

			header('Location:uspesna_registracija.php');





		}else{

			echo 'Lozinka nije ispravna';
		}

	}else{
		echo 'Unesite email';
	}

}


?>
