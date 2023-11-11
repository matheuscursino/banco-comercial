var tabelaDiv = document.getElementById("tabelaDiv");
var tabelaBody = document.getElementById("tabela-colunas");
var all = document.getElementById("all");

function consultar(tipoConsulta) {
  tabelaDiv.style.display = "none";
  var id_valor = document.getElementById("idTransacao").value;

  let formData = new FormData();
  formData.append("idTransacao", id_valor);
  formData.append("tipoConsulta", tipoConsulta);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("consultar/consultar", init).then((response) =>
    response.json().then((data) => {
      var arrayTransacao = data.message;
      tabelaBody.innerHTML = "";
      if (arrayTransacao.length > 0) {
        tabelaDiv.style.display = "block";
        tabelaBody.innerHTML = "";
        arrayTransacao.forEach((elemento) => {
          tabelaBody.innerHTML = `<tr>
            <td>${elemento.tra_id}</td>
            <td>${elemento.tra_contaRemetente}</td>
            <td>${elemento.tra_contaDestinataria}</td>
            <td>${elemento.tra_valor}</td>
               </tr>`;
        });
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> A transação com o ID indicado não foi encontrada! <strong> Clique <a href='/bancorm/transacao/listar'>aqui</a> para conferir o ID de todas as transações.  </div>"
        );
      }
    })
  );
}

function deletar() {
  var id_valor = document.getElementById("idTransacao").value;
  let formData = new FormData();
  formData.append("idTransacao", id_valor);

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
          "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> A transação com o ID indicado foi deletada! <strong> Clique <a href='/bancorm'>aqui</a> para manipular outras entidades.  </div>"
        );
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao tentar deletar a transação. Por favor, atualize a página e tente novamente </div>"
        );
      }
    })
  );
}
