<?php 
// Inicia sessões 
session_start(); 
// Conexão com o banco de dados
 include_once("../../../conexoes/conexao.php");
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

// Função para mostrar o endereço do cep:
function get_endereco($cep_auto){

  // Formatar o cep removendo os caracteres não numéricos:
  $cep_auto = preg_replace("/^0-9]/", "", $cep_auto);
  $url = "http://viacep.com.br/ws/$cep_auto/xml/";

  $xml = simplexml_load_file($url);
  return $xml;
}

//$endereço = (get_endereco(cep()));

//echo "Rua: $endereço->logradouro";

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
    <link href="../../../css/style.css" rel="stylesheet">

    <link rel="icon" href="../../../img/sifrao1.ico">

    <title>CAPERON - IMÓVEIS</title>


</head>
  
<body>

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

  
<?php 
  
  $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "" ; 
  $status = isset($_POST['status']) ? $_POST['status'] : "" ;


if ($tipo == '' and $status == '') { 

?>

  <div class="corpo_princ" style="margin-top: 11%; background-color: #F5F5DC; width: 43%; max-height: 19%; margin-left: 25%; margin-bottom: 3%;" >   
                        
      
        <div class="corpo_sec" style="width: 95%; padding-top: 20px; margin-left: 3%;" > 

          <form method="POST" action="cadastro_imoveis.php" name="">
        
              <h5 style="text-align: left; margin-top: -10px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">IMÓVEL</h5>

               <div class="form-row">

                  <div class="form-group col-md-4">
                    <label for="tipo">TIPO</label>
                      <select class="custom-select mr-sm-2" id="tipo" name="tipo" required>
                        <option selected></option>
                        <option value="APTO">APTO</option>
                        <option value="CASA">CASA</option>
                        <option value="LOTE">LOTE</option>                                  
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="status">STATUS TIPO</label>
                      <select class="custom-select mr-sm-2" id="status" name="status" required>
                        <option selected></option>
                        <option value="AQUISIÇÃO">AQUISIÇÃO</option>
                        <option value="CONSTRUÇÃO">CONSTRUÇÃO</option>                                                         
                      </select>
                  </div>                   

              <button type="submit" class="btn btn-primary" name="enviar" style="background-color: green; border-color: green; width: 10%; height: 5%; margin-top: 5.5%; margin-left: 2%;">Ok</button>
               </div>
            
             
      
          </form>        
      
    </div> 

</div>

<?php } elseif ($tipo == 'LOTE') { ?>

      
  <div class="corpo_princ" style="margin-top: 11%; background-color: #F5F5DC; width: 1100px; max-height: 98%; margin-left: 10%; margin-bottom: 3%; " >   
                        
      
        <div class="corpo_sec" style="width: 950px; padding-top: 20px; margin-left: 70px;" > 

          <form method="POST" action="../../../conexoes/conexao_imoveis.php" name="form_imoveis">
        
              <h5 style="text-align: left; margin-top: -10px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">IMÓVEL</h5>

               <div class="form-row" style="border-bottom: 0.5px solid #B9B9B9; padding-bottom: 1%;">

                  <div class="form-group col-md-2">
                    <label for="tipo">TIPO</label>
                      <select class="custom-select mr-sm-2" id="tipo" name="tipo" disabled>
                        <option selected><?php echo $tipo ?></option>          
                      </select>
                  </div>            

                  <div class="form-group col-md-4">
                    <label for="status">STATUS TIPO</label>
                      <select class="custom-select mr-sm-2" id="status" name="status" disabled>
                        <option selected><?php echo $status ?></option>                                
                      </select>
                  </div>   

               </div>   

              <div class="form-row" style="margin-top: 3%;">
                  
                  <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" onchange="get_endereco(document.form_imoveis.cep.value)" class="form-control" id="cep" name="cep" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" >
                  </div>
                   <div class="form-group col-md-2">
                    <label for="num_end">Nº</label>
                    <input type="text" class="form-control" id="num_end" name="num_end" >
                  </div>
                  
              </div>    

                <div class="form-row">  
                  <div class="form-group col-md-5">
                    <label for="compl">Complemento</label>
                    <input type="text" class="form-control" id="compl" name="compl_end" >
                  </div>
                   <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" >
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" >
                  </div>
                   <div class="form-group col-md-1">
                    <label for="uf">UF</label>
                      <select style="font-size: 11px; font-weight: bold;" class="custom-select mr-sm-2" id="uf" name="uf" >
                        <option selected></option>
                        <option value="DF">DF</option>
                        <option value="GO">GO</option>
                        <option value="MG">MG</option>                                  
                      </select>
                  </div>
               </div>   


              <h6 style="text-align: left; margin-top: 20px; margin-bottom: 10px;" ><u>CARTÓRIO</u></h6>  

               <div class="form-row" > 
                <div class="form-group col-md-2">
                  <label for="matricula">Matrícula</label>
                  <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>
                <div class="form-group col-md-1">
                  <label for="livro">Livro</label>
                  <input type="text" class="form-control" id="livro" name="livro">
                </div>
                <div class="form-group col-md-1">
                  <label for="folha">Folha</label>
                  <input type="text" class="form-control" id="folha" name="folha">
                </div>
                <div class="form-group col-md-3">
                  <label for="dat_reg">Data do Registro</label>
                  <input type="date" class="form-control" id="dat_reg" name="dat_reg" required>
                </div> 
                <div class="form-group col-md-5">
                  <label for="nome_cart">Nome Cartório</label>
                  <input type="text" class="form-control" id="nome_cart" name="nome_cart">
                </div>                 
              </div>

              <h6 style="text-align: left; margin-top: 20px; margin-bottom: 10px;" ><u>PREFEITURA</u></h6> 
                
               <div class="form-row" >   
                 <div class="form-group col-md-2">
                    <label for="iptu">Nº IPTU</label>
                    <input type="text" class="form-control" id="iptu" name="iptu">
                  </div>
               </div>

                <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">SITUAÇÃO</h5>

              
                <div class="form-row" >

                    <div class="form-group col-md-3">
                      <label for="nu_agua">Nº ÁGUA</label>
                      <input type="text" class="form-control" id="nu_agua" name="nu_agua">
                    </div> 
                    <div class="form-group col-md-5">
                      <label for="cond_agua">CONDIÇÃO</label>
                      <select style="font-size: 12px; font-weight: bold;" class="custom-select mr-sm-2" id="cond_agua" name="cond_agua" >
                            <option selected></option>
                            <option value="LIGADA">LIGADA</option>
                            <option value="DESLIGADA">DESLIGADA</option>           
                          </select>
                    </div>     

                </div>

                <div class="form-row" >

                    <div class="form-group col-md-3">
                      <label for="nu_energ">Nº ENERGIA</label>
                      <input type="text" class="form-control" id="nu_energ" name="nu_energ">
                    </div> 
                    <div class="form-group col-md-5">
                      <label for="cond_energ">CONDIÇÃO</label>
                      <select style="font-size: 12px; font-weight: bold;" class="custom-select mr-sm-2" id="cond_energ" name="cond_energ" >
                            <option selected></option>
                            <option value="LIGADA">LIGADA</option>
                            <option value="DESLIGADA">DESLIGADA</option>                                
                          </select>
                    </div>     

                </div>
   
              
              <input type="hidden" name="imoveis_acao" value="ins">

              <button type="submit" class="btn btn-primary" name="cadastrar" style="margin-left: 800px; background-color: green; border-color: green; width: 150px; margin-bottom: 50px;">Cadastrar</button>
      
          </form>        
      
    </div> 

</div>

<?php } else { ?>


   <div class="corpo_princ" style="margin-top: 11%; background-color: #F5F5DC; width: 1100px; max-height: 98%; margin-left: 10%; margin-bottom: 3%; " >   
                        
      
        <div class="corpo_sec" style="width: 950px; padding-top: 20px; margin-left: 70px;" > 

          <form method="POST" action="../../../conexoes/conexao_imoveis.php" name="form_imoveis">
        
              <h5 style="text-align: left; margin-top: -10px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">IMÓVEL</h5>

               <div class="form-row" style="border-bottom: 0.5px solid #B9B9B9; padding-bottom: 1%;">

                  <div class="form-group col-md-2">
                    <label for="tipo">TIPO</label>
                      <select class="custom-select mr-sm-2" id="tipo" name="tipo" disabled>
                        <option selected><?php echo $tipo ?></option>          
                      </select>
                  </div>            

                  <div class="form-group col-md-4">
                    <label for="status">STATUS TIPO</label>
                      <select class="custom-select mr-sm-2" id="status" name="status" disabled>
                        <option selected><?php echo $status ?></option>                                
                      </select>
                  </div>   

               </div>   

              <?php if ($status == 'CONSTRUÇÃO') { 

  // CONSULTA DOS LOTES PARA APRESENTAR O ENDEREÇO ONDE SERA FEITA A OBRA
$consulta = " SELECT * FROM cadastro_imoveis ";
$imoveis = $conn->query($consulta) or die($mysqli->error);

$consulta = " SELECT * FROM cadastro_obras ";
$obras = $conn->query($consulta) or die($mysqli->error);


                ?>  

                    <div class="form-row" style="margin-top: 2%; border-bottom: 0.5px solid #B9B9B9; padding-bottom: 1%;">

                      <div class="form-group col-md-9">
                        <label for="end">Endereço Completo</label>                    
                        <select class="custom-select mr-sm-2" id="end" name="end" required>
                                <option selected></option>                  
                            <?php while ($dado = $imoveis->fetch_array()) 

                            { ?>
                                <option value="<?php echo $dado['id_imoveis'];?>"><?php echo 'LOTE Nº '.$dado["num_end"].' - '.$dado["txt_end"].' '.$dado["txt_compl"].' '.$dado["txt_bairro"].' '.$dado["txt_cidade"].'-'.$dado["txt_uf"]; ?></option>
                            <?php } ?>                                                            
                        </select>                        
                      </div>

                      <div class="form-group col-md-1">
                        <label for="obra">Nº Obra</label>                        
                        <select class="custom-select mr-sm-2" id="obra" name="obra" disabled>
                                <option selected></option>                  
                            <?php while ($dado = $obras->fetch_array()) 

                            { ?>
                                <option value="<?php echo $dado['id_obras'];?>"><?php echo $dado["nu_obra"];?></option>
                            <?php } ?>                                                            
                        </select> 
                      </div>                      

                      <div class="form-group col-md-2">
                        <label for="status_lote">Status do Lote</label>                    
                        <select class="custom-select mr-sm-2" id="status_lote" name="status_lote" required>
                            <option selected></option>                            
                            <option value="CONSTRUIDO">CONSTRUÇÃO</option>         
                        </select>
                        
                      </div>
                    </div>
                    

              <?php } elseif ($status == 'AQUISIÇÃO') { ?>
              

                    <div class="form-row">
                        
                        <div class="form-group col-md-2">
                          <label for="cep">CEP</label>
                          <input type="text" onchange="get_endereco(document.form_imoveis.cep.value)" class="form-control" id="cep" name="cep" >
                        </div>
                        <div class="form-group col-md-6">
                          <label for="endereco">Endereço</label>
                          <input type="text" class="form-control" id="endereco" name="endereco" >
                        </div>
                         <div class="form-group col-md-2">
                          <label for="num_end">Nº</label>
                          <input type="text" class="form-control" id="num_end" name="num_end" >
                        </div>
                        
                    </div>    

                    <div class="form-row">  
                      <div class="form-group col-md-5">
                        <label for="compl">Complemento</label>
                        <input type="text" class="form-control" id="compl" name="compl_end" >
                      </div>
                       <div class="form-group col-md-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" >
                      </div>
                      <div class="form-group col-md-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" >
                      </div>
                       <div class="form-group col-md-1">
                        <label for="uf">UF</label>
                          <select style="font-size: 11px; font-weight: bold;" class="custom-select mr-sm-2" id="uf" name="uf" >
                            <option selected></option>
                            <option value="DF">DF</option>
                            <option value="GO">GO</option>
                            <option value="MG">MG</option>                                  
                          </select>
                      </div>
                   </div>

              <?php } ?>


              <h6 style="text-align: left; margin-top: 20px; margin-bottom: 10px;" ><u>CARTÓRIO</u></h6>  

               <div class="form-row" > 
                <div class="form-group col-md-2">
                  <label for="matricula">Matrícula</label>
                  <input type="text" class="form-control" id="matricula" name="matricula" required>
                </div>
                <div class="form-group col-md-1">
                  <label for="livro">Livro</label>
                  <input type="text" class="form-control" id="livro" name="livro">
                </div>
                <div class="form-group col-md-1">
                  <label for="folha">Folha</label>
                  <input type="text" class="form-control" id="folha" name="folha">
                </div>
                <div class="form-group col-md-3">
                  <label for="dat_reg">Data do Registro</label>
                  <input type="date" class="form-control" id="dat_reg" name="dat_reg" required>
                </div> 
                <div class="form-group col-md-5">
                  <label for="nome_cart">Nome Cartório</label>
                  <input type="text" class="form-control" id="nome_cart" name="nome_cart">
                </div>                 
              </div>

              <h6 style="text-align: left; margin-top: 20px; margin-bottom: 10px;" ><u>PREFEITURA</u></h6> 
                
               <div class="form-row" >   
                 <div class="form-group col-md-2">
                    <label for="iptu">Nº IPTU</label>
                    <input type="text" class="form-control" id="iptu" name="iptu">
                  </div>
               </div>

              <div class="form-row" > 
                
                  <div class="form-group col-md-2">
                    <label for="nu_hab">Nº Habite-se</label>
                    <input type="text" class="form-control" id="nu_hab" name="nu_hab">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_hab">Data Habite-se</label>
                    <input type="date" class="form-control" id="dat_hab" name="dat_hab" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="resp_tec">Responsável Técnico</label>
                    <input type="text" class="form-control" id="resp_tec" name="resp_tec">
                  </div> 
                  <div class="form-group col-md-2">
                    <label for="crea">CREA</label>
                    <input type="text" class="form-control" id="crea" name="crea">
                  </div>                 
              </div> 


                <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">SITUAÇÃO</h5>

                <!-- <div class="form-row" >

                    <div class="form-group col-md-3">
                        <label for="status">STATUS</label>
                          <select style="font-size: 12px; font-weight: bold;" class="custom-select mr-sm-2" id="status" name="status" >
                            <option selected></option>
                            <option value="VENDIDO">VENDIDO</option>
                            <option value="BLOQUEADO JUSTIÇA">BLOQUEADO JUSTIÇA</option>
                            <option value="DESMEMBRADO">DESMEMBRADO</option>
                            <option value="UNIFICADO">UNIFICADO</option>
                            <option value="ATIVO">ATIVO</option>
                            <option value="EM CONSTRUÇÃO">EM CONSTRUÇÃO</option>
                            <option value="CONSTRUIDO">CONSTRUIDO</option>                                  
                          </select>
                      </div>

                </div> -->

                <div class="form-row" >

                    <div class="form-group col-md-3">
                      <label for="nu_agua">Nº ÁGUA</label>
                      <input type="text" class="form-control" id="nu_agua" name="nu_agua">
                    </div> 
                    <div class="form-group col-md-5">
                      <label for="cond_agua">CONDIÇÃO</label>
                      <select style="font-size: 12px; font-weight: bold;" class="custom-select mr-sm-2" id="cond_agua" name="cond_agua" >
                            <option selected></option>
                            <option value="LIGADA">LIGADA</option>
                            <option value="DESLIGADA">DESLIGADA</option>           
                          </select>
                    </div>     

                </div>

                <div class="form-row" >

                    <div class="form-group col-md-3">
                      <label for="nu_energ">Nº ENERGIA</label>
                      <input type="text" class="form-control" id="nu_energ" name="nu_energ">
                    </div> 
                    <div class="form-group col-md-5">
                      <label for="cond_energ">CONDIÇÃO</label>
                      <select style="font-size: 12px; font-weight: bold;" class="custom-select mr-sm-2" id="cond_energ" name="cond_energ" >
                            <option selected></option>
                            <option value="LIGADA">LIGADA</option>
                            <option value="DESLIGADA">DESLIGADA</option>                                
                          </select>
                    </div>     

                </div>
   
              
              <input type="hidden" name="imoveis_acao" value="ins">

              <button type="submit" class="btn btn-primary" name="cadastrar" style="margin-left: 800px; background-color: green; border-color: green; width: 150px; margin-bottom: 50px;">Cadastrar</button>
      
          </form>        
      
    </div> 

</div>


<?php } ?>  
    

</body>

</html>