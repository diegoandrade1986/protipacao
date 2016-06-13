$(function() {
    $('a[name=not-exc]').click(function(e){
        e.preventDefault();
        if(confirm("Deseja mesmo deletar esse registro ?")){
            var noticia = $(this).attr('href');
            $.ajax({
                type: 'POST',
                url: 'del_obj.php',
                // dataType json
                dataType : "json",
                data: {
                    del: "ntc",
                    noticia: noticia
                },
                cache: false,
                success: function (result) {
                    var success = result.success;
                    if (success) {
                        alert("Deletado com Sucesso");
                        location.href = "index.php?pg=" + $("#pg").val();
                    } else {
                        alert("Erro ao Deletar");
                    }
                }
            });
        }
    });
});
