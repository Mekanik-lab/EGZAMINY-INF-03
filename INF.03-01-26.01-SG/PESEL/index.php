<?php
    $baza = mysqli_connect("localhost", "root", "", "samochody");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Konfigurator samochodów</title>
</head>
<body>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>
    <main>
        <section id="lewy-blok">
            <table>
                <?php
                    $sql = "SELECT marka, model, cena, nazwa, doplata FROM pojazdy INNER JOIN kolory ON pojazdy.kolor = kolory.id WHERE model = 'alfa';";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        $cenaCalkowita = $wiersz["cena"] + $wiersz["doplata"];
                        echo "<tr>";
                        echo "<td>" . $wiersz["marka"] . "</td>";
                        echo "<td>" . $wiersz["model"] . "</td>";
                        echo "<td>" . $wiersz["nazwa"] . "</td>";
                        echo "<td>" . $cenaCalkowita . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </section>
        <section id="srodkowy-blok">
            <table>
                <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th>Cena</th>
                </tr>
                <?php
                    $sql = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";
                    $zapytanie = mysqli_query($baza, $sql);
                    $nr = 1;

                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {

                        echo "<tr>";
                        echo "<td colspan='3'><img src='a" . $nr . ".jpg' alt='Konfiguracja " . $nr . "'></td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                        echo "<td>Marka</td>";
                        echo "<td>" . $wiersz["marka"] . "</td>";
                        echo "<td rowspan='2'>" . $wiersz["cena"] . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>Model</td>";
                        echo "<td>" . $wiersz["model"] . "</td>";
                        echo "</tr>";
                        $nr++;
                    }
                ?>
            </table>
        </section>
        <section id="prawy-blok">
            <h3>111 222 444</h3>
            <img src="a3.png" alt="Samochód">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>