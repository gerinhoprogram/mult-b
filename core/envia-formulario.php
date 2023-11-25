<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php 
		include('header.php'); 
		$pagina = $_GET['p']; 
		include ('core/mod_includes/php/funcoes-jquery.php'); 
	?>
	<title><?php echo $ttl ?> - Formulário </title>	
</head>

<body>
	<?php
	    date_default_timezone_set('America/Sao_Paulo');
	    $data = date('d/m/y');
		$hora = date('H:i:s');
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$empresa = $_POST['empresa'];
		
		$sql = "INSERT INTO cadastro_contato (contato_email, contato_nome, contato_telefone, contato_empresa) VALUES (:contato_email, :contato_nome, :contato_telefone, :contato_empresa)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindValue(':contato_email', $email);
		$stmt->bindValue(':contato_nome', $nome);
		$stmt->bindValue(':contato_telefone', $telefone);
		$stmt->bindValue(':contato_empresa', $empresa);
		$stmt->execute();

		// $stmt->execute();
		require("core/mod_includes/php/phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = "mail.multibevarejo.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
		$mail->SMTPAuth = false; // Usa autenticação SMTP? (opcional)
		$mail->Username = 'autenticacao@multibevarejo.com.br'; // Usuário do servidor SMTP
		$mail->Password = 'multiB@2020'; // Senha do servidor SMTP
		$mail->From = "$email"; // Seu e-mail
		$mail->Sender = "autenticacao@multibevarejo.com.br"; // Seu e-mail
		$mail->FromName = "MultB & Varejo"; // Seu nome
		$mail->AddAddress('contato@multibevarejo.com.br');
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

		$assunto = "Multi B & Varejo 23/09 das 17h às 19h";
		$mail->Subject  = '=?utf-8?B?' . base64_encode($assunto) . '?='; // Assunto da mensagem
		$mail->Body = "
				<style type='text/css'>
				.texto {
					font-family: 'Calibri';
					color: #666;
					font-size: 14px;
					text-align: left;
					font-weight: normal;
				}
				
				hr {
					border: none;
					border-top: 1px solid #2C4E67;
				}
				
				.rodape {
					font-family: Calibri;
					color: #727272;
					font-size: 12px;
					text-align: left;
					font-weight: normal;
				}
			</style>
		</head>

		<body>
			<main class='texto'>
				<p><b>Nome: </b>".$nome."</p>
				<p><b>Empresa: </b>".$empresa."</p>
				<p><b>Telefone: </b>".$telefone."</p>
				<p><b>E-mail: </b>".$email."</p>
				<hr>
			</main>
			<footer class='rodape'>
				<p><b>Mensagem enviada:</b> ".$data. " | ".$hora."</p>
				Este é um email gerado automaticamente pelo sistema.<br><br> As informações contidas nesta mensagem e nos arquivos anexados são para uso restrito, sendo seu sigilo protegido por lei, não havendo ainda garantia legal quanto à integridade de seu
				conteúdo. Caso não seja o destinatário, por favor desconsidere essa mensagem. O uso indevido dessas informações será tratado conforme as normas da empresa e a legislação em vigor.
			</footer>
		</body>
		";

		$enviado = $mail->Send();
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		if ($enviado) {

			$resposta = new PHPMailer();
			// Define os dados do servidor e tipo de conexão
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$resposta->IsSMTP();
			$resposta->Host = "mail.multibevarejo.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
			$resposta->SMTPAuth = false; // Usa autenticação SMTP? (opcional)
			$resposta->Username = 'autenticacao@multibevarejo.com.br'; // Usuário do servidor SMTP
			$resposta->Password = 'multiB@2020'; // Senha do servidor SMTP
		
			$resposta->From = "contato@multibevarejo.com.br"; // Seu e-mail
			$resposta->Sender = "contato@multibevarejo.com.br"; // Seu e-mail
			$resposta->FromName = "MultB & Varejo"; // Seu nome
			$resposta->AddAddress($email);
			$resposta->IsHTML(true); // Define que o e-mail será enviado como HTML
			$resposta->CharSet = 'utf-8'; // Charset da mensagem (opcional)
		
			$assunto2 = "Bem-vindo ao Multib&Varejo";
			$resposta->Subject  = '=?utf-8?B?' . base64_encode($assunto2) . '?='; // Assunto da mensagem
			$resposta->Body = "
					<style type='text/css'>
					.texto {
						font-family: 'Calibri';
						color: #666;
						font-size: 14px;
						text-align: left;
						font-weight: normal;
					}
					
					hr {
						border: none;
						border-top: 1px solid #2C4E67;
					}
					
					.rodape {
						font-family: Calibri;
						color: #727272;
						font-size: 12px;
						text-align: left;
						font-weight: normal;
					}
				</style>
			</head>

			<body>
				<main class='texto'>
					<p>Estamos muito felizes em ter você conosco. </p>
					<p>Coloque esse evento na sua agenda! </p>
					<p>Dia 23 de setembro das 17h às 19h esperamos por você.</p>
					<p>Acesse: <a href='https://youtu.be/uTuQCU0AWMM' target='_blank'>este link</a></p>
				</main>
			</body>
			";
				$enviado2 = $resposta->Send();
				$resposta->ClearAllRecipients();
				$resposta->ClearAttachments();
				if ($enviado2) {
					echo "
					<div style='width: 50%; margin: 50px auto; background: #a3d65c; padding: 30px; height: 300px; border-radius: 5px; color: #fff'>
					<p>Obrigado (a), ".$nome.".<br>Seu cadastro foi realizado com sucesso!<br>O link do evento será enviado para o seu endereço de e-mail.</p>
					<a href='home'><p>Voltar para Home</p></a>
					</div>
				";
	
				}
				else {
					echo "
						<div style='width: 50%; margin: 50px auto; background: #a3d65c; padding: 30px; height: 300px; border-radius: 5px; color:#fff'>
						<p>E-mail não enviado para o cliente! $resposta->ErrorInfo </p>
						<a href='home'><p>Voltar para Home</p></a>
						</div>
					";	

				}
		} 
		else {
			echo "
			    <div style='width: 50%; margin: 50px auto; background: #a3d65c; padding: 30px; height: 300px; border-radius: 5px; color:#fff'>
				<p>E-mail não enviado! $mail->ErrorInfo </p>
				<a href='home'><p>Voltar para Home</p></a>
				</div>
			";
		}

	?>
</body>

</html>