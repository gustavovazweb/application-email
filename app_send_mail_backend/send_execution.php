<!--BACKEND PHP CODE-->
<?php

	use libraries\PHPMailer\PHPMailer;
	use libraries\PHPMailer\Exception;

	//MESSAGE CLASS
	class Message {
		private $to = null;
		private $issue = null;
		private $message = null;
		public $status = array( 'cod_status' => null, 'description_status' => '');

		//GETTERS AND SETTERS
		public function __get($attribute) {
			return $this->$attribute;
		}

		public function __set($attribute, $value) {
			$this->$attribute = $value;
		}

		public function messageValid() {
			if(empty($this->to) || empty($this->issue) || empty($this->message)) {
				return false;
			}

			return true;
		}
	}

	//NEW MESSAGE
	$message = new Message();

	$message->__set('to', $_POST['to']);
	$message->__set('issue', $_POST['issue']);
	$message->__set('message', $_POST['message']);


	if(!$message->messageValid()) {
		echo 'Message is unvalid';
		header('Location: index.php');
	}

	$mail = new PHPMailer(true);
	try {
	    //Server settings
	    $mail->SMTPDebug = false;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'webcompleto2@gmail.com';                 // SMTP username
	    $mail->Password = '!@#$4321';                           // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('example@email.com', 'Example Destiny');
	    $mail->addAddress($message->__get('to'));     // Add a recipient
	    //$mail->addReplyTo('info@example.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $message->__get('issue');
	    $mail->Body    = $message->__get('message');
	    $mail->AltBody = 'you must use a client which supports HTML to have total access to this message content';

	    $mail->send();

	    $message->status['cod_status'] = 1;
	    $message->status['description_status'] = 'Your email has been sent successfully!';
	
		//CATCH ERROS
	} catch (Exception $e) {

		$message->status['cod_status'] = 2;
	    $message->status['description_status'] = 'This email could not be sent! Please try again later. Error details:  ' . $mail->ErrorInfo;


	}
?>
<!--HTML PAGE PART-->
<html>
	<!--HEAD-->
	<head>
		<!--META TAGS-->
		<meta charset="utf-8" />
		<!--TITLE-->
    	<title>Mail Application</title>
		<!--BOOTSTRAP CSS-->
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<!--BODY-->
	<body>
		<div class="container">
			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Your particular sending mails application!!!</p>
			</div>
			<!--ALERT SECTION-->
			<div class="row">
				<div class="col-md-12">
					<!--SUCCESS MESSAGE-->
					<? if($message->status['cod_status'] == 1) { ?>
						<div class="container">
							<h1 class="display-4 text-success">Success</h1>
							<p><?= $message->status['description_status'] ?></p>
							<a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>
					<? } ?>
					<!--ERRO MESSAGE-->
					<? if($message->status['cod_status'] == 2) { ?>
						<div class="container">
							<h1 class="display-4 text-danger">Ops!</h1>
							<p><?= $message->status['description_status'] ?></p>
							<a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
	</body>
</html>