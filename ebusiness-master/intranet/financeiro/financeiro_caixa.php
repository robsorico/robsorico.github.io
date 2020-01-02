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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilização dos sites feito por mim - Robson -->    
    <link href="../../css/style_caperon.css" rel="stylesheet">

    <link rel="icon" href="../../img/sifrao1.ico">

    <title>CAPERON - CAIXA</title>

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

      
<div><h3 style="text-align: center; margin-top: 60px; margin-bottom: -10px;">CAIXA</h3></div>
      
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


               <div class="" id="inserir_caixa" style="width: 800px; font-size: 9pt; margin-top: 30px; margin-left: 12%; display: none; " > 
                    
                    <h3>INSERIR</h3>

                    <form method="post" action="financeiro_acao.php">          
                          
                          <input type="hidden" name="caixa_inserir" value="true">
                          
                  <style type="text/css">
                  .formInserir {width: 130px; height: 30px; margin-right: 10px;} 
                  .formInserirDesc {width: 180px;height: 30px;margin-right: 10px;}
                  .formInserirData {width: 120px;height: 30px;margin-right: 10px;border: 0.5px solid #B9B9B9;}
                  </style>

                          <div class="form-row" >
                                <div class="">
                                  <label for="dat_entrada">Data</label><br>                            
                                  <input class="formInserirData" type="date" class="" id="dat_entrada" placeholder="Data" value="" required>                   
                                </div>
                                <div class="">
                                  <label for="descricao">Descrição</label><br>
                                  <input type="text" class="formInserirDesc" id="descricao" placeholder="Descrição" value="" required>                    
                                </div>                          
                                <div class="">
                                  <label for="valor">Valor (R$)</label><br>
                                  <input type="number" class="formInserir" id="valor" placeholder="" required>
                                </div>
                                <div class="">
                                    <label for="tipo">Tipo</label><br>
                                      <select class="formInserir" id="tipo" name="tipo">
                                          <option selected>Selecione</option>
                                          <option value="1">Receita Fixa</option>
                                          <option value="2">Receita Variavel</option>
                                          <option value="3">Despesa Fixa</option>
                                          <option value="4">Despesa Variavel</option>                            
                                      </select>               
                                </div>
                                <div class="">
                                    <label for="categoria">Categoria</label><br>
                                      <select class="formInserir" id="categoria" name="categoria">
                                          <option selected>Selecione</option>
                                          <option value="1">VEICULO</option>
                                          <option value="2">OBRA13</option>
                                          <option value="3">TELEFONE</option>
                                          <option value="4">OBRA19</option>                            
                                      </select>               
                                </div> 

                          </div><br>      

                          <div class="" style="margin-top: 26px; margin-left: 700px;" >                             
                             <button class="btn btn-primary" type="submit">Inserir</button>
                          </div><br>         

                          

                    </form>                    

              </div> 

             
              <div class="" id="alterar_caixa" style="width: 800px; font-size: 9pt; margin-top: 30px; margin-left: 12%;  display: none;"> 
                    
                    <h3>ALTERAR</h3>

                    <form method="post" action="acao_financeiro.php">          
                          
                          <input type="hidden" name="caixa_alterar" value="true">

                      <style type="text/css">
                        .formAlterar {width: 130px;height: 30px;margin-right: 10px;} 
                        .formAlterarN {width: 50px;height: 30px;margin-right: 10px;}
                        .formAlterarData {width: 120px;height: 30px;margin-right: 10px;border: 0.5px solid #B9B9B9;}
                        .formAlterarDesc {width: 180px;height: 30px;margin-right: 10px;}
                      </style>

                          <div class="form-row" >
                                <div>
                                  <label for="id_caixa">Nº</label><br>
                                  <input class="formAlterarN" type="text" class="form-control" id="id_caixa" name="id_caixa" value="" disabled>                   
                                </div>
                                <div>
                                  <label for="dat_entrada">Data</label><br>
                                  <input class="formAlterarData" type="date" class="form-control" id="dat_entrada" placeholder="Data" value="">                   
                                </div>
                                <div>
                                  <label for="descricao">Descrição</label><br>
                                  <input class="formAlterarDesc" type="text" class="form-control" id="descricao" value="">                    
                                </div>                          
                                <div>
                                  <label for="valor">Valor (R$)</label><br>
                                  <input class="formAlterar" type="number" class="form-control" id="valor" value="" >
                                </div>
                                <div>
                                    <label for="tipo">Tipo</label><br>                                
                                      <select class="formAlterar" id="tipo" name="tipo">
                                          <option selected>Selecione</option>
                                          <option value="1">Receita Fixa</option>
                                          <option value="2">Receita Variavel</option>
                                          <option value="3">Despesa Fixa</option>
                                          <option value="4">Despesa Variavel</option>                            
                                      </select>         
                                </div> 
                                <div>
                                    <label for="tipo">Categoria</label><br>                                
                                      <select class="formAlterar" id="tipo" name="tipo">
                                          <option selected>Selecione</option>
                                          <option value="1">Transporte</option>
                                          <option value="2">Obra23</option>
                                          <option value="3">Obra19</option>
                                          <option value="4">Veículo</option>                            
                                      </select> 
                                                                                        
                                </div>                    

                          </div>

                          <div class="" style="margin-top: 26px; " >                           
                                   <button style="margin-left: 726px;" class="btn btn-primary" type="submit">Alterar</button>
                          </div><br>  

                    </form>                    

              </div>     

              <div class="container" style="width: 1050px; font-size: 9pt; margin-top: 30px; height: 800px;  ">     
                    

                    <div class="container-fluid" style="background-color: #1C1C1C; padding: 5px; color: white; height: 65px;">
                       
                       <div style="position: relative; float: left; margin-left: 180px; margin-top: 10px;">
                         <h4 style=""><b>EXTRATO</b></h4>      
                       </div>
                       
                       <div class="" style="margin-top: 10px; margin-left: 350px; margin-right: 30px; position: relative; float: left;" >
                          <button class="btn blue" id="hideshow" onclick="myFunction_ins()">Inserir</button>
                       </div> 

                       <div style="margin-top: 10px; font-size: 8pt; margin-right: 0px;">
                         <form class="form-inline" method="post" action="">  
                                <label class="sr-only" for="inlineFormCustomSelect">Preferência</label>
                                <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                      <option selected>Mês</option>
                                      <option value="1">Janeiro</option>
                                      <option value="2">Fevereiro</option>
                                      <option value="3">Março</option>
                                      <option value="4">Abril</option>
                                      <option value="5">Maio</option>
                                      <option value="6">Junho</option>
                                      <option value="7">Julho</option>
                                      <option value="8">Agosto</option>
                                      <option value="9">Setembro</option>
                                      <option value="10">Outubro</option>
                                      <option value="11">Novembro</option>
                                      <option value="12">Dezembro</option>        
                                </select>  
                             
                                <label class="sr-only" for="inlineFormCustomSelect">Preferência</label>
                                <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                  <option selected>Ano</option>
                                  <option value="1">2016</option>
                                  <option value="2">2017</option>
                                  <option value="3">2018</option>
                                  <option value="4">2019</option>        
                                </select>  
                             <button type="submit" class="btn btn-primary mb-2" style="background-color: green; border-color: green;">OK</button>
                          </form>

                       </div>                                            
                    
                    </div>
                   
               <style type="text/css">
                 #extrato.tabContainer {border: 1px solid black; border-right: 0px; border-top: 0px;}
                 #extrato .scrollContainer{width: 1020px; height: 500px; overflow: auto;}
                 #extrato table {width:1020px; border: 0px margin: 0px;}
                 #extrato table,th,td {border-collapse: collapse;}                     
                 #extrato th {background-color: #2F4F4F; border: 1px solid black; color: white; text-align: center; padding: 10px;}                     
                 #extrato td {border: 1px solid #B9B9B9; text-align: center; padding: 4px; }
                 #extrato tr {background-color: white; }
                 #extrato tr:hover { background-color: #DCDCDC; }
                 #extrato .col1 {width: 104px;}
                 #extrato .col2 {width: 92px;}
                 #extrato .col3 {width: 401px;}
                 #extrato .col4 {width: 200px;}
                 #extrato .col5 {width: 100px;}
                 #extrato .col6 {width: 99px;}
                 #extrato .col7 {width: 100px;}                        
                 
               </style>

                   <div class="tabContainer" id="extrato">
            
                        <table>
                            <thead> 
                              <tr>
                                  <th class="col1">Nº</th>
                                  <th class="col2">Data</th>
                                  <th class="col3">Descrição</th>
                                  <th class="col4">Categoria</th>
                                  <th class="col5">Valor</th>
                                  <th class="col6">Tipo</th>                                  
                                  <th class="col7">Ação</th>
                              </tr>                              
                            </thead>
                      </table>
                      <div class="scrollContainer">
                        <table>                                     

                               <?php
                                  for ($c = 0; $c < 25; $c++) {
                               ?>   
                              <tr>               
                                <td class="col1"><?=$c+1?></td>
                                <td class="col2">01/04/19</td>
                                <td class="col3">Otto</td>
                                <td class="col4">Transporte</td>
                                <td class="col5">R$ 0,00</td>
                                <td class="col6">Receita Fixa</td>                                  
                                <td class="col7">
                                  <button id="hideshow" title="Alterar" onclick="myFunction_alt()">A</button>
                                  <button id="hideshow" title="Excluir" onclick="alert('Certeza que deseja excluir?')">E</button>
                                </td>             
                              </tr>
                            <?php  } ?>  

                        </table>
                      </div>


                    </div> 

                </div>

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