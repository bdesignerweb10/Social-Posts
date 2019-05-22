<?php
	require_once('header.php');
	$categoria = $conn->query("select * from tbl_categoria order by id_categoria") or trigger_error($conn->error);

	if(isset($_GET['novo'])) {
		echo '<script>
		$(function() {
			$(".maintable").hide();
			$(".mainform").show();
		});
		</script>';
	} else{
		echo '<script>
		$(function() {
			$(".mainform").hide();
			$(".maintable").show();
		});
		</script>';
	}
	
?> <main class="maintable"><div class="container"><div class="row"><div class="col-sm-12 space"><div class="card"><div class="card-header"><span>Gerenciamento de categorias</span></div><div class="row btn-action"><div class="col-sm-8"></div><div class="col-sm-4"><button type="button" class="btn btns btn-lg btn-success" id="btn-add-categoria"><i class="fas fa-plus"></i> Nova Categoria</button></div><!-- col-sm-4 --></div><!-- row --><div class="card-body"><table class="table tbl-default table-hover"><thead><tr><th scope="col">#</th><th scope="col">Categoria</th><th scope="col">Status</th><th scope="col">Opções</th></tr></thead><tbody> <?php if ($categoria && $categoria->num_rows > 0) {
						while($cat = $categoria->fetch_object()) {
							$id = $cat->id_categoria;						    	
					?> <tr><th scope="row"><?php echo $cat->id_categoria; ?></th><td><?php echo $cat->nome; ?></td> <?php if ($cat->ativo == 0) { 
					  	$ativo ='<i class="fas fa-check icon-ok"></i>'; 
					  } else { 
						$ativo ='<i class="fas fa-times icon-disabled"></i>';
					  } 
					  ?> <td><?php echo $ativo; ?></td><td><a href="#" class="btn-edit-categoria" data-id="<?php echo $id;?>" title="Editar informações da categoria <?php echo $cat->id_categoria; ?>"><i class="fas fa-edit icon-edit"></i></a> <a href="#" class="btn-del-categoria" data-id="<?php echo $id;?>" title="Deletar categoria <?php echo $cat->id_categoria; ?>"><i class="fas fa-trash-alt icon-delete"></i></a></td></tr> <?php } ?> <?php } else { ?> <tr><td colspan="6" class="center">Não há dados a serem exibidos para a listagem.</td></tr> <?php } ?> </tbody></table></div><!-- col-sm-12--></div><!-- row --></div><!-- container --><!-- Modal Delete --><div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header modal-danger"><h5 class="modal-title" id="exampleModalLabel">Dados Excluidos!</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>Os dados foram excluidos com sucesso!</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button></div></div></div></div></div></div></main><main class="mainform"><div class="container"><div class="row"><div class="col-sm-12 space"><div class="card"><div class="card-header"><span>Nova Categoria</span></div><div class="row btn-action"><div class="col-sm-8"></div><div class="col-sm-4"><button type="button" class="btn btns btn-lg btn-secondary" id="btn-voltar-categoria"><i class="fas fa-arrow-left"></i> Voltar</button></div><!-- col-sm-4 --></div><!-- row --><div class="card-body"><form id="form-gerenciamento-categorias" action="acts/acts.acts.categoria.php" method="post"><div class="form-row"><div class="col-md-1"><label for="id">ID</label> <input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled="disabled"></div><div class="form-group col-md-6"><label for="title-cat">Título da catergoria</label> <input type="text" class="form-control" id="title-cat" name="title-cat" placeholder="Informe o título da categoria"></div><div class="form-group col-md-3"><label for="ativo">Ativo?</label> <select id="ativo" name="ativo" class="form-control"><option value="0">Sim</option><option value="1">Não</option></select></div><div class="form-group col-md-12"><label for="description-cat">Descrição da categoria</label> <textarea class="form-control" rows="5" name="description-cat" id="description-cat"></textarea></div></div><!-- form-row --><div class="row btn-action-2"><div class="col-sm-8"></div><div class="col-sm-4"><button type="submit" class="btn btn-lg btn-primary btn-default" id="btn-salvar-categoria"><i class="far fa-save"></i> Salvar Categoria</button></div></div></form></div></div></div></div><!--col-sm-12--></div><!-- row --><!--container--><!-- Modal Dados inseridos com sucesso --><div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header modal-success"><h5 class="modal-title" id="exampleModalLabel">Dados inserido com sucesso!</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>Dado foi inserido com sucesso!</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button></div></div></div></div></main> <?php
	require_once('footer.php');
?>