<?php
    $baza = mysqli_connect("localhost", "root", "", "piekarnia");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>PIEKARNIA</title>
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    <nav>
        <a href="kw1.png">KWERENDA1</a>
        <a href="kw2.png">KWERENDA2</a>
        <a href="kw3.png">KWERENDA3</a>
        <a href="kw4.png">KWERENDA4</a>
    </nav>
    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
    </header>
    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form action="piekarnia.php" method="POST">
            <select name="rodzaj" id="rodzaj">
                <?php
                    $sql = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_row($zapytanie)) {
                        echo "<option value='" . $wiersz[0] . "'>" . $wiersz[0] . "</option>";
                    }
                ?>
            </select>
            <button>Wybierz</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Rodzaj</th>
                    <th>Nazwa</th>
                    <th>Gramatura</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_POST["rodzaj"])) {
                        $rodzaj = $_POST["rodzaj"];
                        $sql = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$rodzaj';";
                        $zapytanie = mysqli_query($baza, $sql);
                        while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                            echo "<tr>";
                            echo "<td>" . $wiersz["Rodzaj"] . "</td>";
                            echo "<td>" . $wiersz["Nazwa"] . "</td>";
                            echo "<td>" . $wiersz["Gramatura"] . "</td>";
                            echo "<td>" . $wiersz["Cena"] . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>AUTOR 00000000000</p>
        <p>Data: 19.05.2026</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>