<?php
require_once '../session.inc.php';

//control of de upload geslaagt is
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){

    //controleer get bestandtype
    if ($_FILES['foto']['type'] == "image/jpg" ||
        $_FILES['foto']['type'] == "image/jpeg" ||
        $_FILES['foto']['type'] == "image/pjpeg"){

        //wat is de fysieke locatie van de upload-map?
        $map = __DIR__ . "/uploads/";

        //maak de bestandsnaam
        $bestand = $_POST['id'] . '.jpg';

        //verplaats de upload
        move_uploaded_file($_FILES['foto']['tmp_name'], $map . $bestand);

        //stuur gebruiker terug naar de foto
        header("Location:foto.php?id" . $_POST['id']);
    }else{
        echo "Het bestand is van het verkeerde type.";
    }
}else{
    echo "Er ging iets fout bij het uploaden.";
}

?>
