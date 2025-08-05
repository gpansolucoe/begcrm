<?php

class EmailCadastro
{
    function enviarEmail($nomeUsuario, $email)
    {

        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/imports/app.ini');

        $to = $email;
        $from = $config["email_remetente"];
        $fromName = $config["email_nome_remetente"];

        $subject = "Boas Vindas";

        $email_conteudo = '<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>' . $config["app_nome_empresa"] . ' Sistemas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body style="margin:0; padding:0; background-color:#f8f8f8; padding-top: 10px;">
    <!--Mailing Start-->
    <div leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="height:auto !important;width:100% !important; font-family: Helvetica,Arial,sans-serif !important; margin-bottom: 40px;">
        <center>
            <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" style="max-width:600px; background-color:#ffffff;border:1px solid #e4e2e2;border-collapse:separate !important; border-radius:4px;border-spacing:0;color:#242128; margin:0;padding:40px;" heigth="auto">
                <tbody>
                    <tr>
                        <td align="left" valign="center" style="padding-bottom:40px;border-top:0;height:100% !important;width:100% !important;">
                          <img width="150px" src="' . $config["app_url"] . 'img/' . $config["app_logo"] . '"></img>
                        </td>
                        <td align="right" valign="center" style="padding-bottom:40px;border-top:0;height:100% !important;width:100% !important;">
                            <span style="color: #8f8f8f; font-weight: normal; line-height: 2; font-size: 14px;"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-top:10px;border-top:1px solid #e4e2e2">
                            <h3 style="color:#303030; font-size:18px; line-height: 1.6; font-weight:500;">Seja bem vindo a ' . $config["app_nome_empresa"] . '!</h3>
							<h4>' . $nomeUsuario . '</h4>
                            <p style="color:#8f8f8f; font-size: 14px; padding-bottom: 20px; line-height: 1.4;">
								Muito obrigado por escolher a ' . $config["app_nome_empresa"] . '. Para continuarmos nosso serviço será preciso realizar a assinatura do contrato em nosso sistema.<br><br>
								Para acessa-lo é facil!, basta <a href="' . $config["app_url"] . '">clicar aqui</a> ou em ACESSAR AGORA.<br>								
								Os seus dados de acesso ao sistema são:<Br><Br>
								
								Email : <srtong>' . $email . '</strong><br>
								
								<Br>
								Senha: <strong>Os 5 ultimos números do seu CPF.</strong><br><Br> Exemplo: <span style="background-color:#f1f1f1; padding: 8px 15px; border-radius: 50px; display: inline-block; margin-bottom:20px; font-size: 14px;  line-height: 1.4; font-family: Courier New, Courier, monospace; margin-top:0">123.456.<span style="color:red;">789-89</span></span>
                            </p>
							
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;border-collapse:collapse;">
                                <tbody>
                                    <tr>
                                        <td style="padding:15px 0px;" valign="top" align="center">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate !important;">
                                                <tbody>
                                                    <tr>
                                                        <td align="center" valign="middle" style="padding:13px;">
                                                            <a href="' . $config["app_url"] . '" title="START NOW" target="_blank" style="font-size: 14px; line-height: 1.5; font-weight: 700; letter-spacing: 1px; padding: 15px 40px; text-align:center; text-decoration:none; color:#FFFFFF; border-radius: 50px; background-color:#145388;">ACESSAR AGORA</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-top:30px; padding-bottom:20px;; margin-bottom: 40px;">
                <tbody>
                    <tr>
                        <td align="center" valign="center">
                            <p style="font-size: 12px; text-decoration: none;line-height: 1; color:#909090; margin-top:0px; ">
                                ' . $config["app_endereco"] . '</p>
                    </tr>
                </tbody>
            </table>
        </center>
    </div>
    <!--Mailing End-->

</body></html>';

$urlCallBack = explode('?', $_SERVER['HTTP_REFERER'], 1);

     $parts = explode('/', $urlCallBack[0]);

        try {
            // Set content-type header for sending HTML email 
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers 
            $headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";

            // Send email 
            if (mail($to, $subject, $email_conteudo, $headers)) {
                header("Location: ../".$parts[sizeof($parts)-2]."/validar-atendimento.php?falha=false&tipo=create");
            } else {
                header("Location: ../".$parts[sizeof($parts)-2]."/validar-atendimento.php?falha=true&tipo=create");
            }
        } catch (Exception $e) {
            $toolsArray = array("Retrace", "Basic Error Logging", "Hammer", $e);
            error_log(print_r($toolsArray, true));
        }
    }
}
