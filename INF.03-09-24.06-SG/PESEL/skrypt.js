let zdjencieIndex = 1;

function poprzednie() {
    zdjencieIndex = zdjencieIndex - 1;
    if(zdjencieIndex < 1) {
        zdjencieIndex = 7;
    }

    aktualizacja();
}

function kolejne() {
    zdjencieIndex = zdjencieIndex + 1;
    if(zdjencieIndex > 7) {
        zdjencieIndex = 1;
    }

    aktualizacja();
}

function aktualizacja() {
    const zdjecie = document.querySelector('#srodkowy img');
    zdjecie.src = zdjencieIndex + ".jpg";
}