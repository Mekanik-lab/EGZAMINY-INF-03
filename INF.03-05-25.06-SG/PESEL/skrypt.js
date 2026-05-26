function dodajDoKoszyka() {
    const obraz = document.getElementById("obraz").files[0];
    const liczbaKopii = Number(document.getElementById("liczba-kopii").value);
    const papierBlyszczacy = document.getElementById("papier-blyszczacy").checked;
    const papierMatowy = document.getElementById("papier-matowy").checked;
    const cenaPapieruBlyszczacego = 1.5;
    const cenaPapieruMatowego = 2;
    const blokWynikowy = document.getElementById("wynik-skryptu");
    let cena = 0;

    if (!obraz) {
        alert("Wybierz obraz");
        return;
    }

    if(papierBlyszczacy) {
        cena = liczbaKopii * cenaPapieruBlyszczacego;
    } else if(papierMatowy) {
        cena = liczbaKopii * cenaPapieruMatowego;
    }

    const obrazElement = document.createElement("img");
    obrazElement.src = URL.createObjectURL(obraz);
    const paragrafLiczbaKopiiElement = document.createElement("p");
    paragrafLiczbaKopiiElement.textContent = "Liczba kopii: " + liczbaKopii;
    const paragrafCenaElement = document.createElement("p");
    paragrafCenaElement.textContent = "Cena: " + cena;
    blokWynikowy.appendChild(obrazElement);
    blokWynikowy.appendChild(paragrafLiczbaKopiiElement);
    blokWynikowy.appendChild(paragrafCenaElement);
}