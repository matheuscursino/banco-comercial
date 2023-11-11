var conteudo = document.getElementById("conteudo");
var all = document.getElementById("all");

function consultar(tipoConsulta) {
  conteudo.style.display = "none";
  var idTransacao_valor = document.getElementById("idTransacao").value;

  let formData = new FormData();
  formData.append("idTransacao", idTransacao_valor);
  formData.append("tipoConsulta", tipoConsulta);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init)
    .then((response) => {
      response.json().then((data) => {
        var arrayTransacao = data.message;

        if (arrayTransacao.length > 0) {
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
  var idTransacao_valor = document.getElementById("idTransacao").value;
  switch (tipoAtualizacao) {
    case 1:
      var idRemetente_valor = document.getElementById("idRemetente").value;

      let formData = new FormData();
      formData.append("idTransacao", idTransacao_valor);
      formData.append("idRemetente", idRemetente_valor);
      formData.append("tipoAtualizacao", tipoAtualizacao);

      var init = { method: "POST", body: formData };

      fetch("atualizar/atualizar", init).then((response) => {
        if (response.status == 200) {
          console.log(response);
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O ID do remetente foi alterado com sucesso! <strong> Clique <a href='/bancorm/transacao/consultar'>aqui</a> para verificar.  </div>"
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
      var idDestinatario_valor =
        document.getElementById("idDestinatario").value;

      let formData2 = new FormData();
      formData2.append("idTransacao", idTransacao_valor);
      formData2.append("idDestinatario", idDestinatario_valor);
      formData2.append("tipoAtualizacao", tipoAtualizacao);

      var init2 = { method: "POST", body: formData2 };

      fetch("atualizar/atualizar", init2).then((response) => {
        if (response.status == 200) {
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O ID do destinatario foi alterado com sucesso! <strong> Clique <a href='/bancorm/transacao/consultar'>aqui</a> para verificar.  </div>"
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
      var valorTransacao_valor =
        document.getElementById("valorTransacao").value;

      let formData3 = new FormData();
      formData3.append("idTransacao", idTransacao_valor);
      formData3.append("valorTransacao", valorTransacao_valor);
      formData3.append("tipoAtualizacao", tipoAtualizacao);

      var init2 = { method: "POST", body: formData2 };

      fetch("atualizar/atualizar", init2).then((response) => {
        if (response.status == 200) {
          conteudo.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O valor da transação foi alterado com sucesso! <strong> Clique <a href='/bancorm/transacao/consultar'>aqui</a> para verificar. </div>"
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
      break;
  }
}
