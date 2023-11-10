var all = document.getElementById("all");
var modal = document.getElementById("modal");
var closeElements = document.querySelectorAll(
  ".modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button"
);
var tabela = document.getElementById("tabela");
var contador;

closeElements.forEach((elemento) => {
  elemento.addEventListener("click", () => {
    modal.classList.remove("is-active");
  });
});

function consultar(tipoConsulta) {
  switch (tipoConsulta) {
    case 1:
      var idTransacao_valor = document.getElementById("idTransacao").value;

      let formData = new FormData();
      formData.append("idTransacao", idTransacao_valor);
      formData.append("tipoConsulta", tipoConsulta);

      var init = {
        method: "POST",
        body: formData,
      };

      requisicaoConsulta(init);
      break;
    case 2:
      var idRemetente_valor = document.getElementById("idRemetente").value;

      let formData2 = new FormData();
      formData2.append("idRemetente", idRemetente_valor);
      formData2.append("tipoConsulta", tipoConsulta);

      var init2 = {
        method: "POST",
        body: formData2,
      };

      requisicaoConsulta(init2);
      break;
    case 3:
      var idDestinatario_valor =
        document.getElementById("idDestinatario").value;

      let formData3 = new FormData();
      formData3.append("idDestinatario", idDestinatario_valor);
      formData3.append("tipoConsulta", tipoConsulta);

      var init3 = {
        method: "POST",
        body: formData3,
      };

      requisicaoConsulta(init3);
      break;
    case 4:
      var valorTransacao_valor =
        document.getElementById("valorTransacao").value;
      var operadorValor_valor = document.getElementById("operadorValor").value;

      let formData4 = new FormData();
      formData4.append("idDestinatario", idDestinatario_valor);
      formData4.append("operador", operadorValor_valor);
      formData4.append("tipoConsulta", tipoConsulta);

      var init3 = {
        method: "POST",
        body: formData4,
      };

      requisicaoConsulta(init3);
      break;
  }

  function requisicaoConsulta(init) {
    fetch("consultar/consultar", init).then((response) =>
      response.json().then((data) => {
        if (data.message.length > 0) {
          var arrayTransacoes = data.message;
          tabela.innerHTML = "";
          arrayTransacoes.forEach((elemento) => {
            tabela.innerHTML += `<tr>
            <td>${elemento.tra_id}</td>
            <td>${elemento.tra_contaRemetente}</td>
            <td>${elemento.tra_contaDestinataria}</td>
            <td>${elemento.tra_valor}</td>
            </tr>`;
          });
          modal.classList.add("is-active");
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Não foi possível consultar essa conta. <strong> Adicione <a href='/bancorm/contacorrente/incluir'>aqui</a> para adicionar novas contas.</strong</div>"
          );
        }
      })
    );
  }
}
