<?php
    $baza = mysqli_connect("localhost", "root", "", "obuwie");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>
    <main>
        <h2>Zamówienie</h2>
        <?php
            $model = $_POST["model"];
            $liczbaPar = $_POST["liczbaPar"];
            $sql = "SELECT nazwa, cena, kolor, kod_produktu, material, nazwa_pliku FROM buty INNER JOIN produkt ON buty.model = produkt.model WHERE buty.model = '$model';";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<img src='" . $wiersz["nazwa_pliku"] . "' alt='but męski'>";
                echo "<h2>" . $wiersz["nazwa"] . "</h2>";
                $wartoscCalkowita = $liczbaPar * $wiersz["cena"];
                echo "<p>cena za " . $liczbaPar . " par: " . $wartoscCalkowita . " zł</p>";
            }
        ?>
        <a href="index.php">Strona główna</a>
    </main>
    <footer>
        <p>Autor strony: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>