<?php
    $baza = mysqli_connect("localhost", "root", "", "wedkowanie");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section id="pierwszy-lewy">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php
                $sql = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE rodzaj = 3;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo $wiersz["nazwa"] . " pływa w rzece" . 
                    $wiersz["akwen"] . " ," .
                    $wiersz["wojewodztwo"];
                }
            ?>
        </ol>
    </section>
    <section id="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <br>
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <section id="drugi-lewy">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <thead>
                <tr>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>" . 
                        "<td>" . $wiersz["id"] . "</td>"  .
                        "<td>" . $wiersz["nazwa"] ."</td>" .
                        "<td>" . $wiersz["wystepowanie"] ."</td>" .
                        "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>