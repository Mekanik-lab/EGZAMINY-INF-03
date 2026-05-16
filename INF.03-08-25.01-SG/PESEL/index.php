<?php
    $baza = mysqli_connect("localhost", "root", "", "mieszalnia");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <title>Mieszalnia farb</title>
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>
    <form action="index.php" method="POST">
        <label for="data-od">Data odbioru od: </label>
        <input type="date" name="data-od" id="data-od">
        <label for="data-do">do: </label>
        <input type="date" name="data-do" id="data-do">
        <button>Wyszukaj</button>
    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data odbioru</th>
            </tr>
            <?php
                if(isset($_POST["data-od"]) && isset($_POST["data-do"])) {
                    $dataOd = $_POST["data-od"];
                    $dataDo = $_POST["data-do"];
                    $sql = "SELECT Nazwisko, Imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci INNER JOIN zamowienia ON klienci.Id = zamowienia.id_klienta WHERE data_odbioru >= '$dataOd' AND data_odbioru <= '$dataDo';";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_row($zapytanie)) {
                        echo "<tr>";
                        echo "<td>" . $wiersz[2] . "</td>";
                        echo "<td>" . $wiersz[0] . "</td>";
                        echo "<td>" . $wiersz[1] . "</td>";
                        echo "<td style='background-color: #" . $wiersz[3] . "'>" . $wiersz[3] . "</td>";
                        echo "<td>" . $wiersz[4] . "</td>";
                        echo "<td>" . $wiersz[5] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    $sql = "SELECT Nazwisko, Imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci INNER JOIN zamowienia ON klienci.Id = zamowienia.id_klienta ORDER BY data_odbioru ASC;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_row($zapytanie)) {
                        echo "<tr>";
                        echo "<td>" . $wiersz[2] . "</td>";
                        echo "<td>" . $wiersz[0] . "</td>";
                        echo "<td>" . $wiersz[1] . "</td>";
                        echo "<td style='background-color: #" . $wiersz[3] . "'>" . $wiersz[3] . "</td>";
                        echo "<td>" . $wiersz[4] . "</td>";
                        echo "<td>" . $wiersz[5] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <p>Autor: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>