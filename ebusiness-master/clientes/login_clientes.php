
<?php
  // Inicia sessões
session_start(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
 
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  
    <link rel="icon" href="../img/sifrao1.ico">

  <title>CAPERON INCORPORAÇÕES</title>   

  <style type="text/css">
      .lais {
        color: #EEB422;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;

      }
      .nav_menu2 {
        margin-left: 30%;
        margin-top: 60px;   
        background-color: black;             
      }
      .footer {
        width: 100%;
        background-color: black;
        height: 80px;
        margin-top: 30px;
      }

  </style>



  <div class="bd-example" style="position: fixed; top: 0%; width: 100%; z-index: 100; padding: 0px; ">
        
      <nav style="background-color: black; height: 100%; margin-left: 0%;" class="navbar navbar-expand-lg navbar-dark  flex-md-nowrap p-1 shadow">
        <a href="../index.php"><img style="margin-left: 0px; height: 160px;" src="../img/caperon_titulo.png"></a>
        <!-- <a class="navbar-brand" href="home.php" style="margin-left: 5px;"><b>CAPERON INCORPORAÇÕES</b></a> -->
       
            <div style="width: 100%; height: 0px; margin-top: 0px;">
            
                <div style="background-color: black; margin-top: -80px; width: 500px; margin-left: 550px; padding: 5px;" class="collapse navbar-collapse" id="navbarColor01">      
                    
            <form class="" style="font-size: 11px; margin-left: 10%; margin-top: 5px;" method="POST" action="../conexoes/valida.php">
                           
                         <label style="color: white; padding: 2px;">Login:</label>
                         <input type="text" name="usuario" id="login" required>
                         
                         <label style="color: white; padding: 2px;">Senha:</label>
                         <input type="password" name="senha" id="senha" required>
                         
                         <input type="submit" name="entrar" id="entrar" value="entrar">
                          
            </form>
                                  <div>
                                    <p style="color: white;">
                                      <?php
                                        if (isset($_SESSION['loginErro'])) {
                                            echo $_SESSION['loginErro'];
                                            unset($_SESSION['loginErro']);
                                        }
                                      ?>           
                                    </p>

                                    <p style="color: white;">
                                      <?php 
                                        if (isset($_SESSION['loginDeslogado'])) {
                                            echo $_SESSION['loginDeslogado'];
                                            unset($_SESSION['loginDeslogado']);
                                        }
                                      ?>          
                                    </p>
                                  </div>      
                </div>

                <div class="div_menu2" style="background-color: black; height: 30px; margin-left: 70px; ">      
                  <nav class="nav_menu2" >
                    <a class="lais" href="../imoveis/imoveis_a_venda.php">Imóveis a Venda</a>
                    <a class="lais" href="../investidores/investidores.php">Investidores</a>
                    <a class="lais" href="clientes/clientes.php">Clientes</a>
                    <a class="lais" href="../fale_conosco.php">Fale Conosco</a>                   
                  </nav>
                </div>   

            </div>  
        </nav>
    </div> 

  </head>

  <body>  

    <div style="margin-top: 200px; margin-bottom: 30px; margin-left: 720px; " >
        <h3 class=""><b>Login</b></h3>
    </div>
      
     <div class="container"  style="width: 300px; border: 1px solid #B9B9B9; padding: 40px;"> 

        
    <form method="POST" action="conexao_clientes.php">
               
            <div class="form-group col-md-12">
              <!--<label for="inputUsuario">Usuário</label>-->
              <input type="text" class="form-control" id="usuario" placeholder="Usuário" name="usuario" required>
            </div>
         
            <div class="form-group col-md-12">
              <!--<label for="inputPassword4">Senha</label>-->
              <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
            </div><br>          
             
          <button type="submit" class="btn btn-primary" name="cadastrar" style="margin-bottom: 5px; background-color: green; border-color: green; width: 150px; margin-left: 35px; ">Entrar</button><br>
           <a href="clientes.php" style="margin-left: 80px;">Cadastrar</a>
        
    </form>


    </div>       
