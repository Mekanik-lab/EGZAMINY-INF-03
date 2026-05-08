<?php
    $baza = mysqli_connect("localhost", "root", "", "firma");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="baner.jpg" alt="Szkolenia">
    </header>
    <nav>
        <ul>
            <li>
                <a href="index.html">Strona główna</a>
            </li>
            <li>
                <a href="szkolenia.php">Szkolenia</a>
            </li>
        </ul>
    </nav>
    <main>
        <?php
            $sql = "SELECT Data, Temat FROM szkolenia ORDER BY Data ASC;";
            $zapytanie = mysqli_query($baza, $sql);
            $plik = fopen("harmonogram.txt", "w");
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                $linia = $wiersz["Data"] . " " . $wiersz["Temat"] . PHP_EOL;
                echo "<p>" . $wiersz["Data"] . " " . $wiersz["Temat"] . "</p>";
                fwrite($plik, $linia);
            }
            fclose($plik);
        ?>
    </main>
    <footer>
        <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
        <p>Autor: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>
