<?php
    $baza = mysqli_connect("localhost", "root", "", "gry");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Gry komputerowe</title>
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section id="lewy-blok">
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
            <?php
                $sql = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<li>" . $wiersz["nazwa"] . " <span class='punkty'>" . $wiersz["punkty"] . "</span></li>";
                }
            ?>
        </ul>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonał</h3>
        <p>00000000000</p>
    </section>
    <section id="srodkowy-blok">
        <?php
            $sql = "SELECT id, nazwa, zdjecie FROM gry;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<div class='gra'>";
                echo "<img src='" . $wiersz["zdjecie"] . "' alt='" . $wiersz["nazwa"] . "' title='" . $wiersz["id"] . "'>";
                echo "<p>" . $wiersz["nazwa"] . "</p>";
                echo "</div>";
            }
        ?>
    </section>
    <section id="prawy-blok">
        <h3>Dodaj nową grę</h3>
        <form action="gry.php" method="POST">
            <label for="nazwa">nazwa</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="opis">opis</label>
            <input type="text" name="opis" id="opis">
            <label for="cena">cena</label>
            <input type="text" name="cena" id="cena">
            <label for="zdjecie">zdjęcie</label>
            <input type="text" name="zdjecie" id="zdjecie">
            <button>DODAJ</button>
        </form>
        <?php
            if(isset($_POST["nazwa"])) {
                $nazwa = $_POST["nazwa"];
                $opis = $_POST["opis"];
                $cena = $_POST["cena"];
                $zdjecie = $_POST["zdjecie"];
                $sql = "INSERT INTO gry (nazwa, opis, punkty, cena, zdjecie) VALUES ('$nazwa', '$opis', 0, $cena, '$zdjecie');";
                $zapytanie = mysqli_query($baza, $sql);
            }
        ?>
    </section>
    <footer>
        <form action="gry.php" method="POST">
            <input type="text" name="id" id="tekst">
            <button>Pokaż opis</button>
        </form>
        <?php
            if(isset($_POST["id"])) {
                $id = $_POST["id"];
                $sql = "SELECT nazwa, LEFT(opis, 100), punkty, cena FROM gry WHERE id = $id;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_row($zapytanie)) {
                    echo "<h2>" . $wiersz[0] . ", " . $wiersz[2] . " punktów," . $wiersz[3] . " zł</h2>";
                    echo "<p>" . $wiersz[1] . "</p>";
                }
            }
        ?>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>