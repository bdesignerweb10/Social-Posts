<?php
	require_once('header.php');
?> 
<main class="maintable">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 space">
				<div class="card spacing">
			  <div class="card-header">
			    <span>Gerenciamento de usuários	</span>		    
			  </div>
			  <div class="row btn-action">		
				  <div class="col-sm-8"></div>
				  <div class="col-sm-4">
				  	<button type="button" class="btn btns btn-lg btn-success" id="btn-add-usuario"><i class="fas fa-plus"></i> Novo Usuário</button>
				  </div><!-- col-sm-4 -->	
			  </div><!-- row -->	  
			  <div class="card-body">
			    <table class="table tbl-users table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Usuário</th>
				      <th scope="col">Nome do Usuário</th>
				      <th scope="col">Plano</th>
				      <th scope="col">Status</th>				      
				      <th scope="col">Opções</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>brunonew17@gmail.com</td>
				      <td>Bruno Gomes da Silva</td>
				      <td>Administrador</td>
				      <td><i class="fas fa-check icon-ok"></i></td>				      
				      <td>
				      	<a href="" title="Situação Financeira" data-toggle="modal" data-target="#situacaofinanceira"><i class="far fa-money-bill-alt icon-ok"></i></a>
				      	<a href="#" title="Editar informações do usuário"><i class="fas fa-edit icon-edit"></i></a>
				      	<a href="" title="Resetar senha do úsuário" data-toggle="modal" data-target="#reset"><i class="fas fa-eraser icon-reset"></i></a>
				      	<a href="" title="Deletar o usuário" data-toggle="modal" data-target="#remove"><i class="fas fa-trash-alt icon-delete"></i></a>
				      </td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>erika@gmail.com</td>
				      <td>Érika</td>
				      <td>Top</td>
				      <td><i class="fas fa-times icon-disabled"></i></td>				      
				      <td>
				      	<a href="" title="Situação Financeira" data-toggle="modal" data-target="#situacaofinanceira"><i class="far fa-money-bill-alt icon-ok"></i></a>
				      	<a href="#" title="Editar informações do usuário"><i class="fas fa-edit icon-edit"></i></a>
				      	<a href="" title="Resetar senha do úsuário"><i class="fas fa-eraser icon-reset"></i></a>
				      	<a href="" title="Deletar o usuário"><i class="fas fa-trash-alt icon-delete"></i></a>
				      </td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>gabrielle@gmail.com</td>
				      <td>Gabrielle</td>
				      <td>Full</td>
				      <td><i class="fas fa-times icon-disabled"></i></td>				      
				      <td>
				      	<a href="" title="Situação Financeira" data-toggle="modal" data-target="#situacaofinanceira"><i class="far fa-money-bill-alt icon-ok"></i></a>
				      	<a href="#" title="Editar informações do usuário"><i class="fas fa-edit icon-edit"></i></a>
				      	<a href="" title="Resetar senha do úsuário"><i class="fas fa-eraser icon-reset"></i></a>
				      	<a href="" title="Deletar o usuário"><i class="fas fa-trash-alt icon-delete"></i></a>
				      </td>
				    </tr>
				  </tbody>
				</table>
			</div><!--col-sm-12-->
		</div><!-- row -->
	</div><!--container-->

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

	<!-- Modal Reset de Senha -->
	<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modal-info">
	        <h5 class="modal-title" id="exampleModalLabel">Senha Resetada!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>A Senha foi resetada!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>      
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Situação Financeira -->
	<div class="modal fade" id="situacaofinanceira" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modal-header modal-warning">
	        <h5 class="modal-title" id="exampleModalLabel">Situação financeira de Bruno Gomes</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Montar tabela</p>
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
						<span>Novo usuário</span>			    
					</div>
					<div class="row btn-action">		
						<div class="col-sm-8"></div>
						<div class="col-sm-4">
							<button type="button" class="btn btns btn-lg btn-secondary" id="btn-voltar-usuario"><i class="fas fa-arrow-left"></i> Voltar</button>
						</div><!-- col-sm-4 -->	
					</div><!-- row -->	  
					<div class="card-body">
						<form>
							<div class="form-row">
							    <div class="form-group col-md-1">
							      <label for="user-id">ID</label>
							      <input type="number" class="form-control" name="user-id" id="user-id" disabled>
							    </div>
							    <div class="form-group col-md-4">
							      <label for="name">Nome</label>
							      <input type="text" class="form-control" name="name" id="name" placeholder="Informe o nome">
							    </div>
							    <div class="form-group col-md-4">
							      <label for="email-cart">E-mail (Usuário)</label>
							      <input type="email" class="form-control" name="email" id="email" placeholder="Informe o e-mail">
							    </div>
							    <div class="form-group col-md-3">
							      <label for="cpf-cnpj">CPF / CNPJ</label>
							      <input type="number" class="form-control" name="cpf-cnpj" id="cpf-cnpj" placeholder="Informe o CPF ou CNPJ">
							    </div>	
							    <div class="form-group col-md-2">
							      <label for="phone">Telefone</label>
							      <input type="number" class="form-control" name="phone" id="phone" placeholder="Informe o telefoneo">
							    </div>				    
							    <div class="form-group col-md-3">
							      <label for="plan">Plano</label>
							      <select id="plan" class="form-control">
							        <option selected>Selecione o tipo de acesso</option>
							        <option>Administrador</option>
							        <option>Top</option>
							        <option>Full</option>
							      </select>
							    </div>
							    <div class="form-group col-md-3">
							      <label for="password">Senha</label>
							      <input type="password" class="form-control" name="password" id="password" placeholder="Informe a senha">
							    </div>
							    <div class="form-group col-md-2">
							      <label for="inputState">Usuário ativo?</label>
							      <select id="inputState" class="form-control">					        
							        <option>Sim</option>
							        <option>Não</option>
							      </select>
							    </div>											    
					       	</div><!-- form-row -->
						</form>
						<div class="row btn-action-2">
							<div class="col-sm-8"></div>
					  			<div class="col-sm-4">
					  				<button type="submit" class="btn btn-default btn-lg btn-primary" id="btn-salvar-usuario" data-toggle="modal" data-target="#createuser"><i class="far fa-save"></i> Salvar usuário</button>
					  			</div>					  	
				  			</div>
						</div>			
					</div><!-- card -->	
				</div>
			</div><!-- col-sm-12-->
		</div><!-- row -->				
	</div><!-- container -->

	<!-- Modal Criação do usuário via portal -->
	<div class="modal fade" id="createuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modal-success">
	        <h5 class="modal-title" id="exampleModalLabel">Usuário cadastrado com sucesso!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>O usuário foi cadastrado com sucesso no sistema!</p>
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