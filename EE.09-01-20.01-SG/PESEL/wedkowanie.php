<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klub wędkowania</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h2>Wędkuj z nami!</h2>
    </header>
    <section id="lewy">
        <img src="ryba2.jpg" alt="Szczupak">
    </section>
    <section id="prawy">
        <h3>
            Ryby spokojnego żeru (białe)
        </h3>
        <?php
        $baza = mysqli_connect('localhost', 'root', '', 'wedkowanie');
        $sql = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2;";
        $zapytanie = mysqli_query($baza, $sql);
        while($wiersz = mysqli_fetch_assoc($zapytanie))
        {
            echo $wiersz['id']. ". " . $wiersz['nazwa'] . ", występuje w :" . $wiersz['wystepowanie'] . "<br>";
        }

        mysqli_close($baza);
        ?>
        <br>
        <ol>
            <li><a href=" https://wedkuje.pl" target="blank">Odwiedź także</a></li>
            <li><a href=" http://www.pzw.org.pl" target="blank">Polski Związek Wędkarski</a></li>
        </ol>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>

</html>
