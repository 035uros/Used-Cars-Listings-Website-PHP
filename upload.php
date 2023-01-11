<?php
session_start();
include 'baza_podataka.php';
if(isset($_POST["unosvozila"])){

    $id_korisnika    = intval($_SESSION['korisnik']);
    $naslov          = $_POST['naslov'];
    $marka           = intval($_POST['marka']);
    $model           = intval($_POST['model']);
    $godiste         = intval($_POST['godiste']);
    $karoserija      = intval($_POST['karoserija']);
    $tip             = intval($_POST['tip']);
    $gorivo          = intval($_POST['gorivo']);
    $kubikaza        = intval($_POST['kubikaza']);
    $snaga           = intval($_POST['snaga']);
    $km              = intval($_POST['km']);
    $registrovan     = $_POST['registrovan'];
    $vrata           = intval($_POST['vrata']);
    $menjac          = intval($_POST['menjac']);
    $cena            = doubleval($_POST['cena']);
    $vin             = intval($_POST['vin']);
    $pogon           = intval($_POST['pogon']);
    $broj_oglasa     = (int)((rand() * rand())/rand());
    $datum           = strval(date("d m Y"));
    if(isset( $_POST['zamena'])){
    $zamena          = 1;
    }
    else{
        $zamena          = 0;
    }
    if(isset( $_POST['fiks'])){
        $fiks          = 1;
    }
    else{
        $fiks          = 0;
    }

    $file = $_FILES['file'];
    $nizPutanja = '';
    foreach ($_FILES['file']['tmp_name'] as $key => $image){
    $fileName=$_FILES['file']['name'][$key];
    $fileTmpName=$_FILES['file']['tmp_name'][$key];
    $fileError=$_FILES['file']['error'][$key];
    $fileType=$_FILES['file']['type'][$key];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            if (!file_exists("C:/wamp64/www/UsedCarsApp/images/oglasi/". strval($broj_oglasa))) {
                mkdir("C:/wamp64/www/UsedCarsApp/images/oglasi/". strval($broj_oglasa), 0777, true);}
            $fileDestination = "C:/wamp64/www/UsedCarsApp/images/oglasi/". strval($broj_oglasa)."/".$fileNameNew;
            $nizPutanja = $nizPutanja.$fileDestination.';';
            move_uploaded_file($fileTmpName, $fileDestination);
        }
        else{
            echo "Грешка приликом убацивања слика";
        }
    }
    else{
        echo "Недозвољени формат!";
    }
}


$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
    $sql = "INSERT INTO `automobil` (`VIN`, `id_marke`, `id_modela`, `id_tip_vozila`,`godina_proizvodnje`, `kilometraza`, `id_pogona`, `id_menjaca`, `id_karoserije`, `id_goriva`, `zapremina`, `snaga`, `id_broja_vrata`, `registrovan_do`) VALUES ($vin, $marka, $model, $tip,$godiste, $km, $pogon, $menjac, $karoserija, $gorivo, $kubikaza, $snaga, $vrata, '$registrovan');";
    if($conn->query($sql)){
    }
    else{
        echo("Грешка при уносу аутомобила: " . $conn -> error);
        header('location: unosOglasa.php');
    }
    $sql = "INSERT INTO `oglas` (`broj_oglasa`, `naslov`, `id_korisnika`, `vin_automobila`, `cena`,`status_oglasa`, `datum`,`cena_fix`,`zamena`,`slike`) VALUES ($broj_oglasa, '$naslov', $id_korisnika, $vin, $cena, 1, '$datum', $fiks, $zamena, '$nizPutanja')";
    
    if($conn->query($sql)){
    }
    else{
        echo("Грешка при уносу огласа: " . $conn -> error);
        header('location: unosOglasa.php');
    }


CloseCon($conn);

echo '<script>alert("Унос успешан, проследићемо вас на страницу ваших огласа.")</script>';
header('location: unosOglasa.php');
}

?>


