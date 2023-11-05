var all = document.getElementById("all");

function consultarCliente(tipoConsulta) {
  var cpf_valor = document.getElementById("cpf").value;

  var formData = new FormData();
  formData.append("cpf", cpf_valor);
  formData.append("tipoConsulta", tipoConsulta);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("/bancorm/cliente/consultar/consultar", init).then((response) =>
    response.json().then((data) => {
      console.log(data);
      if (data.message !== false) {
        consultarConta(4);
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Não existe um cliente com este CPF.  </div>"
        );
      }
    })
  );
}

function consultarConta(tipoConsulta) {
  var cpf_valor = document.getElementById("cpf").value;

  var formData = new FormData();
  formData.append("cpf", cpf_valor);
  formData.append("tipoConsulta", tipoConsulta);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init).then((response) =>
    response.json().then((data) => {
      console.log(data);
      if (data.message == false) {
        //
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Já existe uma conta com este CPF vinculado.  </div>"
        );
      }
    })
  );
}

function criarConta() {}
