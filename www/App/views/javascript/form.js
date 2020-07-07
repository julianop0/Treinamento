"use strict"
$(document).ready(function() {
    //Masks
    $('#placa').mask('SSS0S00');
    $('#codigoRenavam').mask('00000000000');
    $('#anoModelo').mask('0000');
    $('#anoFabricacao').mask('9999');

    $('#placa').keyup(function() {
        var str = $('#placa').val().toUpperCase();
        $('#placa').val(str);
    });


    //Form validation
    $("#formVehicle").submit(function(event) {

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
        let errorempty;
        let errorlength;

        if(descricao == "") {
            showError("#descricao");
            errorempty = true;
            error = true;
        }
        
        if(placa == "") {
            showError("#placa");
            errorempty = true;
            error = true;
        };
        
        if(codigoRenavam == "") {
            showError("#codigoRenavam");
            errorempty = true;
            error = true;
        };
        
        if(anoModelo == "") {
            showError("#anoModelo");
            errorempty = true;
            error = true;
        };
        
        if(anoFabricacao == "") {
            showError("#anoFabricacao");
            errorempty = true;
            error = true;
        };
        
        if(km == "") {
            showError("#km");
            errorempty = true;
            error = true;
        };
        
        if(marca == "") {
            showError("#marca");
            errorempty = true;
            error = true;
        };
        
        if(cor == "") {
            showError("#cor");
            errorempty = true;
            error = true;
        };
        
        if(preco == "") {
            showError("#preco");
            errorempty = true;
            error = true;
        };
        
        if(precoFipe == "") {
            showError("#precoFipe");
            errorempty = true;
            error = true; 
        };

        if(placa.length < 7) {
            showError("#placa");
            errorlength = true;
            error = true;
        }

        if(anoModelo < 4) {
            showError("#anoModelo");
            errorlength = true;
            error = true;
        }

        if(anoFabricacao < 4) {
            showError("#anoFabricacao");
            errorlength = true;
            error = true;
        }

        msg1 = "";
        msg2 = "";

        if(errorempty) {
            msg1 = "<p>Alguns campos obrigatórios não estão preenchidos</p>";
        }
        if(errorlength) {
            msg2 = "<p>Alguns campos estão incompletos</p>";
        }
        htmlerror = msg1 + msg2;

        if(error) {
            swal.fire({
                title: "Erro",
                type : "warning",
                html: htmlerror
	  	    })
            return false
        } else {
            return true
        }
    })
})

function showError(fieldName) {
    $(fieldName).prev("label").addClass("error");
	setTimeout(function(){
		$(fieldName).prev("label").removeClass("error");
    }, 5000);
}