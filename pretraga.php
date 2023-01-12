<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include 'baza_podataka.php';
session_start();

$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");

if(isset($_GET['idpret'])){
    $id_pretrage = $_GET['idpret'];

    $sql = "SELECT * FROM `pretraga` WHERE id_pretrage =".$id_pretrage;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($red = $result->fetch_assoc()) {
            $marka = $red['id_marka'];
            $model = $red['id_model'];
            $cenado = $red['cena_do'];
            $godisteod = $red['godisteod'];
            $godistedo = $red['godistedo'];
            $karoserija = $red['id_karoserije'];
            $gorivo = $red['id_goriva'];
            $region = $red['region'];
            $nazivPretrage = $red['naziv'];
        }
    }
}

$sqlGlavni = "SELECT * FROM (oglas join automobil on oglas.vin_automobila=automobil.VIN) join korisnik on korisnik.id_korisnika = oglas.id_korisnika WHERE status_oglasa=1 ";

if(isset($_GET['submit'])){
    $marka = $_POST['marka'];
    $sqlGlavni=$sqlGlavni.' AND id_marke='.$marka;
    if(isset($_POST['model'])){
        $model           = $_POST['model'];
        $sqlGlavni=$sqlGlavni.' AND id_modela='.$model;
    } 
    if(isset($_POST['cena'])){
        $cenado= doubleval($_POST['cena']);
        if($cenado != 0){
            $sqlGlavni=$sqlGlavni.' AND cena<'.$cenado;
        }
    }
    if(isset($_POST['godisteod'])){
        $godisteod       = intval($_POST['godisteod']);
        $sqlGlavni=$sqlGlavni.' AND godina_proizvodnje>'.$godisteod;
    }else{$godisteod=0;}
    if(isset($_POST['godistedo'])){
        $godistedo       = intval($_POST['godistedo']);
        $sqlGlavni=$sqlGlavni.' AND godina_proizvodnje<'.$godistedo;
    }else{$godistedo=0;}
    if(isset($_POST['karoserija'])){
        $karoserija      = $_POST['karoserija'];
        $sqlGlavni=$sqlGlavni.' AND id_karoserije='.$karoserija;
    }else{$karoserija=0;}
    if(isset($_POST['gorivo'])){
        $gorivo          = $_POST['gorivo'];
        $sqlGlavni=$sqlGlavni.' AND id_goriva='.$gorivo;
    }else{$gorivo=0;}
    if(isset($_POST['region'])){
        $region          = $_POST['region'];
        $sqlGlavni=$sqlGlavni.' AND region="'.$region.'"';
    }else{$region='nije';}

}


/*set_url("http://localhost:3000/pretraga.php");*/
?><!DOCTYPE html>

<html>
<head>
<title>Претрага</title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/login.css">
</head>
<body>

<div class="topnav">
            <?php if($_SESSION['potvrdjenpristup'] == true)
            {
               echo'<a href="login.php?o=1">Одјави се</a>';
               if($_SESSION['id_tipa_korisnika']==1){
                echo'<a href="odobravanjeOglasa.php">Одобри огласе</a>';
                echo'<a href="kontrolnatabla.php">Контролна табла</a>';
               }
            }else{
                echo'<a href="login.php">Пријави се</a>';
            }
            ?>    
            <a href="unosOglasa.php">Постави оглас</a>
            <a class="active" href="index.php">Почетна</a>
        </div>

<form action="/pretraga.php?submit=1" class="forma" method="post">
    
<select name="marka" id="marka" required>
        <option onclick="location.href='index.php?broj='" value="" disabled selected hidden>Марка</option>
        <?php
            $sql = "SELECT * FROM marka";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($marka == $red["id_marke"] || $_GET['broj'] == $red["id_marke"]){
                        echo'<option onclick="location.href=\'pretraga.php?broj='.$red["id_marke"].'&cena='.$cenado.'&godod='.$godisteod.'&goddo='.$godistedo.'&kar='.$karoserija.'&gor='.$gorivo.'&reg='.$region.'\'" value="'.$red["id_marke"].'" selected>'.$red["naziv"].'</option>';
                    }else{
                        echo'<option onclick="location.href=\'pretraga.php?broj='.$red["id_marke"].'&cena='.$cenado.'&godod='.$godisteod.'&goddo='.$godistedo.'&kar='.$karoserija.'&gor='.$gorivo.'&reg='.$region.'\'" value="'.$red["id_marke"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
        ?>
    </select>


    <select name="model" id="model" >
        <option value="NULL" disabled selected hidden>Модел</option>
        <?php
         $conn->query("SET NAMES 'utf8'");
        if(isset($_GET['broj'])){
            $id_marke=$_GET['broj'];
            $sql = "SELECT * FROM model WHERE id_marka =".$id_marke."";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["id_model"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
            else{
                $sql = "SELECT * FROM model WHERE id_marka =".$marka."";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($red = $result->fetch_assoc()) {
                        if($model == $red["naziv"] || $model == $red["id_model"]){
                            echo'<option value="'.$red["id_model"].'" selected>'.$red["naziv"].'</option>';
                        }else{
                            echo'<option value="'.$red["id_model"].'">'.$red["naziv"].'</option>';
                        }
                }
            }
        }
        ?>
    </select>

    <input type="text" id="cena" name="cena" placeholder="цена до" 
    <?php 
    if(isset($_POST['cena']))
        {
            $cenado= doubleval($_POST['cena']); 
            echo 'value='.$cenado;
        }else if(isset($_GET['cena'])){
            $cenado= doubleval($_GET['cena']); 
            echo 'value='.$cenado;
        }
        else{
            echo 'value='.$cenado;
        }
    ?>
    >

    <select name="godisteod" id="godisteod" >
        <option value="1950" disabled selected hidden>Годиште од</option>
        <?php
        if(isset($_GET['godod'])){
            $godisteod=$_GET['godod'];
        }
        for($i=date("Y"); $i>1960; $i--) {
            if($godisteod == $i){
                echo'<option value="'.$i.'" selected>'.$i.'</option>';
            }
            else{
                echo'<option value="'.$i.'">'.$i.'</option>';
            }
            } 
        ?>
    </select>

    <select name="godistedo" id="godistedo" >
        <option value="2024" disabled selected hidden>Годиште до</option>
        <?php
        if(isset($_GET['goddo'])){
            $godistedo=$_GET['goddo'];
        }
        for($i=date("Y"); $i>1960; $i--) {
            if($godistedo == $i){
                echo'<option value="'.$i.'" selected>'.$i.'</option>';
            }
            else{
                echo'<option value="'.$i.'">'.$i.'</option>';
            }
            } 
        ?>
    </select>

    <select name="karoserija" id="karoserija" >
        <option value="NULL" disabled selected hidden>Каросерија</option>
        <?php
            if(isset($_GET['kar'])){
                $karoserija=$_GET['kar'];
            }
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM karoserija";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($karoserija == $red["id_karoserije"]){
                        echo'<option value="'.$red["id_karoserije"].'" selected>'.$red["naziv"].'</option>';
                    }
                    else{
                        echo'<option value="'.$red["id_karoserije"].'" >'.$red["naziv"].'</option>';
                    }
                }
            }
        ?>
    </select>

    <select name="gorivo" id="gorivo" >
        <option value="NULL" disabled selected hidden>Гориво</option>
        <?php
            if(isset($_GET['gor'])){
                $gorivo=$_GET['gor'];
            }
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM gorivo";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($gorivo == $red["id_goriva"]){
                        echo'<option value="'.$red["id_goriva"].'" selected>'.$red["naziv"].'</option>';
                    }
                    else{
                        echo'<option value="'.$red["id_goriva"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
        ?>
    </select>

    <select name="region" id="region" >
        <option value="" disabled selected hidden>Регион</option>
        <?php
            if(isset($_GET['reg'])){
                $region=$_GET['reg'];
            }
            $regioni = array("Београд", "Централна Србија", "Источна Србија", "Јужна Србија", "Источна Србија", "Косово и Метохија", "Војовидна","Западна Србија");
            foreach($regioni as $reg){
                if($reg == $region){
                    echo '<option value="'.$reg.'" selected>'.$reg.'</option>';
                }
                else{
                    echo '<option value="'.$reg.'">'.$reg.'</option>';
                }
            }
        ?>
    </select>



    <input type="submit" value="Претражи">

    </form>

    <div class="formamala">

    <select name="pretraga" id="pretraga" >
    <option value="0" disabled selected hidden>Моје претраге</option>
    <?php
        $conn->query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM pretraga WHERE id_korisnika=".$_SESSION['korisnik'];
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($id_pretrage == $red["id_pretrage"]){
                        echo'<option value="'.$red["id_pretrage"].'" selected>'.$red["naziv"].'</option>';
                    }
                    else{
                        echo'<option value="'.$red["id_pretrage"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
    ?>
    </select>

    <button onclick="pretraga()">Очитај</button>

    <input type="text" id="unesiPretragu" name="unesiPretragu" placeholder="Унеси име претраге" >
    
    <?php echo '<input type="hidden"  id="idKorisnika" name="idKorisnika" value="'.$_SESSION['korisnik'].'">';?>
    
    <button onclick="cuvanje()">Сачувај претрагу</button>
    </div>


    <script>
        function cuvanje() {
            var ma = document.getElementById("marka").value;
            var mo = document.getElementById("model").value;
            var c = document.getElementById("cena").value;
            var go = document.getElementById("godisteod").value;
            var gd = document.getElementById("godistedo").value;
            var k = document.getElementById("karoserija").value;
            var g = document.getElementById("gorivo").value;
            var r = document.getElementById("region").value;
            var n = document.getElementById("unesiPretragu").value;
            var id = document.getElementById("idKorisnika").value;

            var str = "save.php?id="+id+'&marka='+ma+'&model='+mo+'&gorivo='+g+'&godisteod='+go+'&godistedo='+gd+'&karoserija='+k+'&cenado='+c+'&nazivpretrage='+n+'&region='+r;


            window.open(str); 
            window.close();
            }

        function pretraga() {
            var id = document.getElementById("pretraga").value;
            var str = "pretraga.php?idpret="+id;

            window.open(str);
            window.close(); 
            }
    </script>


    <?php
            $result = $conn->query($sqlGlavni);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    $naslov = $red["naslov"];
                    $godiste = $red["godina_proizvodnje"];
                    $kilometraza = $red["kilometraza"];
                    $kubikaza = $red["zapremina"];
                    $snaga = $red["snaga"];
                    $cena = $red["cena"];
                    $slike = explode(";",$red['slike']);
                    $broj_oglasa = $red["broj_oglasa"];


                    echo '<div class="item-wrap">'.
                    '<div class="search">'.
                    '<div class="item">'.
                    '<img src="'.$slike[0].'" alt="thumbnail" width="400px" style="float: left; object-fit: cover;">'.
                    '<div class="subtext">'.
                    '<h2 >'.$naslov.'</h2>'.
                    '<div>Годиште: '.$godiste.'</div>'.
                    '<div>Километража: '.$kilometraza.' km</div>'.
                    '<div>Запремина мотора: '.$kubikaza.' cm3</div>'.
                    '<div>Снага мотора: '.$snaga.' ks</div>'.
                    '</div>'.
                    '<div style="float: right; padding-left: 20px;">'.
                    '<h3>Цена: '.$cena.' €</h3>'.
                    '<button onclick="location.href=\'oglas.php?broj='.$broj_oglasa.'\'" style="position: absolute; right: 50px; width: 300px; bottom: 50px;">Погледај детаљније</button>'.
                    '</div>'.
                    '</div>'.
                    '</div>'.
                    '</div>';
                    
                }
        
        
            }
            CloseCon($conn);
    ?>
    
</div>


</body>
</html>

