<?php
include 'db.php';
try
{
    if (isset($_POST['name']) && isset($_POST["email"]) && isset($_POST['subject']) && isset($_POST['message'])) 
    {
        $nome = $_POST["name"];
        $email = $_POST["email"];
        $assunto = $_POST["subject"];
        $mensagem = $_POST["message"];
    
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    
        $dataAgora = date("Y-m-d H:i:s", strtotime("-3 hours"));
    
        $output .= '<p>Nome: '.$nome.'<br>Dia: '.$dataAgora.'</p><br><br><p>'.$mensagem.'</p>';
        $body = $output;
        $subject = "$assunto";
    
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        
        $from = "$email";
    
        $meuEmail = "matheusszoke@gmail.com";
        
        $headers = 'From: '.$from."\r\n".
        'Reply-To: '.$meuEmail."\r\n" .
        'Content-type: text/html; charset=UTF-8' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        mail($meuEmail, $subject, $body, $headers);
        
        $insertQuery = "INSERT INTO contateMe (UsuarioID, Apelido, Email, Assunto, Mensagem, DataDoContato)
        VALUES ((SELECT UsuarioID FROM Usuario WHERE Email = '$email'), '$nome', '$email', '$assunto', '$mensagem', '$dataAgora');";
    
        $result = mysqli_query($conexao, $insertQuery);
        
        header('Location: home');
    }
    else
    {
        echo "Algo de errado ocorreu!<br><br><a href='home'>Voltar para home</a>";
    }
}
catch(Exception $e)
{
    echo $e;
}
?>