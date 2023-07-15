<?php

try
{
    define('HOST', '127.0.0.1');
    define('USUARIO', 'u108892127_mathszoke');
    define('SENHA', 'C0ntr0lB@s308122001');
    define('DB', 'u108892127_portfolioMath');
    
    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar ao DB');
}
catch(Exception $php_errormsg)
{
    echo $php_errormsg;
}