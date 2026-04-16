<?php 
    $baza = mysqli_connect("localhost", "root", "", "galeria");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <section id="lewy-blok">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </section>
    <section id="srodkowy-blok">
        <?php
            $sql = "SELECT zdjecia.plik, zdjecia.tytul, zdjecia.polubienia, autorzy.imie, autorzy.nazwisko FROM zdjecia INNER JOIN autorzy ON zdjecia.autorzy_id = autorzy.id ORDER BY autorzy.nazwisko ASC;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<div class='zdjecie'>";
                echo "<img src =" . $wiersz["plik"] . " alt='zdjęcie'>";
                echo "<h3>" . $wiersz["tytul"] ."</h3>";
                if($wiersz["polubienia"] > 40) {
                    echo "<p>Autor: " . $wiersz["imie"] . " " . $wiersz["nazwisko"] . ". Wiele osób polubiło ten obraz</p>";
                } else {
                    echo "<p>Autor: " . $wiersz["imie"] . " " . $wiersz["nazwisko"] . "</p>";
                }
                echo "<a href=" . $wiersz["plik"] ." download>Pobierz</a>";
                echo "</div>";
            }
        ?>
    </section>
    <section id="prawy-blok">
        <h2>Najbardziej lubiane</h2>
        <?php
            $sql = "SELECT tytul, plik FROM zdjecia WHERE polubienia >= 100;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<img src=" . $wiersz["plik"] ." alt=" . $wiersz["tytul"] .">";
            }
        ?>
        <strong>Zobacz wszystkie nasze zdjęcia</strong>
    </section>
    <footer>
        <h5>Stronę wykonał: 00000000000</h5>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>