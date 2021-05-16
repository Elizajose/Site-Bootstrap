<?php
function sendMail($de,$para,$mensagem,$assunto)
{
    require_once('contato.html');
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    try {
      $mail->SMTPAuth   = true;
      $mail->Host       = 'elizandrojose1@gmail.com';
      $mail->SMTPSecure = "tls"; 
     $mail->Port       = 587;   
      $mail->Username   = '@gmail.com';
      $mail->Password   = 'suasenha';
      $mail->AddAddress($para);
     $mail->AddReplyTo($de);
     $mail->SetFrom($de);
      $mail->Subject = $assunto;
      $mail->MsgHTML($mensagem);
      $mail->Send();    
      $envio = true;
    } catch (phpmailerException $e) {
      $envio = false;
    } catch (Exception $e) {
      $envio = false;
    }
    return $envio;
}
?>