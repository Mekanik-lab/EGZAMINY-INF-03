<?php
    $baza = mysqli_connect("localhost", "root", "", "konkurs");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>WOLONTARIAT SZKOLNY</title>
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <section id="lewy-blok">
        <h3>Konkursowe nagrody</h3>
        <button onclick="location.reload()">Losuj nowe nagrody</button>
        <table>
            <thead>
                <tr>
                    <th>Nr</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Wartość</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                    $zapytanie = mysqli_query($baza, $sql);
                    $numer = 1;
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>";
                        echo "<td>" . $numer . "</td>";
                        echo "<td>" . $wiersz["nazwa"] . "</td>";
                        echo "<td>" . $wiersz["opis"] . "</td>";
                        echo "<td>" . $wiersz["cena"] . "</td>";
                        echo "</tr>";
                        $numer += 1;
                    }
                ?>
            </tbody>
        </table>
    </section>
    <section id="prawy-blok">
        <img src="puchar.png" alt="Puchar dla wolontariusza">
        <h4>Polecane linki</h4>
        <ul>
            <li>
                <a href="kw1.png">Kwerenda1</a>
            </li>
            <li>
                <a href="kw2.png">Kwerenda2</a>
            </li>
            <li>
                <a href="kw3.png">Kwerenda3</a>
            </li>
            <li>
                <a href="kw4.png">Kwerenda4</a>
            </li>
        </ul>
    </section>
    <footer>
        <p>Numer zdającego: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>