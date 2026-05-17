<?php
    $baza = mysqli_connect("localhost", "root", "", "szachy");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>KOŁO SZACHOWE</title>
</head>
<body>
    <header>
        <h2>Koło szachowe <em>gambit piona</em></h2>
    </header>
    <section id="lewy-blok">
        <h4>Polecane linki</h4>
        <ul>
            <li>
                <a href="kw1.png">kwerenda1</a>
            </li>
            <li>
                <a href="kw2.png">kwerenda2</a>
            </li>
            <li>
                <a href="kw3.png">kwerenda3</a>
            </li>
            <li>
                <a href="kw4.png">kwerenda4</a>
            </li>
        </ul>
        <img src="logo.png" alt="Logo koła">
    </section>
    <section id="prawy-blok">
        <h3>Najlepsi gracze naszego koła</h3>
        <table>
            <tr>
                <th>Pozycja</th>
                <th>Pseudonim</th>
                <th>Tytuł</th>
                <th>Ranking</th>
                <th>Klasa</th>
            </tr>
            <?php
                $pozycja = 1;
                $sql = "SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 ORDER BY ranking DESC;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<tr>";
                    echo "<td>" . $pozycja . "</td>";
                    echo "<td>" . $wiersz["pseudonim"] . "</td>";
                    echo "<td>" . $wiersz["tytul"] . "</td>";
                    echo "<td>" . $wiersz["ranking"] . "</td>";
                    echo "<td>" . $wiersz["klasa"] . "</td>";
                    echo "</tr>";
                    $pozycja += 1;
                }
            ?>
        </table>
        <form action="szachy.php" method="POST">
            <button>Losuj nową parę graczy</button>
        </form>
        <?php
                $sql = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                $zapytanie = mysqli_query($baza, $sql);
                $rekord1 = mysqli_fetch_row($zapytanie);
                $rekord2 = mysqli_fetch_row($zapytanie);
                echo "<h4>";
                echo $rekord1[0];
                echo " ";
                echo $rekord1[1];
                echo " ";
                echo $rekord2[0];
                echo " ";
                echo $rekord2[1];
                echo "</h4>";
            ?>  
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>