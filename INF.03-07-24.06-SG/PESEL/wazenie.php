<?php
    $baza = mysqli_connect("localhost", "root", "", "wazenietirow");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="pierwszy-baner">
        <h1>Ważenie pojazdów we Wrocławiu</h1>
    </section>
    <section id="drugi-baner">
        <img src="obraz1.png" alt="waga">
    </section>
    <section id="lewy">
        <h2>Lokalizacje wag</h2>
        <ol>
            <?php
                $sql = "SELECT ulica FROM lokalizacje;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<li>" . $wiersz["ulica"] . "</li>";
                }
            ?>
        </ol>
        <h2>Kontakt</h2>
        <a href="mailto:wazenie@wroclaw.pl">napisz</a>
    </section>
    <section id="srodkowy">
        <h2>Alerty</h2>
        <table>
            <tr>
                <th>rejestracja</th>
                <th>ulica</th>
                <th>waga</th>
                <th>dzień</th>
                <th>czas</th>
            </tr>
            <?php
                $sql = "SELECT wagi.rejestracja, wagi.waga, wagi.dzien, wagi.czas, lokalizacje.ulica FROM wagi INNER JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE wagi.waga > 5;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<tr>";
                    echo "<td>" . $wiersz["rejestracja"] ."</td>";
                    echo "<td>" . $wiersz["ulica"] ."</td>";
                    echo "<td>" . $wiersz["waga"] ."</td>";
                    echo "<td>" . $wiersz["dzien"] ."</td>";
                    echo "<td>" . $wiersz["czas"] ."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <?php
            $sql = "INSERT INTO wagi (lokalizacje_id, waga, rejestracja, dzien, czas) VALUES (5, FLOOR(1 + RAND() * 10), 'DW12345', CURRENT_DATE, CURRENT_TIME);";
            $zapytanie = mysqli_query($baza, $sql);
            header("Refresh: 10");
        ?>
    </section>
    <section id="prawy">
        <img src="obraz2.jpg" alt="tir" id="tir">
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>