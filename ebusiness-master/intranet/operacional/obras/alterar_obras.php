
<!DOCTYPE html>
<html lang="pt-br">
       
<?php 
// Inicia sessões 
session_start(); 
// Conexão com o banco de dados
 include_once("../../../conexoes/conexao.php");
// Carrega o usuário
$usuario = $_SESSION['usuarioUsuario'];

$id_obras           = $_GET['id_obras'];

$consulta = "SELECT * FROM cadastro_obras WHERE id_obras = $id_obras";
$con = $conn->query($consulta) or die($mysql->error);

while ($dado = $con->fetch_array())
{

  $nu_obra            = $dado['nu_obra'];
  $id_imoveis         = $dado['id_imoveis'];
  $txt_status_obra    = $dado['txt_status_obra'];
  $dat_inic           = $dado['dat_inic'];
  $dat_fim            = $dado['dat_fim'];
  $qtde_imoveis       = $dado['qtde_imoveis'];
  $tipo_imoveis       = $dado['tipo_imoveis'];
  $nu_insc_cnpj       = $dado['nu_insc_cnpj'];
  $dat_ent_cnpj       = $dado['dat_ent_cnpj'];
  $dat_fim_cnpj       = $dado['dat_fim_cnpj'];
  $nu_insc_cei        = $dado['nu_insc_cei'];
  $dat_ent_cei        = $dado['dat_ent_cei'];
  $dat_fim_cei        = $dado['dat_fim_cei'];
  $nu_alvara          = $dado['nu_alvara'];
  $dat_alvara         = $dado['dat_alvara'];
  $txt_autor_proj     = $dado['txt_autor_proj'];
  $nu_crea            = $dado['nu_crea'];   

}
/*
echo '<pre style="margin-top: 100px;">';
echo var_dump($nu_obra);
echo '</pre>';
*/
$consulta = " SELECT * FROM cadastro_imoveis WHERE id_imoveis = $id_imoveis ";
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
      
 <div class="corpo_princ" style="margin-top: 130px; background-color: #F5F5DC; width: 1100px; max-height: 820px; margin-left: 10%;" >   
                        
      
        <div class="corpo_sec" style="width: 950px; padding-top: 20px; margin-left: 70px;" > 

          <form method="POST" action="../../../conexoes/conexao_obras.php" >

              <h5 style="text-align: left; margin-top: 0px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">OBRA</h5>  
  
              <div class="form-row">
                  <div class="form-group col-md-1">
                    <label for="obra">Nº Obra</label>
                    <input type="text" class="form-control" id="obra"  name="obra" value="<?php echo $nu_obra?>" >
                  </div>

                  <div class="form-group col-md-9">
                    <label for="end">Endereço Completo</label>
                        <?php while ($end = $con->fetch_array())
                        { ?>
                          <select class="custom-select mr-sm-2" id="end" name="end" value="<?php echo $end['id_imoveis']?>">
                            <option selected><?php echo 'LOTE Nº '.$end["num_end"].' - '.$end["txt_end"].' '.$end["txt_compl"].' '.$end["txt_bairro"].' '.$end["txt_cidade"].'-'.$end["txt_uf"]; ?></option>                                 
                          </select>
                          
                        <?php } ?>                                                            
                    
                    
                  </div>

                  <div class="form-group col-md-2">
                    <label for="status_obra">Status</label>                    
                    <select class="custom-select mr-sm-2" id="status_obra" name="status_obra" value="<?php echo $txt_status_obra?>">
                        <option selected><?php echo $txt_status_obra?></option>
                        <option value="INICIADA">INICIADA</option>
                        <option value="CONCLUIDA">CONCLUIDA</option>                                
                    </select>
                    
                  </div>
              </div>

              <div class="form-row" > 
                <div class="form-group col-md-3">
                  <label for="dat_inic">Data Inicio</label>
                  <input type="date" class="form-control" id="dat_inic" name="dat_inic" value="<?php echo $dat_inic?>" >
                </div>    
                <div class="form-group col-md-3">
                  <label for="dat_fim">Data Fim</label>
                  <input type="date" class="form-control" id="dat_fim" name="dat_fim" value="<?php echo $dat_fim?>" >
                </div> 
                <div class="form-group col-md-1">
                  <label for="qdte">Qtde</label>
                  <input type="text" class="form-control" id="qtde" name="qtde" value="<?php echo $qtde_imoveis?>" >
                </div>
                <div class="form-group col-md-2">
                  <label for="tipo">Tipo</label>
                  <select class="custom-select mr-sm-2" id="tipo" name="tipo" required>
                        <option selected><?php echo $tipo_imoveis?></option>
                        <option value="APTO">APTO</option>
                        <option value="CASA">CASA</option>                                                         
                  </select>
                </div>
              </div>

             

              <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">RECEITA FEDERAL - DISO</h5>  

               <div class="form-row" > 
                  <div class="form-group col-md-3">
                    <label for="cnpj_obra">INSCRIÇÃO - CNPJ</label>
                    <input type="text" class="form-control" id="cnpj_obra" name="cnpj_obra" value="<?php echo $nu_insc_cnpj?>" >
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_ent_cnpj">DATA ENTRADA</label>
                    <input type="date" class="form-control" id="dat_ent_cnpj" name="dat_ent_cnpj" value="<?php echo $dat_ent_cnpj?>" >
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_fim_cnpj">DATA FIM</label>
                    <input type="date" class="form-control" id="dat_fim_cnpj" name="dat_fim_cnpj" value="<?php echo $dat_fim_cnpj?>" >
                  </div>                              
              </div>
              <div class="form-row" > 
                  <div class="form-group col-md-3">
                    <label for="cei_obra">CADASTRO - CEI</label>
                    <input type="text" class="form-control" id="cei_obra" name="cei_obra" value="<?php echo $nu_insc_cei?>" >
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_ent_cei">DATA ENTRADA</label>
                    <input type="date" class="form-control" id="dat_ent_cei" name="dat_ent_cei" value="<?php echo $dat_ent_cei?>" >
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_fim_cei">DATA FIM</label>
                    <input type="date" class="form-control" id="dat_fim_cei" name="dat_fim_cei" value="<?php echo $dat_fim_cei?>" >
                  </div>                              
              </div>

               <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px; border-bottom: 0.5px solid #B9B9B9;">PREFEITURA</h5>  

               <div class="form-row" > 
                
                  <div class="form-group col-md-2">
                    <label for="nu_alvara">Nº Alvará</label>
                    <input type="text" class="form-control" id="nu_alvara" name="nu_alvara" value="<?php echo $nu_alvara?>" >
                  </div>
                  <div class="form-group col-md-3">
                    <label for="dat_alvara">Data Alvará</label>
                    <input type="date" class="form-control" id="dat_alvara" name="dat_alvara" value="<?php echo $dat_alvara?>" >
                  </div>
                  <div class="form-group col-md-5">
                    <label for="autor_proj">Autor do Projeto</label>
                    <input type="text" class="form-control" id="autor_proj" name="autor_proj" value="<?php echo $txt_autor_proj?>" >
                  </div> 
                  <div class="form-group col-md-2">
                    <label for="crea_alvara">CREA</label>
                    <input type="text" class="form-control" id="crea_alvara" name="crea_alvara" value="<?php echo $nu_crea?>" >
                  </div>                 
              </div> 
                     
        </div><br>

              <input type="hidden" name="obras_acao" value="alt">
              <input type="hidden" name="id_obras" value="<?php echo $id_obras?>">

              <button type="submit" class="btn btn-primary" name="alterar" style="margin-left: 850px; background-color: green; border-color: green; width: 150px; margin-bottom: 50px;">Alterar</button>
      
          </form>        
      
</div>
  </body>
</html>