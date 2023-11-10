var all = document.getElementById("all");

function salvar() {
  var idRemetente_valor = document.getElementById("idRemetente").value;
  var idDestinario_valor = document.getElementById("idDestinatario").value;
  var valorTransacao_valor = document.getElementById("valorTransacao").value;

  let formData = new FormData();
  formData.append("idRemetente", idRemetente_valor);
  formData.append("idDestinatario", idDestinario_valor);
  formData.append("valorTransacao", valorTransacao_valor);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("incluir/salvar", init)
    .then((response) => {
      console.log(response);
      if (response.status == 200) {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> A transação foi incluída com sucesso! <strong> Veja <a href='/bancorm'>aqui</a> as outras entidades que você pode manipular.  </div>"
        );
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao tentar incluir a transação. Atualize a página e tente novamente. </div>"
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
