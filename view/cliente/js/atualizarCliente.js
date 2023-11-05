var conteudo = document.getElementById("conteudo");
var all = document.getElementById("all");

function consultar() {
  conteudo.style.display = "none";
  var cpf_valor = document.getElementById("cpf").value;

  let formData = new FormData();
  formData.append("cpf", cpf_valor);
  formData.append("tipoConsulta", 1);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init)
    .then((response) => {
      response.json().then((data) => {
        var objCliente = data.message;

        if (objCliente !== false) {
          conteudo.style.display = "block";
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> O cliente com o CPF indicado não foi encontrado! <strong> Clique <a href='/bancorm/cliente/listar'>aqui</a> para conferir o CPF de todos os cliente.  </div>"
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
  var cpf_valor = document.getElementById("cpf").value;
  switch (tipoAtualizacao) {
    case 1:
      var nome_valor = document.getElementById("nome").value;

      let formData = new FormData();
      formData.append("cpf", cpf_valor);
      formData.append("nome", nome_valor);
      formData.append("tipoAtualizacao", tipoAtualizacao);

      var init = { method: "POST", body: formData };

      fetch("atualizar/atualizar", init).then((response) => {
        if (response.status == 200) {
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O nome do cliente foi alterado com sucesso! <strong> Clique <a href='/bancorm/cliente/consultar'>aqui</a> para verificar o seu novo nome.  </div>"
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
      var telefone_valor = document.getElementById("telefone").value;

      let formData2 = new FormData();
      formData2.append("cpf", cpf_valor);
      formData2.append("telefone", telefone_valor);
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
