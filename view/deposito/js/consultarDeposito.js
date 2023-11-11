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
      var idDeposito_valor = document.getElementById("idDeposito").value;

      let formData = new FormData();
      formData.append("idDeposito", idDeposito_valor);
      formData.append("tipoConsulta", tipoConsulta);

      var init = {
        method: "POST",
        body: formData,
      };

      requisicaoConsulta(init);
      break;
    case 2:
      var cpfCliente_valor = document.getElementById("cpfCliente").value;

      let formData2 = new FormData();
      formData2.append("cpfCliente", cpfCliente_valor);
      formData2.append("tipoConsulta", tipoConsulta);

      var init2 = {
        method: "POST",
        body: formData2,
      };

      requisicaoConsulta(init2);
      break;
    case 3:
      var idConta_valor = document.getElementById("idConta").value;

      let formData3 = new FormData();
      formData3.append("idConta", idConta_valor);
      formData3.append("tipoConsulta", tipoConsulta);

      var init3 = {
        method: "POST",
        body: formData3,
      };

      requisicaoConsulta(init3);
      break;
    case 4:
      var valorDeposito_valor = document.getElementById("valorDeposito").value;
      var operadorValor_valor = document.getElementById("operadorValor").value;

      let formData4 = new FormData();
      formData4.append("valorDeposito", valorDeposito_valor);
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
            console.log(elemento);
            tabela.innerHTML += `<tr>
            <td>${elemento.dep_id}</td>
            <td>${elemento.dep_cliente}</td>
            <td>${elemento.dep_conta}</td>
            <td>${elemento.dep_valor}</td>
            </tr>`;
          });
          modal.classList.add("is-active");
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Não foi possível consultar esse depósito. <strong> Adicione <a href='/bancorm/deposito/incluir'>aqui</a> para adicionar novos depósitos.</strong</div>"
          );
        }
      })
    );
  }
}
