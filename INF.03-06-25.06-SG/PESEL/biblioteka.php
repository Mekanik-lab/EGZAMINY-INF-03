<?php
    $baza = mysqli_connect("localhost", "root", "", "biblioteka");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Biblioteka miejska</title>
</head>
<body>
    <header>
        <?php
            for($i = 0; $i < 20; $i++) {
                echo "<img src='obraz.png'>";
            }
        ?>
    </header>
    <section id="pierwsza-sekcja">
        <h2>Liryka</h2>
        <form action="biblioteka.php" method="post">
            <select name="ksiazkaLiryka" id="ksiazkaLiryka">
                <?php
                    $sql = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka';";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<option value='" . $wiersz["id"] . "'>" . $wiersz["tytul"] . "</option>";
                    }
                ?>
            </select>
            <button>Rezerwuj</button>
        </form>
        <?php
            if(isset($_POST["ksiazkaLiryka"])) {
                $id = $_POST["ksiazkaLiryka"];
                $sql = "SELECT tytul FROM ksiazka WHERE id=$id;";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                    echo "<p>Książki " . $wiersz["tytul"] . " została zarezerwowana</p>";
                }

                $sql2 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                $zapytanie2 = mysqli_query($baza, $sql2);
            }
        ?>
    </section>
    <section id="druga-sekcja">
        <h2>Epika</h2>
        <form action="biblioteka.php" method="post">
            <select name="ksiazkaEpika" id="ksiazkaEpika">
                <?php
                    $sql = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika';";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<option value='" . $wiersz["id"] . "'>" . $wiersz["tytul"] . "</option>";
                    }
                ?>  
            </select>
            <button>Rezerwuj</button>
        </form>
        <?php
                if(isset($_POST["ksiazkaEpika"])) {
                    $id = $_POST["ksiazkaEpika"];
                    $sql = "SELECT tytul FROM ksiazka WHERE id=$id;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<p>Książki " . $wiersz["tytul"] . " została zarezerwowana</p>";
                    }

                    $sql2 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                    $zapytanie2 = mysqli_query($baza, $sql2);
                }
            ?>
    </section>
    <section id="trzecia-sekcja">
        <h2>Dramat</h2>
        <form action="biblioteka.php" method="post">
            <select name="ksiazkaDramat" id="ksiazkaDramat">
                <?php
                    $sql = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat';";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<option value='" . $wiersz["id"] . "'>" . $wiersz["tytul"] . "</option>";
                    }
                ?>
            </select>
            <button>Rezerwuj</button>
        </form>
        <?php
                if(isset($_POST["ksiazkaDramat"])) {
                    $id = $_POST["ksiazkaDramat"];
                    $sql = "SELECT tytul FROM ksiazka WHERE id=$id;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<p>Książki " . $wiersz["tytul"] . " została zarezerwowana</p>";
                    }

                    $sql2 = "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id;";
                    $zapytanie2 = mysqli_query($baza, $sql2);
                }
            ?>
    </section>
    <section id="czwarta-sekcja">
        <h2>Zaległe książki</h2>
        <ul>
        <?php
            $sql = "SELECT tytul, id_cz, data_odd FROM ksiazka INNER JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY data_odd ASC LIMIT 15;";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                echo "<li>" . $wiersz["tytul"] . " " . $wiersz["id_cz"] . " " . $wiersz["data_odd"] . "</li>";
            }
        ?>
        </ul>
    </section>
    <footer>
        <p><strong>Autor: 00000000000</strong></p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>