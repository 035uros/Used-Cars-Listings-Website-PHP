<?php
session_start();
include 'baza_podataka.php';


if($_SESSION["potvrdjenpristup"] == true){
    if(isset($_GET['marka'])){
        $marka = $_GET['marka'];
    }else{$marka = null;}

    if(isset($_GET['model'])){
        $model           = $_GET['model'];
        if($model == "NULL"){ $model = 0;}
    } else{$model = 0;}

    if(isset($_GET['cenado'])){
        if($_GET['cenado'] != 0){
            $cenado= doubleval($_GET['cenado']);
        }else{$cenado = 0;}
    }else{$cenado = 0;}

    if(isset($_GET['godisteod'])){
        $godisteod       = intval($_GET['godisteod']);
    }else{$godisteod=null;}

    if(isset($_GET['godistedo'])){
        $godistedo       = intval($_GET['godistedo']);
    }else{$godistedo=null;}

    if(isset($_GET['karoserija'])){
        $karoserija      = $_GET['karoserija'];
        if($karoserija == "NULL"){ $karoserija = 0;}
    }else{$karoserija=0;}


    if(isset($_GET['gorivo'])){
        $gorivo          = $_GET['gorivo'];
        if($gorivo == "NULL"){ $gorivo = 0;}
    }else{$gorivo=0;}

    if(isset($_GET['region'])){
        $region          = $_GET['region'];
    }else{$region=null;}

    if(isset($_GET['id'])){
        $id          = $_GET['id'];
    }

    if(isset($_GET['nazivpretrage'])){
        $naziv          = $_GET['nazivpretrage'];
    }

    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $sql = "INSERT INTO `pretraga` (`id_pretrage`, `naziv`, `id_korisnika`, `id_model`, `id_marka`, `id_goriva`, `godisteod`, `godistedo`, `cena_do`, `id_karoserije`, `region`) VALUES (NULL, '$naziv', '$id', '$model', '$marka', '$gorivo', '$godisteod', '$godistedo', '$cenado', '$karoserija', '$region'); ";
    if($conn->query($sql)){
        $sql = "SELECT id_pretrage FROM pretraga WHERE naziv = '$naziv' AND id_korisnika = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($red = $result->fetch_assoc()) {
                header("location: pretraga.php?idpret=".$red['id_pretrage']);
            }}
    }
    else{
        echo("Грешка при уносу: " . $conn -> error);
    }

}else{
    echo '<script>alert("Морате бити пријављени да бисте сачували претрагу.")</script>';
    header('location: login.php');
}




CloseCon($conn);



?>


