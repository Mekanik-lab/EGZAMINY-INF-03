<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <section id='baner-lewy'>
            <h1>Internetowa wypożyczalnia filmów</h1>
        </section>
        <section id='baner-prawy'>
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </section>
    </header>
    <section id='lista-polecamy' class='lista'>
        <h3>Polecamy</h3>
        <?php
            $baza = mysqli_connect('localhost', 'root', '', 'dane3');
            $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<div class='film-blok'><h4>" . $wiersz['id'] . "." . $wiersz['nazwa'] ."</h4>" .
                "<img src='" . $wiersz['zdjecie'] ."' alt='film'>" .
                "<p>" . $wiersz['opis'] ."</p>" .
                "</div>";
            }
        ?>
    </section>
    <section id='lista-filmy-fantastyczne' class='lista'>
        <h3>Filmy fantastyczne</h3>
        <?php
            $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<div class='film-blok'><h4>" . $wiersz['id'] . "." . $wiersz['nazwa'] ."</h4>" .
                "<img src='" . $wiersz['zdjecie'] ."' alt='film'>" .
                "<p>" . $wiersz['opis'] ."</p>" .
                "</div>";
            }
        ?>
    </section>
    <footer>
        <form action="" method="POST">
            <label for="numer-filmu">Usuń film nr.:</label>
            <input type="number" id='numer-filmu' name='numer-filmu'>
            <button>Usuń film</button>
        </form>
        <?php
            if(isset($_POST['numer-filmu']))
            {
                $numerFilmu = $_POST['numer-filmu'];
                $sql = "DELETE FROM produkty WHERE id = $numerFilmu;";
                $zapytanie = mysqli_query($baza, $sql);
            }
        ?>
        Stronę wykonał: 00000000000
    </footer>
    <?php
        mysqli_close($baza);
    ?>
</body>
</html>