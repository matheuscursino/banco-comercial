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
      var id_valor = document.getElementById("id").value;

      let formData = new FormData();
      formData.append("id", id_valor);
      formData.append("tipoConsulta", tipoConsulta);

      var init = {
        method: "POST",
        body: formData,
      };

      requisicaoConsulta(init);
      break;
    case 2:
      var saldo_valor = document.getElementById("saldo").value;
      var saldo_operador = document.getElementById("saldoOperador").value;

      let formData2 = new FormData();
      formData2.append("saldo", saldo_valor);
      formData2.append("saldoOperador", saldo_operador);
      formData2.append("tipoConsulta", tipoConsulta);

      var init2 = {
        method: "POST",
        body: formData2,
      };

      requisicaoConsulta(init2);
      break;
    case 3:
      var data_valor = document.getElementById("dataCriacao").value;
      var data_operador = document.getElementById("operadorData").value;

      let formData3 = new FormData();
      formData3.append("data", data_valor);
      formData3.append("dataOperador", data_operador);
      formData3.append("tipoConsulta", tipoConsulta);

      var init3 = {
        method: "POST",
        body: formData3,
      };

      requisicaoConsulta(init3);
      break;
    case 4:
      var cpf_valor = document.getElementById("cpf").value;

      let formData4 = new FormData();
      formData4.append("cpf", cpf_valor);
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
          var arrayContas = data.message;
          tabela.innerHTML = "";
          arrayContas.forEach((element) => {
            tabela.innerHTML += `<tr>
            <td>${element.con_id}</td>
            <td>${element.con_saldo}</td>
            <td>${element.con_dataCriacao}</td>
            <td>${element.con_dono}</td>
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
