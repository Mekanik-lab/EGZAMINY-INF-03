<?php
    $baza = mysqli_connect("localhost", "root", "", "wedkarstwo");

    if (isset($_POST["lowisko"]) && isset($_POST["data"]) && isset($_POST["sedzia"])) {
        $lowisko = $_POST["lowisko"];
        $data = $_POST["data"];
        $sedzia = $_POST["sedzia"];

        $sql = "INSERT INTO zawody_wedkarskie (Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia) VALUES (0, '$lowisko', '$data', '$sedzia');";
        $zapytanie = mysqli_query($baza, $sql);

        mysqli_close($baza);
    }
?>