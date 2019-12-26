<?php 
 
// Conexão com o banco de dados
include_once("conexao.php");

// Inicia sessões
session_start();


/*


if ($senha !== $conf_senha) {
  echo"<script language='javascript' type='text/javascript'>
        alert('senha nao confere com sua confirmação de senha, favor tentar novamente');window.location
        .href='cadastro.html';</script>";
        die();
}else { 

$connect = mysqli_connect('localhost','root','');
$db = mysqli_select_db('dinbank');

$query_select = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
$select = mysqli_query($query_select,$connect);
$array = mysqli_fetch_array($select);
$logarray = $array['usuario'];
 
    if($logarray == $usuario){

      echo"<script language='javascript' type='text/javascript'>
      alert('Esse usuario já existe');window.location.href='
      cadastro.html';</script>";
      die();

    }else{
      $query = "INSERT INTO usuarios (data,nome_compl,usuario,senha,situacao_id,niveis_acesso,email,sexo,estado_uf) VALUES ('$data','$nome_compl','$usuario','$senha','$situacaoId','$niveis_acesso','$email','$sexo','$estado_uf')";
      $insert = mysqli_query($query,$connect);
       
      if($insert){
        echo"<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');window.location.
        href='home.php'</script>";
      }else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse usuário');window.location
        .href='cadastro.html'</script>";
      }
    } 

}


$usuario = $_POST['usuario'];
$senha = MD5($_POST['senha']);

$sql = mysqli_query($conn,"SELECT * FROM cadastro_clientes WHERE txt_usuario = $usuario and nu_senha = $senha");

*/ 

?>