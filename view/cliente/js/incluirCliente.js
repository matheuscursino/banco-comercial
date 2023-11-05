var all = document.getElementById("all");

function salvar() {
  var cpf_valor = document.getElementById("cpf").value;
  var nome_valor = document.getElementById("nome").value;
  var telefone_valor = document.getElementById("telefone").value;

  let formData = new FormData();
  formData.append("cpf", cpf_valor);
  formData.append("nome", nome_valor);
  formData.append("telefone", telefone_valor);

  var init = {
    method: "POST",
    body: formData,
  };

  fetch("incluir/salvar", init)
    .then((response) => {
      if (response.status == 200) {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-success'> <button onclick='this.parentNode.remove()' class='delete'></button> O cliente foi incluído com sucesso! <strong> Veja <a href='/bancorm'>aqui</a> as outras entidades que você pode manipular.  </div>"
        );
      } else {
        all.insertAdjacentHTML(
          "afterBegin",
          "<div class='notification is-danger'> <button onclick='this.parentNode.remove()' class='delete'></button> Aconteceu algum erro ao tentar incluir o cliente. <strong> Consulte <a href='/bancorm/cliente/consultar'>aqui</a> se já não existe um cliente com esse CPF.</strong> Caso o cliente não exista, atualize a página e tente novamente. </div>"
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
