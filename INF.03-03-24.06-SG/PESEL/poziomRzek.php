<?php
    $baza = mysqli_connect("localhost", "root", "", "rzeki");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="pierwszy-baner">
        <img src="obraz1.png" alt="Mapa Polski">
    </section>
    <section id="drugi-baner">
        <h1>Rzeki w województwie dolnośląskim</h1>
    </section>
    <nav>
        <form action="poziomRzek.php" method="POST">
            <input type="radio" name="stanWody" id="wszystkie" value="wszystkie">
            <label for="wszystkie" class="etykieta">Wszystkie</label>
            <input type="radio" name="stanWody" id="ponad-stan-ostrzegwaczy" value="ostrzegawczy">
            <label for="ponad-stan-ostrzegwaczy" class="etykieta">Ponad stan ostrzegawczy</label>
            <input type="radio" name="stanWody" id="ponad-stan-alarmowy" value="alarmowy">
            <label for="ponad-stan-alarmowy" class="etykieta">Ponad stan alarmowy</label>
            <button type="submit">Pokaż</button>
        </form>
    </nav>
    <section id="lewy-blok">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
            </tr>
            <?php
                if(isset($_POST["stanWody"])) {
                    $stanWody = $_POST["stanWody"];

                    if($stanWody === "wszystkie") {
                        $sql = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05';";
                    } else if($stanWody === "ostrzegawczy") {
                        $sql = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanOstrzegawczy;";
                    } else if($stanWody === "alarmowy") {
                        $sql = "SELECT wodowskazy.nazwa, wodowskazy.rzeka, wodowskazy.stanOstrzegawczy, wodowskazy.stanAlarmowy, pomiary.stanWody FROM wodowskazy INNER JOIN pomiary ON wodowskazy.id = pomiary.wodowskazy_id WHERE pomiary.dataPomiaru = '2022-05-05' AND pomiary.stanWody > wodowskazy.stanAlarmowy;";
                    }

                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>";
                        echo "<td>" . $wiersz["nazwa"] . "</td>";
                        echo "<td>" . $wiersz["rzeka"] . "</td>";
                        echo "<td>" . $wiersz["stanOstrzegawczy"] . "</td>";
                        echo "<td>" . $wiersz["stanAlarmowy"] . "</td>";
                        echo "<td>" . $wiersz["stanWody"] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </section>
    <section id="prawy-blok">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php
            $sql = "SELECT dataPomiaru, AVG(stanWody) FROM pomiary GROUP BY dataPomiaru;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_row($zapytanie)) {
                echo "<p>" . $wiersz[0] . ": ". $wiersz[1] ."</p>";
            }
        ?>
        <a href="https://komunikaty.pl">Dowiedz się więcej</a>
        <img src="obraz2.jpg" alt="rzeka">
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>