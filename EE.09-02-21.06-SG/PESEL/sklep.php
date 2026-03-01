<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <section id='lewy-baner'>
            <h1>Internetowy sklep z eko-warzywami</h1>
        </section>
        <section id='prawy-baner'>
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl/" target='blank'>soki</a></li>
            </ol>
        </section>
    </header>
    <main>
        <?php
            $baza = mysqli_connect('localhost', 'root', '', 'dane2');
            $sql = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM produkty WHERE Rodzaje_id IN (1,2);";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<div class='produkt'>
                <img src='" . $wiersz['zdjecie'] ."' alt='warzywniak'>" .
                "<h5>" . $wiersz['nazwa'] ."</h5>" .
                "<p>opis: " . $wiersz['opis'] ."</p>" .
                "<p>na stanie: " . $wiersz['ilosc'] ."</p>" .
                "<h2>" . $wiersz['cena'] ." zł</h2>" .
                "</div>";
            }
        ?>
    </main>
    <footer>
        <form action="" method="POST">
            <label for="nazwa">Nazwa:</label>
            <input type="text" id='nazwa' name='nazwa'>
            <label for="cena">Cena:</label>
            <input type="text" id='cena' name='cena'>
            <button>Dodaj produkt</button>
        </form>
        <?php
            if (isset($_POST['nazwa']) && isset($_POST['cena']))
            {
                $nazwa = $_POST['nazwa'];
                $cena = $_POST['cena'];
                $sql = "INSERT INTO produkty VALUES (NULL, 1, 4, '$nazwa', 10, '', $cena, 'owoce.jpg');";
                $zapytanie = mysqli_query($baza, $sql);
            }
        ?>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>