<?php
session_start();
include('db.php');

if(empty($_POST['email']) || empty($_POST['senha']))
{
    header('Location: /');
    exit();
}

$email = mysqli_real_escape_string($conexao,(string) $_POST['email']);
$senha = mysqli_real_escape_string($conexao,(string) $_POST['senha']);

$query = "SELECT * FROM Usuario WHERE Email = '$email' and Senha = md5('$senha')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
$dadosUsuario = mysqli_fetch_assoc($result);

if($row == 1)
{
    $_SESSION['apelido'] = $dadosUsuario['Apelido'];
    $_SESSION['email'] = $email;
    header('Location: home');
    exit();
} 
else
{
    $_SESSION['email'] != $email;
    header('Location: /');
    exit();
}