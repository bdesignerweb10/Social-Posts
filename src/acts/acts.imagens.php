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

			    	$qry_imagem = $conn->query("SELECT id_imagem, tbl_imagens.nome as nome_img, imagem, tbl_imagens.descricao as descricao_img, tags, tbl_imagens.ativo as ativo_img, tbl_categoria.id_categoria as categoria FROM tbl_imagens INNER JOIN tbl_categoria on tbl_imagens.id_cat = tbl_categoria.id_categoria WHERE id_imagem = $id") or trigger_error("27005 - " . $conn->error);

					if ($qry_imagem && $qry_imagem->num_rows > 0) {
						$dados = "";
		    			while($img = $qry_imagem->fetch_object()) {
		    				$dados = '{"id" : "' . $img->id_imagem . '", "title_img" : "' . $img->nome_img . '", "categoria" : "' . $img->categoria . '","ativo" : "' . $img->ativo_img . '","anexo_img" : "' . $img->imagem . '","description_img" : "' . $img->descricao_img . '","tag_img" : "' . $img->tags . '"}';
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

					if(isset($_POST) && !empty($_POST) && $_POST["title-img"]) {
						$isValid = true;
						$errMsg = "";

						if(!isset($_POST["title-img"]) || empty($_POST["title-img"])) {
							$errMsg .= "Nome (Nome da Imagem)";
							$isValid = false;
						}
						

						if(!isset($_POST["description-img"]) || empty($_POST["description-img"])) {
							$errMsg .= "Descrição da imagem";
							$isValid = false;
						}						

						if(!$isValid) {
							echo '{"succeed": false, "errno": 27006, "title": "Erro em um ou mais campos do formulário!", "erro": "Ocorreram erros nos seguintes campos do formulário: <b>' . $errMsg . '</b>"}';
							$conn->rollback();
							exit();
						}
						else {
							// aqui é onde faz as paradas da imagem
							if(isset($_FILES['anexo-img'])) {

								if($_FILES['anexo-img']['type'] != "image/png") {
					        		throw new Exception("Imagem enviada precisa ser tipo PNG!");
								}
							    
							    $imgsize = getimagesize($_FILES['anexo-img']['tmp_name']);

							    if($imgsize[0] < 150) {
					        		throw new Exception("Tamanho mínimo da largura da imagem precisa ser 150px! Favor escolher outra imagem e enviar novamente!");
							    }

							    $pathImagem = "../img/bancoimagens/" . ($_FILES['anexo-img']['name']);
							    
							    if(is_uploaded_file($_FILES['anexo-img']['tmp_name']) || $_FILES['anexo-img']['error'] !== UPLOAD_ERR_OK) {
							   		move_uploaded_file($_FILES['anexo-img']['tmp_name'], $pathImagem);
							    }

								$imagem = $_FILES['anexo-img']['name'];	
							}
							else {
								$imagem = "";
							}

							$titulo = $_POST["title-img"];
							$categoria = $_POST["categoria"];
							$ativo = $_POST["ativo"];							
							$descricao = $_POST["description-img"];
							$tags = $_POST["tag-img"];
														

							$qry_imagem = "INSERT INTO tbl_imagens (nome, imagem, descricao, tags, ativo, id_cat) VALUES ('" . $titulo . "','" . $imagem . "','" . $descricao . "','" . $tags . "','" . $ativo . "','" . $categoria . "')";

							if ($conn->query($qry_imagem) === TRUE) {
								$conn->commit();
								echo '{"succeed": true}';
							} else {
						        throw new Exception("Erro ao inserir o evento: " . $qry_imagem . "<br>" . $conn->error);
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

					if(isset($_POST) && !empty($_POST) && $_POST["title-img"]) {
						$isValid = true;
						$errMsg = "";

						if(!isset($_POST["title-img"]) || empty($_POST["title-img"])) {
							$errMsg .= "Nome (Nome da Imagem)";
							$isValid = false;
						}					

						if(!isset($_POST["description-img"]) || empty($_POST["description-img"])) {
							$errMsg .= "Descrição da imagem";
							$isValid = false;
						}

						if(!$isValid) {
							echo '{"succeed": false, "errno": 27010, "title": "Erro em um ou mais campos do formulário!", "erro": "Ocorreram erros nos seguintes campos do formulário: <b>' . $errMsg . '</b>"}';
							$conn->rollback();
							exit();
						}
						else {
							if(isset($_FILES['anexo-img'])) {

								if($_FILES['anexo-img']['type'] != "image/png") {
					        		throw new Exception("Imagem enviada precisa ser tipo PNG!");
								}
							    
							    $imgsize = getimagesize($_FILES['anexo-img']['tmp_name']);

							    if($imgsize[0] < 150) {
					        		throw new Exception("Tamanho mínimo da largura da imagem precisa ser 850px! Favor escolher outra imagem e enviar novamente!");
							    }

							    $pathImagem = "../img/bancoimagens/" . ($_FILES['anexo-img']['name']);
							    

							    if(is_uploaded_file($_FILES['anexo-img']['tmp_name']) || $_FILES['anexo-img']['error'] !== UPLOAD_ERR_OK) {
							   		move_uploaded_file($_FILES['anexo-img']['tmp_name'], $pathImagem);
							    }	

								$imagem = ", imagem = '" . $_FILES['anexo-img']['name'] . "'";	
							}
							else{
								$imagem = "";
							}

							$titulo = $_POST["title-img"];
							$categoria = $_POST["categoria"];
							$ativo = $_POST["ativo"];							
							$descricao = $_POST["description-img"];
							$tags = $_POST["tag-img"];
							

							$qry_imagem = "UPDATE tbl_imagens
											  SET nome = '" . $titulo . "',	
											      descricao = '" . $descricao . "',					
											      tags = '" . $tags . "',
											      ativo = '" . $ativo . "',		
											      id_cat = " . $categoria . "	  
											  	  " . $imagem . "    
											WHERE id_imagem = $id";
							if ($conn->query($qry_imagem) === TRUE) {
								$conn->commit();
								echo '{"succeed": true}';
							} else {
						        throw new Exception("Erro ao alterar o evento: " . $qry_imagem . "<br>" . $conn->error);
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

				$id = $_GET['id']; // $_SESSION["fake_id"];

				$qrydel_imagem = "DELETE FROM tbl_imagens WHERE id_imagem = $id";
				if ($conn->query($qrydel_imagem) === TRUE) {
				
					$qrydelimagem = "DELETE FROM tbl_imagens WHERE id_imagem = $id";
					if ($conn->query($qrydelimagem) === TRUE) {
						$conn->commit();
						echo '{"succeed": true}';
					} else {
				        throw new Exception("Erro ao remover Imagem: " . $qrydelimagem . "<br>" . $conn->error);
					}
				} else {
			        throw new Exception("Erro ao remover Imagem: " . $qrydel_imagem . "<br>" . $conn->error);
				}
			} catch(Exception $e) {
				$conn->rollback();

				echo '{"succeed": false, "errno": 27021, "title": "Erro ao salvar os dados!", "erro": "Ocorreu um erro ao salvar os dados: ' . $e->getMessage() . '"}';
			}
	        break;    
		}
	}
?>