let modifier_superficie_toggle = document.getElementById(
  "modifier_superficie_toggle"
);

let superficie_form = document.getElementById("superficie_form");
superficie_form.style.display = "none";

let superficie_annuler = document.getElementById("superficie_annuler");
let superficie_confirmer = document.getElementById("superficie_confirmer");

modifier_superficie_toggle.addEventListener("click", function () {
  superficie_form.style.display = "block";
});

superficie_annuler.addEventListener("click", () => {
  superficie_form.style.display = "none";
});

let modifier_location_toggle = document.getElementById(
  "modifier_location_toggle"
);

let location_form = document.getElementById("location_form");
location_form.style.display = "none";

let location_annuler = document.getElementById("location_annuler");
let location_confirmer = document.getElementById("location_confirmer");

modifier_location_toggle.addEventListener("click", function () {
  location_form.style.display = "block";
});

location_annuler.addEventListener("click", () => {
  location_form.style.display = "none";
});

let modifier_tarif_toggle = document.getElementById("tarif_modifier_toggle");

let tarif_form = document.getElementById("tarif_form");
tarif_form.style.display = "none";

let tarif_annuler = document.getElementById("tarif_annuler");
let tarif_confirmer = document.getElementById("tarif_confirmer");

modifier_tarif_toggle.addEventListener("click", function () {
  tarif_form.style.display = "block";
});

tarif_annuler.addEventListener("click", () => {
  tarif_form.style.display = "none";
});

let pieces_modifier_toggle = document.getElementById("pieces_modifier_toggle");

let pieces_form = document.getElementById("pieces_form");
pieces_form.style.display = "none";

let pieces_annuler = document.getElementById("pieces_annuler");
let pieces_confirmer = document.getElementById("pieces_confirmer");

pieces_modifier_toggle.addEventListener("click", function () {
  pieces_form.style.display = "block";
});

pieces_annuler.addEventListener("click", () => {
  pieces_form.style.display = "none";
});

let lits_modifier_toggle = document.getElementById("lits_modifier_toggle");

let lits_form = document.getElementById("lits_form");
lits_form.style.display = "none";

let lits_annuler = document.getElementById("lits_annuler");
let lits_confirmer = document.getElementById("lits_confirmer");

lits_modifier_toggle.addEventListener("click", function () {
  lits_form.style.display = "block";
});

lits_annuler.addEventListener("click", () => {
  lits_form.style.display = "none";
});

let personne_modifier_toggle = document.getElementById(
  "personne_modifier_toggle"
);

let personne_form = document.getElementById("personne_form");
personne_form.style.display = "none";

let personne_annuler = document.getElementById("personne_annuler");
let personne_confirmer = document.getElementById("personne_confirmer");

personne_modifier_toggle.addEventListener("click", function () {
  personne_form.style.display = "block";
});

personne_annuler.addEventListener("click", () => {
  personne_form.style.display = "none";
});

let disponibilite_modifier_toggle = document.getElementById(
  "disponibilite_modifier_toggle"
);

let disponibilite_form = document.getElementById("disponibilite_form");
disponibilite_form.style.display = "none";

let disponibilite_annuler = document.getElementById("disponibilite_annuler");
let disponibilite_confirmer = document.getElementById(
  "disponibilite_confirmer"
);

disponibilite_modifier_toggle.addEventListener("click", function () {
  disponibilite_form.style.display = "block";
});

disponibilite_annuler.addEventListener("click", () => {
  disponibilite_form.style.display = "none";
});
