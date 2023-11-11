var conteudo = document.getElementById("conteudo");
var all = document.getElementById("all");

function consultar(tipoConsulta) {
  conteudo.style.display = "none";
  var idDeposito_valor = document.getElementById("idDeposito").value;

  let formData = new FormData();
  formData.append("idDeposito", idDeposito_valor);
  formData.append("tipoConsulta", tipoConsulta);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init)
    .then((response) => {
      response.json().then((data) => {
        var arrayDeposito = data.message;

        if (arrayDeposito.length > 0) {
          conteudo.style.display = "block";
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> O depósito com o ID indicado não foi encontrado! <strong> Clique <a href='/bancorm/deposito/listar'>aqui</a> para conferir o ID de todos os depósitos.  </div>"
          );
        }
      });
    })
    .catch((error) => {
      all.insertAdjacentHTML(
        "afterBegin",
        "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao fazer a requisição.  </div>"
      );
    });
}

function atualizar(tipoAtualizacao) {
  var idDeposito_valor = document.getElementById("idDeposito").value;
  switch (tipoAtualizacao) {
    case 1:
      var cpfCliente_valor = document.getElementById("cpfCliente").value;

      let formData = new FormData();
      formData.append("idDeposito", idDeposito_valor);
      formData.append("cpfCliente", cpfCliente_valor);
      formData.append("tipoAtualizacao", tipoAtualizacao);

      var init = { method: "POST", body: formData };

      fetch("atualizar/atualizar", init).then((response) => {
        console.log(response.json());
        if (response.status == 200) {
          console.log(response);
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O CPF do cliente foi alterado com sucesso! <strong> Clique <a href='/bancorm/deposito/consultar'>aqui</a> para verificar.  </div>"
          );
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao fazer a requisição.</div>"
          );
        }
      });
      break;
    case 2:
      var idConta_valor = document.getElementById("idConta").value;

      let formData2 = new FormData();
      formData2.append("idDeposito", idDeposito_valor);
      formData2.append("idConta", idConta_valor);
      formData2.append("tipoAtualizacao", tipoAtualizacao);

      var init2 = { method: "POST", body: formData2 };

      fetch("atualizar/atualizar", init2).then((response) => {
        if (response.status == 200) {
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O ID da conta foi alterado com sucesso! <strong> Clique <a href='/bancorm/deposito/consultar'>aqui</a> para verificar.  </div>"
          );
        } else {
          console.log(response.json());
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao fazer a requisição.</div>"
          );
        }
      });
      break;
    case 3:
      var valorDeposito_valor = document.getElementById("valorDeposito").value;

      let formData3 = new FormData();
      formData3.append("idDeposito", idDeposito_valor);
      formData3.append("valorDeposito", valorDeposito_valor);
      formData3.append("tipoAtualizacao", tipoAtualizacao);

      var init2 = { method: "POST", body: formData2 };

      fetch("atualizar/atualizar", init2).then((response) => {
        if (response.status == 200) {
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O valor do depósito foi alterado com sucesso! <strong> Clique <a href='/bancorm/deposito/consultar'>aqui</a> para verificar. </div>"
          );
        } else {
          console.log(response.json());
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao fazer a requisição.</div>"
          );
        }
      });
      break;
  }
}
