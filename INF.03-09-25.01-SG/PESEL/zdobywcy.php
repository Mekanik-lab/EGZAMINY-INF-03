<?php
    $baza = mysqli_connect("localhost", "root", "", "zdobywcy");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>ZDOBYWCY GÓR</title>
</head>
<body>
    <header>
        <h1>Klub zdobywców gór polskich</h1>
    </header>
    <nav>
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>
    <section id="lewy-blok">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </section>
    <section id="prawy-blok">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza:</p>
        <form action="zdobywcy.php" method="POST">
            <label for="nazwisko">Nazwisko: </label>
            <input type="text" name="nazwisko" id="nazwisko">
            <label for="imie">Imię: </label>
            <input type="text" name="imie" id="imie">
            <label for="funkcja">Funkcja: </label>
            <select name="funkcja" id="funkcja">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
            </select>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email">
            <button>Dodaj</button>
        </form>
        <?php
            if(isset($_POST["nazwisko"]) && isset($_POST["imie"]) && isset($_POST["funkcja"]) && isset($_POST["email"])) {
                $nazwisko = $_POST["nazwisko"];
                $imie = $_POST["imie"];
                $funkcja = $_POST["funkcja"];
                $email = $_POST["email"];

                $sql = "INSERT INTO osoby (nazwisko, imie, funkcja, email) VALUES ('$nazwisko', '$imie', '$funkcja', '$email');";  
                $zapytanie = mysqli_query($baza, $sql);
            }
        ?>
        <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Funkcja</th>
                    <th>Email</th>
                </tr>
                <?php
                    $sql = "SELECT nazwisko, imie, funkcja, email FROM osoby;";
                    $zapytanie = mysqli_query($baza, $sql);
                    while($wiersz = mysqli_fetch_assoc($zapytanie)) {
                        echo "<tr>";
                        echo "<td>" . $wiersz["nazwisko"] . "</td>";
                        echo "<td>" . $wiersz["imie"] . "</td>";
                        echo "<td>" . $wiersz["funkcja"] . "</td>";
                        echo "<td>" . $wiersz["email"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>

<?php
    mysqli_close($baza);
?>