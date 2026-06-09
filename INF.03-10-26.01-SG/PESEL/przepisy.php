<?php
    $baza = mysqli_connect("localhost", "root", "", "przepisy");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Blog kulinarny</title>
</head>
<body>
    <aside>
        <a href="przepisy.php?id=1">Sernik</a>
        <br>
        <a href="przepisy.php?id=2">Sałatka</a>
        <br>
        <a href="przepisy.php?id=3">Pankejki</a>
        <br>
        <a href="przepisy.php?id=4">Nugetsy</a>
        <br>
        <a href="przepisy.php?id=5">Łosoś</a>
        <br>
        <a href="przepisy.php?id=6">Kociołek</a>
        <br>
        <a href="przepisy.php?id=7">Jagnięcina</a>
        <br>
        <a href="przepisy.php?id=8">Hamburgery</a>
        <br>
        <a href="przepisy.php?id=9">Eklerki</a>
        <br>
        <a href="przepisy.php?id=10">Churros</a>
        <br>
        <p>Autor: 00000000000</p>
    </aside>
    <main>
        <h1>
            <?php
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $sql = "SELECT nazwa, rodzaj FROM potrawy INNER JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE potrawy.idPotrawy = $id;";
                    $zapytanie = mysqli_query($baza, $sql);
                    $wiersz = mysqli_fetch_assoc($zapytanie);
                    echo $wiersz["rodzaj"];
                }
            ?>
        </h1>
        <?php
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = $id;";
                $zapytanie = mysqli_query($baza, $sql);
                $wiersz = mysqli_fetch_assoc($zapytanie);
                $nazwa = $wiersz["nazwa"];
                $trudnosc = $wiersz["trudnosc"];
                $trudnoscTekst = "";
                if($trudnosc == 1) {
                    $trudnoscTekst = "łatwe";
                } else if($trudnosc == 2) {
                    $trudnoscTekst = "średnie";
                } else if($trudnosc == 3) {
                    $trudnoscTekst = "trudne";
                }
                $kalorie = $wiersz["kalorie"];
                echo "<h2>$nazwa</h2>";
                echo "<p>Trudność: $trudnoscTekst, Kalorie: $kalorie</p>";
            }
            
        ?>
        <img src="separator.png" alt="przepis">
        <p>Alergeny: 
            <?php
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $sql = "SELECT nazwa, alergen FROM potrawy INNER JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy INNER JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = $id;";
                    $zapytanie = mysqli_query($baza, $sql);
                    $wiersz = mysqli_fetch_assoc($zapytanie);
                    $alergen = $wiersz["alergen"];
                    echo $alergen . " ";
                }
            ?>
        </p>
        <h2>Składniki</h2>
        <ul>
            <li>Lorem 1 kg</li>
            <li>Ipsum 2 szt.</li>
            <li>Dolor 200 g</li>
            <li>Sit amet (szczypta)</li>
        </ul>
        <p>
            <?php
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $sql = "SELECT przepis, plik FROM potrawy WHERE idPotrawy = $id;";
                    $zapytanie = mysqli_query($baza, $sql);
                    $wiersz = mysqli_fetch_assoc($zapytanie);
                    $plik = $wiersz["plik"];
                    echo $wiersz["przepis"];
                }
            ?>
        </p>
    </main>
    <section style="background-image: url('<?php echo $plik; ?>');">
        <h1>Blog kulinarny</h1>
    </section>
</body>
</html>

<?php
    mysqli_close($baza);
?>