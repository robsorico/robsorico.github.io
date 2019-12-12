
<!DOCTYPE html>
<html lang="pt-br">
       
<?php 
// Inicia sessões 
session_start(); 
// Conexão com o banco de dados
 include_once("../../../conexoes/conexao.php");
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

/*
// Função para mostrar o endereço do cep:
function get_endereco($cep_auto){

  // Formatar o cep removendo os caracteres não numéricos:
  $cep_auto = preg_replace("/^0-9]/", "", $cep_auto);
  $url = "http://viacep.com.br/ws/$cep_auto/xml/";

  $xml = simplexml_load_file($url);
  return $xml;
}
//$endereço = (get_endereco(cep()));
//echo "Rua: $endereço->logradouro"; */

$id_imoveis = $_GET['id_imoveis'];
$obra = $_GET['obra'];

$consulta_imoveis = "SELECT * FROM cadastro_imoveis WHERE id_imoveis = $id_imoveis";
$con = $conn->query($consulta_imoveis) or die($mysqli->error);

while ($dado = $con->fetch_array()){

      $dat_cadastro = $dado['dat_cadastro'];
      $cep          = $dado['nu_cep'];
      $endereco     = $dado['txt_end']; 
      $num_end      = $dado['num_end'];
      $tipo         = $dado['txt_tipo'];
      $compl_end    = $dado['txt_compl']; 
      $bairro       = $dado['txt_bairro']; 
      $cidade       = $dado['txt_cidade'];
      $uf           = $dado['txt_uf'];
      $matricula    = $dado['nu_matricula'];
      $livro        = $dado['nu_livro'];
      $folha        = $dado['nu_folha'];
      $dat_reg      = $dado['dat_reg'];
      $nome_cart    = $dado['txt_nome_cart'];
      $iptu         = $dado['nu_iptu'];
      $nu_hab       = $dado['nu_habite_se'];
      $dat_hab      = $dado['dat_habite_se'];
      $resp_tec     = $dado['txt_resp_tec'];
      $crea         = $dado['nu_crea'];
      $status       = $dado['txt_status'];
      $nu_agua      = $dado['nu_agua'];
      $cond_agua    = $dado['txt_condic_agua'];
      $nu_energ     = $dado['nu_energia'];
      $cond_energ   = $dado['txt_condic_energ'];

}

/*$consulta_obras = "SELECT * FROM cadastro_obras WHERE id_imoveis = $id_imoveis";
$con = $conn->query($consulta_obras) or die($mysqli->error);

while ($dado = $con->fetch_array()){
    $obra = $dado['id_obras'];
}*/

?>

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">    
    <!-- Estilização dos sites feito por mim - Robson -->
    <link href="../../../css/style.css" rel="stylesheet">

    <link rel="icon" href="../../../img/sifrao1.ico">

    <title>CAPERON - IMÓVEIS</title>

     
</head>
  
<body style="height: 100%;" >

 <div class="corpo_carteira" >
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-md-nowrap p-1 shadow">
          <img style="margin-left: 0px; height: 35px;" src="../../../img/caperon_titulo.png">       

          <div style="margin-left: 45px;" class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="../../home.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="../../administrativo/administrativo.php">Administrativo</a></li>
              <li class="nav-item"><a class="nav-link" href="../../financeiro/financeiro_mural.php">Financeiro</a></li>            
              <li class="nav-item active"><a class="nav-link" href="../../operacional/operacional.php">Operacional</a></li>
              <li class="nav-item"><a class="nav-link" href="../../ajuda.php">Ajuda</a></li>         
            </ul>
            <form class="form-inline">
                <div class="btn-group" role="group" style="margin-right: 5px;">
                  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $usuario;?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                       <a class="dropdown-item" href="#">Trocar Senha</a>
                       <a class="dropdown-item" href="#">Atualizar Dados Pessoais</a>
                  </div>
                </div>
              <button class="btn btn-outline-info my-2 my-sm-0"><a href="../../../conexoes/sair.php">Sair</a></button>
            </form>
          </div>
        </nav>

 </div>

<nav class="nav_submenu">          
            <ul>
              <li>CLIENTES
                  <ul>
                      <li><a href="../clientes/lista_clientes.php">Lista</a></li>
                      <li><a href="../clientes/cadastro_clientes.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li style="font-weight: bold;">IMÓVEIS
                 <ul>
                      <li><a href="../imoveis/lista_imoveis.php">Lista</a></li>
                      <li><a href="../imoveis/cadastro_imoveis.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li>OBRAS
                  <ul>
                      <li><a href="../obras/lista_obras.php">Lista</a></li>
                      <li><a href="../obras/cadastro_obras.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li>PARCEIROS
                  <ul>
                      <li><a href="../parceiros/lista_parceiros.php">Lista</a></li>
                      <li><a href="../parceiros/cadastro_parceiros.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li>CORRETORES
                  <ul>
                      <li><a href="../corretores/lista_corretores.php">Lista</a></li>
                      <li><a href="../corretores/cadastro_corretores.php">Cadastrar</a></li>  
                  </ul>
              </li>         
            </ul>                      
  </nav>  
      
 <div class="corpo_princ" style="margin-top: 130px; background-color: #F5F5DC; width: 80%; height: 50%; margin-left: 10%; margin-bottom: 5%" >   
                        
      
        <div class="corpo_sec" style="width: 950px; padding-top: 20px; margin-left: 70px;" > 

          <form method="POST" action="../../../conexoes/conexao_imoveis.php" name="form_imoveis">
        
              <h5 style="text-align: left; margin-top: -10px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">IMÓVEL</h5>


              <div class="form-row">
                  <div class="form-group col-md-2" style="margin-top: 15px;">
                    <label for="dat_cadastro">Data Cadastramento</label>
                    <input type="text" class="form-control" id="dat_cadastro" name="dat_cadastro" value="<?php echo $dat_cadastro;?>" disabled>
                  </div>
              </div>    

               <div class="form-row">   
                  <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" onchange="get_endereco(document.form_imoveis.cep.value)" class="form-control" id="cep" name="cep" value="<?php echo $cep;?>" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $endereco;?>" disabled>
                  </div>
                   <div class="form-group col-md-2">
                    <label for="num_end">Nº</label>
                    <input type="text" class="form-control" id="num_end" name="num_end" value="<?php echo $num_end;?>" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="tipo">TIPO</label>
                    <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo $tipo;?>" disabled>                      
                  </div>
              </div>    

                <div class="form-row">  
                  <div class="form-group col-md-5">
                    <label for="compl">Complemento</label>
                    <input type="text" class="form-control" id="compl" name="compl_end" value="<?php echo $compl_end;?>" disabled>
                  </div>
                   <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $bairro;?>" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cidade;?>" disabled>
                  </div>
                   <div class="form-group col-md-1">
                    <label for="uf">UF</label>
                    <input style="font-size: 11px; font-weight: bold;" type="text" class="form-control" id="uf" name="uf" value="<?php echo $uf;?>" disabled>                      
                  </div>
               </div>   


              <h6 style="text-align: left; margin-top: 20px; margin-bottom: 10px;" ><u>CARTÓRIO</u></h6>  

               <div class="form-row" > 
                <div class="form-group col-md-2">
                  <label for="matricula">Matrícula</label>
                  <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $matricula;?>" disabled>
                </div>
                <div class="form-group col-md-1">
                  <label for="livro">Livro</label>
                  <input type="text" class="form-control" id="livro" name="livro" value="<?php echo $livro;?>" disabled>
                </div>
                <div class="form-group col-md-1">
                  <label for="folha">Folha</label>
                  <input type="text" class="form-control" id="folha" name="folha" value="<?php echo $folha;?>" disabled>
                </div>
                <div class="form-group col-md-3">
                  <label for="dat_reg">Data do Registro</label>
                  <input type="date" class="form-control" id="dat_reg" name="dat_reg" value="<?php echo $dat_reg;?>" disabled>
                </div> 
                <div class="form-group col-md-5">
                  <label for="nome_cart">Nome Cartório</label>
                  <input type="text" class="form-control" id="nome_cart" name="nome_cart" value="<?php echo $nome_cart;?>" disabled>
                </div>                 
              </div>

              <h6 style="text-align: left; margin-top: 20px; margin-bottom: 10px;" ><u>PREFEITURA</u></h6> 
                
               <div class="form-row" >   
                 <div class="form-group col-md-2">
                    <label for="iptu">Nº IPTU</label>
                    <input type="text" class="form-control" id="iptu" name="iptu" value="<?php echo $iptu;?>" disabled>
                  </div>
               </div>

              <div class="form-row" > 
                
                  <div class="form-group col-md-2">
                    <label for="nu_hab">Nº Habite-se</label>
                    <input type="text" class="form-control" id="nu_hab" name="nu_hab" value="<?php echo $nu_hab;?>" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_hab">Data Habite-se</label>
                    <input type="date" class="form-control" id="dat_hab" name="dat_hab" value="<?php echo $dat_hab;?>" disabled>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="resp_tec">Responsável Técnico</label>
                    <input type="text" class="form-control" id="resp_tec" name="resp_tec" value="<?php echo $resp_tec;?>" disabled>
                  </div> 
                  <div class="form-group col-md-2">
                    <label for="crea">CREA</label>
                    <input type="text" class="form-control" id="crea" name="crea" value="<?php echo $crea;?>" disabled>
                  </div>                 
              </div> 


                <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">SITUAÇÃO</h5>

                <div class="form-row" >

                    <div class="form-group col-md-3">
                        <label for="status">STATUS</label>
                          <input style="font-size: 12px; font-weight: bold;" type="text" class="form-control" id="status" name="status" value="<?php echo $status;?>" disabled>                          
                      </div>

                  <div class="form-group col-md-1">
                    <label for="obra">OBRA</label>
                    <input type="text" class="form-control" id="obra" name="obra" value="<?php echo $obra?>" disabled>
                  </div>

                </div> 

                <div class="form-row" >

                    <div class="form-group col-md-3">
                      <label for="nu_agua">Nº ÁGUA</label>
                      <input type="text" class="form-control" id="nu_agua" name="nu_agua" value="<?php echo $nu_agua;?>" disabled>
                    </div> 
                    <div class="form-group col-md-5">
                      <label for="cond_agua">CONDIÇÃO</label>
                      <input style="font-size: 12px; font-weight: bold;"  type="text" class="form-control" id="cond_agua" name="cond_agua" value="<?php echo $cond_agua;?>" disabled>                      
                    </div>     

                </div>

                <div class="form-row" >

                    <div class="form-group col-md-3">
                      <label for="nu_energ">Nº ENERGIA</label>
                      <input type="text" class="form-control" id="nu_energ" name="nu_energ" value="<?php echo $nu_energ;?>" disabled>
                    </div> 
                    <div class="form-group col-md-5">
                      <label for="cond_energ">CONDIÇÃO</label>
                      <input style="font-size: 12px; font-weight: bold;"  type="text" class="form-control" id="cond_energ" name="cond_energ" value="<?php echo $cond_energ;?>" disabled>
                    </div>     

                </div>

              <button type="button" class="btn btn-primary" name="alterar" style="margin-left: 800px; background-color: green; border-color: green; width: 150px; margin-bottom: 50px;"><a style="text-decoration: none; color: white;" href="alterar_imoveis.php?id_imoveis=<?php echo $id_imoveis?>&obra=<?php echo $obra?>">Alterar</a></button>
      
          </form>        
      
    </div> 

</div>

  </body>
</html>