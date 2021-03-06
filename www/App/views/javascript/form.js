"use strict"

function showError(fieldName, toggle, errorType = null, length = null) {
    if (toggle == "add") {
        $(`[for=${fieldName}]`).css("color", "red");
        $(`#${fieldName}`).css("border", "1px solid red");
        $(`#${fieldName}`).next("label[class=error]").remove();
        if (errorType == "empty") {
            $(`#${fieldName}`).after("<label class='error'>Preencha este campo!</label>");
        } else {
            $(`#${fieldName}`).after(`<label class='error'>Esse campo deve ter ${length} caracteres</label>`);
        }
    } else {
        $(`[for=${fieldName}]`).css("color", "black");
        $(`#${fieldName}`).css("border", "1px solid gray");
        $(`#${fieldName}`).next("label[class=error]").remove();
    }

}
$(document).ready(function () {
    //Masks
    $('#placa').mask('SSS0S00');
    $('#codigoRenavam').mask('00000000000');
    $('#anoModelo').mask('0000');
    $('#anoFabricacao').mask('9999');

    $('#placa').keyup(function () {
        var str = $('#placa').val().toUpperCase();
        $('#placa').val(str);
    });

    //Form validation
    $("#formVehicle").submit(function (event) {

        let descricao = $('#descricao').val().trim();
        let placa = $('#placa').val().trim();
        let codigoRenavam = $('#codigoRenavam').val().trim();
        let anoModelo = $('#anoModelo').val().trim();
        let anoFabricacao = $('#anoFabricacao').val().trim();
        let km = $('#km').val();
        let marca = $('#marca').val().trim();
        let cor = $('#cor').val().trim();
        let preco = $('#preco').val();
        let precoFipe = $('#precoFipe').val();
        let error;

        if (descricao == "") {
            showError("descricao", "add", "empty");
            error = true;
        } else {
            showError("descricao", "remove");
        }

        if (placa == "") {
            showError("placa", "add", "empty");
            error = true;
        } else if (placa.length != 7) {
            showError("placa", "add", "incomplete", 7);
            error = true;
        } else {
            showError("placa", "remove");
        }

        if (codigoRenavam == "") {
            showError("codigoRenavam", "add", "empty");
            error = true;
        } else if (codigoRenavam.length != 11) {
            showError("codigoRenavam", "add", "incomplete", 4);
            error = true;
        } else {
            showError("codigoRenavam", "remove");
        }

        if (anoModelo == "") {
            showError("anoModelo", "add", "empty");
            error = true;
        } else if (anoModelo.length != 4) {
            showError("anoModelo", "add", "incomplete", 4);
            error = true;
        } else {
            showError("anoModelo", "remove");
        }

        if (anoFabricacao == "") {
            showError("anoFabricacao", "add", "empty");
            error = true;
        } else if (anoFabricacao.length != 4) {
            showError("anoFabricacao", "add", "incomplete", 4);
            error = true;
        } else {
            showError("anoFabricacao", "remove");
        }

        if (km == "") {
            showError("km", "add", "empty");
            error = true;
        } else {
            showError("km", "remove");
        }

        if (marca == "") {
            showError("marca", "add", "empty");
            error = true;
        } else {
            showError("marca", "remove");
        }

        if (cor == "") {
            showError("cor", "add", "empty");
            error = true;
        } else {
            showError("cor", "remove");
        }

        if (preco == "") {
            showError("preco", "add", "empty");
            error = true;
        } else {
            showError("preco", "remove");
        }

        if (precoFipe == "") {
            showError("precoFipe", "add", "empty");
            error = true;
        } else {
            showError("precoFipe", "remove");
        }

        if (error) {
            return false
        } else {
            return true
        }
    })
})