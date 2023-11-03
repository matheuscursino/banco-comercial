<!DOCTYPE html>
<html>
  <head>
    <title>BancoRM</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="view/images/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="view/images/favicon-16x16.png"
    />
    <link rel="manifest" href="view/images/site.webmanifest" />
    <style>
      body {
        margin: 0px;
        padding: 0px;
        font-family: "Arial";
        text-align: center;
      }

      li a {
        display: block;
        padding: 10px;
        margin: 10px;
        color: white;
        text-decoration: none;
      }

      li {
        float: left;
      }

      ul {
        background-color: black;
        list-style-type: none;
        margin: 0px;
        padding: 0px;
        overflow: hidden;
      }

      li a:hover:not(#notCss) {
        background-color: blue;
      }

      .ativo {
        background-color: darkblue;
      }

      button {
        margin: 10px;
        padding: 20px;
        border: none;
        border-radius: 10px;
        color: white;
        background-color: darkblue;
        cursor: pointer;
        width: 300px;
      }
    </style>
  </head>
  <body>
  <nav class="navbar is-light">
      <div class="navbar-brand">
        <a class="navbar-item" href="/bancorm">
          <img src="view/images/favicon-32x32.png" width="32" height="32" />
        </a>
        <div
          id="burger"
          class="navbar-burger"
          data-target="navbarExampleTransparentExample"
        >
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="/bancorm"> Home </a>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link"> Cliente </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="/bancorm/cliente/incluir">
                Incluir
              </a>
              <a class="navbar-item" href="/bancorm/cliente/atualizar">
                Atualizar
              </a>
              <a class="navbar-item" href="/bancorm/cliente/consultar">
                Consultar
              </a>
              <a class="navbar-item" href="/bancorm/cliente/listar"> Listar </a>
              <a class="navbar-item" href="/bancorm/cliente/deletar">
                Deletar
              </a>
            </div>
          </div>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link"> Conta corrente </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="/bancorm/contacorrente/incluir">
                Incluir
              </a>
              <a class="navbar-item" href="/bancorm/contacorrente/atualizar">
                Atualizar
              </a>
              <a class="navbar-item" href="/bancorm/contacorrente/consultar">
                Consultar
              </a>
              <a class="navbar-item" href="/bancorm/contacorrente/listar">
                Listar
              </a>
              <a class="navbar-item" href="/bancorm/contacorrente/deletar">
                Deletar
              </a>
            </div>
          </div>
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link"> Transação </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="/bancorm/transacao/incluir">
                Incluir
              </a>
              <a class="navbar-item" href="/bancorm/transacao/atualizar">
                Atualizar
              </a>
              <a class="navbar-item" href="/bancorm/transacao/consultar">
                Consultar
              </a>
              <a class="navbar-item" href="/bancorm/transacao/listar">
                Listar
              </a>
              <a class="navbar-item" href="/bancorm/transacao/deletar">
                Deletar
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <button onclick="location.href = 'cliente'">CLIENTE</button> <br />
    <button onclick="location.href = 'cliente/deletar'">CONTA</button> <br />
    <button onclick="location.href = 'cliente/consultar'">TRANSACAO</button>
    <br />
    <button onclick="location.href = 'cliente/listar'">DEPOSITO</button> <br />
  </body>
  <script>
    var botaoBurger = document.getElementById("burger")

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
  </script>
</html>