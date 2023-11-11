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
                 <td>${element.dep_id}</td>
                 <td>${element.dep_cliente}</td>
                 <td>${element.dep_conta}</td>
                 <td>${element.dep_valor}</td>
                 </tr>`;
          });
        } else {
          box.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Não há depósitos no sistema! <strong> Clique <a href='/bancorm/deposito/incluir'>aqui</a> para incluir depósitos.  </div>"
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
