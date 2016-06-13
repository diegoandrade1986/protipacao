/**
 * Created by diego on 05/04/16.
 */
$(function(){
    /* Inserir Tabela de preço */
    $("button[name='cadastrarTabela']").click(function(){
        var nomeTabela = $("#nomeTabela").val();
        var valor_1 = $("#4000").val();
        var valor_2 = $("#8000").val();
        var valor_3 = $("#12000").val();
        var valor_4 = $("#16000").val();
        var valor_5 = $("#19000").val();
        var valor_6 = $("#22000").val();
        var valor_7 = $("#30000").val();
        var valor_8 = $("#40000").val();
        var valor_9 = $("#50000").val();
        var valor_10 = $("#50001").val();
        if (nomeTabela.trim() != "" && valor_1.trim() != "" && valor_2.trim() != "" && valor_3.trim() != "" && valor_4.trim() != ""
            && valor_5.trim() != "" && valor_6.trim() != "" && valor_7.trim() != "" && valor_8.trim() != "" && valor_9.trim() != ""
            && valor_10.trim() != "") {
            $.ajax({
                type: 'POST',
                url: '/tabela/',
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                data: {
                    nome: nomeTabela,
                    valor_1: valor_1,
                    valor_2: valor_2,
                    valor_3: valor_3,
                    valor_4: valor_4,
                    valor_5: valor_5,
                    valor_6: valor_6,
                    valor_7: valor_7,
                    valor_8: valor_8,
                    valor_9: valor_9,
                    valor_10: valor_10
                },
                cache: false,
                success: function (result) {
                    if (result) {
                        if (result == "Inserido") {
                            alert("Tabela Cadastrada Com Sucesso");
                            location.href = "/cliente/";
                        } else {
                            alert("Erro ao Cadastrar Tabela");
                        }
                    } else {
                        alert("Erro ao Cadastrar");
                    }
                }
            });
        }else{
            alert("Preencha Todos os Campos");
        }
    });
});
