function wyslij() {
    const chat = document.getElementById("chat");
    const wiadomosc = document.getElementById("wiadomosc").value;
    const kontenerJolanta = document.createElement("div");
    kontenerJolanta.classList.add("wypowiedz");
    kontenerJolanta.classList.add("jolanta");
    const zdjecie = document.createElement("img");
    zdjecie.src = "Jolka.jpg";
    const wiadomoscKontener = document.createElement("p");
    wiadomoscKontener.textContent = wiadomosc;
    kontenerJolanta.appendChild(zdjecie);
    kontenerJolanta.appendChild(wiadomoscKontener);
    chat.appendChild(kontenerJolanta);

    chat.scrollTop = chat.scrollHeight; 
    wiadomosc.value = '';
}

function generujLosowaOdpowiedz() {
    const odpowiedzi = [
        "Świetnie!",
        "Kto gra główną rolę?",
        "Lubisz filmy Tego reżysera?",
        "Będę 10 minut wcześniej",
        "Może kupimy sobie popcorn?",
        "Ja wolę Colę",
        "Zaproszę jeszcze Grześka",
        "Tydzień temu też byłem w kinie na Diunie",
        "Ja funduję bilety"
    ];

    const wylosowanaOdpowiedz = odpowiedzi[Math.floor(Math.random() * odpowiedzi.length)];
    
    const chat = document.getElementById("chat");
    const kontenerKrzysztof = document.createElement("div");
    kontenerKrzysztof.classList.add("wypowiedz");
    kontenerKrzysztof.classList.add("krzysztof");
    const zdjecie = document.createElement("img");
    zdjecie.src = "Krzysiek.jpg";
    const wiadomoscKontener = document.createElement("p");
    wiadomoscKontener.textContent = wylosowanaOdpowiedz;
    kontenerKrzysztof.appendChild(zdjecie);
    kontenerKrzysztof.appendChild(wiadomoscKontener);
    chat.appendChild(kontenerKrzysztof);

    chat.scrollTop = chat.scrollHeight; 
}