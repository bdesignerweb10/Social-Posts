<div id="alert" class="modal" data-backdrop="static"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header modal-warning"><h5 id="alert-title" class="modal-title"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p id="alert-content"></p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button></div></div></div></div><div id="confirm" class="modal" data-backdrop="static"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 id="confirm-title" class="modal-title">Modal title</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p id="confirm-content"></p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <button type="button" class="btn btn-danger" id="btn-confirm-modal">Continuar</button></div></div></div></div><div id="loading" class="modal" data-backdrop="static"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Aguarde! Processando seus dados...</h5></div><div class="modal-body"><p id="alert-content" style="text-align: center;"><img src="img/loading-pop.gif" border="0"><br>Sua requisição foi enviada e está sendo processada pelo nosso sistema! Aguarde alguns instantes....</p></div></div></div></div><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script><script src="js/main.js" type="text/javascript" charset="utf-8"></script><script src="js/app.js" type="text/javascript" charset="utf-8"></script><script src="js/moment.min.js" type="text/javascript" charset="utf-8"></script><script src="js/textext.core.js" type="text/javascript" charset="utf-8"></script><script src="js/textext.plugin.autocomplete.js" type="text/javascript" charset="utf-8"></script><script src="js/textext.plugin.ajax.js" type="text/javascript" charset="utf-8"></script><script src="js/jquery.tablesorter.min.js" type="text/javascript"></script><script src="js/jquery.mask.js"></script><script src="js/jquery.amsify.suggestags.js"></script><script>$('input[name="tag-img"]').amsifySuggestags({
				type : 'amsify'				
			});</script> <?php if($conn) $conn->close(); ?>