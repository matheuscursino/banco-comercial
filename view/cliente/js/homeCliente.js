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
