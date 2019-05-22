$(function() {

	/* GERENCIAR CATEGORIAS */

    $('#btn-add-categoria').click(function(e) {
		e.preventDefault();

		$('.maintable').hide();
		$('.mainform').show();

		$('#btn-salvar-categoria').data('id', null);
    	$('#btn-salvar-categoria').data('act', 'add');    	

    	$('#id').val('');
    	$('#title-cat').val('');
    	$('#description-cat').val(''); 
    	$('#ativo').val('');
    	   		    		
    });

    $('#btn-voltar-categoria').click(function(e) {
		e.preventDefault();

		$('.mainform').hide();
		$('.maintable').show();

    	$('#btn-salvar-categoria').data('id', null);    	

		$('#id').val('');
        $('#title-cat').val('');
        $('#description-cat').val(''); 
        $('#ativo').val('');        
    });

    $("#form-gerenciamento-categorias").submit(function(e) {
        e.preventDefault();

        $('#loading-modal').modal({
            keyboard: false
        });

        var id = $('#btn-salvar-categoria').data('id');
        var act = $('#btn-salvar-categoria').data('act');

        if(act == "edit") {
            var url = "acts/acts.categoria.php?act=" + act + "&id=" + id;
        }
        else {
            var url = "acts/acts.categoria.php?act=" + act;           
        }

        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('title-cat', $('#title-cat').val());
        formData.append('description-cat', $('#description-cat').val());   
        formData.append('ativo', $('#ativo').val());         
        
        $.ajax({
            type: "POST",
            url: url,
            data : formData,
            processData: false,
            contentType: false,
            success: function(data)
            {
                try {
                    console.log(data);
                    $('#loading-modal').modal('hide');

                    var retorno = JSON.parse(data.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));

                    if(retorno.succeed) {
                        $('#id').val('');
                        $('#title-cat').val('');
                        $('#description-cat').val('');                        
                        $('#ativo').val('');                        

                        $('#alert-title').html("Dados registrado com sucesso!");
                        $('#alert-content').html("Dados da categoria registrados com sucesso! Ao fechar esta mensagem a página será recarregada.");
                        $('#alert').modal('show');

                        $('#alert').on('hidden.bs.modal', function (e) {
                            window.location.reload();
                        });
                    }
                    else {
                        $('#alert-title').html(retorno.title);
                        $('#alert-content').html(retorno.errno + " - " + retorno.erro);
                        $('#alert').modal('show');

                        $('#id').val('');
                        $('#title-cat').val('');
                        $('#description-cat').val('');                        
                        $('#ativo').val('');                        
                    }
                }
                catch (e) {
                    $('#loading-modal').modal('hide');
                    $('#alert-title').html("Erro ao fazer parse do JSON!");
                    $('#alert-content').html(String(e.stack));
                    $('#alert').modal('show');

                    $('#id').val('');
                    $('#title-cat').val('');
                    $('#description-cat').val('');                    
                    $('#ativo').val('');
                };
            }
        });
    });

    $('.btn-edit-categoria').click(function(e) {
        e.preventDefault();

        $('#loading').modal({
            keyboard: false
        });

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "acts/acts.categoria.php?act=showupd&id=" + id,
            success: function(data)     
            {
                try {
                    $('#loading').modal('hide');

                    var retorno = JSON.parse(data.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));

                    if(retorno.succeed) {
                        $('.maintable').hide();
                        $('.mainform').show();

                        $('#btn-salvar-categoria').data('act', 'edit');
                        $('#btn-salvar-categoria').data('id', id);                        

                        //var d = new Date(retorno.dados.data * 1000);

                        $('#id').val(retorno.dados.id);
                        $('#title-cat').val(retorno.dados.title_cat);                     
                        $('#description-cat').val(retorno.dados.description_cat);                       
                        //$('#ativo').bootstrapToggle(retorno.dados.ativo == 0 ? 'on' : 'off'); 
                        $('#ativo').val(retorno.dados.ativo);                  
                    }
                    else {
                        $('.mainform').hide();
                        $('.maintable').show();

                        $('#btn-salvar-categoria').data('id', null);
                        $('#btn-salvar-categoria').data('act', null);                     

                        $('#id').val('');
                        $('#title-cat').val('');                       
                        $('#description-cat').val('');
                        $('#ativo').val('');                                                         

                        $('#alert-title').html(retorno.title);
                        $('#alert-content').html(retorno.errno + " - " + retorno.erro);
                        $('#alert').modal('show');
                    }
                }
                catch (e) {                 
                    $('#loading').modal('hide');
                    $('#alert-title').html("Erro ao fazer parse do JSON!");
                    $('#alert-content').html(String(e.stack));
                    $('#alert').modal('show');
                };
            }
        });
    });

    $('.btn-del-categoria').click(function(e) {
        e.preventDefault();

        $('#loading').modal({
            keyboard: false
        });

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "acts/acts.categoria.php?act=del&id=" + id,
            success: function(data)
            {
                try {
                    $('#loading').modal('hide');

                    var retorno = JSON.parse(data.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));

                    if(retorno.succeed) {
                        $('#alert-title').html("Categoria removida com sucesso!");
                        $('#alert-content').html("A remoção da categoria foi efetuada com sucesso! Ao fechar esta mensagem a página será recarregada.");
                        $('#alert').modal('show');

                        $('#alert').on('hidden.bs.modal', function (e) {
                            window.location.reload();
                        });
                    }
                    else {
                        $('#alert-title').html(retorno.title);
                        $('#alert-content').html(retorno.errno + " - " + retorno.erro);
                        $('#alert').modal('show');
                    }
                }
                catch (e) {
                    $('#loading').modal('hide');
                    $('#alert-title').html("Erro ao fazer parse do JSON!");
                    $('#alert-content').html(String(e.stack));
                    $('#alert').modal('show');
                };
            }
        });
    });



    /* GERENCIAR USUÁRIOS */

    $('#btn-add-usuario').click(function(e) {
		e.preventDefault();

		$('.maintable').hide();
		$('.mainform').show();

		$('#btn-salvar-usuario').data('id', null);
    	$('#btn-salvar-usuario').data('act', 'add');    	

    	/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    	   		    		
    });

    $('#btn-voltar-usuario').click(function(e) {
		e.preventDefault();

		$('.mainform').hide();
		$('.maintable').show();

    	$('#btn-salvar-usuario').data('id', null);
    	//$('#headline-ger-categoria').html('');
		//$('.headline-form').html('');

		/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    });

    /* GERENCIAR IMAGENS */

    $('#btn-add-imagem').click(function(e) {
		e.preventDefault();

		$('.maintable').hide();
		$('.mainform').show();

		$('#btn-salvar-imagem').data('id', null);
    	$('#btn-salvar-imagem').data('act', 'add');    	

    	$('#id').val('');
        $('#title-img').val('');
        $('#categoria').val(''); 
        $('#ativo').val('');
        $('#anexo-img').val('');
        $('#description-img').val('');
        $('#tag-img').val('');
    	   		    		
    });

    $('#btn-voltar-imagem').click(function(e) {
		e.preventDefault();

		$('.mainform').hide();
		$('.maintable').show();

    	$('#btn-salvar-imagem').data('id', null);    	

		$('#id').val('');
        $('#title-img').val('');
        $('#categoria').val(''); 
        $('#ativo').val('');
        $('#anexo-img').val('');
        $('#description-img').val('');
        $('#tag-img').val('');
    });

    $("#form-gerenciamento-imagens").submit(function(e) {
        e.preventDefault();

        $('#loading-modal').modal({
            keyboard: false
        });

        var id = $('#btn-salvar-imagem').data('id');
        var act = $('#btn-salvar-imagem').data('act');

        if(act == "edit") {
            var url = "acts/acts.imagens.php?act=" + act + "&id=" + id;
        }
        else {
            var url = "acts/acts.imagens.php?act=" + act;           
        }

        var formData = new FormData();
        formData.append('id', $('#id').val());
        formData.append('title-img', $('#title-img').val());
        formData.append('categoria', $('#categoria').val());
        formData.append('ativo', $('#ativo').val());            
        formData.append('anexo-img', $('#anexo-img').val()); 
        formData.append('description-img', $('#description-img').val()); 
        formData.append('tag-img', $('#tag-img').val()); 
        
        $.ajax({
            type: "POST",
            url: url,
            data : formData,
            processData: false,
            contentType: false,
            success: function(data)
            {
                try {
                    console.log(data);
                    $('#loading-modal').modal('hide');

                    var retorno = JSON.parse(data.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));

                    if(retorno.succeed) {
                        $('#id').val('');
                        $('#title-img').val('');
                        $('#categoria').val(''); 
                        $('#ativo').val('');
                        $('#anexo-img').val('');
                        $('#description-img').val('');
                        $('#tag-img').val('');                      

                        $('#alert-title').html("Dados registrado com sucesso!");
                        $('#alert-content').html("Dados da imagem registrados com sucesso! Ao fechar esta mensagem a página será recarregada.");
                        $('#alert').modal('show');

                        $('#alert').on('hidden.bs.modal', function (e) {
                            window.location.reload();
                        });
                    }
                    else {
                        $('#alert-title').html(retorno.title);
                        $('#alert-content').html(retorno.errno + " - " + retorno.erro);
                        $('#alert').modal('show');

                        $('#id').val('');
                        $('#title-img').val('');
                        $('#categoria').val(''); 
                        $('#ativo').val('');
                        $('#anexo-img').val('');
                        $('#description-img').val('');
                        $('#tag-img').val('');                       
                    }
                }
                catch (e) {
                    $('#loading-modal').modal('hide');
                    $('#alert-title').html("Erro ao fazer parse do JSON!");
                    $('#alert-content').html(String(e.stack));
                    $('#alert').modal('show');

                    $('#id').val('');
                    $('#title-img').val('');
                    $('#categoria').val(''); 
                    $('#ativo').val('');
                    $('#anexo-img').val('');
                    $('#description-img').val('');
                    $('#tag-img').val('');
                };
            }
        });
    });

    $('.btn-edit-imagem').click(function(e) {
        e.preventDefault();

        $('#loading').modal({
            keyboard: false
        });

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "acts/acts.imagens.php?act=showupd&id=" + id,
            success: function(data)     
            {
                try {
                    $('#loading').modal('hide');

                    var retorno = JSON.parse(data.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));

                    if(retorno.succeed) {
                        $('.maintable').hide();
                        $('.mainform').show();

                        $('#btn-salvar-imagem').data('act', 'edit');
                        $('#btn-salvar-imagem').data('id', id);                        

                        //var d = new Date(retorno.dados.data * 1000);

                        $('#id').val(retorno.dados.id);
                        $('#title-img').val(retorno.dados.title_img);                                            
                        $('#categoria').val(retorno.dados.categoria);                       
                        $('#ativo').val(retorno.dados.ativo);  
                        //$('#anexo-img').val(retorno.dados.anexo_img); 
                        $('#anexo-img').prop("src", "img/bancoimagens/" + retorno.anexo_img); 
                        $('#description-img').val(retorno.dados.description_img);  
                        $('#tag-img').val(retorno.dados.tag_img);                    
                    }
                    else {
                        $('.mainform').hide();
                        $('.maintable').show();

                        $('#btn-salvar-imagem').data('id', null);
                        $('#btn-salvar-imagem').data('act', null);                     

                        $('#id').val('');
                        $('#title-img').val('');
                        $('#categoria').val(''); 
                        $('#ativo').val('');
                        $('#anexo-img').val('');
                        $('#description-img').val('');
                        $('#tag-img').val('');                                                        

                        $('#alert-title').html(retorno.title);
                        $('#alert-content').html(retorno.errno + " - " + retorno.erro);
                        $('#alert').modal('show');
                    }
                }
                catch (e) {                 
                    $('#loading').modal('hide');
                    $('#alert-title').html("Erro ao fazer parse do JSON!");
                    $('#alert-content').html(String(e.stack));
                    $('#alert').modal('show');
                };
            }
        });
    });

    $('.btn-del-imagem').click(function(e) {
        e.preventDefault();

        $('#loading').modal({
            keyboard: false
        });

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "acts/acts.imagens.php?act=del&id=" + id,
            success: function(data)
            {
                try {
                    $('#loading').modal('hide');

                    var retorno = JSON.parse(data.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));

                    if(retorno.succeed) {
                        $('#alert-title').html("Imagem removida com sucesso!");
                        $('#alert-content').html("A remoção da imagem foi efetuada com sucesso! Ao fechar esta mensagem a página será recarregada.");
                        $('#alert').modal('show');

                        $('#alert').on('hidden.bs.modal', function (e) {
                            window.location.reload();
                        });
                    }
                    else {
                        $('#alert-title').html(retorno.title);
                        $('#alert-content').html(retorno.errno + " - " + retorno.erro);
                        $('#alert').modal('show');
                    }
                }
                catch (e) {
                    $('#loading').modal('hide');
                    $('#alert-title').html("Erro ao fazer parse do JSON!");
                    $('#alert-content').html(String(e.stack));
                    $('#alert').modal('show');
                };
            }
        });
    });


    /* GERENCIAR PLANOS */

    $('#btn-add-plano').click(function(e) {
		e.preventDefault();

		$('.maintable').hide();
		$('.mainform').show();

		$('#btn-salvar-plano').data('id', null);
    	$('#btn-salvar-plano').data('act', 'add');    	

    	/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    	   		    		
    });

    $('#btn-voltar-plano').click(function(e) {
		e.preventDefault();

		$('.mainform').hide();
		$('.maintable').show();

    	$('#btn-salvar-plano').data('id', null);
    	//$('#headline-ger-categoria').html('');
		//$('.headline-form').html('');

		/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    });


    /* GERENCIAR RECADOS */

    $('#btn-add-recado').click(function(e) {
		e.preventDefault();

		$('.maintable').hide();
		$('.mainform').show();

		$('#btn-salvar-recado').data('id', null);
    	$('#btn-salvar-recado').data('act', 'add');    	

    	/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    	   		    		
    });

    $('#btn-voltar-recado').click(function(e) {
		e.preventDefault();

		$('.mainform').hide();
		$('.maintable').show();

    	$('#btn-salvar-recado').data('id', null);
    	//$('#headline-ger-categoria').html('');
		//$('.headline-form').html('');

		/*$('#id').val('');
    	$('#titulo').val('');
    	$('#descricao').val(''); 
    	$('#ativo').bootstrapToggle('off');*/
    });


});