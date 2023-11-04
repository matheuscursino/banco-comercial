var box = document.getElementById("box");
var tabelaBody = document.getElementById("tabela-colunas");
var all = document.getElementById("all");
var contador;

function listar() {
  var init = {
    method: "POST",
  };

  fetch("listar/listar", init)
    .then((response) => {
      response.json().then((data) => {
        var array = data.message;
        if (array.length != 0) {
          box.style.display = "table";
          array.forEach((element) => {
            contador = 0;
            contador += 1;
            tabelaBody.innerHTML = "";
            tabelaBody.innerHTML += `<tr>
                 <th>${contador}</th>
                 <td>${element.cli_cpf}</td>
                 <td>${element.cli_nome}</td>
                 <td>${element.cli_telefone}</td>
                 </tr>`;
          });
        } else {
          box.style.display = "none";
          all.insertAdjacentHTML(
            "afterBegin",
            "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Não há clientes no sistema! <strong> Clique <a href='/bancorm/cliente/incluir'>aqui</a> para incluir clientes.  </div>"
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
