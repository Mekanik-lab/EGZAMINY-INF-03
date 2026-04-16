<?php
if(isset($_POST["data"]) && isset($_POST["iloscOsob"]) && isset($_POST["numerTelefonu"])) {
    $baza = mysqli_connect("localhost", "root", "", "baza");
    
    $data = $_POST["data"];
    $iloscOsob = $_POST["iloscOsob"];
    $numerTelefonu = $_POST["numerTelefonu"];

    $sql = "INSERT INTO rezerwacje (nr_stolika, data_rez, liczba_osob, telefon) VALUES (1, '$data', '$iloscOsob', '$numerTelefonu');";
    $zapytanie = mysqli_query($baza, $sql);
    
    mysqli_close($baza);

    echo "Dodano rezerwację do bazy";
}
?>