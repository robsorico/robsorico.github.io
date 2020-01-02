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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="../img/sifrao1.ico">

    <title>CAPERON - Home</title>     

      <div class="corpo_carteira" >
        
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-md-nowrap p-1 shadow">
            <img style="margin-left: 0px; height: 35px;" src="../img/caperon_titulo.png">       

              <div style="margin-left: 45px;" class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item active" >
                        <a class="nav-link" href="index.php">Home</a>
                      </li>
                       <li class="nav-item" >
                        <a class="nav-link" href="administrativo/administrativo.php">Administrativo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="financeiro/financeiro_mural.php">Financeiro</a>
                      </li>                   
                      <li class="nav-item">
                        <a class="nav-link" href="operacional/operacional.php">Operacional</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="ajuda.php">Ajuda</a>
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
                          <button class="btn btn-outline-info my-2 my-sm-0"><a href="../conexoes/sair.php">Sair</a></button>
                  </form>
              </div>
          </nav>

      </div>

</head>
  
<body>

      
      <div><h3 style="text-align: center; margin-top: 40px;">BEM VINDO</h3></div>
      
      <div style="width: 100%; position: absolute; margin-top: 0px; height: 700px; ">

          <div style="position: relative; float: left; border: 0.1px solid #B9B9B9; margin-top: 20px; margin-left: 40px; width: 250px;  height: 600px;">
            
          </div>
          
          <div style="position: relative; float: left; margin-top: 20px; margin-left: 40px; background-color: #F5F5DC; width: 700px; height: 600px;">
               
             

          </div>

          <div style="position: relative; float: left;  margin-top: 20px; margin-left: 40px; width: 250px; height: 600px; 
          ">

          
                    
          </div> 

      </div>
    
</body>