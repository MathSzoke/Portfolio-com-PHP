<?php
include 'db.php';

if (isset($_POST["emailCodeValidation"]) && (!empty($_POST["emailCodeValidation"]))) 
{
    $email = $_POST["emailCodeValidation"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    $horaExpira = mysqli_query($conexao, "SELECT HoraExpira FROM EsqueciSenha where Acao = 'Aguardando';");
    $dataEmail = date("Y-m-d H:i:s", strtotime("-3 hours +5 minute"));
    $dataAgora = date("Y-m-d H:i:s", strtotime("-3 hours"));
    
    $queryUpdate = mysqli_query($conexao, "UPDATE EsqueciSenha SET Expirado = 1, Acao = 'Expirado' WHERE HoraExpira < '$dataAgora' AND Acao = 'Aguardando';");
    
    if($email)
    {
        while ($row = $horaExpira->fetch_assoc()) 
        {
            $horarioExpirado = $row['HoraExpira'];
        }
        if($dataAgora < $horarioExpirado)
        {
            echo "Código existente!";
        }
        else if ($dataAgora > $horarioExpirado)
        {
            try
            {
                $token = md5($emailId).rand(10,99999);
            
                $link = "<a href='www.mathszoke.com/resetPass?key=".$email."&token=".$token."'>Redefinir a senha</a>";
    
                $output .= 'Clique neste link para redefinir a senha '.$link.'';
                
                $body = $output;
                
                $subject = "Link para redefinir senha";
                
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                
                $from = "atendimento@mathszoke.com";
                
                $email_to = $email;
                
                $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$email_to."\r\n" .
                'Content-type: text/html; charset=UTF-8' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                
                mail($email_to, $subject, $body, $headers);
                
                $insertQuery = "INSERT INTO EsqueciSenha(UsuarioID,  Apelido, Email, NovaSenha, resetLinkToken, HoraExpira) 
                VALUES ((SELECT UsuarioID FROM Usuario WHERE Email = '$email'), 
                (SELECT Apelido FROM Usuario WHERE Email = '$email'), (SELECT Email FROM Usuario WHERE Email = '$email'),
                null, '$token', '$dataEmail')";
                
                $result = mysqli_query($conexao, $insertQuery);
            }
            catch(Exception $e)
            {
                echo "Ocorreu um erro de exceção";
            }
        }
    }
}
?>