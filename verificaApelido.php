<?php
session_start();
include('db.php');

if(isset($_POST['Apelido']))
{
    $nomeApelido = mysqli_real_escape_string($conexao, $_POST["Apelido"]);
    $query = "SELECT * FROM Usuario WHERE Apelido = '".$nomeApelido."'";

    $result = mysqli_query($conexao, $query);
    echo mysqli_num_rows($result);
}
?>