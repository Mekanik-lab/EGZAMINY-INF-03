<?php
    $baza = mysqli_connect('localhost', 'root', '', 'egzamin5');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section id="baner-lewy">
            <img src="logo1.png" alt="Mój kalendarz">
        </section>
        <section id="baner-prawy">
            <h1>KALENDARZ</h1>
            <?php
                $sql = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-07-01';";
                $zapytanie = mysqli_query($baza, $sql);
                while($wiersz = mysqli_fetch_assoc($zapytanie))
                {
                    echo "<h3>miesiąc: " . $wiersz['miesiac'] 
                    . ", rok: " . $wiersz['rok'] ."</h3>";
                }
            ?>
        </section>
    </header>
    <main>
        <?php
            $sql = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec';";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<div class='dane'>" . "<h5>" . $wiersz['dataZadania'] ."</h5>"
                . "<p>" . $wiersz['wpis'] ."</p>" ."</div>";
            }
        ?>
    </main>
    <footer>
        <form action="" method="POST">
            <label for="dodajWpis">dodaj wpis:</label>
            <input type="text" id="dodajWpis" name="dodajWpis">
            <button>DODAJ</button>
        </form>

        <?php
            if (isset($_POST['dodajWpis']))
                {
                    $wpis = $_POST['dodajWpis'];
                    $sql = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-07-13';";
                    $zapytanie = mysqli_query($baza, $sql);
                }
            mysqli_close($baza);
        ?>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>