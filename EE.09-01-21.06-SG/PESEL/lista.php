<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Portal Społecznościowy - moje konto</h1>
    </header>
    <main>
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <?php
            $baza = mysqli_connect('localhost', 'root', '', 'dane');
            $sql = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2, 6);";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<div class='zdjecie'><img src='" . $wiersz['zdjecie'] ."' alt='przyjaciel'></div>" . 
                "<div class='opis'><h3>" . $wiersz['imie'] . " " . $wiersz['nazwisko'] . "</h3><p>Ostatni wpis: " . $wiersz['opis'] ."</p></div>" . 
                "<div class='linia'><hr></div>";
            }
        ?>
    </main>
    <footer>
        <section id="pierwszy-stopka">
            Stronę wykonał: 00000000000
        </section>
        <section id="drugi-stopka">
            <a href="mailto:ja@portal.pl">napisz do mnie</a>
        </section>
    </footer>
</body>
</html>