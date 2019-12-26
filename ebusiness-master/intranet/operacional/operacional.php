<!DOCTYPE html>
<html lang="pt-br">

<?php 
// Inicia sessões 
session_start(); 
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

?>
       
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <!-- Estilização dos sites feito por mim - Robson -->    
    <link href="../css/style_caperon.css" rel="stylesheet">


    <link rel="icon" href="../../img/sifrao1.ico">

    <title>CAPERON - OPERACIONAL</title>
     
</head>
  
<body>
    

    <div class="corpo_carteira" >
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-md-nowrap p-1 shadow">
          <img style="margin-left: 0px; height: 35px;" src="../../img/caperon_titulo.png">       

          <div style="margin-left: 45px;" class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="../home.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="../administrativo/administrativo.php">Administrativo</a></li>
              <li class="nav-item"><a class="nav-link" href="../financeiro/financeiro_mural.php">Financeiro</a></li>            
              <li class="nav-item active"><a class="nav-link" href="../operacional/operacional.php">Operacional</a></li>
              <li class="nav-item"><a class="nav-link" href="../ajuda.php">Ajuda</a></li>         
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
                      <li><a href="clientes/lista_clientes.php">lista</a></li>
                      <li><a href="clientes/cadastro_clientes.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li>IMÓVEIS
                 <ul>
                      <li><a href="imoveis/lista_imoveis.php">lista</a></li>
                      <li><a href="imoveis/cadastro_imoveis.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li>OBRAS
                  <ul>
                      <li><a href="obras/lista_obras.php">lista</a></li>
                      <li><a href="obras/cadastro_obras.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li>PARCEIROS
                  <ul>
                      <li><a href="parceiros/lista_parceiros.php">lista</a></li>
                      <li><a href="parceiros/cadastro_parceiros.php">Cadastrar</a></li>  
                  </ul>
              </li>
              <li>CORRETORES
                  <ul>
                      <li><a href="corretores/lista_corretores.php">lista</a></li>
                      <li><a href="corretores/cadastro_corretores.php">Cadastrar</a></li>  
                  </ul>
              </li>         
            </ul>                      
        </nav>
     
           



   <script type="text/javascript" src="../../js/javascript_caperon.js"></script>         

  </body>
</html>