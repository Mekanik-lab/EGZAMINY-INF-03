<?php
    $baza = mysqli_connect("localhost", "root", "", "matura");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Matura</title>
</head>
<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>
    <aside>
        <img src="ma.jpg" alt="Matura">
        <img src="tu.jpg" alt="Matura">
        <img src="ra.jpg" alt="Matura">
    </aside>
    <section id="pierwsza-sekcja">
        <h3>Wybierz ucznia z listy:</h3>
        <?php
            $sql = "SELECT id, imie, nazwisko FROM maturzysta WHERE szkola = 'T3' ORDER BY nazwisko ASC;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                $id = $wiersz["id"];
                $imie = $wiersz["imie"];
                $nazwisko = $wiersz["nazwisko"];
                echo "<a href='wynik.php?id=$id&imie=$imie&nazwisko=$nazwisko'>$id. $imie $nazwisko</a><br>";
            }
        ?>
    </section>
    <section id="druga-sekcja">
        <div class="blok">
            <h4>Przedmioty</h4>
            <?php
                $sql = "SELECT DISTINCT przedmiot FROM arkusz;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_row($zapytanie)) {
                    echo $wiersz[0] . " ";
                }
            ?>
        </div>
        <div class="blok">
            <h4>Lata</h4>
            <?php
                $sql = "SELECT MAX(rok), MIN(rok) FROM arkusz;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_row($zapytanie)) {
                    echo $wiersz[1] . " - " . $wiersz[0];
                }
            ?>
        </div>
        <div class="blok">
            <h4>Najlepszy wynik</h4>
            <?php
                $sql = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM wynik GROUP BY maturzysta_id ORDER BY Wynik DESC LIMIT 1;";
                $zapytanie = mysqli_query($baza, $sql);
                $wiersz = mysqli_fetch_row($zapytanie);
                echo $wiersz[1] . "%";
            ?>
        </div>
        <div class="blok">
            <h4>Najgorszy wynik</h4>
            <?php
                $sql = "SELECT maturzysta_id, AVG(punkty) AS 'Wynik' FROM wynik GROUP BY maturzysta_id ORDER BY Wynik ASC LIMIT 1;";
                $zapytanie = mysqli_query($baza, $sql);
                $wiersz = mysqli_fetch_row($zapytanie);
                echo $wiersz[1] . "%";
            ?>
        </div>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>