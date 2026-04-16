<?php
    $baza = mysqli_connect("localhost", "root", "", "kupauto");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><i>KupAuto!</i> Internetowy Komis Samochodowy</h1>
    </header>
    <section id="pierwszy-blok-glowny">
        <?php
            $sql = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM samochody WHERE id = 10;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<img src='" . $wiersz["zdjecie"] ."'alt='oferta dnia'>";
                echo "<h4>Oferta Dnia: Toyota " . $wiersz["model"] ."</h4>";
                echo "<p>Rocznik: " . $wiersz["rocznik"] . ", przebieg: " . $wiersz["przebieg"] . ", rodzaj paliwa: " . $wiersz["paliwo"] . "</p>";
                echo "<h4>Cena: " . $wiersz["cena"] . "</h4>";
            }   
        ?>
    </section>
    <section id="drugi-blok-glowny">
        <h2>Oferty Wyróżnione</h2>
        <?php
            $sql = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM marki INNER JOIN samochody ON marki.id = samochody.marki_id WHERE samochody.wyrozniony = 1 LIMIT 4;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<div class='oferta'>";
                echo "<img src='" . $wiersz["zdjecie"] . "'alt=" . $wiersz["model"] . ">";
                echo "<h4>" . $wiersz["nazwa"] . " " . $wiersz["model"] . "</h4>";
                echo "<p>Rocznik: " . $wiersz["rocznik"] . "</p>";
                echo "<h4>Cena: " . $wiersz["cena"] . "</h4>";
                echo "</div>";
            }
        ?>
    </section>
    <section id="trzeci-blok-glowny">
        <h2>Wybierz markę</h2>
        <form action="KupAuto.php" method="POST">
            <select name="marka" id="marka">
                <?php
                    $sql = "SELECT nazwa FROM marki;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<option value=" . $wiersz["nazwa"] . ">" . $wiersz["nazwa"] . "</option>";
                    }
                ?>
            </select>
            <button type="submit">Wyszukaj</button>
        </form>
        <?php
            if(isset($_POST["marka"])) {
                $marka = $_POST["marka"];
                $sql = "SELECT samochody.model, samochody.cena, samochody.zdjecie FROM samochody INNER JOIN marki ON marki.id = samochody.marki_id WHERE marki.nazwa = '$marka';";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<div class='oferta'>";
                    echo "<img src='" . $wiersz["zdjecie"] . "'alt=" . $wiersz["model"] . ">";
                    echo "<h4>" . $marka . " " . $wiersz["model"] . "</h4>";
                    echo "<h4>Cena: " . $wiersz["cena"] . "</h4>";
                    echo "</div>";
                }
            }
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>