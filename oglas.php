<?php
include 'baza_podataka.php';
session_start();
$broj_oglasa = 614198327;
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
$sql = "SELECT * FROM ((oglas join automobil on oglas.vin_automobila = automobil.VIN) join korisnik on korisnik.id_korisnika = oglas.id_korisnika) where oglas.broj_oglasa = $broj_oglasa";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($red = $result->fetch_assoc()) {
    $naslov          = $red['naslov'];

    $marka           = $red['id_marke'];
    $sql = "SELECT naziv FROM marka WHERE id_marke = $marka"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $marka = $minired["naziv"];

    $model           = $red['id_modela'];
    $sql = "SELECT naziv FROM model WHERE id_model = $model"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $model = $minired["naziv"];

    $godiste         = $red['godina_proizvodnje'];

    $karoserija      = $red['id_karoserije'];
    $sql = "SELECT naziv FROM karoserija WHERE id_karoserije = $karoserija"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $karoserija = $minired["naziv"];

    $tip             = $red['id_tip_vozila'];
    $sql = "SELECT naziv FROM tip_vozila WHERE id_tipa_vozila = $tip"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $tip = $minired["naziv"];

    $gorivo          = $red['id_goriva'];
    $sql = "SELECT naziv FROM gorivo WHERE id_goriva = $gorivo"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $gorivo = $minired["naziv"];

    $kubikaza        = $red['zapremina'];

    $snaga           = $red['snaga'];

    $km              = $red['kilometraza'];

    $registrovan     = $red['registrovan_do'];

    $vrata           = $red['id_broja_vrata'];
    $sql = "SELECT broj FROM broj_vrata WHERE id_broja_vrata = $vrata"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $vrata = $minired["broj"];


    $menjac          = $red['id_menjaca'];
    $sql = "SELECT naziv FROM menjac WHERE id_menjaca = $menjac"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $menjac = $minired["naziv"];

    $pogon           = $red['id_pogona'];
    $sql = "SELECT naziv FROM pogon WHERE id_pogona = $pogon"; $miniresult = $conn->query($sql); $minired = $miniresult->fetch_assoc();
    $pogon = $minired["naziv"];

    $cena            = $red['cena'];

    $zamena          = $red['zamena'];

    $fiks            = $red['cena_fix'];

    $sasija          = $red['VIN'];

    $kontakt         = $red['kontaktTelefon'];

    $region          = $red['region'];

    $opis          = $red['opis'];

    $slike           = explode(";",$red['slike']);

    }
}

?>


<!DOCTYPE html>
<html>
<head>
<title>АутоДетектив</title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/oglas.css">
</head>
<body>



<div class="topnav">    
    <?php 
        if($_SESSION['potvrdjenpristup'] == true){
            echo'<a href="login.php?o=1">Одјави се</a>';
        }else{
            echo'<a href="login.php">Пријави се</a>';
        }
    ?>
    <a href="unosOglasa.php">Постави оглас</a>
    <a href="index.php">Почетна</a>
</div>

<div class="center">
    <h1 class="naslov"><?php echo $naslov ?></h1>
    
    <div class="slideshow-container">

        <?php
            $broj = intval(count($slike)-1);
            for($i=0; $i<$broj; $i++){
                echo 
                '<div class="mySlides fade">'.
                '<div class="numbertext">'.($i+1).' / '.$broj.'</div>'.
                '<img src="'.$slike[$i].'" style="width:800px; height:500px; object-fit: cover;">'.
                '</div>';
            }
        ?>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <br>
        <?php
            $broj = intval(count($slike));
            echo '<div style="text-align:center">';
            for($i=1; $i<$broj; $i++){
                echo '<span class="dot" onclick="currentSlide('.$i.')"></span>';
            }

            echo '</div>';
        ?>
        
         
    </div>

    <div class="secondRow">
    <div>Произвођач:   <?php echo $marka ?></div>
    <div>Модел:   <?php echo $model ?></div>
    <div>Тип возила:   <?php echo $tip ?></div>
    <div>Годиште:   <?php echo $godiste ?></div>
    <div>Пређени километри:   <?php echo $km ?></div>
    <div>Каросерија:   <?php echo $karoserija ?></div>
    <div>Гориво:   <?php echo $gorivo ?></div>
    <div>Погон:   <?php echo $pogon ?></div>
    <div>Мењач:   <?php echo $menjac ?></div>
    <div>Запремина мотора:   <?php echo $kubikaza ?></div>
    <div>Снага:   <?php echo $snaga ?></div>
    <div>Број врата:   <?php echo $vrata ?></div>
    <div>Регистрован до:   <?php echo $registrovan ?></div>
    <div>Број шасије:   <?php echo $sasija ?></div>
    </div>


</div>

<div class="opis">
    <div>
        <div class="cena">
            <div style="float:right;">Цена: <?php echo $cena ?> €</div>
        </div>
        <div style="float:left; margin-right: 100px;">
            <div>Фиксна цена:<?php if($fiks == 1 ){echo " ДА";} else{echo " НЕ";} ?></div>
            <div>Замена:<?php if($zamena == 1 ){echo " ДА";} else{echo " НЕ";} ?></div>
        </div>
        <div>
            <div>Регион:  <?php echo $region ?></div>
            <div>Контакт телефон:  <?php echo $kontakt ?></div> 
        </div>
        
    </div>
</div>

<div class="opis">
<h3>Опис</h3>
<p><?php echo $opis ?></p>
</div>



<div class="footer">
    <p>аутодетектив 2023. © Сва права задржана.</p>
</div>

<script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    }
</script>
</body>
</html>

