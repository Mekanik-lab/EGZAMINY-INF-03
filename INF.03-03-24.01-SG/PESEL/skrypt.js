function przeslij()
{
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    let email = document.getElementById("email").value;
    let trescZgloszenia = document.getElementById("zgloszenie").value;
    let czyRegulaminZaznaczony = document.getElementById("regulamin").checked;

    if (!czyRegulaminZaznaczony)
    {
        document.getElementById("wynik").innerHTML = "<p style='color: red'>Musisz zapoznać się z regulaminem</p>";
    } else {
        document.getElementById("wynik").innerHTML = `<p>${imie.toUpperCase()} ${nazwisko.toUpperCase()}<br> Teść Twojej Sprawy: ${trescZgloszenia}</p>`;
    }
}

function resetuj()
{
    document.getElementById("imie").value = "";
    document.getElementById("nazwisko").value = "";
    document.getElementById("email").value = "";
    document.getElementById("zgloszenie").value = "";
}