/**
 * Created by diego on 05/04/16.
 */
/*
https://viacep.com.br/
*/
$("input[name='cep']").change(function(){
    var cep = $('#cep').val().replace(/[^\d]+/g,'');
    $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

        if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.
            $("#logradouro").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#uf").val(dados.uf);
            //$("#ibge").val(dados.ibge);
            $("#complemento").focus();
        } //end if.
        else {
            //CEP pesquisado não foi encontrado.
            alert("CEP não encontrado.");
        }
    });
});