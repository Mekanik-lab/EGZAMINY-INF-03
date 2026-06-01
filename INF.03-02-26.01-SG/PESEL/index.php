<?php
    $baza = mysqli_connect("localhost", "root", "", "bazar");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Zdrowy bazarek</title>
</head>
<body>
    <header>
        <h1>Zdrowy bazarek</h1>
    </header>
    <nav>
        <?php
            $sql = "SELECT nazwa, plik FROM towar LIMIT 10;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<img src='" . $wiersz["plik"] . "' alt='" . $wiersz["nazwa"] . "' height='150px'>";
            }
        ?>
    </nav>
    <main>
        <aside>
            <img src="market.png" alt="bazarek">
        </aside>
        <section>
            <p>Wybierz owoc lub warzywo i podaj jego wagę:</p>
            <form action="index.php" method="POST">
                <select name="towar" id="towar">
                    <?php
                        $sql = "SELECT id, nazwa FROM towar;";
                        $zapytanie = mysqli_query($baza, $sql);
                        while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                            echo "<option value='" . $wiersz["id"] . "'>" . $wiersz["nazwa"] . "</option>";
                        }
                    ?>
                </select>
                <input type="number" name="ilosc" id="ilosc">
                <input type="submit" value="Zamów" name="zamow">
            </form>
            <?php
                if(isset($_POST["zamow"])) {
                    $id = $_POST["towar"];
                    $ilosc = $_POST["ilosc"];
                    $sql = "SELECT rodzaj, nazwa, cena FROM towar WHERE id = $id;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        $cena = $wiersz["cena"];
                        $wartosc = $_POST["ilosc"] * $cena;
                        echo "<p>" . $wiersz["rodzaj"] . " " . $wiersz["nazwa"] . " wartość: " . $wartosc . " zł</p>";
                    }

                    $sql2 = "INSERT INTO zamowienie (id_towar, id_sklep, liczba_kg) VALUES ($id, 2, $ilosc);";
                    $zapytanie2 = mysqli_query($baza, $sql2);
                }
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>