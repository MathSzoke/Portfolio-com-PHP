<?php
session_start();
include('db.php');

if(isset($_POST['Email']))
{
    $nomeEmail = mysqli_real_escape_string($conexao, $_POST["Email"]);
    $query = "SELECT * FROM Usuario WHERE Email = '".$nomeEmail."'";

    $result = mysqli_query($conexao, $query);
    echo mysqli_num_rows($result);
}
?>