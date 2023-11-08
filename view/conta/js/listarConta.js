var box = document.getElementById("box");
var tabelaBody = document.getElementById("tabela-colunas");
var all = document.getElementById("all");

function listar() {
  var init = {
    method: "POST",
  };

  fetch("listar/listar", init)
    .then((response) => {
      response.json().then((data) => {
        var array = data.message;
        if (array.length != 0) {
          tabelaBody.innerHTML = "";
          box.style.display = "table";
          array.forEach((element) => {
            tabelaBody.innerHTML += `<tr>
                 <td>${element.con_id}</td>
                 <td>${element.con_saldo}</td>
                 <td>${element.con_dataCriacao}</td>
                 <td>${element.con_dono}</td>
                 </tr>`;
          });
        } else {
          box.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Não há contas no sistema! <strong> Clique <a href='/bancorm/contacorrente/incluir'>aqui</a> para incluir contas.  </div>"
          );
        }
      });
    })
    .catch(() => {
      all.insertAdjacentHTML(
        "afterBegin",
        "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao realizar a requisição. Por favor, atualize a página e tente novamente </div>"
      );
    });
}
