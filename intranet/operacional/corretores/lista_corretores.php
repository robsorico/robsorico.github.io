
<!DOCTYPE html>
<html lang="pt-br">
       
<?php 
// Inicia sessões 
session_start(); 
// Conexão com o banco de dados
 include_once("../../../conexoes/conexao.php");
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

$consulta = "SELECT * FROM cadastro_clientes order by id_clientes asc";
$con = $conn->query($consulta) or die($mysql->error);

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

    <title>CAPERON - CORRETORES</title>

     
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

      
 <div><h3 style="text-align: center; margin-top: 100px; margin-bottom: 10px;">CORRETORES</h3></div>


    <div style="width: 100%; position: absolute; margin-top: 0px; height: 700px; ">

            
        <div style="position: relative; float: left; margin-top: 20px; margin-left: 40px; background-color: #F5F5DC; width: 1300px; max-height: 700px; padding: 10px; overflow: auto;">   
                        
        
            <div class="tabContainer" id="tab_clientes"  style="width: 100%; margin-top: 25px; height: 600px;"> 

                <table class="tabela_clientes">
                    <thead>
                        <tr>
                          <th>Nº</th>
                          <th>Data Entrada</th>
                          <th>Nome</th>
                          <th>Sexo</th>
                          <th>CPF</th>
                          <th>RG</th>
                          <th>Data Exp</th>
                          <th>Orgão</th>                          
                          <th>CEP</th>
                          <th>Endereço</th>
                          <th>Complemento</th>
                          <th>Nº</th>
                          <th>Bairro</th>
                          <th>Cidade</th>
                          <th>UF</th>
                          <th>E-mail</th>
                          <th>Cel1</th>
                          <th>Cel2</th>
                          <th>Corretor</th>
                          <th>Cel1_Corretor</th>
                          <th>Cel2_Corretor</th>
                          <th>Obra</th>
                          <th>Situação</th>                          
                        </tr>  
                    </thead>   
                          
                </table>
                <div class="scrollContainer" style="width: 1000px; margin-top: 0px;">
                  <table class="tabela_clientes">
                    <tbody>
                   <?php while ($dado = $con->fetch_array()){ ?> 
                      <tr>
                        <td><?php echo $dado["id_clientes"]; ?></td>
                        <td><?php echo $dado["dt_entrada"]; ?></td>
                        <td><?php echo $dado["txt_nome"]; ?></td>
                        <td><?php echo $dado["txt_sexo"]; ?></td>
                        <td><?php echo $dado["nu_cpf"]; ?></td>
                        <td><?php echo $dado["nu_rg"]; ?></td>
                        <td><?php echo $dado["dat_rg"]; ?></td>
                        <td><?php echo $dado["orgao_rg"]; ?></td>
                        <td><?php echo $dado["nu_cep"]; ?></td>
                        <td><?php echo $dado["txt_endereco"]; ?></td>
                        <td><?php echo $dado["txt_compl"]; ?></td>
                        <td><?php echo $dado["num_end"]; ?></td>
                        <td><?php echo $dado["txt_bairro"]; ?></td>
                        <td><?php echo $dado["txt_cidade"]; ?></td>
                        <td><?php echo $dado["txt_uf"]; ?></td>
                        <td><?php echo $dado["txt_email"]; ?></td>
                        <td><?php echo $dado["nu_cel1"]; ?></td>
                        <td><?php echo $dado["nu_cel2"]; ?></td>
                        <td><?php echo $dado["txt_corretor"]; ?></td>
                        <td><?php echo $dado["nu_cel1_corretor"]; ?></td>
                        <td><?php echo $dado["nu_cel2_corretor"]; ?></td>
                        <td><?php echo $dado["nu_obra"]; ?></td>
                        <td><?php echo $dado["nu_situacao"]; ?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>        
            
            </div>      

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

        function abreObras() {
          var x = document.getElementById('menu_obras');            
              if (x.style.display === 'none') {
                  x.style.display = 'block';                    
              } else {
                  x.style.display = 'none';
              }

        }    
   </script>      

  </body>
</html>