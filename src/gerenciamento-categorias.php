<?php
	require_once('header.php');
?> 
<main class="maintable">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 space">
				<div class="card">
			  <div class="card-header">
			    <span>Gerenciamento de categorias</span>			    
			  </div>
			  <div class="row btn-action">		
				  <div class="col-sm-8"></div>
				  <div class="col-sm-4">
				  	<button type="button" class="btn btns btn-lg btn-success" id="btn-add-categoria"><i class="fas fa-plus"></i> Nova Categoria</button>
				  </div><!-- col-sm-4 -->	
			  </div><!-- row -->	  
			  <div class="card-body">
			    <table class="table tbl-default table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Categoria</th>
				      <th scope="col">R$</th>				    
				      <th scope="col">Status</th>				      
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Gratuito</td>
				      <td>R$00,00</td>				      
				      <td><i class="fas fa-check icon-ok"></i></td>				      
				      <td>
				      	<a href="#" title="Editar informações da categoria"><i class="fas fa-edit icon-edit"></i></a>				      	
				      	<a href="" title="Deletar categoria" data-toggle="modal" data-target="#remove"><i class="fas fa-trash-alt icon-delete"></i></a>
				      </td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Top</td>
				      <td>R$19,90</td>				      
				      <td><i class="fas fa-check icon-ok"></i></td>				      
				      <td>
				      	<a href="#" title="Editar informações da categoria"><i class="fas fa-edit icon-edit"></i></a>				      	
				      	<a href="" title="Deletar categoria" data-toggle="modal" data-target="#remove"><i class="fas fa-trash-alt icon-delete"></i></a>
				      </td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Full</td>
				      <td>R$39,90</td>				      
				      <td><i class="fas fa-times icon-disabled"></i></td>				      
				      <td>
				      	<a href="#" title="Editar informações da categoria"><i class="fas fa-edit icon-edit"></i></a>				      	
				      	<a href="" title="Deletar categoria" data-toggle="modal" data-target="#remove"><i class="fas fa-trash-alt icon-delete"></i></a>
				      </td>
				    </tr>
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
				    <span>Nova Categoria</span>
				  </div>
				  <div class="row btn-action">		
				<div class="col-sm-8"></div>
				<div class="col-sm-4">
					<button type="button" class="btn btns btn-lg btn-secondary" id="btn-voltar-categoria"><i class="fas fa-arrow-left"></i> Voltar</button>
				</div><!-- col-sm-4 -->	
			</div><!-- row -->	
				  <div class="card-body">
				    <form>
						<div class="form-row">						    
						    <div class="form-group col-md-6">
						      <label for="title-cat">Título da catergoria</label>
						      <input type="text" class="form-control" name="title-cat"  placeholder="Informe o título da categoria">
						    </div>		
						    <div class="form-group col-md-3">
						      <label for="title-cat">Valor</label>
						      <input type="number" class="form-control" name="title-cat"  placeholder="R$00,00">
						    </div>		    
						    <div class="form-group col-md-3">
						      <label for="categoria">Ativo?</label>
						      <select id="categoria" class="form-control">					        
						        <option>Sim</option>
						        <option>Não</option>
						      </select>
						    </div>						    									
						    <div class="form-group col-md-12">
							  <label for="description-img">Descrição da categoria</label>
							  <textarea class="form-control" rows="5" name="description-cat" id="description-cat"></textarea>
							</div>    
				       	</div><!-- form-row -->
					</form>
					<div class="row btn-action-2">
						<div class="col-sm-8"></div>
						  	<div class="col-sm-4">
						  		<button type="submit" class="btn btn-lg btn-primary btn-default" id="btn-salvar-categoria" data-toggle="modal" data-target="#save"><i class="far fa-save"></i> Salvar Categoria</button>
						  	</div>					  	
					  	</div>
					</div>
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