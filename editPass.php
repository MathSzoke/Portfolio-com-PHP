<?php
include 'home.php'; 

if(isset($sessionEmail) && isset($_POST['passEdit']))
{
    try
    {
        $email = isset($_POST['inputEmail']);
        $searchQuery = "SELECT * FROM Usuario WHERE Email = '".$sessionEmail."'";
        $resultQuery = mysqli_query($conexao, $searchQuery);
        $row = mysqli_num_rows($resultQuery);
        $rowArray = mysqli_fetch_array($resultQuery);
        
        $senha1 = md5(isset($_POST['passEdit']));

        if($row)
        {
            $updatePass = mysqli_query($conexao, "UPDATE Usuario SET Senha = '".$senha1."' WHERE Email = '".$sessionEmail."'");
            header('Location: home');
        }
        else
        {
            echo "<p>Algo de errado ocorreu. Por favor, tente novamente</p>";
        }
    }
    catch(Exception $e)
    {
        header('Location: home');
        error_reporting(E_ALL);
    }
}