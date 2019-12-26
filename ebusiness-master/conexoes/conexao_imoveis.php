<?php 
 
// Conexão com o banco de dados
include_once("conexao.php");

// Inicia sessões
session_start();

$imoveis_acao = $_POST['imoveis_acao'];

$cep = $_POST['cep'];
$end = $_POST['endereco']; 
$num_end = $_POST['num_end'];
$tipo = $_POST['tipo'];
$compl = $_POST['compl_end']; 
$bairro = $_POST['bairro']; 
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$matricula = $_POST['matricula'];
$livro = $_POST['livro'];
$folha = $_POST['folha'];
$dat_reg = $_POST['dat_reg'];
$nome_cart = $_POST['nome_cart'];
$iptu = $_POST['iptu'];
$habite_se = $_POST['nu_hab'];
$dat_habite_se = $_POST['dat_hab'];
$resp_tec = $_POST['resp_tec'];
$crea = $_POST['crea'];
$status = $_POST['status'];
$nu_agua = $_POST['nu_agua'];
$cond_agua = $_POST['cond_agua'];
$nu_energ = $_POST['nu_energ'];
$cond_energ = $_POST['cond_energ'];


if ($imoveis_acao == 'ins') {
   
      $query_select = "SELECT  `nu_matricula` FROM `cadastro_imoveis` WHERE  `nu_matricula` = '$matricula'";
      $select = mysqli_query($conn, $query_select);
      $array = mysqli_fetch_array($select);
      $matricula_array = $array['nu_matricula'];
     
      if($matricula_array <> '' or $matricula_array <> null){

          echo"<script language='javascript' type='text/javascript'>
          alert('Esse usuario já existe');window.location.href='
          ../intranet/operacional/imoveis/cadastro_imoveis.php';</script>";
          die();
        
      } else{

      $sql = mysqli_query($conn, "INSERT INTO `cadastro_imoveis`(`id_imoveis`, `dat_cadastro`, `nu_cep`, `txt_end`, `num_end`, `txt_tipo`, `txt_compl`, `txt_bairro`, `txt_cidade`, `txt_uf`, `nu_matricula`, `nu_livro`, `nu_folha`, `dat_reg`, `txt_nome_cart`, `nu_iptu`, `nu_habite_se`, `dat_habite_se`, `txt_resp_tec`, `nu_crea`, `txt_status`, `nu_agua`, `txt_condic_agua`, `nu_energia`, `txt_condic_energ`, `dat_alteracao`) VALUES (null, CURDATE(), '$cep','$end','$num_end','$tipo','$compl','$bairro','$cidade','$uf','$matricula','$livro','$folha', '$dat_reg','$nome_cart','$iptu','$habite_se', '$dat_habite_se','$resp_tec','$crea','$status', '$nu_agua', '$cond_agua','$nu_energ','$cond_energ', null)");

         
         if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Imóvel cadastrado com sucesso!');window.location.
            href='../intranet/operacional/imoveis/cadastro_imoveis.php'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse imóvel');window.location
            .href='../intranet/operacional/imoveis/cadastro_imoveis.php'</script>";
          }
    
    } 
         
} elseif ($imoveis_acao == 'alt') {

$id_imoveis = $_POST['id_imoveis']; 
$obra = $_POST['obra']; 

$sql = mysqli_query($conn, "UPDATE `cadastro_imoveis` SET `nu_cep`= '$cep',`txt_end`= '$end',`num_end`= '$num_end',`txt_tipo`= '$tipo',`txt_compl`= '$compl',`txt_bairro`= '$bairro',`txt_cidade`= '$cidade',`txt_uf`= '$uf',`nu_matricula`= '$matricula',`nu_livro`= '$livro',`nu_folha`= '$folha',`dat_reg`= '$dat_reg',`txt_nome_cart`= '$nome_cart',`nu_iptu`= '$iptu',`nu_habite_se`= '$habite_se',`dat_habite_se`= '$dat_habite_se',`txt_resp_tec`= '$resp_tec',`nu_crea`= '$crea',`txt_status`= '$status', `nu_agua`= '$nu_agua',`txt_condic_agua`= '$cond_agua',`nu_energia`= '$nu_energ',`txt_condic_energ`= '$cond_energ', `dat_alteracao` = CURDATE() WHERE nu_matricula = $matricula");

      
          if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Imóvel alterado com sucesso!');window.location.
            href='../intranet/operacional/imoveis/visualizar_imoveis.php?id_imoveis=$id_imoveis&obra=$obra'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível alterar esse imóvel');window.location
            .href='../intranet/operacional/imoveis/lista_imoveis.php'</script>";
          }


} elseif ($imoveis_acao == 'exc') {

$id_imoveis = $_POST['id_imoveis'];  

$sql = mysqli_query($conn, "DELETE FROM `cadastro_imoveis` WHERE id_imoveis = $id_imoveis");

      
          if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Imóvel excluído com sucesso!');window.location.
            href='../intranet/operacional/imoveis/lista_imoveis.php'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível excluir esse imóvel');window.location
            .href='../intranet/operacional/imoveis/lista_imoveis.php'</script>";
          }



}  


?>






