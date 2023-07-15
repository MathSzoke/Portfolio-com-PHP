<?php

$code1 = rand(1,9);               //-------------Até eu aprender como fazer essa funcionalidade, vou deixar o formato de redefinição de senha a partir de um link.
$code2 = rand(0,9);
$code3 = rand(0,9);               //-------------Codigo para futuro método de redefinir senha.
$code4 = rand(0,9);               //-------------Abre uma modal na qual o usuário tem que inserir um conjunto de códigos aleatórios
$code5 = rand(0,9);               //-------------Caso o código esteja correto, fecha esse modal e abre outro com os textBox para redefinir a senha.

$storeCode = $code1 . $code2 . $code3 . $code4 . $code5; //-----------Amazenamento dos códigos em 1 váriavel.

