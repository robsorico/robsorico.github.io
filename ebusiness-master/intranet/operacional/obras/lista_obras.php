
<!DOCTYPE html>
<html lang="pt-br">
       
<?php 
// Inicia sessões 
session_start(); 
// Conexão com o banco de dados
 include_once("../../../conexoes/conexao.php");
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

$total = "SELECT count(*) as total FROM cadastro_obras ";
$tot_obras = $conn->query($total) or die($mysqli->error);
while ($tot_obra = $tot_obras->fetch_array()){
    $total_obra = $tot_obra['total'];
}
$consulta = "SELECT * FROM cadastro_obras order by id_obras asc";
$con = $conn->query($consulta) or die($mysql->error);

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

    <title>CAPERON -  OBRAS</title>

     
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
      
 
        <style type="text/css">
          .tabContainer1 {width: 1150px; margin-top: 100px; margin-left: 10%; background-color: white; padding: 10px; }
          .tabContainer2 {width: 1100px; margin-top: 10px; margin-left: 1.5%; margin-bottom: 10px; }
          .scrollContainer {max-height: 700px; overflow: auto; margin-top: 0px;}
          .tabela_clientes {width: 1100px; text-align: center;}
          .tabela_clientes tr {background-color: white; }
          .tabela_clientes tr th {background-color: black; color: #d1b40f; height: 40px; border: 1px solid black;}
          .tabela_clientes td {border-bottom: 1px solid #B9B9B9; font-size: 10pt;}
          .col_1_clientes {width: 80px;}
          .col_2_clientes {width: 200px;}
          .col_3_clientes {width: 100px;}
          .col_4_clientes {width: 100px;}
          .col_5_clientes {width: 50px;}
          .col_6_clientes {width: 100px;}
          .col_7_clientes {width: 150px;}
          .col_8_clientes {width: 80px;}  
          .col_9_clientes {width: 50px;}
          .col_10_clientes {width: 100px;}           
        </style>

        <div class="tabContainer1">
            
            <h5 style="margin-left: 85%;"> Total de obras: <?php echo $total_obra;?> </h5> 

            <div class="tabContainer2" id="tab_clientes" > 

                <table class="tabela_clientes">
                    <thead>
                        <tr>
                          <th class="col_1_clientes">Nº Obra</th>
                          <th class="col_2_clientes">Endereço</th>
                          <th class="col_3_clientes">Data Inicio</th>
                          <th class="col_4_clientes">Data Fim</th>
                          <th class="col_5_clientes">Qtde</th>
                          <th class="col_6_clientes">Tipo</th>                          
                          <th class="col_7_clientes">Cnpj</th>                          
                          <th class="col_8_clientes">Cei</th> 
                          <th class="col_9_clientes">Alvará</th>
                          <th class="col_10_clientes">Ação</th>                            
                        </tr>  
                    </thead>   
                          
                </table>
                <div class="scrollContainer" >
                  <table class="tabela_clientes">
                    <tbody>
                   <?php while ($dado = $con->fetch_array()) { 

                        $id_obras = $dado["id_obras"];
                        $nu_obra = $dado["nu_obra"];

                    ?>         
                      <tr>
                        <td class="col_1_clientes"><?php echo $nu_obra; ?></td>
                        <td class="col_2_clientes"><?php echo 'arrumando'; ?></td>
                        <td style="text-align: left; padding-left: 30px;" class="col_3_clientes"><?php echo  $dado["dat_inic"]; ?></td>                        
                        <td class="col_4_clientes"><?php echo $dado["dat_fim"]; ?></td>                     
                        <td class="col_5_clientes"><?php echo $dado["qtde_imoveis"]; ?></td>
                        <td class="col_6_clientes"><?php echo $dado["tipo_imoveis"]; ?></td>
                        <td class="col_7_clientes"><?php echo $dado["nu_insc_cnpj"]; ?></td>
                        <td class="col_8_clientes"><?php echo $dado["nu_insc_cei"]; ?></td>
                        <td class="col_9_clientes"><?php echo $dado["nu_alvara"]; ?></td>                         
                        <td style="padding-top: 2px; padding-bottom: 2px; " class="col_10_clientes">
                          <button style="width: 15px;" title="Vizualizar"><a style="text-decoration: none;" href="visualizar_obras.php?id_obras=<?php echo $id_obras?>">V</a></button>
                          <button style="width: 15px;" title="Alterar" ><a style="text-decoration: none;" href="alterar_obras.php?id_obras=<?php echo $id_obras?>">A</a></button>
                          <?php if ($usuario == 'robsorico') { ?>
                          <button style="width: 15px; color: blue; cursor: pointer;" title="Excluir" ><a href="../../../conexoes/conexao_obras.php?obras_acao='exc'&id_obras=<?php echo $id_obras?>" onclick="return confirm('Tem certeza que deseja deletar a obra <?php echo $nu_obra?>?')">E</a></button>
                          <?php } ?>                          
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>        
            
            </div>  


        </div>
  </body>
</html>