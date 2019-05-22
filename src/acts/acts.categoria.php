<?php
	require_once("connect.php");
	/*if (!isset($_SESSION["usu_id"]) || empty($_SESSION["usu_id"]) || 
		!isset($_SESSION['usu_nivel']) || empty($_SESSION["usu_nivel"]) ||
		$_SESSION['usu_nivel'] == "3" || $_SESSION["usu_id"] == "0") die('29001 - Você não tem permissão para acessar essa página!');*/

	if(isset($_GET['act']) && !empty($_GET['act'])) {
		switch ($_GET['act']) {
			case 'showupd':
				try {
					if(!isset($_GET['id']) || empty($_GET['id'])) {
						echo '{"succeed": false, "errno": 27004, "title": "Parâmetro não encontrado!", "erro": "Parâmetro do ID do evento não enviado! Favor contatar o administrador mostrando o erro!"}';
						exit();
					}

					$id = $_GET['id']; 

			    	$qry_categoria = $conn->query("SELECT id_categoria, nome, descricao ,ativo FROM tbl_categoria WHERE id_categoria = $id") or trigger_error("27005 - " . $conn->error);

					if ($qry_categoria && $qry_categoria->num_rows > 0) {
						$dados = "";
		    			while($cat = $qry_categoria->fetch_object()) {
		    				$dados = '{"id" : "' . $cat->id_categoria . '", "title_cat" : "' . $cat->nome . '", "description_cat" : "' . $cat->descricao . '","ativo" : "' . $cat->ativo . '"}';
		    			}

						echo '{"succeed": true, "dados": ' . $dados . '}';
						exit();
		    		}
		    		else {
		    			throw new Exception('Nenhum serviço encontrado com o ID ' . $id . "!");
		    		}
				} catch(Exception $e) {
					echo '{"succeed": false, "errno": 24005, "title": "Erro ao carregar os dados!", "erro": "Ocorreu um erro ao carregar os dados: ' . $e->getMessage() . '"}';
					exit();
				}
		        break;

			case 'add':
				try {
					$conn->autocommit(FALSE);

					if(isset($_POST) && !empty($_POST) && $_POST["title-cat"]) {
						$isValid = true;
						$errMsg = "";

						if(!isset($_POST["title-cat"]) || empty($_POST["title-cat"])) {
							$errMsg .= "Nome (Nome da categoria)";
							$isValid = false;
						}
						

						if(!isset($_POST["description-cat"]) || empty($_POST["description-cat"])) {
							$errMsg .= "Descrição da consultoria";
							$isValid = false;
						}						

						if(!$isValid) {
							echo '{"succeed": false, "errno": 27006, "title": "Erro em um ou mais campos do formulário!", "erro": "Ocorreram erros nos seguintes campos do formulário: <b>' . $errMsg . '</b>"}';
							$conn->rollback();
							exit();
						}
						else {					
							$nome = $_POST["title-cat"];
							$descricao = $_POST["description-cat"];
							$ativo = $_POST["ativo"];
							//$ativo = (isset($_POST["ativo"]) && $_POST["ativo"] == "0" ? "0" : "1");
														

							$qry_categoria= "INSERT INTO tbl_categoria (nome, descricao, ativo) VALUES ('" . $nome . "','" . $descricao . "','" . $ativo . "')";

							if ($conn->query($qry_categoria) === TRUE) {
								$conn->commit();
								echo '{"succeed": true}';
							} else {
						        throw new Exception("Erro ao inserir o evento: " . $qry_categoria . "<br>" . $conn->error);
							}							
						}
					}
					else {
						echo '{"succeed": false, "errno": 27008, "title": "Erro ao enviar o formulário!", "erro": "Ocorreu um erro ao tentar enviar seu formulário, favor recarregar a página e tentar novamente!"}';
						$conn->rollback();
						exit();
					}
				} catch(Exception $e) {
					$conn->rollback();

					echo '{"succeed": false, "errno": 27007, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
				}
		        break;
	        case 'edit':
				try {
					$conn->autocommit(FALSE);

					if(!isset($_GET['id']) || empty($_GET['id'])) {
						echo '{"succeed": false, "errno": 27014, "title": "Parâmetro não encontrado!", "erro": "Parâmetro do ID do evento não enviado! Favor contatar o administrador mostrando o erro!"}';
						exit();
					}	

					$id = $_GET['id'];			

					if(isset($_POST) && !empty($_POST) && $_POST["title-cat"]) {
						$isValid = true;
						$errMsg = "";

						if(!isset($_POST["title-cat"]) || empty($_POST["title-cat"])) {
							$errMsg .= "Titulo (Título da categoria)";
							$isValid = false;
						}					

						if(!isset($_POST["description-cat"]) || empty($_POST["description-cat"])) {
							$errMsg .= "Descrição da consultoria";
							$isValid = false;
						}

						if(!$isValid) {
							echo '{"succeed": false, "errno": 27010, "title": "Erro em um ou mais campos do formulário!", "erro": "Ocorreram erros nos seguintes campos do formulário: <b>' . $errMsg . '</b>"}';
							$conn->rollback();
							exit();
						}
						else {
							$nome = $_POST["title-cat"];						
							$descricao = $_POST["description-cat"];						
							$ativo = $_POST["ativo"];
							

							$qry_categoria = "UPDATE tbl_categoria 
											  SET nome = '" . $nome . "',										      
											      descricao = '" . $descricao . "',										      
											      ativo = " . $ativo . "
											WHERE id_categoria = $id";
							if ($conn->query($qry_categoria) === TRUE) {
								$conn->commit();
								echo '{"succeed": true}';
							} else {
						        throw new Exception("Erro ao alterar o evento: " . $qry_categoria . "<br>" . $conn->error);
							}
						}
					}
					else {
						echo '{"succeed": false, "errno": 27012, "title": "Erro ao enviar o formulário!", "erro": "Ocorreu um erro ao tentar enviar seu formulário, favor recarregar a página e tentar novamente!"}';
						$conn->rollback();
						exit();
					}
				} catch(Exception $e) {
					$conn->rollback();

					echo '{"succeed": false, "errno": 27013, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
				}
		        break;
		    case 'del':
			try {
				$conn->autocommit(FALSE);

				if(!isset($_GET['id']) || empty($_GET['id'])) {
					echo '{"succeed": false, "errno": 27020, "title": "Parâmetro não encontrado!", "erro": "Parâmetro do ID do evento não enviado! Favor contatar o administrador mostrando o erro!"}';
					exit();
				}

				$id = $_GET['id'];

				$qrydel_categoria = "DELETE FROM tbl_categoria WHERE id_categoria = $id";
				if ($conn->query($qrydel_categoria) === TRUE) {
				
					$qrydelcategoria = "DELETE FROM tbl_categoria WHERE id_categoria = $id";
					if ($conn->query($qrydelcategoria) === TRUE) {
						$conn->commit();
						echo '{"succeed": true}';
					} else {
				        throw new Exception("Erro ao remover consultoria: " . $qrydelcategoria . "<br>" . $conn->error);
					}
				} else {
			        throw new Exception("Erro ao remover consultoria: " . $qrydel_categoria. "<br>" . $conn->error);
				}
			} catch(Exception $e) {
				$conn->rollback();

				echo '{"succeed": false, "errno": 27021, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
			}
	        break;    
		}
	}
?>