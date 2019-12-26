<!DOCTYPE html>
<html lang="pt-br">
       
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


<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">     
    <!-- Estilização dos sites feito por mim - Robson -->    
    <link href="../../css/style_caperon.css" rel="stylesheet">

    <link rel="icon" href="../../../img/sifrao1.ico">

    <title>CAPERON - CLIENTES</title>

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
              <li style="font-weight: bold;">CORRETORES
                  <ul>
                      <li><a href="../corretores/lista_corretores.php">Lista</a></li>
                      <li><a href="../corretores/cadastro_corretores.php">Cadastrar</a></li>  
                  </ul>
              </li>         
            </ul>                      
  </nav> 

      
 <div><h3 style="text-align: center; margin-top: 60px; margin-bottom: -10px;">CADASTRAR CLIENTES</h3></div>
          
   

    <div style="position: relative; float: left; margin-top: 40px; margin-left: 40px; background-color: #F5F5DC; width: 900px; max-height: 820px;">   
                        
      
        <div class="container"  style="width: 860px; margin-top: 40px;"> 

          <form method="POST" action="../../../conexoes/conexao_clientes.php" name="form_clientes">
        
              <h5 style="text-align: left; margin-top: -10px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">CORRETORES</h5>


              <div class="form-row">
                  <div class="form-group col-md-7">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome"  name="nome" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="sexo">Sexo</label>
                    <select class="custom-select mr-sm-2" id="sexo" name="sexo" required>
                      <option selected></option>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>            
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="nasc">Data Nascimento</label>
                    <input type="date" class="form-control" id="nasc" name="nasc" required>
                  </div>              
              </div>

               <div class="form-row"> 

                  <div class="form-group col-md-4">
                    <label for="cpf">CPF</label> 
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_rg">Data Exp</label>
                    <input type="date" class="form-control" id="dat_rg" name="dat_rg" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="orgao_rg">Órg Exp</label>
                    <input type="text" class="form-control" id="orgao_rg" name="orgao_rg" required>
                  </div>
                    
              </div>

                
              <div class="form-row">  
                <div class="form-group col-md-2">
                  <label for="cep">CEP</label>
                  <input type="text" onchange="get_endereco(document.form_clientes.cep.value)" class="form-control" id="cep" name="cep" required>
                </div>
                <div class="form-group col-md-8">
                  <label for="endereco">Endereço</label>
                  <input type="text" class="form-control" id="endereco" name="endereco" required>
                </div>
                 <div class="form-group col-md-2">
                  <label for="num_end">Nº</label>
                  <input type="text" class="form-control" id="num_end" name="num_end" required>
                </div>
              </div>    

              <div class="form-row">  
                <div class="form-group col-md-5">
                  <label for="compl">Complemento</label>
                  <input type="text" class="form-control" id="compl" name="compl_end" required>
                </div>
                 <div class="form-group col-md-3">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" id="bairro" name="bairro" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>
                 <div class="form-group col-md-1">
                  <label for="uf">UF</label>
                    <select style="font-size: 11px; font-weight: bold;" class="custom-select mr-sm-2" id="uf" name="uf" required>
                      <option selected></option>
                      <option value="DF">DF</option>
                      <option value="GO">GO</option>
                      <option value="MG">MG</option>                                  
                    </select>
                </div>
              </div>    

              <div class="form-row"> 
                <div class="form-group col-md-2">
                  <label for="cel1">Celular(1)</label>
                  <input type="text" class="form-control" id="cel1" name="cel1" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="cel2">Celular(2)</label>
                  <input type="text" class="form-control" id="cel2" name="cel2" >
                </div>
                <div class="form-group col-md-8">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
              </div> 

              <div class="form-row" style="margin-left: 0px; margin-top: 20px; margin-bottom: 20px; padding-top: 20px; padding-bottom: 20px; border-top: 0.5px solid #B9B9B9; border-bottom: 0.5px solid #B9B9B9;  "> 
                <div class="form-group col-md-6">
                  <label for="corretor">Corretor</label>
                  <input type="text" class="form-control" id="corretor" name="corretor">
                </div>
                <div class="form-group col-md-3">
                  <label for="cel1_corretor">Celular(1)</label>
                  <input type="text" class="form-control" id="cel1_corretor" name="cel1_corretor">
                </div>
                <div class="form-group col-md-3">
                  <label for="cel2_corretor">Celular(2)</label>
                  <input type="text" class="form-control" id="cel2_corretor" name="cel2_corretor">
                </div>                
              </div> 


              <div class="form-row">  
             
                <div class="form-group col-md-10">
                  <label for="obra">Obra</label>
                  <select class="custom-select mr-sm-2" id="obra" name="obra" required>
                      <option selected></option>
                      <option value="1">OBRA 01 - Qd 03 MR 04 CASA 01 - Setor Sul - Planaltina-GO</option>
                      <option value="1">OBRA 01 - Qd 03 MR 04 CASA 01A - Setor Sul - Planaltina-GO</option>
                      <option value="1">OBRA 02 - Qd 03 MR 04 CASA 02 - Setor Sul - Planaltina-GO</option>
                      <option value="1">OBRA 02 - Qd 03 MR 04 CASA 02A - Setor Sul - Planaltina-GO</option>
                      <option value="1">OBRA 03 - Qd 03 MR 04 CASA 03 - Setor Sul - Planaltina-GO</option>
                      <option value="1">OBRA 04 - Qd 03 MR 04 CASA 04 - Setor Sul - Planaltina-GO</option>
                    </select>                  
                </div>

              </div>            
              
                     
        </div><br>
              
              <input type="hidden" name="cliente_interno" value="true">

              <button type="submit" class="btn btn-primary" name="cadastrar" style="margin-left: 700px; background-color: green; border-color: green; width: 150px; margin-bottom: 50px;">Cadastrar</button>
      
          </form>
        
        </div>      

    </div> 


   <script type="text/javascript">

        function abreClientes() {
            var x = document.getElementById('menu_clientes');            
                if (x.style.display === 'none') {
                    x.style.display = 'block';                    
                } else {
                    x.style.display = 'none';
                }

            }

   </script>      

  </body>
</html>