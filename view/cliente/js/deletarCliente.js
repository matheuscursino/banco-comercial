var botaoBurger = document.getElementById("burger");

botaoBurger.addEventListener("click", (e) => {
  const target = botaoBurger.dataset.target;
  const eTarget = document.getElementById(target);

  botaoBurger.classList.toggle("is-active");
  eTarget.classList.toggle("is-active");
});

const allDropdowns = document.querySelectorAll(".navbar-item.has-dropdown");

allDropdowns.forEach((dropdown) => {
  dropdown.addEventListener("click", () => {
    const elemento = dropdown.querySelector(".navbar-dropdown");
    elemento.classList.toggle("is-active");
  });
});

var tabelaDiv = document.getElementById("tabelaDiv");
var tabelaBody = document.getElementById("tabela-colunas");
var form = document.getElementById("formulario");
var all = document.getElementById("all");
var cpf_valor;

form.addEventListener("submit", (e) => {
  e.preventDefault();
});

function consultar() {
  tabelaDiv.style.display = "none";
  cpf_valor = document.getElementById("cpf").value;

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
        console.log(data);
        var dataArray = data.message;

        if (dataArray.length != 0) {
          tabelaBody.innerHTML = "";
          tabelaDiv.style.display = "block";
          dataArray.forEach((element) => {
            tabelaBody.innerHTML += `<tr>
             <td>${element.cli_cpf}</td>
             <td>${element.cli_nome}</td>
             <td>${element.cli_telefone}</td>
             </tr>`;
          });
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
