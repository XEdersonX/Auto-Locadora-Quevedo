<?php

$Estilo ="<html style='margin: 0;padding: 0px;'>" . "<head>" .
 "<title>TITULO DO E-MAIL</title>" .
 "<meta name='viewport' content='initial-scale=1'>" .
 "<style>" .
 "html, body { margin:0; padding: 0px; }" .
 "body {" .
 "font: 12px arial;" .
 "background: #23A4BA;" .
 "background: -moz-linear-gradient(top, #23A4BA 0%, #2DBFD9 100%);" .
 "background: -webkit-linear-gradient(top, #23A4BA 0%,#2DBFD9 100%);" .
 "background: linear-gradient(to bottom, #23A4BA 0%,#2DBFD9 100%);" .
 "filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#23A4BA', endColorstr='#2DBFD9',GradientType=0 );" .
 "}" .
 "div.content {" .
 "display: block;" .
 "width: 90%;" .
 "margin: 50px auto 0px auto;" .
 "border: 1px solid #dedede;" .
 "border-radius: 8px;" .
 "padding: 35px 20px 20px 20px;" .
 "background: #ffffff;" .
 "background: -moz-linear-gradient(top, #ffffff 0%, #f1f1f1 33%, #ffffff 100%);" .
 "background: -webkit-linear-gradient(top, #ffffff 0%,#f1f1f1 33%,#ffffff 100%);" .
 "background: linear-gradient(to bottom, #ffffff 0%,#f1f1f1 33%,#ffffff 100%);" .
 "filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f1f1f1',GradientType=0 );" .
 "-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.20);" .
 "-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.20);" .
 "box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.20);" .
 "}" .
 "div.content img.logo {" .
 "display: block;" .
 "position: absolute;" .
 "width: 80px;" .
 "height: 80px;" .
 "top: 10px;" .
 "}" .
 "div.content small.detail {" .
 "color: #b5b5b5;" .	
 "}" .
 "div.copyright {" .
 "width: 90%;" .
 "margin: 10px auto;" .
 "text-align:center;" .
 "font-size: 10px;" .
 "color: #f5f5f5;" .
 "}" .
 "</style>" .
 "</head>" .
 "<body style='margin:0; padding: 0px; font: 12px arial; background: #23A4BA; background: -moz-linear-gradient(top, #23A4BA 0%, #2DBFD9 100%); background: -webkit-linear-gradient(top, #23A4BA 0%,#2DBFD9 100%); background: linear-gradient(to bottom, #23A4BA 0%,#2DBFD9 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#23A4BA', endColorstr='#2DBFD9',GradientType=0 );'>" .
 "<div class='content' style='display: block;width: 90%;margin: 50px auto 0px auto;border: 1px solid #dedede;border-radius: 8px;padding: 35px 20px 20px 20px;background: linear-gradient(to bottom, #ffffff 0%,#f1f1f1 33%,#ffffff 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f1f1f1',GradientType=0 );-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.20);-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.20);box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.20);'>" .
 "<img class='logo' src='http://autolocadoraquevedo.com.br/site/teste/racks-master/images/Logo%20Quevedo%20Sem%20Todo%20Fundo.png' width='80' height='56' style='display: block;position: absolute;width: 80px;height: 50px;top: 40px;' />";

 $Rodape = "</div>" .
 "<div class='copyright' style='width: 90%;margin: 10px auto;text-align: center;font-size: 10px;color: #f5f5f5;'>" .
 "<a>&copy;2020 Auto Locadora Quevedo - Rua Marechal Deodoro, 927 - Centro, Pelotas - RS, 96020-220 - Fone: (53) 3027-7474 / (53) 3222-6219.</a>" .
 "</div>" .
 "</body>" .
 "</html>";

 $Quebra = "<br>";
 $Image  = "<img src='http://www.vsinfo.inf.br/Orthoprime/foto%20email.jpg' height='100' width=300'>";



//Pegar os valores
$Nome 		= $_POST['nome'];
$Telefone 	= $_POST['telefone'];
$Email 		= $_POST['email'];
$Cidade 	= $_POST['cidade'];
$Assunto 	= $_POST['assunto'];
$Mensagem 	= $_POST['mensagem'];
$Categoria	= $_POST['categoria'];
$Tipo_Aluguel = $_POST['tipo_aluguel'];


//https://www.jonathanmoreira.com.br/aula/como-integrar-o-recaptcha-em-seu-site.html
$captcha = $_POST['g-recaptcha-response'];
 if($captcha != ''){
    $secreto = '6LcACOEUAAAAAK9mssfStZ60uvum6oNZika0BrUc';  //SUA_CHAVE_SECRETA
    $ip      = $_SERVER['REMOTE_ADDR'];
    $var     = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secreto&response=$captcha&remoteip=$ip");
	$resposta = json_decode($var, true);
	
    if($resposta['success']){
   
		// seu código de envio aqui
		include("class.phpmailer.php");

		// Inicia a classe PHPMailer
		$mail 			= new PHPMailer();
		$emailsender 	= 'contato@autolocadoraquevedo.com.br';
		
		// Define os dados do servidor e tipo de conex�o
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem ser� SMTP
		$mail->SMTPDebug = 1;
		$mail->Host = "smtp.autolocadoraquevedo.com.br"; // Endere�o do servidor SMTP
		$mail->Port = '587'; // Porta SMTP
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true; // Usa autentica��o SMTP? (opcional)
		$mail->Username = $emailsender; // Usu�rio do servidor SMTP
		$mail->Password = 'hpJ*j871'; // Senha do servidor SMTP
		
		// Define o remetente
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->From = $emailsender; // Seu e-mail
		//$mail->Sender = $emailsender; // Seu e-mail
		$mail->FromName = "Autolocadora Quevedo"; // Seu nome
		
		// Define os destinat�rio(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress($Email, ''); // Email destino
		$mail->AddCC('contato@autolocadoraquevedo.com.br', ''); // Copia
		$mail->AddReplyTo($Email, ''); // Reply-To - responder email para o anunciante
		
		// Define os dados t�cnicos da Mensagem
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
		//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
		$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional) 

		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$textMsg  = "Prezado(a) ".$Nome." sua mensagem abaixo foi enviada com sucesso, aguarde nosso retorno.<br><br>";
		//$textMsg .= $Mensagem;
		//$mail->Subject  = $Assunto.": ".$Telefone."-".$Cidade; // Assunto da mensagem
		$mail->Subject  = 'Site da Auto Locadora Quevedo'; // Assunto da mensagem
		//$mail->Body 	= $textMsg;
		$mail->Body 	= $Estilo . '<center><h2>Mensagem do Visitante</h2></center> <br/><br/>' . "\n\n" . $textMsg . "\n\n" . '<br/><br/> <strong>Nome: </strong>' . $Nome . "\n\n" . '<br/> <strong>Cidade: </strong>' . $Cidade . "\n\n" . '<br/> <strong>Telefone: </strong>' . $Telefone . "\n\n" . '<br/> <strong>Email: </strong>' . $Email . "\n\n" . '<br/> <strong>Assunto: </strong>' . $Assunto . "\n\n" . '<br/> <strong>Categoria: </strong>' . $Categoria . "\n\n" . '<br/> <strong>Tipo Aluguel: </strong>' . $Tipo_Aluguel . "\n\n" . '<br/> <strong>Mensagem: </strong>' . $Mensagem . $Rodape; 

		// Envia o e-mail
		$mail->Send();
		// Limpa os destinat�rios e os anexos
		$mail->ClearAllRecipients();
		

		//@mail("contato@autolocadoraquevedo.com.br", "SITE - ".$Assunto.": ".$Telefone." ".$Nome, $Mensagem, $headers);
		echo "<script language='JavaScript'>(alert(\"Seu e-mail foi enviado com sucesso!\\nEm breve estaremos entrando em contato...\"))</script>";
		//echo "<script language='javascript'>url = '../contato/'; document.location = url;</script>";
		echo "<script language=\"JavaScript\">history.go(-1);</script>";

		//header("location:contact.html");

    }else{
		//http://www.mauricioprogramador.com.br/posts/acentuacao-em-alerts-javascript
		//echo 'A verificação não foi autenticada, gentileza tentar novamente';
		echo "<script language=\"JavaScript\">alert (\"A verifica\u00e7\u00e3o n\u00e3o foi autenticada, gentileza tentar novamente!\");</script>
		 <script language=\"JavaScript\">history.go(-1);</script>";
    }
 }else{
	//echo 'Você não selecionou o recaptcha';
	echo "<script language=\"JavaScript\">alert (\"Voc\u00ea n\u00e3o selecionou o recaptcha!\");</script>
		 <script language=\"JavaScript\">history.go(-1);</script>";
 }


?>