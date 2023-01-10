<!DOCTYPE html>
<html>
<head>
<title>АутоДетектив</title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/oglas.css">
</head>
<body>

<div class="topnav">    
    <a href="login.php">Пријави се</a>
    <a href="unosOglasa.php">Постави оглас</a>
    <a href="index.php">Почетна</a>
</div>

<div class="center">
    <h1>Naziv oglasa</h1>
    
    <div class="slideshow-container">

        <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="images/oglasi/oglastajitaj/slide1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="images/oglasi/oglastajitaj/slide2.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="images/oglasi/oglastajitaj/slide3.jpg" style="width:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

        <br>

        <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
    </div>

    <div class="secondRow">
    <div>Произвођач:</div>
    <div>Модел:</div>
    <div>Тип возила:</div>
    <div>Годиште:</div>
    <div>Пређени километри:</div>
    <div>Каросерија:</div>
    <div>Гориво:</div>
    <div>Погон:</div>
    <div>Мењач:</div>
    <div>Запремина мотора:</div>
    <div>Снага:</div>
    <div>Број врата:</div>
    <div>Регистрован до:</div>
    <div>Број шасије:</div>
    </div>

    <div class="thirdRow">
    <div>база</div> 
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    <div>база</div>
    </div>

</div>

<div class="opis">
    <div>
        <div class="cena">
            <div style="float:right;">Цена: baza</div>
        </div>
        <div style="float:left; margin-right: 100px;">
            <div>Фиксна цена:</div>
            <div>Замена:</div>
        </div>
        <div>
            <div>Регион:</div>
            <div>Контакт телефон:</div> 
        </div>
        
    </div>
</div>

<div class="opis">
<h3>Опис</h3>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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

