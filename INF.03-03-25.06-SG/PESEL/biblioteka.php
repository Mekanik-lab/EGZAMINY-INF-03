<?php
    $baza = mysqli_connect("localhost", "root", "", "biblioteka");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>BIBLIOTEKA SZKOLNA</title>
</head>
<body>
    <header>
        <h2>STRONA BIBLIOTEKI SZKOLNEJ WIEDZAMIN</h2>
    </header>
    <section>
        <h3>Nasze dzisiejsze propozycje:</h3>
        <table>
            <thead>
                <tr>
                    <th>Autor</th>
                    <th>Tytuł</th>
                    <th>Katalog</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT autor, tytul, kod FROM ksiazki ORDER BY RAND() LIMIT 5;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>";
                        echo "<td>" . $wiersz["autor"] . "</td>";
                        echo "<td>" . $wiersz["tytul"] . "</td>";
                        echo "<td>" . $wiersz["kod"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </section>
    <main>
        <article id="pierwszy-artykul">
            <img src="ksiazka1.jpg" alt="okładka książki">
            <p>Według rónych podań najpaskudniejsza ropucha nosi w głowie piekny, cenny klejnot.</p>
        </article>
        <article id="drugi-artykul">
            <img src="ksiazka2.jpg" alt="okładka książki">
            <p>Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie słuchają mamy...</p>
        </article>
        <article id="trzeci-artykul">
            <img src="ksiazka3.jpg" alt="okładka książki">
            <p>Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę. Rodzice i ona...</p>
        </article>
    </main>
    <footer>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>