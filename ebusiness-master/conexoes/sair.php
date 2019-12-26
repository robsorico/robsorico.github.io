<?php
	
	 session_start();
	 session_destroy(); // Destruindo todas as variáveis globais deste site

	 unset (
	 	$_SESSION['usuarioId'],
	 	$_SESSION['usuarioNome'],
	 	$_SESSION['usuarioNiveisAcessoId'],
	 	$_SESSION['usuarioUsuario'],
	 	$_SESSION['usuarioSenha']
	 );

	 $_SESSION['loginDeslogado'] = "Deslogado com sucesso";
	 // Redireciona o usuario para a pagina de login.
	 	header ("Location: ../index.html");

?>