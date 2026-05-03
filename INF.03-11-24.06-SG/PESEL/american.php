<?php
    $baza = mysqli_connect("localhost", "root", "", "hodowla");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <nav>
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>
    <aside>
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <?php
                $sql = "SELECT rasa FROM rasy;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<li>" . $wiersz["rasa"] . "</li>";
                }
            ?>
        </ol>
    </aside>
    <main>
        <img src="american.jpg" alt="Świnka morska rasy american">
        <?php
            $sql = "SELECT DISTINCT data_ur, miot, rasa FROM swinki INNER JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy.id = 6;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<h2>Rasa: " . $wiersz["rasa"] . "</h2>";
                echo "<p>Data urodzenia: " . $wiersz["data_ur"] . "</p>";
                echo "<p>Oznaczenie miotu: " . $wiersz["miot"] . "</p>";
            }
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <?php
            $sql = "SELECT imie, cena, opis FROM swinki WHERE id = 6;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<h3>" . $wiersz["imie"] . " - " . $wiersz["cena"] . "</h3>";
                echo "<p>" . $wiersz["opis"] . "</p>";
            }
        ?>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>