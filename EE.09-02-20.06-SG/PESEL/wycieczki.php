<?php
$baza = mysqli_connect('localhost', 'root', '', 'egzamin3');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <section id="lewy">
        <h2>KONTAKT</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 555666777</p>
    </section>
    <section id="srodkowy">
        <h2>GALERIA</h2>
        <?php
        $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC;";
        $zapytanie = mysqli_query($baza, $sql);
        while($wiersz = mysqli_fetch_assoc($zapytanie))
        {
            echo "<img src='" . $wiersz['nazwaPliku'] . "' alt='" . $wiersz['podpis'] . "'>"; 
        }
        ?>
    </section>
    <section id="prawy">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesień</td>
                <td>Grupa 4+</td>
                <td>Grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </section>
    <main id="dane">
        <h2>LISTA WYCIECZEK</h2>
        <?php
        $sql = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = TRUE;";
        $zapytanie = mysqli_query($baza, $sql);
        while($wiersz = mysqli_fetch_assoc($zapytanie))
        {
            echo $wiersz['id'] . ". " . $wiersz['dataWyjazdu']
            . ", " . $wiersz['cel'] . ", " . $wiersz['cena'] . "<br>";
        }

        mysqli_close($baza);
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>