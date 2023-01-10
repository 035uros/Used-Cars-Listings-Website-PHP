<!DOCTYPE html>
<html>
<head>
<title>АутоДетектив</title>
<link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="topnav">    
    <a href="login.php">Пријави се</a>
    <a href="unosOglasa.php">Постави оглас</a>
    <a class="active" href="index.php">Почетна</a>
</div>

<img src="images/banner/supra.jpg" class="banner" alt="Toyota Supra">

<form action="/action_page.php" class="forma">
    
    <select name="marka" id="marka" >
        <option value="" disabled selected hidden>Марка</option>
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
    </select>


    <select name="model" id="model" >
        <option value="" disabled selected hidden>Модел</option>
        <option value="baza">baza</option>
    </select>

    <input type="text" id="cena" name="cena" placeholder="цена до">

    <select name="godisteod" id="godisteod" >
        <option value="" disabled selected hidden>Годише од</option>
        <option value="baza">baza</option>
    </select>

    <select name="godistedo" id="godistedo" >
        <option value="" disabled selected hidden>Годише до</option>
        <option value="baza">baza</option>
    </select>

    <select name="karoserija" id="karoserija" >
        <option value="" disabled selected hidden>Каросерија</option>
        <option value="baza">baza</option>
    </select>

    <select name="gorivo" id="gorivo" >
        <option value="" disabled selected hidden>Гориво</option>
        <option value="baza">baza</option>
    </select>

    <select name="region" id="region" >
        <option value="" disabled selected hidden>Регион</option>
        <option value="baza">baza</option>
    </select>


    <input type="submit" value="Претражи">
</form>

<div class="footer">
    <p>аутодетектив 2023. © Сва права задржана.</p>
</div>

</body>
</html>

