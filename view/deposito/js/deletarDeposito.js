var tabelaDiv = document.getElementById("tabelaDiv");
var tabelaBody = document.getElementById("tabela-colunas");
var all = document.getElementById("all");

function consultar(tipoConsulta) {
  tabelaDiv.style.display = "none";
  var idDeposito_valor = document.getElementById("idDeposito").value;

  let formData = new FormData();
  formData.append("idDeposito", idDeposito_valor);
  formData.append("tipoConsulta", tipoConsulta);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init).then((response) =>
    response.json().then((data) => {
      var arrayDeposito = data.message;
      tabelaBody.innerHTML = "";
      if (arrayDeposito.length > 0) {
        tabelaDiv.style.display = "block";
        tabelaBody.innerHTML = "";
        arrayDeposito.forEach((elemento) => {
          tabelaBody.innerHTML = `<tr>
            <td>${elemento.dep_id}</td>
            <td>${elemento.dep_cliente}</td>
            <td>${elemento.dep_conta}</td>
            <td>${elemento.dep_valor}</td>
               </tr>`;
        });
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> O depósito com o ID indicado não foi encontrado! <strong> Clique <a href='/bancorm/deposito/listar'>aqui</a> para conferir o ID de todos os depósitos.  </div>"
        );
      }
    })
  );
}

function deletar() {
  var idDeposito_valor = document.getElementById("idDeposito").value;
  let formData = new FormData();
  formData.append("idDeposito", idDeposito_valor);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("deletar/apagar", init).then((response) =>
    response.json().then((data) => {
      console.log(data);
      if (response.status == 200) {
        tabelaDiv.style.display = "none";
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O depósito com o ID indicado foi deletado! <strong> Clique <a href='/bancorm'>aqui</a> para manipular outras entidades.  </div>"
        );
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao tentar deletar o depósito. Por favor, atualize a página e tente novamente </div>"
        );
      }
    })
  );
}
