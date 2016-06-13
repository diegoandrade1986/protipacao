/**
 * Created by diego on 05/04/16.
 */

$(function(){
    /* Buscando Dados Do Cliente */
    $("input[type='button']").click(function(){
        var indice = $(this).siblings(".id").val();
        if($(this).val() === "Visualizar") {
            $.getJSON('/cliente/visualizacliente/modal/'+indice, function(result) {
                if (result.success){
                    var html = "<p><b>Nome: </b>" + result.dados.nome + "</p>";
                    html += "<p><b>Razao Social: </b>" + result.dados.rsocial + "</p>";
                    html += "<p><b>CNPJ: </b>" + result.dados.cnpj + "</p>";
                    html += "<p><b>Responsavel: </b>" + result.dados.nomeresponsavel;
                    html += "<b>  -  Responsavel Financeiro: </b>" + result.dados.responsavelfinanceiro + "</p>";
                    html += "<p><b>Endereco: </b>" + result.dados.endereco + " -  <b>Bairro: </b>" + result.dados.bairro + "</p>";
                    html += "<p><b>Cidade: </b>" + result.dados.cidade + " -  <b> Complemento: </b>" + result.dados.complemento + "</p>";
                    html += "<p><b>Estado: </b>" + result.dados.uf + " -  <b>CEP: </b>" + result.dados.cep + "</p>";
                    var ativo = "SIM";
                    if (result.dados.ativo == 0) ativo = "NÃO";
                    html += "<p><b>Ativo:</b>" + ativo + " -  <b>Programa:</b>" + result.dados.programanome + "</p>";
                    html += "<p><b>Tabela de Preço Inicial:</b>" + result.dados.tabela_inicial + "</p>";
                    html += "<p><table class='table table-striped table-bordered'><tr>" +
                        "<td><b>Até 4000:</b> R$ " + number_format(result.dados.valor_1, 2, ',', '.') + "</td>" +
                        "<td><b>4001 À 8000:</b> R$ " + number_format(result.dados.valor_2, 2, ',', '.') + "</td>" +
                        "<td><b>8001 À 12000:</b> R$ " + number_format(result.dados.valor_3, 2, ',', '.') + "</td>" +
                        "</tr><tr>" +
                        "<td><b>12001 À 16000:</b> R$ " + number_format(result.dados.valor_4, 2, ',', '.') + "</td>" +
                        "<td><b>16001 À 19000:</b> R$ " + number_format(result.dados.valor_5, 2, ',', '.') + "</td>" +
                        "<td><b>19001 À 22000:</b> R$ " + number_format(result.dados.valor_6, 2, ',', '.') + "</td>" +
                        "</tr><tr>" +
                        "<td><b>22001 À 30000:</b> R$ " + number_format(result.dados.valor_7, 2, ',', '.') + "</td>" +
                        "<td><b>30001 À 40000:</b> R$ " + number_format(result.dados.valor_8, 2, ',', '.') + "</td>" +
                        "<td><b>40001 À 50000:</b> R$ " + number_format(result.dados.valor_9, 2, ',', '.') + "</td>" +
                        "</tr><tr>" +
                        "<td><b>50001 +:</b> R$ " + number_format(result.dados.valor_10, 2, ',', '.') + "</td>" +
                        "</tr></table></p>";

                    $("#dadosCliente").html(html);
                    $('#myModal').modal('show');
                }else{
                    alert ("Erro ao listar Cliente");
                }
            });

           /* $.ajax({
                type: 'GET',
                url: '/cliente/visualizacliente/modal/'+indice,
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                cache: false,
                success: function (result) {
                    if (result) {
                        $("#dadosCliente").html(result);
                        $('#myModal').modal('show');
                    } else {
                        alert("Falta de Comunicação com o webservice");

                    }
                }
            });*/
        }
        if($(this).val() === "Alterar") {
            $.getJSON('/cliente/alteracliente/modal/'+indice, function(resultCliente) {
                //alert(Boolean(resultCliente.valor.success));
                if (resultCliente.cliente.success == 'true') {
                    $(".valAlteracao").css({visibility:"visible",position:"relative"});
                    $("#cliente").val(resultCliente.cliente.dados.clienteid);
                    $("#nome").val(resultCliente.cliente.dados.nome);
                    $("#rsocial").val(resultCliente.cliente.dados.rsocial);
                    $("#cnpj").val(resultCliente.cliente.dados.cnpj);
                    $("#nomeresponsavel").val(resultCliente.cliente.dados.nomeresponsavel);
                    $("#responsavelfinanceiro").val(resultCliente.cliente.dados.responsavelfinanceiro);
                    $("#logradouro").val(resultCliente.cliente.dados.endereco);
                    $("#bairro").val(resultCliente.cliente.dados.bairro);
                    $("#cidade").val(resultCliente.cliente.dados.cidade);
                    $("#uf").val(resultCliente.cliente.dados.uf);
                    $("#complemento").val(resultCliente.cliente.dados.complemento);
                    $("#cep").val(resultCliente.cliente.dados.cep);
                    $("#dtinicio").val(resultCliente.cliente.dados.dtinicio);
                    $("#sigla").val(resultCliente.cliente.dados.sigla);
                    var programa = resultCliente.cliente.dados.programaid;
                    $.getJSON('/programa/search/modal/all/'+programa, function(resultPrograma) {
                        if (!("Erro" in resultPrograma)) {
                            $("#selectPro").html(resultPrograma.dados);
                        }
                    });
                    if (resultCliente.valor.success == 'true'){
                        $("#alt4000").val(resultCliente.valor.dados.valor_1);
                        $("#alt8000").val(resultCliente.valor.dados.valor_2);
                        $("#alt12000").val(resultCliente.valor.dados.valor_3);
                        $("#alt16000").val(resultCliente.valor.dados.valor_4);
                        $("#alt19000").val(resultCliente.valor.dados.valor_5);
                        $("#alt22000").val(resultCliente.valor.dados.valor_6);
                        $("#alt30000").val(resultCliente.valor.dados.valor_7);
                        $("#alt40000").val(resultCliente.valor.dados.valor_8);
                        $("#alt50000").val(resultCliente.valor.dados.valor_9);
                        $("#alt50001").val(resultCliente.valor.dados.valor_10);
                    }else{
                        $("#alt4000").val();
                        $("#alt8000").val();
                        $("#alt12000").val();
                        $("#alt16000").val();
                        $("#alt19000").val();
                        $("#alt22000").val();
                        $("#alt30000").val();
                        $("#alt40000").val();
                        $("#alt50000").val();
                        $("#alt50001").val();

                    }
                    $("button[name='alterarCliente']").css({visibility:"visible",position:"relative"});
                    $("button[name='cadastrarCliente']").css({visibility:"hidden",position:"absolute"});
                    $("#selectTab").css({visibility:"hidden",position:"absolute"});
                    $("label[for='selectTab']").css({visibility:"hidden",position:"absolute"});
                    $("#modal-title").text("Alterar Cliente");
                    $('#AddCliente').modal('show');
                }else{
                    alert("Erro ao Buscar Dados para alterar Cliente");
                }

            });

            /*$.ajax({
                type: 'GET',
                url: '/cliente/alteracliente/modal/'+indice,
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                cache: false,
                success: function (result) {
                    if (result) {
                        $("#nome").val(result.nome);
                        $("#rsocial").val(result.rsocial);
                        $("#cnpj").val(result.cnpj);
                        $("#nomeresponsavel").val(result.nomeresponsavel);
                        $("#responsavelfinanceiro").val(result.responsavelfinanceiro);
                        $("#endereco").val(result.endereco);
                        $("#cidade").val(result.cidade);
                        $("#uf").val(result.uf);
                        $("#cep").val(result.cep);
                        $("#sigla").val(result.sigla);
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                var endereco = dados.logradouro + " - Bairro: "+dados.bairro;
                                $("#endereco").val(endereco);
                                //$("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                //$("#ibge").val(dados.ibge);
                                $("#sigla").focus();
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                alert("CEP não encontrado.");
                            }
                        });
                        $("#selectPro").val();
                        $("#selectTab").val();

                        alert(result.nome);
                        /!*$("#dadosCliente").html(result);
                        $('#myModal').modal('show');*!/
                    } else {
                        alert("Erro ao Buscar Dados");

                    }
                }
            });*/
        }
    });
    /* FIM Buscando Dados Do Cliente */

    /* Lista programas*/
    $("button[name='AddCliente']").click(function(){
        $.ajax({
            type: 'GET',
            url: '/programa/search/modal',
            contentType: "application/x-www-form-urlencoded;charset=UTF-8",
            cache: false,
            success: function (result) {
                if (result) {
                    $("#selectPro").html(result);
                } else {
                    alert("Falta de Comunicação com o webservice");

                }
            }
        });
        /* Lista Tabelas*/
        $.ajax({
            type: 'GET',
            url: '/tabela/search/modal',
            contentType: "application/x-www-form-urlencoded;charset=UTF-8",
            cache: false,
            success: function (result) {
                if (result) {
                    $("#selectTab").html(result);
                } else {
                    alert("Falta de Comunicação com o webservice");

                }
            }
        });
        $("#nome").val("");
        $("#rsocial").val("");
        $("#cnpj").val("");
        $("#nomeresponsavel").val("");
        $("#responsavelfinanceiro").val("");
        $("#endereco").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#cep").val("");
        $("#sigla").val("");
        $("#modal-title").text("Cadastrar Novo Cliente");
        $(".valAlteracao").css({visibility:"hidden",position:"absolute"});
        $("label[for='selectTab']").css({visibility:"visible",position:"relative"});
        $("#selectTab").css({visibility:"visible",position:"relative"});
        $("button[name='alterarCliente']").css({visibility:"hidden",position:"absolute"});
        $("button[name='cadastrarCliente']").css({visibility:"visible",position:"relative"});
        //$("#cadCliente").html('');
    });
    /* FIM Lista programas e Tabelas*/

    /* Inserir Cliente */
    $("button[name='cadastrarCliente']").click(function(){
        var cnpj = $("#cnpj").val();
        if (!validarCNPJ(cnpj)){
            alert("CNPJ invalido");
            return;
        }
        var nome = $("#nome").val();
        var rsocial = $("#rsocial").val();
        var nomeresponsavel = $("#nomeresponsavel").val();
        var responsavelfinanceiro = $("#responsavelfinanceiro").val();
        var endereco = $("#logradouro").val();
        var bairro = $("#bairro").val();
        var cidade = $("#cidade").val();
        var uf = $("#uf").val();
        var cep = $("#cep").val();
        var complemento = $("#complemento").val();
        var sigla = $("#sigla").val();
        var dtInicio = $("#dtinicio").val();
        var programa = $("#selectPro").val();
        var tabela = $("#selectTab").val();
        if (nome.trim() != "" && rsocial.trim() != "" && tabela.trim() != "" && cnpj.trim() != "" && programa.trim() != "") {
            $.ajax({
                type: 'POST',
                url: '/cliente/',
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                data: {
                    nome: nome,
                    rsocial: rsocial,
                    tabela: tabela,
                    cnpj: cnpj,
                    nomeresponsavel: nomeresponsavel,
                    responsavelfinanceiro: responsavelfinanceiro,
                    endereco: endereco,
                    bairro: bairro,
                    cidade: cidade,
                    uf: uf,
                    cep: cep,
                    complemento: complemento,
                    sigla: sigla,
                    dtInicio: dtInicio,
                    programa: programa
                },
                cache: false,
                success: function (result) {
                    if (result) {
                        if (result.success) {
                            alert("Cliente Cadastrado Com Sucesso");
                            location.href = "/cliente/";
                        } else {
                            alert("Erro ao Cadastrar Cliente");
                        }
                    } else {
                        alert("Erro ao Cadastrar");
                    }
                }
            });
        }else{
            alert("Preencha Todos os campos obrigatorios!");
        }

    });
    $("button[name='alterarCliente']").click(function(){
        var cnpj = $("#cnpj").val();
        if (!validarCNPJ(cnpj)){
            alert("CNPJ invalido");
            return;
        }
        var nome = $("#nome").val();
        var rsocial = $("#rsocial").val();
        var nomeresponsavel = $("#nomeresponsavel").val();
        var responsavelfinanceiro = $("#responsavelfinanceiro").val();
        var endereco = $("#endereco").val();
        var cidade = $("#cidade").val();
        var uf = $("#uf").val();
        var cep = $("#cep").val();
        var sigla = $("#sigla").val();
        var programa = $("#selectPro").val();
        var cliente = $("#cliente").val();

        var tabela = $("#selectTab").val();
        if (nome.trim() != "" && rsocial.trim() != "" && tabela.trim() != "" && cnpj.trim() != "" && programa.trim() != "" && cliente.trim() != "") {
            $.ajax({
                type: 'PUT',
                url: '/cliente/'+cliente,
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                data: {
                    nome: nome,
                    rsocial: rsocial,
                    tabela: tabela,
                    cnpj: cnpj,
                    nomeresponsavel: nomeresponsavel,
                    responsavelfinanceiro: responsavelfinanceiro,
                    endereco: endereco,
                    cidade: cidade,
                    uf: uf,
                    cep: cep,
                    sigla: sigla,
                    programa: programa
                },
                cache: false,
                success: function (result) {
                    if (result) {
                        alert(result);
                        if (result == "Inserido") {
                            alert("Cliente Alterado Com Sucesso");
                            location.href = "/cliente/";
                        } else {
                            alert("Erro ao Alterar Cliente");
                        }
                    } else {
                        alert("Erro ao Alterar");
                    }
                }
            });
        }else{
            alert("Preencha Todos os campos obrigatorios!");
        }
    });

    /* Mascaras */
    $("input[name=dtinicio]").mask("99/9999");
    $("input[name=cnpj]").mask("99.999.999/9999-99");
    $("input[name=cep]").mask("99999-999");

});
