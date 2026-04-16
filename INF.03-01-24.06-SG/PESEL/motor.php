<?php
    $baza = mysqli_connect("localhost", "root", "", "motory");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl" id="motor">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <section id="lewy-blok">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
                $sql = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM wycieczki INNER JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
                $zapytanie = mysqli_query($baza, $sql);
                
                while($wiersz = mysqli_fetch_assoc($zapytanie)) 
                {
                    echo "<dt>" . $wiersz["nazwa"] 
                    . ", rozpoczyna się w " . $wiersz["poczatek"] 
                    . ", " . "<a href='" . $wiersz["zrodlo"] .".jpg'>zobacz zdjęcie</a>" ."</dt>"
                    . "<dd>" . $wiersz["opis"] ."</dd>";
                }
            ?>
        </dl>
    </section>
    <section id="pierwszy-prawy-blok" class="prawy-blok">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="drugi-prawy-blok" class="prawy-blok">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek:
        <?php
            $sql = "SELECT COUNT(*) FROM wycieczki;";
            $zapytanie = mysqli_query($baza, $sql);
            $wynik = mysqli_fetch_row($zapytanie);
            echo $wynik[0];
        ?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>