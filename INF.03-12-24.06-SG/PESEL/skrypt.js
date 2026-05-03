function zastosujFiltr() {
    const blur = document.getElementById("blur").checked;
    const sepia = document.getElementById("sepia").checked;
    const negatyw = document.getElementById("negatyw").checked;
    const obraz = document.getElementById("obraz-pszczola");

    if (blur) {
        obraz.style.filter = "blur(6px)";
    } else if (sepia) {
        obraz.style.filter = "sepia(100%)";
    } else if (negatyw) {
        obraz.style.filter = "invert(100%)";
    }
}

function kolorowy() {
    const obraz = document.getElementById("obraz-pomarancza");
    obraz.style.filter = "none";
}

function czarnoBialy() {
    const obraz = document.getElementById("obraz-pomarancza");
    obraz.style.filter = "grayscale(100%)";
}

function przezroczystosc() {
    const obraz = document.getElementById("obraz-owoce");
    const poziomPrzezroczystosci = document.getElementById("przezroczystosc").value;

    obraz.style.filter = `opacity(${poziomPrzezroczystosci}%)`;
}

function jasnosc() {
    const obraz = document.getElementById("zolw");
    const poziomJasnosci = document.getElementById("jasnosc").value;

    obraz.style.filter = `brightness(${poziomJasnosci}%)`;
}