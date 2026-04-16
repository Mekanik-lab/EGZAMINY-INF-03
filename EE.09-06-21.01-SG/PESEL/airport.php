<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <section id="pierwszy-baner">
            <h2>Odloty z lotniska</h2>
        </section>
        <section id="drugi-baner">
            <img src="zad6.png" alt="logotyp">
        </section>
    </header>
    <main>
        <h4>tabela odlotów</h4>
        <table>
            <tr>
                <th>lp.</th>
                <th>numer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </tr>
            <?php
                $baza = mysqli_connect('localhost', 'root', '', 'egzamin');
                $sql = "SELECT id, nr_rejsu, czas, kierunek, status_lotu FROM odloty ORDER BY czas DESC;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie))
                {
                    echo "<tr>" .
                    "<td>" . $wiersz['id'] . "</td>" . 
                    "<td>" . $wiersz['nr_rejsu'] . "</td>" . 
                    "<td>" . $wiersz['czas'] . "</td>" . 
                    "<td>" . $wiersz['kierunek'] . "</td>" . 
                    "<td>" . $wiersz['status_lotu'] . "</td>" . 
                    "</tr>";
                }

                mysqli_close($baza);
            ?>
        </table>
    </main>
    <footer>
        <section id="pierwszy-stopka">
            <a href="kw1.jpg" target="blank">Pobierz obraz</a>
        </section>
            <?php
                if (!isset($_COOKIE['wizyta']))
                {
                    setcookie('wizyta', time(), time() + 3600);
                    echo "<section id='drugi-stopka'>
                    <p>
                    <i>Dzień dobry! Sprawdź regulamin naszej strony.</i>
                    </p>
                    </section>";
                } else {
                    echo "<section id='drugi-stopka'>
                    <p>
                    <b>Miło nam, że nas znowu odwiedziłeś</b>
                    </p>
                    </section>";
                }
            ?>
        <section id="trzeci-stopka">
            Autor: 00000000000
        </section>
    </footer>
</body>
</html>