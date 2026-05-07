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
        <form action="zamow.php" method="POST">
            <label for="model">Model: </label>
            <select name="model" id="model" class="kontrolki">
                <?php
                    $sql = "SELECT model FROM produkt;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<option value='" . $wiersz["model"] . "'>" . $wiersz["model"] . "</option>";
                    }
                ?>
            </select>
            <label for="rozmiar">Rozmiar: </label>
            <select name="rozmiar" id="rozmiar" class="kontrolki">
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
            </select>
            <label for="liczbaPar">Liczba par: </label>
            <input type="number" name="liczbaPar" id="liczbaPar" class="kontrolki">
            <button class="kontrolki">Zamów</button>
        </form>
        <?php
            $sql = "SELECT buty.model, nazwa, cena, nazwa_pliku FROM buty INNER JOIN produkt ON buty.model = produkt.model;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<div class='buty'>";
                echo "<img src='" . $wiersz["nazwa_pliku"] . "' alt='but męski'>";
                echo "<h2>" . $wiersz["nazwa"] . "</h2>";
                echo "<h5>Model: " . $wiersz["model"] . "</h5>";
                echo "<h4>Cena: " . $wiersz["cena"] . "</h4>";
                echo "</div>";
            }
        ?>
    </main>
    <footer>
        <p>Autor strony: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>