<?php
error_reporting(E_ERROR | E_PARSE);
require_once('PHPMailer/PHPMailerAutoload.php');

if (isset($_POST)) {

    //Google Recaptcha
    $secretKey = "6LfrfuoUAAAAAGNZvKKgI-g4ObERBCJ9kE6G336R";
    $responseKey = $_POST["recaptcha"];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

    $response = file_get_contents($url);
    $response = json_decode($response);

    if ($response->success) {

        //DADOS FORMULÁRIO
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $telefone = $_POST['phone'];
        $mensagem = $_POST['message'];

        $email_conteudo = "Nome: $nome <br/>";
        $email_conteudo .= "Email: $email <br/>";
        $email_conteudo .= "Telefone: $telefone <br/>";
        $email_conteudo .= "Mensagem: $mensagem <br/>";


        //DADOS SMTP GMAIL
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // SMTP server
        $mail->Port = 465;                   // set the SMTP port for the GMAIL server
        $mail->isHTML();                   // set the SMTP port for the GMAIL server
        $mail->Username = "apps@neiru.org";  // GMAIL username
        $mail->Password = "uhghblbfpddkadju";  // GMAIL password
        $mail->SetFrom('apps@neiru.org', 'Contato Plano Diretor Éloi Mendes');
        $mail->Subject = "Contato Plano Diretor Éloi Mendes";
        $mail->Body = $email_conteudo;
        $mail->AddAddress("planodiretor.eloimendes@neiru.org");
        if (!$mail->Send()) {
            $obj = (object)[
                'code' => 503,
                'message' => 'Falha no envio do contato. Tente novamente.'
            ];
            echo json_encode($obj);
        } else {
            $obj = (object)[
                'code' => 200,
                'message' => 'Sua mensagem foi enviada com sucesso! Obrigado pelo contato!'
            ];
            echo json_encode($obj);
        }


    } else {
        $obj = (object)[
            'code' => 503,
            'message' => 'Falha no envio do contato. Verificação de "Não sou um robô" falhou. Por favor, faça a verificação e tente novamente.'
        ];
        echo json_encode($obj);
    }
}