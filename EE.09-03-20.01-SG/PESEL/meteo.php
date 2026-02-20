<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Poznań</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <section id="baner-lewy">
            <p>maj, 2019 r.</p>
        </section>
        <section id="baner-srodkowy">
            <h2>Prognoza dla Poznania</h2>
        </section>
        <section id="baner-prawy">
            <img src="logo.png" alt="prognoza">
        </section>
    </header>
    <section id="lewy">
        <a href="kwerendy.txt">Kwerendy</a>
    </section>
    <section id="prawy">
        <img src="obraz.jpg" alt="Polska, Poznań">
    </section>
    <main>
        <table>
            <tr>
                <th>Lp.</th>
                <th>DATA</th>
                <th>NOC - TEMPERATURA</th>
                <th>DZIEŃ - TEMPERATURA</th>
                <th>OPADY [mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php
            $baza = mysqli_connect('localhost', 'root', '', 'prognoza');
            $sql = "SELECT * FROM pogoda WHERE miasta_id = 2 ORDER BY data_prognozy DESC;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<tr>" . 
                "<td>" . $wiersz['id'] . "</td>" .
                "<td>" . $wiersz['data_prognozy'] . "</td>" .
                "<td>" . $wiersz['temperatura_noc'] . "</td>" .   
                "<td>" . $wiersz['temperatura_dzien'] . "</td>" . 
                "<td>" . $wiersz['opady'] . "</td>" . 
                "<td>" . $wiersz['cisnienie'] . "</td>" . 
                "</tr>";
            }

            mysqli_close($baza);
            ?>
        </table>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>