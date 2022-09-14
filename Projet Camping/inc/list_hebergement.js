const logementBtn = document.getElementById("logementBtn");
const emplacementBtn = document.getElementById("emplacementBtn");

let type = document.getElementsByClassName("typeof");

logementBtn.addEventListener("click", () => {
  for (let i = 0; i < type.length; i++) {
    if (type[i].dataset.type === "Logement") {
      type[i].style.display = "block";
    }
    if (type[i].dataset.type === "Emplacement") {
      type[i].style.display = "none";
    }
  }
});

emplacementBtn.addEventListener("click", () => {
  for (let i = 0; i < type.length; i++) {
    if (type[i].dataset.type === "Emplacement") {
      type[i].style.display = "block";
    }
    if (type[i].dataset.type === "Logement") {
      type[i].style.display = "none";
    }
  }
});
