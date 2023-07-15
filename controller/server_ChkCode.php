<?php
/**
* Um script do lado do servidor que responde a uma solicitação AJAX
* Este script obtém um objeto de token de formulário e o codifica em uma string JSON
* Ele armazena a string JSON na sessão PHP e a transmite para o cliente
**/
error_reporting(E_ALL);
require_once('class_ChkCode.php');
session_start();


// Get, save, and return a new form token object
$token = FormToken::get();
$_SESSION[$token->name] = json_encode($token);
session_write_close();
echo $_SESSION[$token->name];