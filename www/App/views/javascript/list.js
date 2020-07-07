"use strict"
$(document).ready(function () {
    listar();
    $("#searchSubmit").click(function () {
        listar();
    })
})

function listar(pagina = 1) {

    var busca = $("#listSearch").val();

    let url = `/listar/ajaxCall/${busca}|${pagina}`;

    $.ajax({

        type: "GET",
        url: url,
        beforeSend: function () {
            $('body').addClass('ajax-load');
        },
        success: function (res) {
            let data = JSON.parse(res);

            let htmlTabela = "";
            let htmlPaginacao = "";

            let veiculos = data.veiculos;
            let paginaAtual = parseInt(data.paginaAtual);
            let totalPaginas = parseInt(data.totalPaginas);



            if (veiculos.length !== 0) {
                $.each(veiculos, function (key, value) {
                    htmlTabela += '<tr>';
                    htmlTabela += `<th scope="row">${value.id}</th>`;
                    htmlTabela += `<td>${value.descricao}</td>`;
                    htmlTabela += `<td>${value.placa}</td>`;
                    htmlTabela += `<td>${value.marca}</td>`;
                    htmlTabela += `<td class="justify-content align-middle"><a href=editar/${value.id}>`;
                    htmlTabela += '<i class="fa fa-pencil-square-o "></i></a></td>';
                    htmlTabela += `<td class="justify-content align-middle"><input class="form-check-input" type="checkbox" name="registros[]" value = "${value.id}"></td>`;
                    htmlTabela += '</tr>';
                });

                htmlPaginacao += '<ul class="pagination">';
                if (paginaAtual > 1) {
                    htmlPaginacao += `<li class='page-item'><button onClick='listar(${paginaAtual - 1})' class='page-link'><i class = "fa fa-arrow-left"></i> anterior</button></li>`;
                }
                for (let i = 1; i < totalPaginas + 1; i++) {
                    let active = (i == paginaAtual) ? 'active' : '';
                    htmlPaginacao += `<li class='page-item ${active}'><button onClick='listar(${i})' class='page-link'>${i}</a></li>`;
                }
                if (paginaAtual < totalPaginas) {
                    htmlPaginacao += `<li class='page-item'><button onClick='listar(${paginaAtual + 1})' class='page-link'>proximo <i class = "fa fa-arrow-right"></i> </button></li>`;
                }
                htmlPaginacao += '</ul>';

                $("#pagination").children().remove();
                $("#tableList").children().remove();
                $("tbody").append(htmlTabela);
                $("#pagination").append(htmlPaginacao);
            } else {
                $("#pagination").children().remove();
                $("#tableList").children().remove();
                $("tbody").append("<p>Nenhum veículo encontrado!</p>");
            }

        },
        complete: function () {
            $('body').removeClass('ajax-load');
        },
    })
}