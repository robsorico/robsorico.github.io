<?php 
// Inicia sessões
session_start(); ob_start(); // ob_start() é para evitar erro -- depois pesquisar

// Conexão com o banco de dados
 include_once("conexoes/conexao.php");

// Recupera login
$usuario = isset($_POST['usuario']) ? addslashes(trim($_POST["usuario"])) : FALSE;
// Recupera a senha, ja criptografando em MD5 
$senha = md5($_POST['senha']);
           
/** 
* Executa a consulta no banco de dados. 
* Caso o número de linhas retornadas seja 1 o login é válido, 
* caso 0, inválido. 
*/

$result = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '$usuario'") or die("Erro no banco de dados!"); 
$total = mysqli_num_rows($result); 

echo "<pre>";
var_dump($total);
echo "<pre>";

 
// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
if($total) 
{ 
    // Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
    $dados = mysqli_fetch_array($result); 
 

    // Agora verifica a senha 
    if(!strcmp($senha, $dados["senha"])) 
    { 

      echo "entrou na senha";
        // TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
        $_SESSION["id_usuario"]= $dados["id"]; 
        $_SESSION["nome_usuario"] = stripslashes($dados["nome_compl"]); 
        $_SESSION["permissao"]= $dados["niveis_acesso"]; 
        $_SESSION["situacao"]= $dados["situacao_id"]; 
        header("Location: index.php"); 
        exit;
        die(); 
    } 
    // Senha inválida 
    else
    { 
     "Senha inválida!"; 
    exit; 
    } 
} 
    // Login inválido 
else
{ 
    echo "O usuário fornecido por você é inexistente!"; 
    exit; 
} 
?>