var botaoBurger = document.getElementById("burger");
var allDropdowns = document.querySelectorAll(".navbar-item.has-dropdown");
var allForms = document.querySelectorAll("form");

botaoBurger.addEventListener("click", (e) => {
  const target = botaoBurger.dataset.target;
  const eTarget = document.getElementById(target);

  botaoBurger.classList.toggle("is-active");
  eTarget.classList.toggle("is-active");
});

allDropdowns.forEach((dropdown) => {
  dropdown.addEventListener("click", () => {
    const elemento = dropdown.querySelector(".navbar-dropdown");
    elemento.classList.toggle("is-active");
  });
});

allForms.forEach((form) => {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
  });
});
