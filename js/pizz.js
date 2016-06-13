$(function(){
    /* PEGANDO LINK ATIVO*/
    var linkAtivo = $("#link-ativo").val();
    if (linkAtivo === "pizza") $("#li-pizza").addClass("active");
    if (linkAtivo === "categoria") $("#li-categoria").addClass("active");
    if (linkAtivo === "administrador") $("#li-administrador").addClass("active");
    if (linkAtivo === "cliente") $("#li-cliente").addClass("active");
    if (linkAtivo === "clienteValido") $("#li-cliente").addClass("active");
    if (linkAtivo === "metas") $("#li-metas").addClass("active");
    if (linkAtivo === "foto") $("#li-foto").addClass("active");
     /*VALIDACAO CADASTRO CATEGORIA */
    $( "#_form_cadastro_categoria" ).submit(function( event ) {
        if($.trim($("#categoria").val()) === "")
        {
            alert("Preencha o campo categoria");
            $("#categoria").val("");
            $("#categoria").focus();
            event.preventDefault();
        }
    });
    /*VALIDACAO CADASTRO ADMINISTRADOR */
    $( "#_form_cadastro_administrador" ).submit(function( event ) {
        if($.trim($("#nome").val()) === "")
        {
            alert("Preencha o campo nome");
            $("#nome").val("");
            $("#nome").focus();
            event.preventDefault();
        }
        if($.trim($("#login").val()) === "")
        {
            alert("Preencha o campo login");
            $("#login").val("");
            $("#login").focus();
            event.preventDefault();
        }
        if($.trim($("#senha").val()) === "")
        {
            alert("Preencha o campo senha");
            $("#senha").val("");
            $("#senha").focus();
            event.preventDefault();
        }
    });
    /*COLOCANDO O EDITOR*/
    $(".textarea-editor").wysihtml5();

    /*MASCARAS CAMPOS*/
    $("input[name=cep]").mask("99999-999");
    $("input[name=telefone]").mask("(99)9999-9999");
    $("input[name=celular]").mask("(99)99999-9999");

    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });


});





