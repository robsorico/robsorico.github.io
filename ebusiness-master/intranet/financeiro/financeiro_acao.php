<?php
	
	// Conexão com o banco de dados
	include_once("../../conexoes/conexao.php");	
	
	// PARTE: CATEGORIAS	
	// RECEBENDO DADOS DA PAGINA CATEGORIAS/SUBCATEGORIAS:
	$tipo 				= $_REQUEST['tipo'];
	$acao 				= $_REQUEST['acao'];
	$usuario 			= $_REQUEST['usuario'];	
	$txt_categoria 		= isset($_REQUEST['categoria']) ? $_REQUEST['categoria'] : "";
	$id_categoria   	= isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : "";
	$txt_subcategoria 	= $_REQUEST['subcategoria'];
	$tipo_fc		 	= $_REQUEST['tipo_fc'];
	$tipo_bp		 	= $_REQUEST['tipo_bp'];

	
	switch ($tipo) {

		case 'categoria':

			if ($acao == 'inserir') {

				$query = " SELECT * FROM cadastro_categorias WHERE UPPER(txt_categoria) = UPPER('$txt_categoria') ";
				$select = mysqli_query($conn, $query);
				$array_categ = mysqli_fetch_array($select);
				$txt_categ = $array_categ['txt_categoria'];

				/*echo '<pre>';
				echo var_dump($txt_categ);
				echo var_dump($tipo);
				echo var_dump($acao);
				echo var_dump($nu_usuario);
				echo var_dump($id_categoria);
				echo var_dump($txt_categoria);
				echo '</pre>';
				exit(0);*/	

				if ($txt_categ <> null or $txt_categ <> '') {

					echo "<script language='javascrit' type='text/javascript'>
					alert('Esta categoria já existe!');window.location.href='financeiro_categorias.php';</script> ";
	
				} else {

					$sql = mysqli_query($conn, " INSERT INTO `cadastro_categorias`(`id_categoria`, `dat_entrada`, `txt_categoria`, `dat_alteracao`, `usuario`) VALUES (null,CURRENT_DATE,'$txt_categoria',null,'$usuario') "); 

					if ($sql) {
						echo " <script language='javascript' type='text/javascript'>
						alert('Categoria cadastrada com sucesso!');window.location.href='financeiro_categorias.php';</script> ";

					} else {
						echo " <script language='javascript' type='text/javascript'> 
						alert('Categoria NÃO pode ser cadastrada!');window.location.href='financeiro_categorias.php';</script>";	

					}

				}

			} elseif ($acao == 'alterar') {


			} elseif ($acao == 'excluir') {



			}
			
			break;

		case 'subcategoria':
			if ($acao == 'inserir') {

				/*echo '<pre>';	
				echo var_dump($tipo);
				echo var_dump($acao);
				echo var_dump($usuario);
				echo var_dump($id_categoria);
				echo var_dump($txt_categoria);
				echo var_dump($txt_subcategoria);
				echo var_dump($tipo_fc);
				echo var_dump($tipo_bp);
				echo 'entrei aqui.';
				echo '</pre>';
				exit(0);*/

				$query = " SELECT * FROM cadastro_subcategorias WHERE UPPER(txt_subcategoria) = UPPER('$txt_subcategoria') ";
				$select = mysqli_query($conn, $query);
				$array_subcateg = mysqli_fetch_array($select);
				$txt_subcateg = $array_subcateg['txt_subcategoria'];

				
				if ($txt_subcateg <> null or $txt_subcateg <> '') {

					echo "<script language='javascrit' type='text/javascript'>
					alert('Esta subcategoria já existe!');window.location.href='financeiro_categorias.php';</script> ";
	
				} else {

					/*echo '<pre>';	
					echo var_dump($tipo);
					echo var_dump($acao);
					echo var_dump($usuario);
					echo var_dump($id_categoria);					
					echo var_dump($txt_subcategoria);
					echo var_dump($tipo_fc);
					echo var_dump($tipo_bp);
					echo 'entrei aqui.';
					echo '</pre>';
					exit(0);*/

					$sql = mysqli_query($conn, " INSERT INTO `cadastro_subcategorias`(`id_subcategoria`, `dat_entrada`, `txt_subcategoria`, `id_categoria`, `tipo_fc`, `tipo_bp`, `dat_alteracao`, `usuario`) VALUES (null, CURRENT_DATE,'$txt_subcategoria',$id_categoria,'$tipo_fc','$tipo_bp',null,'$usuario') "); 

					if ($sql) {
						echo " <script language='javascript' type='text/javascript'>
						alert('Subcategoria cadastrada com sucesso!');window.location.href='financeiro_categorias.php';</script> ";

					} else {
						echo " <script language='javascript' type='text/javascript'> 
						alert('Subcategoria NÃO pode ser cadastrada!');window.location.href='financeiro_categorias.php';</script>";	

					}

				}

			} elseif ($acao == 'alterar') {


			} elseif ($acao == 'excluir') {



			}

			break;
		
		default:
			# code...
			break;
	}



?>