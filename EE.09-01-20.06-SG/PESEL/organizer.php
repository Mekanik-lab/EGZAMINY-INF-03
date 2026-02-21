<?php
    $baza = mysqli_connect('localhost', 'root', '', 'egzamin6');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <section id="baner-pierwszy">
            <h2>MÓJ ORGANIZER</h2>
        </section>
        <section id="baner-drugi">
            <form action="" method="POST">
                <label for="wpis">Wpis wydarzenia:</label>
                <input type="text" name="wpis">
                <button>Zapisz</button>
            </form>
            <?php
                if (isset($POST['wpis']))
                    {
                        $wpis = $POST['wpis'];
                        $sql = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-27';";
                        $zapytanie = mysqli_query($baza, $sql);
                    }
            ?>
        </section>
        <section id="baner-trzeci">
            <img src="logo2.png" alt="Mój organizer">
        </section>
    </header>
    <main>
        <?php
            $sql = "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';";
            $zapytanie = mysqli_query($baza, $sql);
            while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "<section class='dzien'>"
                . "<h6>" . $wiersz['dataZadania']
                . "," . $wiersz['miesiac'] . "</h6>"
                . "<p>" . $wiersz['wpis'] . "</p>"
                . "</section>";
            }
        ?>
    </main>
    <footer>
        <?php
           $sql = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';"; 
           $zapytanie = mysqli_query($baza, $sql);
           while($wiersz = mysqli_fetch_assoc($zapytanie))
            {
                echo "miesiąc: " . $wiersz['miesiac'] . ", rok: " . $wiersz['rok'];
            }
            mysqli_close($baza);
        ?>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>