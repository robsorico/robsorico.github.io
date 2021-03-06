<?php 
// Inicia sessões 
session_start(); 
// Conexão com o banco de dados
 include_once("../../../conexoes/conexao.php");
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

// Função para mostrar o endereço do cep:
/*function get_endereco($cep_auto){

  // Formatar o cep removendo os caracteres não numéricos:
  $cep_auto = preg_replace("/^0-9]/", "", $cep_auto);
  $url = "http://viacep.com.br/ws/$cep_auto/xml/";

  $xml = simplexml_load_file($url);
  return $xml;
}*/

//$endereço = (get_endereco(cep()));

//echo "Rua: $endereço->logradouro";

// CONSULTA DOS LOTES PARA APRESENTAR O ENDEREÇO ONDE SERA FEITA A OBRA
$consulta = " SELECT * FROM cadastro_imoveis WHERE txt_tipo='LOTE' AND nu_status_imoveis=1 ";
$con = $conn->query($consulta) or die($mysqli->error);



?>

<!DOCTYPE html>
<html lang="pt-br">
       
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilização dos sites feito por mim - Robson -->    
    <link href="../../../css/style_caperon.css" rel="stylesheet">

    <link rel="icon" href="../../../img/sifrao1.ico">

    <title>CAPERON - OBRAS</title>

</head>
  
<body >

    <div class="corpo_carteira" >
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-md-nowrap p-1 shadow">
          <img style="margin-left: 0px; height: 35px;" src="../../../img/caperon_titulo.png">       

          <div style="margin-left: 45px;" class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="../../home.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="../../administrativo/administrativo.php">Administrativo</a></li>
              <li class="nav-item"><a class="nav-link" href="../../financeiro/financeiro_mural.php">Financeiro</a></li>            
              <li class="nav-item  active"><a class="nav-link" href="../../operacional/operacional.php">Operacional</a></li>
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
              <button class="btn btn-outline-info my-2 my-sm-0"><a href="../../conexoes/sair.php">Sair</a></button>
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
              <li>IMÓVEIS
                 <ul>
                      <li><a href="../imoveis/lista_imoveis.php">Lista</a></li>
                      <li><a href="../imoveis/cadastro_imoveis.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li style="font-weight: bold;">OBRAS
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
      
  <div class="corpo_princ" style="margin-top: 11%; background-color: #F5F5DC; width: 1100px; max-height: 820px; margin-left: 10%;" >   
                        
      
        <div class="corpo_sec" style="width: 950px; padding-top: 20px; margin-left: 70px;" > 

          <form method="POST" action="../../../conexoes/conexao_obras.php" >

              <h5 style="text-align: left; margin-top: 0px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">OBRA</h5>  
  
              <div class="form-row">
                  <div class="form-group col-md-1">
                    <label for="nu_obra">Nº Obra</label>
                    <input type="text" class="form-control" id="nu_obra"  name="nu_obra" required>
                  </div>

                  <div class="form-group col-md-9">
                    <label for="id_imoveis_lote">Endereço Completo</label>                    
                    <select class="custom-select mr-sm-2" id="id_imoveis_lote" name="id_imoveis_lote" required>
                            <option selected></option>                  
                        <?php while ($dado = $con->fetch_array()) 

                        { ?>
                            <option value="<?php echo $dado['id_imoveis'];?>"><?php echo 'LOTE Nº '.$dado["num_end"].' - '.$dado["txt_end"].' '.$dado["txt_compl"].' '.$dado["txt_bairro"].' '.$dado["txt_cidade"].'-'.$dado["txt_uf"]; ?></option>
                        <?php } ?>                                                            
                    </select>
                    
                  </div>

                  <input type="hidden" name="nu_status_obras" value=1>
                  <input type="hidden" name="nu_status_imoveis_lote" value=2>
                  
              </div>

              <div class="form-row" > 
                <div class="form-group col-md-3">
                  <label for="dat_inic">Data Inicio</label>
                  <input type="date" class="form-control" id="dat_inic" name="dat_inic" required>
                </div>    
                <div class="form-group col-md-3">
                  <label for="dat_fim">Data Fim</label>
                  <input type="date" class="form-control" id="dat_fim" name="dat_fim">
                </div> 
                <div class="form-group col-md-1">
                  <label for="qdte">Qtde</label>
                  <input type="text" class="form-control" id="qtde" name="qtde" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="tipo">Tipo</label>
                      <select class="custom-select mr-sm-2" id="tipo" name="tipo" required>
                        <option selected></option>
                        <option value="APTO">APTO</option>
                        <option value="CASA">CASA</option>
                                                         
                      </select>
                </div>
              </div>

             

              <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">RECEITA FEDERAL - DISO</h5>  

               <div class="form-row" > 
                  <div class="form-group col-md-3">
                    <label for="cnpj_obra">INSCRIÇÃO - CNPJ</label>
                    <input type="text" class="form-control" id="cnpj_obra" name="cnpj_obra" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_ent_cnpj">DATA ENTRADA</label>
                    <input type="date" class="form-control" id="dat_ent_cnpj" name="dat_ent_cnpj" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_fim_cnpj">DATA FIM</label>
                    <input type="date" class="form-control" id="dat_fim_cnpj" name="dat_fim_cnpj" >
                  </div>                              
              </div>
              <div class="form-row" > 
                  <div class="form-group col-md-3">
                    <label for="cei_obra">CADASTRO - CEI</label>
                    <input type="text" class="form-control" id="cei_obra" name="cei_obra" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_ent_cei">DATA ENTRADA</label>
                    <input type="date" class="form-control" id="dat_ent_cei" name="dat_ent_cei" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_fim_cei">DATA FIM</label>
                    <input type="date" class="form-control" id="dat_fim_cei" name="dat_fim_cei" >
                  </div>                              
              </div>

               <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">PREFEITURA</h5>  

               <div class="form-row" > 
                
                  <div class="form-group col-md-2">
                    <label for="nu_alvara">Nº Alvará</label>
                    <input type="text" class="form-control" id="nu_alvara" name="nu_alvara" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_alvara">Data Alvará</label>
                    <input type="date" class="form-control" id="dat_alvara" name="dat_alvara" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="autor_proj">Autor do Projeto</label>
                    <input type="text" class="form-control" id="autor_proj" name="autor_proj" required>
                  </div> 
                  <div class="form-group col-md-2">
                    <label for="crea_alvara">CREA</label>
                    <input type="text" class="form-control" id="crea_alvara" name="crea_alvara" required>
                  </div>                 
              </div> 
                     
        </div><br>
              
              <input type="hidden" name="obras_acao" value="ins">
              <input type="hidden" name="usuario" value="<?php echo $usuario?>">

              <button type="submit" class="btn btn-primary" name="cadastrar" style="margin-left: 850px; background-color: green; border-color: green; width: 150px; margin-bottom: 50px;">Cadastrar</button>
      
          </form>        
      
</div>

   <script type="text/javascript" src="../../../js/javascript_caperon.js"></script>

  </body>
</html>