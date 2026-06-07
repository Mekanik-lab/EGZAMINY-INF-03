<?php
    $baza = mysqli_connect("localhost", "root", "", "zgloszenia");

    if(isset($_POST["dodajZgloszenie"])) {
        $id = $_POST["id"];
        $sql = "INSERT INTO rejestr (id_personel, id_pojazd, data) VALUES ($id, 14, CURRENT_DATE);";
        $zapytanie = mysqli_query($baza, $sql);
    }   

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>ZGŁOSZENIA</title>
</head>
<body>
    <header>
        <h1>Zgłoszenia wydarzeń</h1>
    </header>
    <main>
        <section id="lewa-sekcja">
            <h2>Personel</h2>
            <form action="index.php" method="POST">
                <input type="radio" name="status" value="policjant" id="policjant" checked>
                <label for="policjant">Policjant</label>
                <input type="radio" name="status" value="ratownik" id="ratownik">
                <label for="ratownik">Ratownik</label>
                <button type="submit">Pokaż</button>
            </form>
            <?php
                if(isset($_POST["status"])) {
                    $status = $_POST["status"];
                    echo "<h3>Wybrano opcję: $status</h3>";
                }
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST["status"])) {
                            $status = $_POST["status"];
                            $sql = "SELECT id, imie, nazwisko FROM personel WHERE status = '$status';";
                            $zapytanie = mysqli_query($baza, $sql);
                            while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                                echo "<tr>";
                                echo "<td>" . $wiersz["id"] . "</td>";
                                echo "<td>" . $wiersz["imie"] . "</td>";
                                echo "<td>" . $wiersz["nazwisko"] . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <section id="prawa-sekcja">
            <h2>Nowe zgłoszenie</h2>
            <ol>
                <?php
                    $sql = "SELECT personel.id, personel.nazwisko FROM personel LEFT JOIN rejestr ON personel.id = rejestr.id_personel WHERE id_personel IS NULL;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<li>" . $wiersz["id"] . " " . $wiersz["nazwisko"] . "</li>";
                    }
                ?>
            </ol>
            <form action="index.php" method="POST">
                <label for="id">Wybierz id osoby z listy: </label>
                <input type="number" name="id" id="id">
                <button type="submit" name="dodajZgloszenie">Dodaj zgłoszenie</button>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>