<?php
	require_once('header-login.php');
?> 
<main>
	<div class="container">
		<div class="row">			
			<div class="col-sm-7 space-login card-contact">
				<div class="card">
					<div class="card-header">
				    	<span>Contato</span>
				  	</div>				  		
					<div class="card-body">
					    <form>
							<div class="form-row">						    
							    <div class="form-group col-md-12">
							      <label for="nome">Nome</label>
							      <input type="text" class="form-control form-control-lg" name="nome"  placeholder="Informe o seu nome">
							    </div>
							    <div class="form-group col-md-7">
							      <label for="email">E-mail</label>
							      <input type="email" class="form-control form-control-lg" name="email"  placeholder="Informe o seu E-mail">
							    </div>	    
							    <div class="form-group col-md-5">
							      <label for="phone">Telefone</label>
							      <input type="number" class="form-control form-control-lg" name="phone"  placeholder="(00)00000-0000">
							    </div>		
							    <div class="form-group col-md-12">
							      <label for="assunto">Assunto</label>
							      <input type="text" class="form-control form-control-lg" name="assunto"  placeholder="Informe o assunto">
							    </div>			    									
							    <div class="form-group col-md-12">
								  <label for="message">Mensagem</label>
								  <textarea class="form-control" rows="5" name="message"></textarea>
								</div>    
					       	</div><!-- form-row -->
						</form>
						<div class="row btn-action-2">
							<div class="col-sm-8"></div>
							  	<div class="col-sm-4">
							  		<button type="submit" class="btn btn-lg btn-primary btn-default" id="btn-salvar-categoria"><i class="far fa-envelope"></i> Enviar</button>
							  	</div>					  	
						  	</div>
						</div>
				  	</div>				
				</div><!--card-->

			<div class="col-sm-5 space-login contact">
				<h3>Você também pode entrar em contato pelo telefone ou e-mail:</h3>
				<p><i class="fas fa-phone-square"></i> (14)99131-6043</p>
				<p><i class="far fa-envelope"></i> contato@socialposts.com.br</p>

				<h3>Como chegar</h3>
				<div class="maps"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.8441409613183!2d-49.07161858557539!3d-22.321733522866356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bf67a52dae72a7%3A0x5ef23824d1505740!2sR.+Batista+de+Carvalho%2C+9-63+-+Centro%2C+Bauru+-+SP%2C+17012-150!5e0!3m2!1spt-BR!2sbr!4v1557927095084!5m2!1spt-BR!2sbr" width="438" height="247" frameborder="0" style="border:0" allowfullscreen></iframe></div>
			</div><!-- col-sm-5-->
		</div><!-- row -->
	</div><!-- container -->
</main>
<?php
	require_once('footer-login.php');
?> 