$(function() {
    $('submit').click(function(e){
        var nome = $("#nome").val();
        var email = $("#email").val();
        var username = $("#username").val();
        var senha = $("#senha").val();
        var nivel = $("#nivel").val();
        if (nome.trim() == "" || email.trim() == "" || username.trim() == "" || senha.trim() == "" || nivel.trim() == ""){
            alert("Preencha todos os campos");
            e.preventDefault();
        }
    });

    $('a[name=conf-exc]').click(function(e){
        e.preventDefault();
        if(confirm("Deseja mesmo deletar esse usuario ?")){
            var val_user_id = $(this).attr('href');
            $.ajax({
                type: 'POST',
                url: 'del_obj.php',
                // dataType json
                dataType : "json",
                data: {
                    acao: "usuario",
                    userid: val_user_id
                },
                cache: false,
                success: function (result) {
                    var success = result.success;
                    if (success) {
                        alert("Usuario Deletado com Sucesso");
                        location.href = "index.php?pg=12";
                    } else {
                        alert("Erro ao Deletar Usuario");
                    }
                }
            });
        }
    });
});
