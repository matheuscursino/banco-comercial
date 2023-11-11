var all = document.getElementById("all");

function salvar() {
  var cpfCliente_valor = document.getElementById("cpfCliente").value;
  var idConta_valor = document.getElementById("idConta").value;
  var valorDesposito_valor = document.getElementById("valorDeposito").value;

  let formData = new FormData();
  formData.append("cpfCliente", cpfCliente_valor);
  formData.append("idConta", idConta_valor);
  formData.append("valorDeposito", valorDesposito_valor);

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
          "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O depósito foi incluído com sucesso! <strong> Veja <a href='/bancorm'>aqui</a> as outras entidades que você pode manipular.  </div>"
        );
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao tentar incluir o depósito. Atualize a página e tente novamente. </div>"
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
