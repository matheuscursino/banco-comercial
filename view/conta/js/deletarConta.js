var tabelaDiv = document.getElementById("tabelaDiv");
var tabelaBody = document.getElementById("tabela-colunas");
var all = document.getElementById("all");

function consultar(tipoConsulta) {
  tabelaDiv.style.display = "none";
  var id_valor = document.getElementById("ID").value;

  let formData = new FormData();
  formData.append("id", id_valor);
  formData.append("tipoConsulta", tipoConsulta);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init).then((response) => {
    response
      .json()
      .then((data) => {
        var objCliente = data.message;
        tabelaBody.innerHTML = "";
        if (objCliente != false) {
          tabelaDiv.style.display = "block";
          tabelaBody.innerHTML = `<tr>
          <td>${objCliente.con_id}</td>
          <td>${objCliente.con_saldo}</td>
          <td>${objCliente.con_dataCriacao}</td>
          <td>${objCliente.con_dono}</td>
             </tr>`;
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> A conta com o ID indicado não foi encontrada! <strong> Clique <a href='/bancorm/conta/listar'>aqui</a> para conferir o ID de todas as contas.  </div>"
          );
        }
      })
      .catch((error) => {});
  });
}

function deletar() {
  var id_valor = document.getElementById("ID").value;
  let formData = new FormData();
  formData.append("id", id_valor);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("deletar/apagar", init)
    .then((response) => {
      if (response.status == 200) {
        tabelaDiv.style.display = "none";
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> A conta com o ID indicado foi deletada! <strong> Clique <a href='/bancorm'>aqui</a> para manipular outras entidades.  </div>"
        );
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao tentar deletar a conta. Por favor, atualize a página e tente novamente </div>"
        );
      }
    })
    .catch(() => {
      all.insertAdjacentHTML(
        "afterBegin",
        "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao realizar a requisição. Por favor, atualize a página e tente novamente </div>"
      );
    });
}
