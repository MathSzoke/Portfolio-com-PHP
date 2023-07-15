<?php
include('db.php');

if(isset($_POST['Senha']))
{
    $senhaLogin = mysqli_real_escape_string($conexao, $_POST["Senha"]);
    $query = "SELECT * FROM Usuario WHERE Senha = md5('$senhaLogin')";

    $result = mysqli_query($conexao, $query);
    echo mysqli_num_rows($result);
}