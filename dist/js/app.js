$(function(){$("#btn-add-categoria").click(function(a){a.preventDefault(),$(".maintable").hide(),$(".mainform").show(),$("#btn-salvar-categoria").data("id",null),$("#btn-salvar-categoria").data("act","add"),$("#id").val(""),$("#title-cat").val(""),$("#description-cat").val(""),$("#ativo").val("")}),$("#btn-voltar-categoria").click(function(a){a.preventDefault(),$(".mainform").hide(),$(".maintable").show(),$("#btn-salvar-categoria").data("id",null),$("#id").val(""),$("#title-cat").val(""),$("#description-cat").val(""),$("#ativo").val("")}),$("#form-gerenciamento-categorias").submit(function(a){a.preventDefault(),$("#loading-modal").modal({keyboard:!1});var t=$("#btn-salvar-categoria").data("id"),e=$("#btn-salvar-categoria").data("act");if("edit"==e)var l="acts/acts.categoria.php?act="+e+"&id="+t;else l="acts/acts.categoria.php?act="+e;var i=new FormData;i.append("id",$("#id").val()),i.append("title-cat",$("#title-cat").val()),i.append("description-cat",$("#description-cat").val()),i.append("ativo",$("#ativo").val()),$.ajax({type:"POST",url:l,data:i,processData:!1,contentType:!1,success:function(a){try{console.log(a),$("#loading-modal").modal("hide");var t=JSON.parse(a.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));t.succeed?($("#id").val(""),$("#title-cat").val(""),$("#description-cat").val(""),$("#ativo").val(""),$("#alert-title").html("Dados registrado com sucesso!"),$("#alert-content").html("Dados da categoria registrados com sucesso! Ao fechar esta mensagem a página será recarregada."),$("#alert").modal("show"),$("#alert").on("hidden.bs.modal",function(a){window.location.reload()})):($("#alert-title").html(t.title),$("#alert-content").html(t.errno+" - "+t.erro),$("#alert").modal("show"),$("#id").val(""),$("#title-cat").val(""),$("#description-cat").val(""),$("#ativo").val(""))}catch(a){$("#loading-modal").modal("hide"),$("#alert-title").html("Erro ao fazer parse do JSON!"),$("#alert-content").html(String(a.stack)),$("#alert").modal("show"),$("#id").val(""),$("#title-cat").val(""),$("#description-cat").val(""),$("#ativo").val("")}}})}),$(".btn-edit-categoria").click(function(a){a.preventDefault(),$("#loading").modal({keyboard:!1});var e=$(this).data("id");$.ajax({type:"POST",url:"acts/acts.categoria.php?act=showupd&id="+e,success:function(a){try{$("#loading").modal("hide");var t=JSON.parse(a.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));t.succeed?($(".maintable").hide(),$(".mainform").show(),$("#btn-salvar-categoria").data("act","edit"),$("#btn-salvar-categoria").data("id",e),$("#id").val(t.dados.id),$("#title-cat").val(t.dados.title_cat),$("#description-cat").val(t.dados.description_cat),$("#ativo").val(t.dados.ativo)):($(".mainform").hide(),$(".maintable").show(),$("#btn-salvar-categoria").data("id",null),$("#btn-salvar-categoria").data("act",null),$("#id").val(""),$("#title-cat").val(""),$("#description-cat").val(""),$("#ativo").val(""),$("#alert-title").html(t.title),$("#alert-content").html(t.errno+" - "+t.erro),$("#alert").modal("show"))}catch(a){$("#loading").modal("hide"),$("#alert-title").html("Erro ao fazer parse do JSON!"),$("#alert-content").html(String(a.stack)),$("#alert").modal("show")}}})}),$(".btn-del-categoria").click(function(a){a.preventDefault(),$("#loading").modal({keyboard:!1});var t=$(this).data("id");$.ajax({type:"POST",url:"acts/acts.categoria.php?act=del&id="+t,success:function(a){try{$("#loading").modal("hide");var t=JSON.parse(a.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));t.succeed?($("#alert-title").html("Categoria removida com sucesso!"),$("#alert-content").html("A remoção da categoria foi efetuada com sucesso! Ao fechar esta mensagem a página será recarregada."),$("#alert").modal("show"),$("#alert").on("hidden.bs.modal",function(a){window.location.reload()})):($("#alert-title").html(t.title),$("#alert-content").html(t.errno+" - "+t.erro),$("#alert").modal("show"))}catch(a){$("#loading").modal("hide"),$("#alert-title").html("Erro ao fazer parse do JSON!"),$("#alert-content").html(String(a.stack)),$("#alert").modal("show")}}})}),$("#btn-add-usuario").click(function(a){a.preventDefault(),$(".maintable").hide(),$(".mainform").show(),$("#btn-salvar-usuario").data("id",null),$("#btn-salvar-usuario").data("act","add")}),$("#btn-voltar-usuario").click(function(a){a.preventDefault(),$(".mainform").hide(),$(".maintable").show(),$("#btn-salvar-usuario").data("id",null)}),$("#btn-add-imagem").click(function(a){a.preventDefault(),$(".maintable").hide(),$(".mainform").show(),$("#btn-salvar-imagem").data("id",null),$("#btn-salvar-imagem").data("act","add"),$("#id").val(""),$("#title-img").val(""),$("#categoria").val(""),$("#ativo").val(""),$("#anexo-img").val(""),$("#description-img").val(""),$("#tag-img").val("")}),$("#btn-voltar-imagem").click(function(a){a.preventDefault(),$(".mainform").hide(),$(".maintable").show(),$("#btn-salvar-imagem").data("id",null),$("#id").val(""),$("#title-img").val(""),$("#categoria").val(""),$("#ativo").val(""),$("#anexo-img").val(""),$("#description-img").val(""),$("#tag-img").val("")}),$("#form-gerenciamento-imagens").submit(function(a){a.preventDefault(),$("#loading-modal").modal({keyboard:!1});var t=$("#btn-salvar-imagem").data("id"),e=$("#btn-salvar-imagem").data("act");if("edit"==e)var l="acts/acts.imagens.php?act="+e+"&id="+t;else l="acts/acts.imagens.php?act="+e;var i=new FormData;i.append("id",$("#id").val()),i.append("title-img",$("#title-img").val()),i.append("categoria",$("#categoria").val()),i.append("ativo",$("#ativo").val()),i.append("anexo-img",$("#anexo-img").val()),i.append("description-img",$("#description-img").val()),i.append("tag-img",$("#tag-img").val()),$.ajax({type:"POST",url:l,data:i,processData:!1,contentType:!1,success:function(a){try{console.log(a),$("#loading-modal").modal("hide");var t=JSON.parse(a.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));t.succeed?($("#id").val(""),$("#title-img").val(""),$("#categoria").val(""),$("#ativo").val(""),$("#anexo-img").val(""),$("#description-img").val(""),$("#tag-img").val(""),$("#alert-title").html("Dados registrado com sucesso!"),$("#alert-content").html("Dados da imagem registrados com sucesso! Ao fechar esta mensagem a página será recarregada."),$("#alert").modal("show"),$("#alert").on("hidden.bs.modal",function(a){window.location.reload()})):($("#alert-title").html(t.title),$("#alert-content").html(t.errno+" - "+t.erro),$("#alert").modal("show"),$("#id").val(""),$("#title-img").val(""),$("#categoria").val(""),$("#ativo").val(""),$("#anexo-img").val(""),$("#description-img").val(""),$("#tag-img").val(""))}catch(a){$("#loading-modal").modal("hide"),$("#alert-title").html("Erro ao fazer parse do JSON!"),$("#alert-content").html(String(a.stack)),$("#alert").modal("show"),$("#id").val(""),$("#title-img").val(""),$("#categoria").val(""),$("#ativo").val(""),$("#anexo-img").val(""),$("#description-img").val(""),$("#tag-img").val("")}}})}),$(".btn-edit-imagem").click(function(a){a.preventDefault(),$("#loading").modal({keyboard:!1});var e=$(this).data("id");$.ajax({type:"POST",url:"acts/acts.imagens.php?act=showupd&id="+e,success:function(a){try{$("#loading").modal("hide");var t=JSON.parse(a.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));t.succeed?($(".maintable").hide(),$(".mainform").show(),$("#btn-salvar-imagem").data("act","edit"),$("#btn-salvar-imagem").data("id",e),$("#id").val(t.dados.id),$("#title-img").val(t.dados.title_img),$("#categoria").val(t.dados.categoria),$("#ativo").val(t.dados.ativo),$("#anexo-img").prop("src","img/bancoimagens/"+t.anexo_img),$("#description-img").val(t.dados.description_img),$("#tag-img").val(t.dados.tag_img)):($(".mainform").hide(),$(".maintable").show(),$("#btn-salvar-imagem").data("id",null),$("#btn-salvar-imagem").data("act",null),$("#id").val(""),$("#title-img").val(""),$("#categoria").val(""),$("#ativo").val(""),$("#anexo-img").val(""),$("#description-img").val(""),$("#tag-img").val(""),$("#alert-title").html(t.title),$("#alert-content").html(t.errno+" - "+t.erro),$("#alert").modal("show"))}catch(a){$("#loading").modal("hide"),$("#alert-title").html("Erro ao fazer parse do JSON!"),$("#alert-content").html(String(a.stack)),$("#alert").modal("show")}}})}),$(".btn-del-imagem").click(function(a){a.preventDefault(),$("#loading").modal({keyboard:!1});var t=$(this).data("id");$.ajax({type:"POST",url:"acts/acts.imagens.php?act=del&id="+t,success:function(a){try{$("#loading").modal("hide");var t=JSON.parse(a.replace(/(\r\n|\n|\r)/gm," ").replace(/\s+/g," "));t.succeed?($("#alert-title").html("Imagem removida com sucesso!"),$("#alert-content").html("A remoção da imagem foi efetuada com sucesso! Ao fechar esta mensagem a página será recarregada."),$("#alert").modal("show"),$("#alert").on("hidden.bs.modal",function(a){window.location.reload()})):($("#alert-title").html(t.title),$("#alert-content").html(t.errno+" - "+t.erro),$("#alert").modal("show"))}catch(a){$("#loading").modal("hide"),$("#alert-title").html("Erro ao fazer parse do JSON!"),$("#alert-content").html(String(a.stack)),$("#alert").modal("show")}}})}),$("#btn-add-plano").click(function(a){a.preventDefault(),$(".maintable").hide(),$(".mainform").show(),$("#btn-salvar-plano").data("id",null),$("#btn-salvar-plano").data("act","add")}),$("#btn-voltar-plano").click(function(a){a.preventDefault(),$(".mainform").hide(),$(".maintable").show(),$("#btn-salvar-plano").data("id",null)}),$("#btn-add-recado").click(function(a){a.preventDefault(),$(".maintable").hide(),$(".mainform").show(),$("#btn-salvar-recado").data("id",null),$("#btn-salvar-recado").data("act","add")}),$("#btn-voltar-recado").click(function(a){a.preventDefault(),$(".mainform").hide(),$(".maintable").show(),$("#btn-salvar-recado").data("id",null)})});tion-img').val('');
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