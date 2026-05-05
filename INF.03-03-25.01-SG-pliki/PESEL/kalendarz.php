<?php
    $baza = mysqli_connect("localhost", "root", "", "kalendarz")
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <section id="napis">
        <p>
            <?php
                $miesiac = date("m-d");
                $dzien = date("l");
                $dni = array(
                    'Monday'    => 'poniedziałek',
                    'Tuesday'   => 'wtorek',
                    'Wednesday' => 'środa',
                    'Thursday'  => 'czwartek',
                    'Friday'    => 'piątek',
                    'Saturday'  => 'sobota',
                    'Sunday'    => 'niedziela'
                );

                $sql = "SELECT imiona FROM imieniny WHERE data LIKE '$miesiac';";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<p>Dzisiaj jest " . $dni[$dzien] . ", " . date("d-m-y") . ", imieniny: " . $wiersz["imiona"] . "</p>";
                }
            ?>
        </p>
    </section>
    <section id="lewy">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>październik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>
    <section id="srodkowy">
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="kalendarz.php" method="POST">
            <input type="date" name="data" id="data" min="2024-01-01" max="2024-12-31" require>
            <button>Wyślij</button>
        </form>
        <?php
            if (isset($_POST["data"])) {
                $data = $_POST["data"];
                $sformatowanaData = date("m-d", strtotime($data));

                $sql = "SELECT imiona FROM imieniny WHERE data LIKE '$sformatowanaData';";
                $zapytanie = mysqli_query($baza, $sql);
                while ($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    $imiona = $wiersz["imiona"];
                }

                echo "Dnia " . $data . " są imieniny: " . $imiona;
            }
        ?>
    </section>
    <section id="prawy">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank">
            <img src="kalendarz.gif" alt="Kalendarz Majów">
        </a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>
                słoneczny
                <ul>
                    <li>kalendarz Majów</li>
                    <li>juliański</li>
                    <li>gregoriański</li>
                </ul>
            </li>
            <li>
                księżycowy
                <ul>
                    <li>starogrecki</li>
                    <li>babiloński</li>
                </ul>
            </li>
        </ol>
    </section>
    <footer>
        <p>Stronę opracował(a): 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>