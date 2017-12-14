<?php 

// ini_set("SMTP","ssl://smtp.gmail.com");
// ini_set("smtp_port","465");

// 	function sendMail($from,$to,$msg,$subject){
// 		//$name=htmlentities($_POST['name']);
// 		$from=htmlentities($from);
// 		//$coment=htmlentities($_POST['coment']);
// 		$headers = 'MIME-Version: 1.0' . "\r\n";
// 		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// 		$headers .= 'From:admin@soundintuition.com' . " \r\n";
// 		$mailsent=mail($to,$subject,$msg,$headers);

       
// 		if($mailsent){
// 			return 1;
// 		}else{
// 			return 0;
// 		}

// 	}
	


//     $res= sendMail('','cto.varun@gmail.com',"Testing Email","Email from simple mail function");

//     if($res){
//         echo "Email sent";
//     }else{
//         echo "Error while sending email";        
//     }




	function Send_HTML_Mail($mail_To, $mail_From, $mail_CC, $mail_subject, $mail_Body)
	{   
		include_once ("class.phpmailer.php");
		include_once ("class.smtp.php");

		$mail = new PHPMailer();
		$mail->SetLanguage('en',dirname(__FILE__) . '/zip/language/');
		//Your SMTP servers details
		$mail->IsSMTP();               // set mailer to use SMTP
		$mail->SMTPDebug = 2;
		$mail->Host = "smtp.gmail.com"; // specify main and backup server or localhost
		$mail->Port = 25;
		// $mail->to = $mail_To;
		// $mail->SMTPSecure = 'tls';
		$mail->AddAddress($mail_To, 'First Name');
		$mail->AddCC('cto.varun@gmail.com', 'Person One');
		$mail->SMTPAuth = true;     // turn on SMTP authentication
	    $mail->Username = "admin@soundintuition.com";  // SMTP username
        $mail->Password = "si_4dm1n"; // SMTP password
		//It should be same as that of the SMTP user

		$mail->From = "admin@soundintuition.com";	//Default From email same as smtp user
		$mail->FromName = "SoundIntuition";
		
		$mail->AddAddress($mail_To, ""); 

		//$mail->WordWrap = 50; // set word wrap to 50 characters
		$mail->IsHTML(true);  // set email format to HTML
		$mail->Subject = $mail_subject;
		$mail->Body = $mail_Body;
        $res = $mail->Send();
        
		if(!$res)
		{
			var_dump($mail->ErrorInfo);
			echo "not sent";
			//exit;
			//header('location:index.html');
		}
		else
		{
		    echo "Success";
			//header('location:index.html');
		}


	}
    
    Send_HTML_Mail("varun@nugeninfo.com","admin@soundintuition.com","","TEsting email server","Working fine");

?>