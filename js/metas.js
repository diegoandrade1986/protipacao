$(function() {
    $("input[type=radio][name=tipo]").click(function() {
        $("#carregando").html("<h4>Carregando ...</h4>");
        var escolhido = $(this).val();
        $.ajax({
            type:"POST",
            data:"escolhido=" + escolhido,
            url:"cadastrar/cadastrar_jquery/metas.php",
            success:function(resposta)
            {
                if (resposta === "validou"){
                    var valor = "<section class='content'>";
                    valor = valor + "<div class='row'><div class='box'><div class='box-header'>";
                    valor = valor + "<h3 class='box-title'>Digite o texto <small>da meta tag abaixo</small></h3>";
                    valor = valor + "</div><div class='box-body pad'>";
                    valor = valor + "<textarea class='textarea-editor' id='textarea-editor' name='textarea-editor' ";
                    valor = valor + "placeholder='Coloque o texto aqui' ";
                    valor = valor + "style='width: 100%; height: 200px; font-size: 14px;line-height: 18px; border: 1px solid #dddddd; padding: 10px;'>";
                    valor = valor + "</textarea>";
                    valor = valor + "</div>";
                    valor = valor + "</div>";
                    valor = valor + "</div>";
                    valor = valor + "</section>";
                    $("#resposta").html(valor);
                    /* PARA A AREA DE TEXTO EDITOR */
                    $(".textarea-editor").wysihtml5();
                    $("#form-editor").submit(function() {
                        var html = $('#textarea-editor').val();
                         $("#html-editor").val(html);
                    });
                    $("#btncadastrar").css({
                        visibility:"visible"
                     });
                    $("#carregando").html("");
                }
                else
                {
                    $("#carregando").html("");
                    $("#resposta").html(resposta);
                    $("#btncadastrar").css({
                        visibility:"hidden"
                     });
                }
            }
        });
    });
    $("input[type=radio][name=tipo_alterar]").click(function() {
        var escolhido = $(this).val();
        if (escolhido == 1){
            $("#form_alt_desc").css({
                visibility:"visible"
            });
            $("#form_alt_key").css({
                visibility:"hidden"
            });
        }
        if (escolhido == 2){
            $("#form_alt_key").css({
                visibility:"visible"
            });
            $("#form_alt_desc").css({
                visibility:"hidden"
            });
        }
    });

});