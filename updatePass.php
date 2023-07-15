<?php
include 'db.php';
if(isset($_POST['senhaReset']) && isset($_POST['email']) && isset($_POST['token']))
{
    $email = $_POST['email'];
    $token = $_POST['token'];
    $hashPass = md5($_POST['senhaReset']);

    $query = mysqli_query($conexao, "SELECT * FROM EsqueciSenha WHERE resetLinkToken = '".$token."' AND Email = '".$email."' AND Usado = 0");
    $row = mysqli_num_rows($query);
    if($row)
    {
        $queryUpdateES = mysqli_query($conexao, "UPDATE EsqueciSenha SET NovaSenha = '$hashPass', Usado = 1, Expirado = 1, Acao = 'Usado' WHERE Email = '".$email."' AND resetLinkToken = '".$token."' AND Acao = 'Aguardando' AND Expirado = 0 AND Usado = 0");
        $queryUpdateUser = mysqli_query($conexao, "UPDATE Usuario SET Senha = '$hashPass' WHERE Email = '".$email."'");
        header('Location: /');
    }
    else
    {
        echo "<p>Algo de errado ocorreu. Por favor, tente novamente</p>
        <br><br>
        <a href='resetPass?key=".$email."&token=".$token."'>Clique aqui para resetar senha</a>";
    }
}
else
{
    echo "<p>Algo de errado ocorreu. Por favor, tente novamente</p>
    <br><br>
    <a href='resetPass?key=".$email."&token=".$token."'>Clique aqui para resetar senha</a>";
}
?>