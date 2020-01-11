<?php 
 
// Conexão com o banco de dados
include_once("conexao.php");

// Inicia sessões
session_start();

$imoveis_acao     = !empty($_REQUEST['imoveis_acao']) ? $_REQUEST['imoveis_acao'] : null;
$id_imoveis_lote  = !empty($_REQUEST['id_imoveis_lote']) ? $_REQUEST['id_imoveis_lote'] : null;

$status           = !empty($_REQUEST['status']) ? $_REQUEST['status'] : "-";  
$cep              = !empty($_REQUEST['cep']) ? $_REQUEST['cep'] : "-";
$end              = !empty($_REQUEST['end']) ? $_REQUEST['end'] : "-"; 
$num_end          = !empty($_REQUEST['num_end']) ? $_REQUEST['num_end'] : "-";
$tipo             = !empty($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "-";
$compl            = !empty($_REQUEST['compl_end']) ? $_REQUEST['compl_end'] : "-"; 
$bairro           = !empty($_REQUEST['bairro']) ? $_REQUEST['bairro'] : "-"; 
$cidade           = !empty($_REQUEST['cidade']) ? $_REQUEST['cidade'] : "-";
$uf               = !empty($_REQUEST['uf']) ? $_REQUEST['uf'] : "-";
$matricula        = !empty($_REQUEST['matricula']) ? $_REQUEST['matricula'] : "-";
$livro            = !empty($_REQUEST['livro']) ? $_REQUEST['livro'] : "-";
$folha            = !empty($_REQUEST['folha']) ? $_REQUEST['folha'] : "-";
$dat_reg          = !empty($_REQUEST['dat_reg']) ? $_REQUEST['dat_reg'] : "0000-00-00";  
$nome_cart        = !empty($_REQUEST['nome_cart']) ? $_REQUEST['nome_cart'] : "-";
$iptu             = !empty($_REQUEST['iptu']) ? $_REQUEST['iptu'] : "-";
$habite_se        = !empty($_REQUEST['nu_hab']) ? $_REQUEST['nu_hab'] : "-";
$dat_habite_se    = !empty($_REQUEST['dat_hab']) ? $_REQUEST['dat_hab'] : "0000-00-00";
/*if ($dat_habite_se === null){
    $dat_habite_se = null;
 }*/
$resp_tec         = !empty($_REQUEST['resp_tec']) ? $_REQUEST['resp_tec'] : "-";
$crea             = !empty($_REQUEST['crea']) ? $_REQUEST['crea'] : "-";
$nu_agua          = !empty($_REQUEST['nu_agua']) ? $_REQUEST['nu_agua'] : "-"; 
$cond_agua        = !empty($_REQUEST['cond_agua']) ? $_REQUEST['cond_agua'] : "-";  
$nu_energ         = !empty($_REQUEST['nu_energ']) ? $_REQUEST['nu_energ'] : "-";  
$cond_energ       = !empty($_REQUEST['cond_energ']) ? $_REQUEST['cond_energ'] : "-";  
$usuario          = !empty($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "-"; 
$id_obras         = !empty($_REQUEST['id_obras']) ? $_REQUEST['id_obras'] : null;

echo '<pre>';
echo var_dump($imoveis_acao);
echo var_dump($id_imoveis_lote);
echo var_dump($status);
echo var_dump($cep);
echo var_dump($end);
echo var_dump($num_end);
echo var_dump($tipo);
echo var_dump($compl);
echo var_dump($bairro);
echo var_dump($cidade);
echo var_dump($uf);
echo var_dump($matricula);
echo var_dump($livro);
echo var_dump($folha);
echo var_dump($dat_reg);
echo var_dump($nome_cart);
echo var_dump($iptu);
echo var_dump($habite_se);
echo var_dump($dat_habite_se);
echo var_dump($resp_tec);
echo var_dump($crea);
echo var_dump($nu_agua);
echo var_dump($cond_agua);
echo var_dump($nu_energ);
echo var_dump($cond_energ);
echo var_dump($id_obras);
echo var_dump($usuario);
echo 'Estou parado aqui.';
echo '</pre>';
//exit(0);


switch ($imoveis_acao) {
  
  case 'ins':  

    // FAZ A CONSULTA PARA SABER SE O IMÓVEL JÁ FOI CADASTRADO:
    $query_select = "SELECT  `nu_matricula` FROM `cadastro_imoveis` WHERE  `nu_matricula` = '$matricula'";
    $select = mysqli_query($conn, $query_select);
    $result = mysqli_fetch_array($select);
    $matricula_result = $result['nu_matricula'];

    if ($matricula_result <> '' or $matricula_result <> null) {
        echo"<script language='javascript' type='text/javascript'>alert('Essa matrícula já está cadastrada.');window.location.href='../intranet/operacional/imoveis/cadastro_imoveis.php'</script>";        
      
    } else {

      // RECEBENDO DADOS QUANDO IMOVEL FOR EM CONSTRUÇÃO - PEGANDO ENDEREÇO DO ID_IMOVEIS JA CADASTRADO.
      if ($id_imoveis_lote <> "") {

        $query_select = " SELECT nu_cep, txt_end, num_end, txt_compl, txt_bairro, txt_cidade, txt_uf, id_obras 
        FROM `cadastro_imoveis` WHERE  `id_imoveis` = '$id_imoveis_lote'";
        $select = mysqli_query($conn, $query_select);
        $result = mysqli_fetch_array($select);
          $cep      = $result['nu_cep'];
          $end      = $result['txt_end'] .' Lt '.$result['num_end'];        
          $compl    = $result['txt_compl'];
          $bairro   = $result['txt_bairro'];
          $cidade   = $result['txt_cidade'];
          $uf       = $result['txt_uf'];
          $id_obras = $result['id_obras'];
     
      }    


      echo "<pre>";
      echo 'Cheguei aqui.';
      echo '</pre>';
      //exit(0);


    $sql = mysqli_query($conn, " INSERT INTO `cadastro_imoveis`(`dat_cadastro`, `nu_status_imoveis`, `nu_cep`, `txt_end`, `num_end`, `txt_tipo`, `txt_compl`, `txt_bairro`, `txt_cidade`, `txt_uf`, `nu_matricula`, `nu_livro`, `nu_folha`, `dat_reg`, `txt_nome_cart`, `nu_iptu`, `nu_habite_se`, `dat_habite_se`, `txt_resp_tec`, `nu_crea`, `nu_agua`, `txt_condic_agua`, `nu_energia`, `txt_condic_energ`, `usuario_ins`, `dat_alteracao`, `usuario_alt`, `id_obras`) VALUES( CURDATE(), $status,'-','-','-','$tipo','-','-','-','-','$matricula','-','-','$dat_reg','-','-','-', '$dat_habite_se','-','-','-','-','-','-','$usuario', null, null, null) ");

       
       if($sql){
          echo"<script language='javascript' type='text/javascript'>alert('Imóvel cadastrado com sucesso!');window.location.href='../intranet/operacional/imoveis/cadastro_imoveis.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse imóvel');window.location.href='../intranet/operacional/imoveis/cadastro_imoveis.php'</script>";
        }
  
    } 
    
    break;

  case 'alt':

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

    break;

  case 'exc':

    $id_imoveis = $_REQUEST['id_imoveis'];  

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
     

    break;
  
 
}








