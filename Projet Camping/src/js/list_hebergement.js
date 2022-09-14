const rangeNbrPersValue = document.getElementById("rangeNbrPersValue");
const customRange2 = document.getElementById("customRange2");
customRange2.value = 1;
rangeNbrPersValue.innerHTML = 1;
customRange2.innerHTML = customRange2.value;

// use 'change' instead to see the difference in response
customRange2.addEventListener(
  "input",
  function () {
    rangeNbrPersValue.innerHTML = customRange2.value;
  },
  false
);

const rangePrixValue = document.getElementById("rangePrixValue");
const customRange3 = document.getElementById("customRange3");
customRange3.value = 1;
rangePrixValue.innerHTML = 1;
rangePrixValue.innerHTML = customRange3.value;

// use 'change' instead to see the difference in response
customRange3.addEventListener(
  "input",
  function () {
    rangePrixValue.innerHTML = customRange3.value;
  },
  false
);

const rangePrixValueMax = document.getElementById("rangePrixValueMax");
const customRange4 = document.getElementById("customRange4");
customRange4.value = 1;
rangePrixValueMax.innerHTML = 1;
rangePrixValueMax.innerHTML = customRange4.value;

// use 'change' instead to see the difference in response
customRange4.addEventListener(
  "input",
  function () {
    rangePrixValueMax.innerHTML = customRange4.value;
  },
  false
);
