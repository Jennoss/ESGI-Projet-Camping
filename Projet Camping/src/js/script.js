let today = new Date();
let d = today.getDate();
let m = today.getMonth() + 1;
let y = today.getFullYear();

if (d.toString().length === 1) {
  d = d.toString().padStart(2, "0");
}

if (m.toString().length === 1) {
  m = m.toString().padStart(2, "0");
}

let dateDepart = document.getElementById("dateDepart");
dateDepart.setAttribute("min", y + "-" + m + "-" + d);

let tomorrow = new Date();
let dT = tomorrow.getDate() + 1;

if (dT.toString().length === 1) {
  dT = dT.toString().padStart(2, "0");
}

let dateJusq = document.getElementById("dateJusq");

dateDepart.addEventListener("change", function () {
  dateJusq.disabled = false;
  let date = new Date(dateDepart.value);
  date.setDate(date.getDate() + 1);
  let dateSv = date.toLocaleDateString("sv");
  dateJusq.setAttribute("min", dateSv);
});

let dateJusq2 = document.getElementById("dateJusq2");
let dateDepart2 = document.getElementById("dateDepart2");
dateDepart2.setAttribute("min", y + "-" + m + "-" + d);

dateDepart2.addEventListener("change", function () {
  dateJusq2.disabled = false;
  let date = new Date(dateDepart2.value);
  date.setDate(date.getDate() + 1);
  let dateSv = date.toLocaleDateString("sv");
  dateJusq2.setAttribute("min", dateSv);
});

const addLogementBtn = document.getElementById("addLogement");
const addEmplacementBtn = document.getElementById("addEmplacement");
const addLogementContainer = document.getElementById("addLogementContainer");
const addEmplacementContainer = document.getElementById(
  "addEmplacementContainer"
);

addEmplacementContainer.style.display = "none";
addLogementContainer.style.display = "block";

addLogementBtn.addEventListener("click", function () {
  addEmplacementBtn.classList.remove("btn-primary");
  addEmplacementBtn.classList.add("btn-outline-primary");
  addLogementBtn.classList.add("btn-primary");
  addLogementBtn.classList.remove("btn-outline-primary");

  addLogementContainer.style.display = "block";
  addEmplacementContainer.style.display = "none";
});

addEmplacementBtn.addEventListener("click", () => {
  addLogementBtn.classList.remove("btn-primary");
  addLogementBtn.classList.add("btn-outline-primary");
  addEmplacementBtn.classList.add("btn-primary");
  addEmplacementBtn.classList.remove("btn-outline-primary");
  addLogementContainer.style.display = "none";
  addEmplacementContainer.style.display = "block";
});

const machinealaverDispo = document.getElementById("machinealaverDispo");
const machinealaverNonDispo = document.getElementById("machinealaverNonDispo");
const machinealaver = document.getElementById("machinealaver");

machinealaverDispo.onchange = () => {
  if (machinealaverDispo.checked) {
    machinealaverNonDispo.setAttribute("disabled", "");
  } else {
    machinealaverNonDispo.disabled = false;
  }
};

machinealaverNonDispo.onchange = () => {
  if (machinealaverNonDispo.checked) {
    machinealaverDispo.setAttribute("disabled", "");
    machinealaver.value = 0;
    machinealaver.disabled = true;
  } else {
    machinealaverDispo.disabled = false;
    machinealaver.value = "";
    machinealaver.disabled = false;
  }
};

const lavevaisselleDispo = document.getElementById("lavevaisselleDispo");
const lavevaisselleNonDispo = document.getElementById("lavevaisselleNonDispo");
const lavevaiselle = document.getElementById("lavevaiselle");

lavevaisselleDispo.onchange = () => {
  if (lavevaisselleDispo.checked) {
    lavevaisselleNonDispo.setAttribute("disabled", "");
  } else {
    lavevaisselleNonDispo.disabled = false;
  }
};

lavevaisselleNonDispo.onchange = () => {
  if (lavevaisselleNonDispo.checked) {
    lavevaisselleDispo.setAttribute("disabled", "");
    lavevaiselle.value = 0;
    lavevaiselle.disabled = true;
  } else {
    lavevaisselleDispo.disabled = false;
    lavevaiselle.value = "";
    lavevaiselle.disabled = false;
  }
};

const sechelingeDispo = document.getElementById("sechelingeDispo");
const sechelingeNonDispo = document.getElementById("sechelingeNonDispo");
const sechelinge = document.getElementById("sechelinge");

sechelingeDispo.onchange = () => {
  if (sechelingeDispo.checked) {
    sechelingeNonDispo.setAttribute("disabled", "");
  } else {
    sechelingeNonDispo.disabled = false;
  }
};

sechelingeNonDispo.onchange = () => {
  if (sechelingeNonDispo.checked) {
    sechelingeDispo.setAttribute("disabled", "");
    sechelinge.value = 0;
    sechelinge.disabled = true;
  } else {
    sechelingeDispo.disabled = false;
    sechelinge.value = "";
    sechelinge.disabled = false;
  }
};

const toilettesDispo = document.getElementById("toilettesDispo");
const toilettesNonDispo = document.getElementById("toilettesNonDispo");
const toilettes = document.getElementById("toilettes");

toilettesDispo.onchange = () => {
  if (toilettesDispo.checked) {
    toilettesNonDispo.setAttribute("disabled", "");
  } else {
    toilettesNonDispo.disabled = false;
  }
};

toilettesNonDispo.onchange = () => {
  if (toilettesNonDispo.checked) {
    toilettesDispo.setAttribute("disabled", "");
    toilettes.value = 0;
    toilettes.disabled = true;
  } else {
    toilettesDispo.disabled = false;
    toilettes.value = "";
    toilettes.disabled = false;
  }
};

const doucheDispo = document.getElementById("doucheDispo");
const doucheNonDispo = document.getElementById("doucheNonDispo");
const douche = document.getElementById("douche");

doucheDispo.onchange = () => {
  if (doucheDispo.checked) {
    doucheNonDispo.setAttribute("disabled", "");
  } else {
    doucheNonDispo.disabled = false;
  }
};

doucheNonDispo.onchange = () => {
  if (doucheNonDispo.checked) {
    doucheDispo.setAttribute("disabled", "");
    douche.value = 0;
    douche.disabled = true;
  } else {
    doucheDispo.disabled = false;
    douche.value = "";
    douche.disabled = false;
  }
};

const baignoireDispo = document.getElementById("baignoireDispo");
const baignoireNonDispo = document.getElementById("baignoireNonDispo");
const baignoire = document.getElementById("baignoire");

baignoireDispo.onchange = () => {
  if (baignoireDispo.checked) {
    baignoireNonDispo.setAttribute("disabled", "");
  } else {
    baignoireNonDispo.disabled = false;
  }
};

baignoireNonDispo.onchange = () => {
  if (baignoireNonDispo.checked) {
    baignoireDispo.setAttribute("disabled", "");
    baignoire.value = 0;
    baignoire.disabled = true;
  } else {
    baignoireDispo.disabled = false;
    baignoire.value = "";
    baignoire.disabled = false;
  }
};

const placeDeParkingDispo = document.getElementById("placeDeParkingDispo");
const placeDeParkingNonDispo = document.getElementById(
  "placeDeParkingNonDispo"
);
const parking = document.getElementById("parking");

placeDeParkingDispo.onchange = () => {
  if (placeDeParkingDispo.checked) {
    placeDeParkingNonDispo.setAttribute("disabled", "");
  } else {
    placeDeParkingNonDispo.disabled = false;
  }
};

placeDeParkingNonDispo.onchange = () => {
  if (placeDeParkingNonDispo.checked) {
    placeDeParkingDispo.setAttribute("disabled", "");
    parking.value = 0;
    parking.disabled = true;
  } else {
    placeDeParkingDispo.disabled = false;
    parking.value = "";
    parking.disabled = false;
  }
};
