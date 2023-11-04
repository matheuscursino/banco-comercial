var tabelaDiv = document.getElementById("tabelaDiv");
var tabelaBody = document.getElementById("tabela-colunas");
var all = document.getElementById("all");

function consultar() {
  tabelaDiv.style.display = "none";
  var cpf_valor = document.getElementById("cpf").value;

  let formData = new FormData();
  formData.append("cpf", cpf_valor);
  formData.append("tipoConsulta", 1);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init).then((response) => {
    response
      .json()
      .then((data) => {
        var objCliente = data.message;
        console.log(objCliente);

        if (objCliente != false) {
          tabelaBody.innerHTML = "";
          tabelaDiv.style.display = "block";
          tabelaBody.innerHTML += `<tr>
             <td>${objCliente.cli_cpf}</td>
             <td>${objCliente.cli_nome}</td>
             <td>${objCliente.cli_telefone}</td>
             </tr>`;
        } else {
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> O cliente com o CPF indicado não foi encontrado! <strong> Clique <a href='/bancorm/cliente/listar'>aqui</a> para conferir o CPF de todos os cliente.  </div>"
          );
        }
      })
      .catch((error) => {});
  });
}

function deletar() {
  let formData = new FormData();
  formData.append("cpf", cpf_valor);

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
          "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O cliente com o CPF indicado foi deletado! <strong> Clique <a href='/bancorm'>aqui</a> para manipular outras entidades.  </div>"
        );
      } else {
        alert("Aconteceu algum erro ao tentar deletar o cliente");
      }
    })
    .catch((error) => {
      alert("Erro ao fazer a requisição");
    });
}
