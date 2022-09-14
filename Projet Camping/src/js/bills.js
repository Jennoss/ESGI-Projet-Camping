// const reservationList = document.getElementById("reservationList");
// const totalPrice = document.getElementById("totalPrice");
// const produitPrix = document.getElementById("produitPrix");
// const normalInput = document.getElementById("normal");
// const activiteInput = document.getElementById("activite");
// const menageInput = document.getElementById("menage");
// const activitemenageInput = document.getElementById("activitemenage");
// const countBalise = document.getElementById("count");
// const formPaiement = document.getElementById("formPaiement");
// const url = window.location.href;

// const strs = url.split("=");
// const id = strs.at(-1);

// let count = 1;

// let total = 0;

// let productPrice = parseInt(produitPrix.getAttribute("value"));

// total += productPrice;

// totalPrice.innerHTML = total;

// formPaiement.action = `../back/payment.php?price=${total}&id=${id}`;

// normalInput.addEventListener("click", function () {
//   if (normalInput.checked) {
//     normal = 0;
//     count += 1;
//     countBalise.innerHTML = count;
//     count = 1;
//     activiteInput.disabled = true;
//     menageInput.disabled = true;
//     activitemenageInput.disabled = true;
//     const li = document.createElement("li");

//     li.classList.add(
//       "list-group-item",
//       "d-flex",
//       "justify-content-between",
//       "lh-sm"
//     );
//     reservationList.appendChild(li);
//     const div = document.createElement("div");
//     li.appendChild(div);
//     li.id = "listt";

//     const h6 = document.createElement("h6");
//     h6.classList.add("my-0");
//     const small = document.createElement("small");
//     small.classList.add("text-muted");

//     div.appendChild(h6);
//     div.appendChild(small);

//     h6.innerHTML = "Normal";
//     small.innerHTML = "Brief description";

//     const spanProduitPrix = document.createElement("span");

//     spanProduitPrix.classList.add("text-muted");
//     spanProduitPrix.innerHTML = normalInput.value + "€";

//     li.appendChild(spanProduitPrix);
//     total += normal;
//     totalPrice.innerHTML = total;
//     formPaiement.action = `../back/payment.php?price=${total}&id=${id}`;
//   }
//   if (!normalInput.checked) {
//     let liContainer = document.getElementById("listt");
//     const countBalise = document.getElementById("count");
//     countBalise.innerHTML = 1;
//     liContainer.remove();
//     activiteInput.disabled = false;
//     menageInput.disabled = false;
//     activitemenageInput.disabled = false;
//     formPaiement.action = `../back/payment.php?price=${
//       total + normal
//     }&id=${id}`;
//   }
// });

// activiteInput.addEventListener("click", function () {
//   if (activiteInput.checked) {
//     activite = 12;
//     count += 1;
//     countBalise.innerHTML = count;
//     count = 1;
//     normalInput.disabled = true;
//     menageInput.disabled = true;
//     activitemenageInput.disabled = true;
//     const li = document.createElement("li");

//     li.classList.add(
//       "list-group-item",
//       "d-flex",
//       "justify-content-between",
//       "lh-sm"
//     );
//     reservationList.appendChild(li);
//     const div = document.createElement("div");
//     li.appendChild(div);
//     li.id = "listt";

//     const h6 = document.createElement("h6");
//     h6.classList.add("my-0");
//     const small = document.createElement("small");
//     small.classList.add("text-muted");

//     div.appendChild(h6);
//     div.appendChild(small);

//     h6.innerHTML = "Activité";
//     small.innerHTML = "Brief description";

//     const spanProduitPrix = document.createElement("span");

//     spanProduitPrix.classList.add("text-muted");
//     spanProduitPrix.innerHTML = activiteInput.value + "€";

//     li.appendChild(spanProduitPrix);
//     total += activite;
//     totalPrice.innerHTML = total;
//     total = productPrice;
//     formPaiement.action = `../back/payment.php?price=${total}&id=${id}`;
//   }
//   if (!activiteInput.checked) {
//     totalPrice.innerHTML = productPrice;
//     let liContainer = document.getElementById("listt");
//     const countBalise = document.getElementById("count");
//     countBalise.innerHTML = 1;
//     liContainer.remove();
//     normalInput.disabled = false;
//     menageInput.disabled = false;
//     activitemenageInput.disabled = false;
//     formPaiement.action = `../back/payment.php?price=${
//       total + activite
//     }&id=${id}`;
//   }
// });

// menageInput.addEventListener("click", function () {
//   if (menageInput.checked) {
//     activite = 12;
//     count += 1;
//     countBalise.innerHTML = count;
//     count = 1;
//     normalInput.disabled = true;
//     activiteInput.disabled = true;
//     activitemenageInput.disabled = true;
//     const li = document.createElement("li");

//     li.classList.add(
//       "list-group-item",
//       "d-flex",
//       "justify-content-between",
//       "lh-sm"
//     );
//     reservationList.appendChild(li);
//     const div = document.createElement("div");
//     li.appendChild(div);
//     li.id = "listt";

//     const h6 = document.createElement("h6");
//     h6.classList.add("my-0");
//     const small = document.createElement("small");
//     small.classList.add("text-muted");

//     div.appendChild(h6);
//     div.appendChild(small);

//     h6.innerHTML = "Mènage";
//     small.innerHTML = "Brief description";

//     const spanProduitPrix = document.createElement("span");

//     spanProduitPrix.classList.add("text-muted");
//     spanProduitPrix.innerHTML = menageInput.value + "€";

//     li.appendChild(spanProduitPrix);
//     total += activite;
//     totalPrice.innerHTML = total;
//     total = productPrice;
//     formPaiement.action = `../back/payment.php?price=${
//       total + activite
//     }&id=${id}`;
//   }
//   if (!menageInput.checked) {
//     totalPrice.innerHTML = productPrice;
//     let liContainer = document.getElementById("listt");
//     const countBalise = document.getElementById("count");
//     countBalise.innerHTML = 1;
//     liContainer.remove();
//     normalInput.disabled = false;
//     activiteInput.disabled = false;
//     activitemenageInput.disabled = false;
//     formPaiement.action = `../back/payment.php?price=${total}&id=${id}`;
//   }
// });

// activitemenageInput.addEventListener("click", function () {
//   if (activitemenageInput.checked) {
//     activite = 20;
//     count += 1;
//     countBalise.innerHTML = count;
//     count = 1;
//     normalInput.disabled = true;
//     activiteInput.disabled = true;
//     menageInput.disabled = true;
//     const li = document.createElement("li");

//     li.classList.add(
//       "list-group-item",
//       "d-flex",
//       "justify-content-between",
//       "lh-sm"
//     );
//     reservationList.appendChild(li);
//     const div = document.createElement("div");
//     li.appendChild(div);
//     li.id = "listt";

//     const h6 = document.createElement("h6");
//     h6.classList.add("my-0");
//     const small = document.createElement("small");
//     small.classList.add("text-muted");

//     div.appendChild(h6);
//     div.appendChild(small);

//     h6.innerHTML = "Activité + Mènage";
//     small.innerHTML = "Brief description";

//     const spanProduitPrix = document.createElement("span");

//     spanProduitPrix.classList.add("text-muted");
//     spanProduitPrix.innerHTML = activitemenageInput.value + "€";

//     li.appendChild(spanProduitPrix);
//     total += activite;
//     totalPrice.innerHTML = total;
//     total = productPrice;
//     formPaiement.action = `../back/payment.php?price=${
//       total + activite
//     }&id=${id}`;
//   }
//   if (!activitemenageInput.checked) {
//     totalPrice.innerHTML = productPrice;
//     let liContainer = document.getElementById("listt");
//     const countBalise = document.getElementById("count");
//     countBalise.innerHTML = 1;
//     liContainer.remove();
//     normalInput.disabled = false;
//     activiteInput.disabled = false;
//     menageInput.disabled = false;
//     formPaiement.action = `../back/payment.php?price=${total}&id=${id}`;
//   }
// });
