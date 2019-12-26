<?php 
 
// Conexão com o banco de dados
include_once("conexao.php");

// Inicia sessões
session_start();

$cliente_interno = $_POST['cliente_interno'];

$id_cliente = $_POST['id_cliente'];
$dat_ent = $_POST['dat_ent'];
$nome = $_POST['nome']; 
$sexo = $_POST['sexo'];
$dat_nasc = $_POST['dat_nasc'];
$cpf = $_POST['cpf']; 
$rg = $_POST['rg']; 
$data_rg = implode("-",array_reverse(explode("/",$_POST['dat_rg'])));
$org_rg = $_POST['orgao_rg'];
$cep = $_POST['cep'];
$end = $_POST['endereco'];
$num_end = $_POST['num_end'];
$compl = $_POST['compl_end'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$cel1 = $_POST['cel1'];
$cel2 = $_POST['cel2'];
$email = $_POST['email'];
$corretor = $_POST['corretor'];
$cel1_corretor = $_POST['cel1_corretor'];
$cel2_corretor = $_POST['cel2_corretor'];
$obra = $_POST['obra'];
$situacao = $_POST['situacao'];

if ($cliente_interno == 'ins') {

$query_select = "SELECT  `nu_cpf` FROM `cadastro_clientes` WHERE  `nu_cpf` = '$cpf'";
$select = mysqli_query($conn, $query_select);
$array = mysqli_fetch_array($select);
$cpf_array = $array['nu_cpf'];
 
    if($cpf_array <> '' or $cpf_array <> null){

      echo"<script language='javascript' type='text/javascript'>
      alert('Esse usuario já existe');window.location.href='
      ../intranet/operacional/clientes/cadastro_clientes.php';</script>";
      die();

    }else{

      $sql = mysqli_query($conn, "INSERT INTO `cadastro_clientes`(`id_clientes`, `dt_entrada`, `txt_nome`, `txt_sexo`, `dat_nasc`, `nu_cpf`, `nu_rg`, `dat_rg`, `orgao_rg`, `txt_usuario`, `nu_senha`, `nu_cep`, `txt_endereco`, `txt_compl`, `num_end`, `txt_bairro`, `txt_cidade`, `txt_uf`, `txt_email`, `nu_cel1`, `nu_cel2`, `txt_corretor`, `nu_cel1_corretor`, `nu_cel2_corretor`, `nu_obra`, `nu_situacao`, `dat_alteracao` ) VALUES (null, CURDATE(),'$nome', '$sexo', '$dat_nasc', '$cpf', '$rg', '$data_rg', '$org_rg', null, null, '$cep','$end', '$compl', '$num_end', '$bairro', '$cidade', '$uf', '$email', '$cel1', '$cel2', '$corretor', '$cel1_corretor', '$cel2_corretor', '$obra', '$situacao', null) ");

         
          if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso!');window.location.
            href='../intranet/operacional/clientes/cadastro_clientes.php'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse usuário');window.location
            .href='../intranet/operacional/clientes/cadastro_clientes.php'</script>";
          }
    
    } 
         
} elseif ($cliente_interno == 'alt') {

$sql = mysqli_query($conn, "UPDATE `cadastro_clientes` SET `txt_nome`= '$nome',`txt_sexo`='$sexo',`dat_nasc`= '$dat_nasc',`nu_cpf`= '$cpf',`nu_rg`= '$rg',`dat_rg`= '$data_rg',`orgao_rg`= '$org_rg',`txt_usuario`= null,`nu_senha`= null,`nu_cep`= '$cep',`txt_endereco`= '$end',`txt_compl`= '$compl',`num_end`= '$num_end',`txt_bairro`= '$bairro',`txt_cidade`= '$cidade',`txt_uf`= '$uf',`txt_email`= '$email',`nu_cel1`= '$cel1',`nu_cel2`= '$cel2',`txt_corretor`= '$corretor',`nu_cel1_corretor`= '$cel1_corretor',`nu_cel2_corretor`= '$cel2_corretor',`nu_obra`= '$obra',`nu_situacao`= '$situacao', `dat_alteracao`= CURDATE() WHERE id_clientes = $id_cliente");

      
          if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Cliente alterado com sucesso!');window.location.
            href='../intranet/operacional/clientes/visualizar_clientes.php?id_cliente=$id_cliente'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível alterar esse cliente');window.location
            .href='../intranet/operacional/clientes/lista_clientes.php'</script>";
          }


} elseif ($cliente_interno == 'exc') {

$sql = mysqli_query($conn, "DELETE FROM `cadastro_clientes` WHERE id_clientes = $id_cliente");

      
          if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Cliente excluído com sucesso!');window.location.
            href='../intranet/operacional/clientes/lista_clientes.php'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível excluir esse cliente');window.location
            .href='../intranet/operacional/clientes/lista_clientes.php'</script>";
          }



}  

  /*echo '<pre>';
  var_dump($nome);
  var_dump($sexo);
  var_dump($tel1);
  var_dump($tel2);
  var_dump($tel3);
  var_dump($cpf);
  var_dump($rg);
  var_dump($data_rg);
  var_dump($org_rg);
  var_dump($email1);
  var_dump($email2);
  var_dump($obra);
  var_dump($casa_obra);
echo '</pre>';*/


?>






