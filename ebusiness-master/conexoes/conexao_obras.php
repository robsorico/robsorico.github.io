<?php 
 
// Conexão com o banco de dados
include_once("conexao.php");

// Inicia sessões
session_start();

$obras_acao               = isset($_REQUEST['obras_acao']) ? $_REQUEST['obras_acao'] : "";

$nu_obra                  = $_REQUEST['nu_obra'];
$nu_status_obras          = $_REQUEST['nu_status_obras'];
$id_imoveis_lote          = $_REQUEST['id_imoveis_lote']; // id do imovel é a referencia na tabela de imoveis, onde se puxa o endereço para a obra.
$nu_status_imoveis_lote  = $_REQUEST['nu_status_imoveis_lote'];
//$data_rg = implode("-",array_reverse(explode("/",$_REQUEST['dat_rg']))); 
$dat_inic         = $_REQUEST['dat_inic'];
$dat_fim          = $_REQUEST['dat_fim'];
if ($dat_fim == '') {
    $dat_fim = 'null';
}
$qtde             = $_REQUEST['qtde']; 
$tipo             = $_REQUEST['tipo']; 
$cnpj_obra        = $_REQUEST['cnpj_obra'];
$dat_ent_cnpj     = $_REQUEST['dat_ent_cnpj'];
$dat_fim_cnpj     = $_REQUEST['dat_fim_cnpj'];
if ($dat_fim_cnpj == '') {
    $dat_fim_cnpj = 'null';
}
$cei_obra         = $_REQUEST['cei_obra'];
$dat_ent_cei      = $_REQUEST['dat_ent_cei'];
$dat_fim_cei      = $_REQUEST['dat_fim_cei'];
if ($dat_fim_cei == '') {
    $dat_fim_cei = 'null';
}
$nu_alvara        = $_REQUEST['nu_alvara'];
$dat_alvara       = $_REQUEST['dat_alvara'];
$autor_proj       = $_REQUEST['autor_proj'];
$crea_alvara      = $_REQUEST['crea_alvara'];
$usuario          = $_REQUEST['usuario'];

echo '<pre>';
echo var_dump($obras_acao);
echo var_dump($nu_obra);
echo var_dump($id_imoveis);
echo var_dump($status_obra);
echo var_dump($dat_inic);
echo var_dump($dat_fim);
echo var_dump($qtde);
echo var_dump($tipo);
echo var_dump($cnpj_obra);
echo var_dump($dat_ent_cnpj);
echo var_dump($dat_fim_cnpj);
echo var_dump($cei_obra);
echo var_dump($dat_ent_cei);
echo var_dump($dat_fim_cei);
echo var_dump($nu_alvara);
echo var_dump($dat_alvara);
echo var_dump($autor_proj);
echo var_dump($crea_alvara);
echo '</pre>';


if ($obras_acao == 'ins') {

$query_select = "SELECT `nu_alvara` FROM `cadastro_obras` WHERE `nu_alvara` = '$nu_alvara'";
$select = mysqli_query($conn, $query_select);
$result = mysqli_fetch_array($select);
$obra_result = $result['nu_alvara'];
 
    if($obra_result <> '' or $obra_result <> null){

      echo"<script language='javascript' type='text/javascript'>
      alert('Essa obra já existe');window.location.href='
      ../intranet/operacional/obras/cadastro_obras.php';</script>";
      die();

    }else{

      // INSERE A NOVA OBRA:
      $sql = mysqli_query($conn, "INSERT INTO `cadastro_obras`(`id_obras`, `dat_cadastro`, `nu_obra`, `nu_status_obras`, `dat_inic`, `dat_fim`, `qtde_imoveis`, `tipo_imoveis`, `nu_insc_cnpj`, `dat_ent_cnpj`, `dat_fim_cnpj`, `nu_insc_cei`, `dat_ent_cei`, `dat_fim_cei`, `nu_alvara`, `dat_alvara`, `txt_autor_proj`, `nu_crea`, `usuario_ins`) VALUES (null, CURDATE(), '$nu_obra','$nu_status_obra','$dat_inic',$dat_fim,'$qtde','$tipo','$cnpj_obra','$dat_ent_cnpj', $dat_fim_cnpj,'$cei_obra','$dat_ent_cei',$dat_fim_cei,'$nu_alvara','$dat_alvara','$autor_proj','$crea_alvara', '$usuario') ");

         
          if($sql){

            // PEGA O NUMERO DO ID_OBRAS PARA INCLUIR NA TABELA DE IMOVEIS:
            $query_select = "SELECT `id_obras` FROM `cadastro_obras` WHERE `nu_obra` = '$nu_obra'";
            $select = mysqli_query($conn, $query_select);
            $result = mysqli_fetch_array($select);
            $id_obras = $result['id_obras'];

            // INCLUINDO O ID_OBRAS E AS ALTERAÇÕES NO LOTE - TABELA DE IMÓVEIS:
            $sql_lote = mysqli_query ($conn, " UPDATE `cadastro_imoveis` SET `nu_status_imoveis`= '$nu_status_imoveis_lote', `id_obras`= '$id_obras', `dat_alteracao` = CURDATE(), `usuario_alt`= '$usuario' WHERE id_imoveis = $id_imoveis_lote "); 

            
            echo"<script language='javascript' type='text/javascript'>
            alert('Obra cadastrada com sucesso!');window.location.
            href='../intranet/operacional/obras/cadastro_obras.php'</script>";

          } else {
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar essa obra');window.location
            .href='../intranet/operacional/obras/cadastro_obras.php'</script>";
          }
    
    } 
         
} elseif ($obras_acao == 'alt') {

$id_obras = $_REQUEST['id_obras'];  

$sql = mysqli_query($conn, "UPDATE `cadastro_obras` SET `nu_obra`=$nu_obra,`id_imoveis`=$id_imoveis,`txt_status_obra`=$status_obra,`dat_inic`=$dat_inic,`dat_fim`=$dat_fim,`qtde_imoveis`=$qtde,`tipo_imoveis`=$tipo,`nu_insc_cnpj`=$cnpj_obra,`dat_ent_cnpj`=$dat_ent_cnpj,`dat_fim_cnpj`=$dat_fim_cnpj,`nu_insc_cei`=$cei_obra,`dat_ent_cei`=$dat_ent_cei,`dat_fim_cei`=$dat_fim_cei,`nu_alvara`=$nu_alvara,`dat_alvara`=$dat_alvara,`txt_autor_proj`=$autor_proj,`nu_crea`=$crea_alvara, `dat_alteracao`=CURDATE(), `id_usuarios`=null WHERE id_obras = $id_obras");

      
          if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Obra alterada com sucesso!');window.location.
            href='../intranet/operacional/clientes/visualizar_clientes.php?id_cliente=$id_cliente'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível alterar essa obra');window.location
            .href='../intranet/operacional/clientes/lista_clientes.php'</script>";
          }


} elseif ($obras_acao == 'exc') {

$id_obras = $_REQUEST['id_obras'];  

$sql = mysqli_query($conn, "DELETE FROM `cadastro_obras` WHERE id_obras = $id_obras");

      
          if($sql){
            echo"<script language='javascript' type='text/javascript'>
            alert('Obra excluída com sucesso!');window.location.
            href='../intranet/operacional/clientes/lista_clientes.php'</script>";
          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível excluir essa obra');window.location
            .href='../intranet/operacional/clientes/lista_clientes.php'</script>";
          }



}  


?>






