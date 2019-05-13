$(function() {

	/* GERENCIAR CATEGORIAS */

    $('#btn-add-categoria').click(function(e) {
		e.preventDefault();

		$('.maintable').hide();
		$('.mainform').show();

		$('#btn-salvar-categoria').data('id', null);
    	$('#btn-salvar-categoria').data('act', 'add');    	

    	/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    	   		    		
    });

    $('#btn-voltar-categoria').click(function(e) {
		e.preventDefault();

		$('.mainform').hide();
		$('.maintable').show();

    	$('#btn-salvar-categoria').data('id', null);
    	//$('#headline-ger-categoria').html('');
		//$('.headline-form').html('');

		/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    });

});