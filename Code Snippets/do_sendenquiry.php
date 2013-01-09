<?php  

	$return = '../thanks.php';
	$fillform = '?';
	$attachment = '';
	$not_supported = false;


	if (isset($_POST['name'])) {
		
		foreach ($_POST as $key => $value) {
			if ($key != 'submit') {
				$$key = $value;
				$fillform .= $key.'='.$value.'&';
			}
		}
	

		$email_from = "info@blackpooltriathlon.com"; // Who the email is from
		$email_subject = "Blackpool Triathlon - Online Enquiry"; // The Subject of the email
		$email_txt = "<p>
            Name: ".$name."<br/>
            Email Address: ".$email."<br/>
            Telephone: ".$tel."<br/>
			Preferred Contact: ".$contactoption."<br/>
            Enquiry: ".$enquiry."</p>
            ";

			 // Message that the email has in it
			$email_message = "";
			//$email_to = "info@whistonlaw.co.uk"; // Who the email is too
			$email_to ="djd-uk@hotmail.co.uk";
			
			$headers = "From: ".$email_from;
			
			
			$semi_rand = md5(time());
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
			
			$headers .= "\nMIME-Version: 1.0\n" .
			"Content-Type: multipart/mixed;\n" .
			" boundary=\"{$mime_boundary}\"";
			
			$email_message .= "This is a multi-part message in MIME format.\n\n" .
			"--{$mime_boundary}\n" .
			"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
			"Content-Transfer-Encoding: 7bit\n\n" .
			$email_txt . "\n\n";
			


		$mail_sent = @mail($email_to, $email_subject, $email_message, $headers);
		
		if ($mail_sent) {
			$msg = 'For your enquiry, we will be in touch with you soon.';
			header('Location: '.$return.'?msg='.$msg);	
			exit;
		} else {
			$msg = 'But there seems to be a problem sending email, please try again later.';
			header('Location: '.$return.$fillform.'msg='.$msg);	
			exit;
		}
		
		
	} else {
		$msg='There were missing entries on the contact form';
		header('Location: '.$return.$fillform.'msg='.$msg);	
		exit;
	}
?>