<?php
	require_once('header.php');
?> 
<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 space">
				<div class="card spacing">
					<div class="card-header">
				    	<span>Configurações gerais do sistema</span>
				  	</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4">
						    	<div class="card spacing text-white bg-success mb-3" style="max-width: 18rem;">
								  <div class="card-header"><span>Categoria</span></div>
								  <div class="card-body">
								  	<p class="card-text">Categoria exibida no momento</p>
								    <h5 class="card-title">Categoria A</h5>				    
								  </div>
								</div>
						    </div><!-- col-sm-3 -->	    			    
						</div><!-- row -->
						<hr>
						
						<div class="row btns">
							<div class="col-sm-12">
								<span>Selecione a nova categoria a ser exibida</span>
								<form>
									<div class="form-row">
									    <div class="form-group col-md-8">
											<label for="exampleFormControlSelect1">Escolha a categoria</label>
										    <select class="form-control" id="exampleFormControlSelect1">
										    	<option>Categoria A</option>
										      	<option>Categoria B</option>
										      	<option>Categoria C</option>
										      	<option>Categoria D</option>
										      	<option>Categoria E</option>
										    </select>
										</div>
										<div class="form-group col-md-4">
											<button type="submit" class="btn btn-md btn-default btn-primary" style="margin-top: 30px;"><i class="fas fa-save"></i> Salvar Dados</button>	
										</div>									    					
					  				</div>
								</form>
							</div><!-- col-sm-12 -->
						</div>
		  			</div>
				</div>
			</div><!-- col-sm-12-->
		</div><!-- row -->	
	</div><!-- container -->
</main>
<?php
	require_once('footer.php');
?> 