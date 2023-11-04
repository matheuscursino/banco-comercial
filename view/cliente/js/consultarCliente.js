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
  var cpf_valor = document.getElementById("cpf").value;
  var nome_valor = document.getElementById("nome").value;
  var telefone_valor = document.getElementById("telefone").value;

  switch (tipoConsulta) {
    case 1:
      let formData = new FormData();
      formData.append("cpf", cpf_valor);
      formData.append("tipoConsulta", tipoConsulta);

      var init = {
        method: "POST",
        body: formData,
      };

      requisicaoConsulta(init);
      break;
    case 2:
      let formData2 = new FormData();
      formData2.append("nome", nome_valor);
      formData2.append("tipoConsulta", tipoConsulta);

      var init2 = {
        method: "POST",
        body: formData2,
      };

      requisicaoConsulta(init2);
      break;
    case 3:
      let formData3 = new FormData();
      formData3.append("telefone", telefone_valor);
      formData3.append("tipoConsulta", tipoConsulta);

      var init3 = {
        method: "POST",
        body: formData3,
      };

      requisicaoConsulta(init3);
      break;
  }
  function requisicaoConsulta(init) {
    fetch("consultar/consultar", init).then((response) =>
      response.json().then((data) => {
        if (data.message !== false) {
          var objCliente = data.message;
          tabela.innerHTML = "";
          tabela.innerHTML += `<tr>
             <td>${objCliente.cli_cpf}</td>
             <td>${objCliente.cli_nome}</td>
             <td>${objCliente.cli_telefone}</td>
             </tr>`;
          modal.classList.add("is-active");
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Não foi possível consultar esse cliente. <strong> Adicione <a href='/bancorm/cliente/incluir'>aqui</a> novos clientes.</strong</div>"
          );
        }
      })
    );
  }
}
