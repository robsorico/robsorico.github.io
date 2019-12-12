<?php 
// Inicia sessões 
session_start(); 
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="../../img/sifrao1.ico">

    <title>CAPERON - Administrativo</title>

      <style type="text/css">         
         .corpo_carteira {
          background-color: white;
          position: fixed; top: 0%;
          width: 100%;
          z-index: 100;
         }
         .menu_lat_esq1 {        
          list-style-type: none;
          float: left;
         }
         .menu_lat_esq1 li{
          position:relative; 
                   
         }
         .menu_lat_esq2 {
          list-style-type: none;
          position:absolute; 
          top:25px; 
          left:0;
          background-color:#fff; 
          display:none;
         }
         .menu_lat_esq1 li:hover ul, .menu_lat_esq2 li.over ul{display:block;}  
         .menu_lat_esq1 li ul li{
          border:1px solid #c0c0c0; 
          display:block; 
          width:150px;
          }
         .menu_lat_esq_a {
          color: white;
          margin-left: -40px;
         }
         .menu_lat_esq1 li a {color:white; text-decoration:none; padding:5px 10px; display:block;}
         .menu_lat_esq1 li a:hover{
          background:#333; 
          color:#fff; 
          -moz-box-shadow:0 3px 10px 0 #CCC; 
          -webkit-box-shadow:0 3px 10px 0 #ccc; 
          text-shadow:0px 0px 5px #fff; 
          } 



      </style>

      <div class="corpo_carteira" >
        
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-md-nowrap p-1 shadow">
             <img style="margin-left: 0px; height: 35px;" src="../../img/caperon_titulo.png">       

              <div style="margin-left: 45px;" class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item" >
                        <a class="nav-link" href="../home.php">Home</a>
                      </li>
                      <li class="nav-item active" >
                        <a class="nav-link" href="administrativo.php">Administrativo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../financeiro/financeiro_mural.php">Financeiro</a>
                      </li>                   
                      <li class="nav-item">
                        <a class="nav-link" href="../operacional/operacional.php">Operacional</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../ajuda.php">Ajuda</a>
                      </li>         
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

</head>
  
<body>

      
      <div><h3 style="text-align: center; margin-top: 80px;">ADMINISTRATIVO</h3></div>
      <div style="width: 100%; position: absolute; margin-top: 0px; height: 700px; ">

          <div style="position: relative; float: left;  margin-top: 20px; margin-left: 15px; width: 250px;  ">
            <nav style="height: 600px; " class="navbar bg-dark" >
                <ul class="menu_lat_esq1">
                  <li><a class="menu_lat_esq_a" href="#" >DOCUMENTAÇÃO</a>
                    <ul class="menu_lat_esq2">
                      <li><a class="menu_lat_esq_a" href="#">EMPRESA</a></li>
                      <li><a class="menu_lat_esq_a" href="#">SÓCIOS</a></li>                                          
                    </ul>                    
                  </li>
                  <li><a class="menu_lat_esq_a" href="#">PLANILHAS</a></li>
                  <li><a class="menu_lat_esq_a" href="#">INFORMAÇÕES</a></li>
                  <li><a class="menu_lat_esq_a" href="#">MODELOS DE CONTRATOS</a></li>
                  <li><a class="menu_lat_esq_a" href="#">PROCESSOS JUDICIAIS</a></li>
                </ul>
            </nav>

          </div>
          <div style="position: relative; float: left; margin-top: 20px; margin-left: 40px; background-color: #F5F5DC; width: 1000px; height: 600px;">
              

          </div>

      </div>
    
</body>