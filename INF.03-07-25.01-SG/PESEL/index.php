<?php
    $baza = mysqli_connect("localhost", "root", "", "wykaz");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <title>Wyszukiwarka miast</title>
</head>
<body>
    <main>
        <header>
            <img src="baner.jpg" alt="Polska">
        </header>
        <section id="pierwszy-blok-lewy">
            <h4>Podaj początek nazwy miasta</h4>
            <form action="index.php" method="POST">
                <input type="text" name="filtr">
                <input type="submit" value="Szukaj" id="szukaj" name="szukaj">
            </form>
        </section>
        <section id="prawy-blok">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <?php
                if(isset($_POST["szukaj"])) {
                    $filtr = $_POST["filtr"];
                    echo "<p id='paragraf-skryptu'>$filtr</p>";
                    $sql = "SELECT miasta.nazwa, wojewodztwa.nazwa FROM miasta INNER JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id WHERE miasta.nazwa LIKE '$filtr%' ORDER BY miasta.nazwa ASC;";
                    $zapytanie = mysqli_query($baza, $sql);
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Miasto</th>";
                    echo "<th>Województwo</th>";
                    echo "</tr>";
                    while($wiersz = mysqli_fetch_row($zapytanie)) {
                        echo "<tr>";
                        echo "<td>" . $wiersz[0] . "</td>";
                        echo "<td>" . $wiersz[1] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }    
            ?>
        </section>
        <section id="drugi-blok-lewy">
            <p>Egzamin INF.03</p>
            <p>Autor: 00000000000</p>
        </section>
    </main>
</body>
</html>

<?php
    mysqli_close($baza);            
?>