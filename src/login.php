<?php
	require_once('header-login.php');
?> 
<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="card space">
				  <div class="card-body">				    
				  	<form>
					  <div class="form-group">
					    <label for="exampleInputEmail1">Usuário (E-mail)</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Informe seu email">					    
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Senha</label>
					    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Informe sua senha">
					  </div>					  
					  <button type="submit" class="btn btn-success btn-default">Entrar</button>
					  <a class="reset-password" href="">Esqueci minha senha</a>
					</form>  
				  </div>
				</div>
			</div><!--col-sm-6-->
			<div class="col-sm-3"></div>
		</div><!-- row-->
	</div><!-- container -->
</main>
<?php
	require_once('footer.php');
?> 