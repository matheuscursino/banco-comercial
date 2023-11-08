var conteudo = document.getElementById("conteudo");
var all = document.getElementById("all");

function consultarContaPorId() {
  conteudo.style.display = "none";
  var id_valor = document.getElementById("id").value;

  let formData = new FormData();
  formData.append("id", id_valor);
  formData.append("tipoConsulta", 1);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init)
    .then((response) => {
      response.json().then((data) => {
        var objConta = data.message;

        if (objConta !== false) {
          conteudo.style.display = "block";
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> A conta com o ID indicado não foi encontrada! <strong> Clique <a href='/bancorm/contacorrente/listar'>aqui</a> para conferir o ID de todas as contas.  </div>"
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
  var id_valor = document.getElementById("id").value;
  switch (tipoAtualizacao) {
    case 1:
      var saldo_valor = document.getElementById("saldo").value;

      let formData = new FormData();
      formData.append("id", id_valor);
      formData.append("saldo", saldo_valor);
      formData.append("tipoAtualizacao", tipoAtualizacao);

      var init = { method: "POST", body: formData };

      fetch("atualizar/atualizar", init).then((response) => {
        if (response.status == 200) {
          console.log(response);
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O saldo da conta foi alterado com sucesso! <strong> Clique <a href='/bancorm/contacorrente/consultar'>aqui</a> para verificar o novo saldo.  </div>"
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
      var data_valor = document.getElementById("dataCriacao").value;

      let formData2 = new FormData();
      formData2.append("id", id_valor);
      formData2.append("data", data_valor);
      formData2.append("tipoAtualizacao", tipoAtualizacao);

      var init2 = { method: "POST", body: formData2 };

      fetch("atualizar/atualizar", init2)
        .then((response) => {
          if (response.status == 200) {
            conteudo.style.display = "none";
            all.insertAdjacentHTML(
              "afterBegin",
              "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O telefone do cliente foi alterado com sucesso! <strong> Clique <a href='/bancorm/cliente/consultar'>aqui</a> para verificar o seu novo nome.  </div>"
            );
          } else {
            console.log(response.json());
            all.insertAdjacentHTML(
              "afterBegin",
              "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao fazer a requisição.</div>"
            );
          }
        })
        .catch(() => {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao realizar a requisição. Por favor, atualize a página e tente novamente </div>"
          );
        });
      break;
  }
}
