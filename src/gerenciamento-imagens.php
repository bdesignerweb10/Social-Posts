<?php
	require_once('header.php');
	$categoria = $conn->query("select id_categoria, nome from tbl_categoria where ativo = 0 order by nome") or trigger_error($conn->error);

	$imagens = $conn->query("SELECT id_imagem, tbl_imagens.nome, imagem, tbl_imagens.ativo, tbl_categoria.nome as categoria FROM tbl_imagens INNER JOIN tbl_categoria on tbl_imagens.id_cat = tbl_categoria.id_categoria
where tbl_imagens.ativo = 0 order by tbl_imagens.nome") or trigger_error($conn->error);
?> 
<main class="maintable">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 space">
				<div class="card">
			  <div class="card-header">
			    <span>Gerenciamento de imagens</span>			    
			  </div>
			  <div class="row btn-action">		
				  <div class="col-sm-8"></div>
				  <div class="col-sm-4">
				  	<button type="button" class="btn btns btn-lg btn-success" id="btn-add-imagem"><i class="fas fa-plus"></i> Nova Imagem</button>
				  </div><!-- col-sm-4 -->	
			  </div><!-- row -->	  
			  <div class="card-body">
			    <table class="table tbl-default table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Imagem</th>
				      <th scope="col">Título</th>
				      <th scope="col">Categoria</th>				    
				      <th scope="col">Status</th>				      
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php if ($imagens && $imagens->num_rows > 0) {
						while($img = $imagens->fetch_object()) {
							$id = $img->id_imagem;						    	
					?>
				    <tr>
				      <th scope="row"><?php echo $img->id_imagem; ?></th>
				      <td><img class="list-img" src="img/bancoimagens/<?php echo $img->imagem; ?>"></td>
				      <td><?php echo $img->nome; ?></td>					      
				      <td><?php echo $img->categoria; ?></td>
				      <?php if ($img->ativo == 0) { 
					  	$ativo ='<i class="fas fa-check icon-ok"></i>'; 
					  } else { 
						$ativo ='<i class="fas fa-times icon-disabled"></i>';
					  } 
					  ?>			      
				      <td><?php echo $ativo; ?></td>				      
				      <td>
				      	<a href="#" class="btn-edit-imagem" data-id="<?php echo $id;?>" title="Editar informações da imagem <?php echo $img->id_imagem; ?>"><i class="fas fa-edit icon-edit"></i></a>				      	
				      	<a href="#" class="btn-del-imagem" data-id="<?php echo $id;?>" title="Deletar imagem <?php echo $img->id_imagem; ?>"><i class="fas fa-trash-alt icon-delete"></i></a>
				      </td>
				    </tr>
				    <?php } ?>			        	
			        	<?php } else { ?>
			        		<tr>
					        	<td colspan="6" class="center">Não há dados a serem exibidos para a listagem.</td>
				            </tr>
			        	<?php } ?>
				  </tbody>
				</table>
			</div><!-- col-sm-12-->				
		</div><!-- row -->
	</div><!-- container -->

	<!-- Modal Delete -->
	<div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modal-danger">
	        <h5 class="modal-title" id="exampleModalLabel">Dados Excluidos!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Os dados foram excluidos com sucesso!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>      
	      </div>
	    </div>
	  </div>
	</div>
</main>
<main class="mainform">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 space">
				<div class="card">
				  <div class="card-header">
				    <span>Nova Imagem</span>
				  </div>
				  <div class="row btn-action">		
						<div class="col-sm-8"></div>
						<div class="col-sm-4">
							<button type="button" class="btn btns btn-lg btn-secondary" id="btn-voltar-imagem"><i class="fas fa-arrow-left"></i> Voltar</button>
						</div><!-- col-sm-4 -->	
					</div><!-- row -->
				  <div class="card-body">
				    <form id="form-gerenciamento-imagens" action="acts/acts.acts.imagens.php" method="post">
						<div class="form-row">
							<div class="col-md-1">		    			
								<label for="id">ID</label>
			    				<input type="number" class="form-control" id="id" name="id" aria-describedby="id" maxlength="11" disabled />
			    			</div>						    
						    <div class="form-group col-md-5">
						      <label for="title-img">Título da imagem</label>
						      <input type="text" class="form-control" id="title-img" name="title-img"  placeholder="Informe o título da imagem">
						    </div>				    
						    <div class="form-group col-md-3">
						      <label for="categoria">Categoria</label>						      
						      <select id="categoria" name="categoria" class="form-control">	
						      <?php if ($categoria && $categoria->num_rows > 0) {
								while($cat = $categoria->fetch_object()) {
					  		  ?>				        
						        <option value="<?php echo $cat->id_categoria; ?>"><?php echo $cat->nome; ?></option>
						        <?php } ?>			        	
			        			<?php } else { ?>			        		
					        		<option>Não há dados a serem exibidos para a listagem.</option>
			        			<?php } ?>						      						        
						      </select>						      
						    </div>
						    <div class="form-group col-md-3">
								<label for="ativo">Ativo?</label>
							    <select id="ativo" name="ativo" class="form-control">
							    	<option value="0">Sim</option>
							        <option value="1">Não</option>
							    </select>
							</div>
						    <div class="form-group col-sm-7">
							    <label for="anexo-img">Anexo da imagem</label>
							    <input type="file" class="form-control-file" name="anexo-img" id="anexo-img">
							</div>										
						    <div class="form-group col-md-12">
							  <label for="description-img">Descrição da imagem</label>
							  <textarea class="form-control" rows="5" name="description-img" id="description-img"></textarea>
							</div>   
							<div class="form-group col-md-12">
						      <label for="tag-img">Tags da imagem</label>
						      <input type="text" class="form-control" id="tag-img" name="tag-img"  placeholder="Informe as tags da imagem">   
						    </div>	 
				       	</div><!-- form-row -->					
						<div class="row btn-action-2">
							<div class="col-sm-8"></div>
							  	<div class="col-sm-4">
							  		<button type="submit" class="btn btn-lg btn-primary btn-default" id="btn-salvar-imagem"><i class="far fa-save"></i> Salvar Imagem</button>
							  	</div>					  	
						  	</div>
						</div>
					</form>
				  </div>
				</div>
			</div><!--col-sm-12-->
		</div><!-- row -->
	</div><!--container-->

	<!-- Modal Dados inseridos com sucesso -->
	<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modal-success">
	        <h5 class="modal-title" id="exampleModalLabel">Dados inserido com sucesso!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Dado foi inserido com sucesso!</p>
	      </div>
	      <div class="modal-footer">	      	
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>	        
	      </div>
	    </div>
	  </div>
	</div>
</main>
<?php
	require_once('footer.php');
?> 