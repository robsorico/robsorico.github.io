<!DOCTYPE html>
<html lang="pt-br">

<?php 
// Inicia sessões 
session_start(); 
// Conexão com o banco de dados
 include_once("../../conexoes/conexao.php");
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

?>

<head>

    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" href="../../img/sifrao1.ico">

    <title>CAPERON - FINANCEIRO-RELATÓRIOS</title>

      <style type="text/css">
         .corpo_carteira {background-color: white;position: fixed; top: 0%;width: 100%;z-index: 100;}
         .menu_lat_esq {color: white;list-style-type: none;margin-top: 10px;}
         .menu_lat_esq li a {margin-left: -20px;} 

         .nav_crud {
        text-align: right;
      }

      .crud li {
        display: inline-block;
        padding: 2px;
        color: green;
        font-weight: bold;
        font-size: 10pt;
      }                   
      </style>

      <div class="corpo_carteira" >
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-md-nowrap p-1 shadow">
          <img style="margin-left: 0px; height: 35px;" src="../../img/caperon_titulo.png">       

          <div style="margin-left: 45px;" class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="../home.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="../administrativo/administrativo.php">Administrativo</a></li>
              <li class="nav-item active"><a class="nav-link" href="financeiro/financeiro_mural.php">Financeiro</a></li>            
              <li class="nav-item"><a class="nav-link" href="../operacional/operacional.php">Operacional</a></li>
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

</head>
  
<body >

      
<div><h3 style="text-align: center; margin-top: 60px; margin-bottom: -10px;">RELATÓRIOS</h3></div>
      
<div style="width: 100%; position: absolute; margin-top: 0px; height: 700px; ">

        <div style="position: relative; float: left;  margin-top: 20px; margin-left: 15px; width: 230px;  ">
                
                <nav class="navbar bg-dark" >
                    <ul class="menu_lat_esq">
                      <li><a href="financeiro_mural.php">MURAL</a></li>
                      <li><a href="financeiro_caixa.php">CAIXA</a></li>
                      <li><a href="financeiro_bancos.php">BANCOS</a></li>
                      <li><a href="financeiro_contas_a_pagar.php">CONTAS A PAGAR</a></li>
                      <li><a href="financeiro_contas_a_receber.php">CONTAS A RECEBER</a></li>
                      <li><a href="financeiro_categorias.php">CATEGORIAS</a></li>
                      <li><a href="financeiro_relatorios.php">RELATÓRIOS</a></li>                      
                    </ul>
                </nav>
                
                <div class="menu_painel_flx" style="font-size: 14px; padding: 5px; margin-top: 30px; ">
                      <div class="container-fluid"  style="height: 50px;"> 

                           <div class="menu_valor" style="position: relative; float: left; text-align: center; padding: 10px; margin-top: 2%; margin-left: 5%;">  
                              <!-- <h5 style="position: absolute; left: -70px; top: -20px;">ABRIL/2019</h5> -->
                              <h1 style=" color: green;"><b>R$ 0,00</b></h1>
                          </div>  
                         
                  </div><br>
                </div>

                <div class="menu_painel_flx" style="font-size: 14px; padding: 5px; margin-top: 30px; ">
                  <table class="" style="width: 250px;">
                    <tr>
                      <th>Fluxo de Caixa</th>                      
                      <th>Orç</th>
                      <th></th>
                      <th>Real</th>
                    </tr>                      
                    <tr>
                      <td>Receita</td>                            
                      <td>R$ 0,00</td>
                      <td></td>
                      <td>R$ 0,00</td>
                    </tr>
                    <tr>
                      <td>Despesa</td>

                      <td style="border-bottom: 1px solid black;">R$ 0,00</td>
                            <td></td>
                      <td style="border-bottom: 1px solid black;">R$ 0,00</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><b>R$ 0,00</b></td>
                            <td></td>
                      <td><b>R$ 0,00</b></td>
                    </tr>
                  </table>
                </div>

                <div class="menu_painel_blc" style="font-size: 14px; padding: 5px; margin-top: 20px;">
                  <table class="" style="width: 250px;">
                    <tr>
                      <th>Balanço Patrimonial</th>
                      <th>Total</th>            
                    </tr>
                    <tr>
                      <td>Ativo</td>
                      <td>R$ 0,00</td>          
                    </tr>
                    <tr>
                      <td>Passivo</td>
                      <td style="border-bottom: 1px solid black;">R$ 0,00</td>            
                    </tr>
                    <tr>
                      <td></td>
                      <td><b>R$ 0,00</b></td>           
                    </tr>
                  </table>
                </div> 

        </div>   

<div style="position: relative; float: left; margin-top: 20px; margin-left: 40px; background-color: #F5F5DC; width: 1050px; max-height: 700px;">             

      <div class="container" style="width: 600px; margin-top: 120px; "> 

            <nav class="nav_crud">
                <ul class="crud" style="list-style-type: none; ">
                  <li>Inserir</li>
                  <li>Alterar</li>
                  <li>Excluir</li>
                </ul>
            </nav>

            <table class="table" style="font-size: 7.5pt;">
                <thead class="thead-dark">
                   <tr>
                     <th scope="col">DATA</th>
                     <th scope="col">DESCRIÇÃO</th>
                     <th scope="col">ORÇADO</th>               
                     <th scope="col">CAIXA/BANCO</th>
                     <th scope="col">FIXA/VARIAVEL</th>
                     <th scope="col">ATIVO/PASSIVO</th>  
                   </tr>
              </thead>
              <tbody>
                    <tr>
                      <th scope="row" style="background-color: ">RECEITA</th>
                      <td></td>
                      <td></td>
                      <td></td>             
                      <td></td>
                      <td></td>             
                    </tr> 
                    <tr>                
                       <td>10/04/19</td>
                       <td>VENDA VIDEO GAME</td>                
                       <td>R$ 0,00</td>
                       <td>CAIXA</td>
                       <td>FIXA</td>
                       <td>-</td>
                    </tr>
                    <tr>                
                       <td>10/04/19</td>
                       <td>VENDA MESA DE JANTAR</td>                 
                       <td>R$ 0,00</td>
                       <td>BANCO</td>
                       <td>FIXA</td>
                       <td>-</td>
                    </tr>
                    <tr>                
                       <td>10/04/19</td>
                       <td>SALÁRIO CAIXA ECONÔMICA</td>                 
                       <td>R$ 0,00</td>
                       <td>BANCO</td>
                       <td>VARIAVEL</td>
                       <td>-</td>
                    </tr>

                    <tr style="border-bottom: 2px solid #BEBEBE; border-top: 2px solid #BEBEBE;">
                      <th scope="row">RECEITA</th>
                       <td>-</td>                 
                       <td><b>R$ 0,00</b></td>
                       <td>-</td>
                       <td>-</td>
                       <td>-</td>          
                    </tr>  

                    <tr>
                      <th scope="row">DESPESA</th>
                      <td></td>
                      <td></td>                
                      <td></td>
                      <td></td>
                      <td></td>             
                    </tr> 
                    <tr>                
                       <td>10/04/19</td>
                       <td></td>                 
                       <td>R$ 0,00</td>
                       <td>CAIXA</td>
                       <td>VARIAVEL</td>
                       <td>-</td>
                    </tr>
                    <tr>                
                       <td>10/04/19</td>
                       <td></td>                
                       <td>R$ 0,00</td>
                       <td>CAIXA</td>
                       <td>VARIAVEL</td>
                       <td>-</td>
                    </tr>
                    <tr>                
                       <td>10/04/19</td>
                       <td></td>                 
                       <td>R$ 0,00</td>
                       <td>CAIXA</td>
                       <td>VARIAVEL</td>
                       <td>-</td>
                    </tr>
                     
                    <tr style="border-bottom: 2px solid #BEBEBE; border-top: 2px solid #BEBEBE;">
                      <th scope="row">DESPESA</th>
                       <td>-</td>                
                       <td><b>R$ 0,00</b></td>
                       <td>-</td>
                       <td>-</td>
                       <td>-</td>          
                    </tr>    
                </tbody>
            </table>
        </div>  


   <div class="container" style="width: 1200px; margin-top: 120px;">  

      <nav class="nav_crud">
          <ul class="crud" style="list-style-type: none; ">
            <li>Inserir</li>
            <li>Alterar</li>
            <li>Excluir</li>
          </ul>
      </nav>

      <table class="table" style="font-size: 9pt;">
          <thead class="thead-dark">
             <tr>
               <th scope="col">CÓDIGO</th>
               <th scope="col">DESCRIÇÃO</th>
               <th scope="col">PARC</th>               
               <th scope="col">VALOR PARC</th>
               <th scope="col">TOTAL</th>
               <th scope="col">VENC</th>  
             </tr>
        </thead>
        <tbody>
              <tr>
                <th scope="row" style="background-color: ">ATIVO</th>
                <td></td>
                <td></td>
                <td></td>             
                <td></td>
                <td></td>             
              </tr> 
              <tr>                
                 <td>10/04/19</td>
                 <td>VENDA VIDEO GAME</td>                
                 <td>R$ 0,00</td>
                 <td>CAIXA</td>
                 <td>FIXA</td>
                 <td>-</td>
              </tr>
              <tr>                
                 <td>10/04/19</td>
                 <td>VENDA MESA DE JANTAR</td>                 
                 <td>R$ 0,00</td>
                 <td>BANCO</td>
                 <td>FIXA</td>
                 <td>-</td>
              </tr>
              <tr>                
                 <td>10/04/19</td>
                 <td>SALÁRIO CAIXA ECONÔMICA</td>                 
                 <td>R$ 0,00</td>
                 <td>BANCO</td>
                 <td>VARIAVEL</td>
                 <td>-</td>
              </tr>

              <tr style="border-bottom: 2px solid #BEBEBE; border-top: 2px solid #BEBEBE;">
                <th scope="row">TOTAL ATIVO</th>
                 <td>-</td>                 
                 <td><b>R$ 0,00</b></td>
                 <td>-</td>
                 <td>-</td>
                 <td>-</td>          
              </tr>  

              <tr>
                <th scope="row">PASSIVO</th>
                <td></td>
                <td></td>                
                <td></td>
                <td></td>
                <td></td>             
              </tr> 
              <tr>                
                 <td>10/04/19</td>
                 <td></td>                 
                 <td>R$ 0,00</td>
                 <td>CAIXA</td>
                 <td>VARIAVEL</td>
                 <td>-</td>
              </tr>
              <tr>                
                 <td>10/04/19</td>
                 <td></td>                
                 <td>R$ 0,00</td>
                 <td>CAIXA</td>
                 <td>VARIAVEL</td>
                 <td>-</td>
              </tr>
              <tr>                
                 <td>10/04/19</td>
                 <td></td>                 
                 <td>R$ 0,00</td>
                 <td>CAIXA</td>
                 <td>VARIAVEL</td>
                 <td>-</td>
              </tr>
               
              <tr style="border-bottom: 2px solid #BEBEBE; border-top: 2px solid #BEBEBE;">
                <th scope="row">TOTAL PASSIVO</th>
                 <td>-</td>                
                 <td><b>R$ 0,00</b></td>
                 <td>-</td>
                 <td>-</td>
                 <td>-</td>          
              </tr>    
          </tbody>
      </table>
  </div>               

               



</div>   


    <script type="text/javascript">

        function myFunction_ins() {
            var x = document.getElementById('inserir_caixa');
            var y = document.getElementById('alterar_caixa');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                } else {
                    x.style.display = 'none';
                }

            }

        function myFunction_alt() {
            var x = document.getElementById('alterar_caixa');
            var y = document.getElementById('inserir_caixa');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                } else {
                    x.style.display = 'none';
                }
            }
   
        
    </script>

  </body>
</html>