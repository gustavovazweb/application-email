<html>
	<!--HEAD-->
	<head>
		<!--META TAGS-->
		<meta charset="utf-8" />
    	<!--TITLE-->
		<title>Mail Application</title>
		<!--LINK-->
		<link rel="icon" href="logo.png">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<!--BODY-->
	<body>
		<!--CONTAINER-->
		<div class="container">
			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Your particular sending mails application!!!</p>
			</div>
			<!--FORM-->
      		<div class="row">
      			<div class="col-md-12">
					<div class="card-body font-weight-bold">
						<form action="send_execution.php" method="post">
							<div class="form-group">
								<label for="to">Para</label>
								<input name="to" type="text" class="form-control" id="to" placeholder="exemplo@email.com">
							</div>
							<div class="form-group">
								<label for="issue">Assunto</label>
								<input name="issue" type="text" class="form-control" id="issue" placeholder="Assundo do e-mail">
							</div>
							<div class="form-group">
								<label for="message">Mensagem</label>
								<textarea name="message" class="form-control" id="message" placeholder="Mensagem"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>
	</body>
</html>