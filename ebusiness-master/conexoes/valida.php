<?php
	
	 session_start();
	 include_once("conexao.php");

	if ((isset($_POST['usuario'])) && (isset($_POST['senha']))) {

		$usuario = mysqli_real_escape_string($conn, $_POST['usuario']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		//$senha = md5($senha); //Criptografia da senha

		$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$senha' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		$resultado = mysqli_fetch_assoc($result);

		if (empty($resultado)) {
			$_SESSION['loginErro'] = "Usuário ou senha inválido";
			header("Location: ../index.html");
		
		} elseif (isset($resultado)) {				
			$_SESSION['usuarioId'] = $resultado['id'];
		 	$_SESSION['usuarioNome'] = $resultado['nome_compl'];
		 	$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso'];
		 	$_SESSION['usuarioUsuario'] = $resultado['usuario'];
		 	$_SESSION['usuarioSenha'] = $resultado['senha'];

		 	// Definindo niveis de acesso:
		 	if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                header("Location: ../intranet/home.php");
            }elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
                header("Location: ../clientes/clientes.php");
            }else {
            	$_SESSION['loginErro'] = "Verificar nivel de acesso com o Administrador do site.";
            }
			
		
		} else {
			$_SESSION['loginErro'] = "Usuário ou senha inválido";
			header("Location: ../index.html");
		}
	}else {
		
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: ../index.html");

	}
?>