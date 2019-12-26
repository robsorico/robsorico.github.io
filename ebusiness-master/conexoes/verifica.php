<?php 
// Inicia sessões 
session_start(); 
 
// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["usuarioId"]) || !isset($_SESSION["usuarioUsuario"])) 
{ 
$_SESSION['loginErro'] = "Usuário não está logado. Por favor faça novo login.";
// Usuário não logado! Redireciona para a página de login 
header("Location: ../home.php"); 
exit; 
} 
?>