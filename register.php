<?php
session_start();
include('db.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $apelidoRegister = $_POST['apelidoRegister'];
    $emailRegister = $_POST['emailRegister'];
    $senhaRegister = $_POST['senhaRegister'];

    if($emailRegister)
    {
        $emailVerifier = mysqli_query($conexao, "SELECT * FROM Usuario WHERE Email = '{$emailRegister}'");
        $apelidoVerifier = mysqli_query($conexao, "SELECT * FROM Usuario WHERE Apelido = '{$apelidoRegister}'");
     
        if(mysqli_num_rows($apelidoVerifier) > 0)
        {
            header("Location: index.php");
            die;
        }
        else if(mysqli_num_rows($emailVerifier) > 0)
        {
            header("Location: index.php");
            die;
        }
        else
        {
            $hashPass = md5($senhaRegister);
            $query = "INSERT INTO Usuario (Apelido, Email, Senha) VALUES ('$apelidoRegister', '$emailRegister', '$hashPass')";
            
            $result = mysqli_query($conexao, $query);

            header("Location: home.php");
            die;
        }
    }
    else
    {
        header("Location: home.php");
        die;
    }
}