<?php
    $baza = mysqli_connect('localhost', 'root', '', 'egzamin');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozgrywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </header>
    <section id="mecze">
        <?php
            $sql = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1 = 'EVG';";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<div class='rozgrywka-blok'><h3>" . $wiersz['zespol1'] . " - " . $wiersz['zespol2'] . "</h3>" .
                "<h4>" . $wiersz['wynik'] ."</h4>" .
                "<p>w dniu: " . $wiersz['data_rozgrywki'] . "</p></div>";
            }
        ?>
    </section>
    <main>
        <h2>Reprezentacja Polski</h2>
    </main>
    <section id="lewy">
        <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
        <form action="" method="POST">
            <input type="number" name="pozycja-zawodnika">
            <button>Sprawdź</button>
        </form>
        <ul>
            <?php
                if(isset($_POST['pozycja-zawodnika']))
                {
                    $pozycja = $_POST['pozycja-zawodnika'];
                    $sql = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $pozycja;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie))
                    {
                        echo "<li><p>" . $wiersz['imie']  . " " .
                        $wiersz['nazwisko'] ."</p></li>";
                    }
                }
            ?>
        </ul>
    </section>
    <section id="prawy">
        <img src="zad1.png" alt="piłkarz">
        <p>Autor: 00000000000</p>
    </section>
</body>
</html>

<?php
    mysqli_close($baza);
?>