const listaZadan = document.querySelector("main ul");
const dodajZadanie = document.getElementById("dodajZadanie");
const nazwaZadania = document.getElementById("nazwaZadania");

function oznaczJakoWykonane(event) {
   const elementListy = event.currentTarget.closest("li");
   if (elementListy) {
        elementListy.style.textDecoration = "line-through";
   }
}

listaZadan.querySelectorAll("button").forEach((przycisk) => {
    przycisk.addEventListener("click", oznaczJakoWykonane);
})

function dodajZadanieDoListy() {
    const nowyElement = document.createElement("li");
    const nowyPrzycisk = document.createElement("button");

    nowyElement.textContent = nazwaZadania.value + " ";
    nowyPrzycisk.type = "button";
    nowyPrzycisk.textContent = "Wykonane";
    nowyPrzycisk.addEventListener("click", oznaczJakoWykonane);

    nowyElement.appendChild(nowyPrzycisk);
    listaZadan.appendChild(nowyElement);
}

dodajZadanie.addEventListener("click", dodajZadanieDoListy);