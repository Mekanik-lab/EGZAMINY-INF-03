<?php
    $baza = mysqli_connect("localhost", "root", "", "choroby");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Wykaz chorób</title>
</head>
<body>
    <header>
        <h1>Informacja o chorobach w Polsce</h1>
    </header>
    <nav>
        <a href="https://szpitale.pl/" target="_blank">Szpitale</a>
        <a href="https://www.przychodnie.pl/" target="_blank">Przychodnie</a>
        <a href="https://www.nfz.gov.pl/" target="_blank">NFZ</a>
    </nav>
    <main>
        <section id="lewa-sekcja">
            <h2>Choroby zakaźne</h2>
            <ol>
                <?php
                    $sql = "SELECT nazwa FROM choroby WHERE zakazna = 'T' ORDER BY nazwa ASC;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        $nazwa = $wiersz["nazwa"];
                        echo "<li>$nazwa</li>";
                    }
                ?>
            </ol>
        </section>
        <section id="prawa-sekcja">
            <h2>Objawy chorób</h2>
            <form action="zdrowie.php" method="post">
                <select name="choroba" id="choroba">
                    <?php
                        $sql = "SELECT id, nazwa FROM choroby;";
                        $zapytanie = mysqli_query($baza, $sql);
                        while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                            $id = $wiersz["id"];
                            $nazwa = $wiersz["nazwa"];
                            echo "<option value='$id'>$nazwa</option>";
                        }
                    ?>
                </select>
                <button type="submit" name="sprawdz">Sprawdź</button>
            </form>
            <div id="wynik">
                <?php
                    if(isset($_POST["sprawdz"])) {
                        $id = $_POST["choroba"];
                        $sql = "SELECT objawy.nazwa FROM objawy INNER JOIN choroby_objawy ON objawy.id = choroby_objawy.id_objawy INNER JOIN choroby ON choroby.id = choroby_objawy.id_choroby WHERE choroby.id = $id;";
                        $zapytanie = mysqli_query($baza, $sql);
                        while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                            $nazwa = $wiersz["nazwa"];
                            echo " <span>$nazwa</span> ";
                        }
                    }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: 00000000000</p>
    </footer>
    <img src="zdrowia.png" alt="Życzymy zdrowia!">
</body>
</html>

<?php
    mysqli_close($baza);
?>