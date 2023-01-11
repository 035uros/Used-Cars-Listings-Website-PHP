<!DOCTYPE html>
<html>
<head>
<title>Постави оглас</title>
<link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="topnav">    
    <a href="login.php">Пријави се</a>
    <a class="active" href="unosOglasa.php">Постави оглас</a>
    <a href="index.php">Почетна</a>
</div>


<div>
    <h1 class="naslov">Постављање огласа</h1>

    <form action="/action_page.php" class="formaUnosOglasa">
        <label for="naslov">Наслов огласа</label>
        <input type="text" id="naslov" name="naslov" placeholder="Наслов" required>

        <p for="files">Увези слике:</p>

        <div class="image-upload">
                <label for="file-input">
                    <img src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/128/cloud-up-icon.png"/>
                </label>
                <input id="file-input" type="file" multiple required>
            </div>

        <label for="marka">Марка:</label>
        <select name="marka" id="marka" required>
            <option value="" disabled selected hidden>Марка</option>
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
        </select>

        <label for="marka">Модел:</label>
        <select name="model" id="model" required>
            <option value="" disabled selected hidden>Модел</option>
            <option value="baza">baza</option>
        </select>

        <h2>Основне информације</h2>
        <label for="godiste">Годиште:</label>
        <input type="text" id="godiste" name="godiste" placeholder="Годиште" required>

        <label for="karoserija">Каросерија:</label>
        <select name="karoserija" id="karoserija" required>
            <option value="" disabled selected hidden>Каросерија</option>
            <option value="baza">baza</option>
        </select>

        <label for="tip">Тип возила:</label>
        <select name="tip" id="tip" required>
            <option value="" disabled selected hidden>Тип</option>
            <option value="baza">Путничко</option>
        </select>

        <label for="gorivo">Гориво:</label>
        <select name="gorivo" id="gorivo" required>
            <option value="" disabled selected hidden>Гориво</option>
            <option value="baza">baza</option>
        </select>

        <br>
        <h2>Додатне информације</h2>
        <label for="vin">Број шасије:</label>
        <input type="text" id="vin" name="vin" placeholder="VIN" required>

        <label for="kubikaza">Кубикажа(cm3):</label>
        <input type="text" id="kubikaza" name="kubikaza" placeholder="Запремина мотора" required>

        <label for="snaga">Снага(KS):</label>
        <input type="text" id="snaga" name="snaga" placeholder="Снага мотора" required>

        <label for="km">Километража:</label>
        <input type="text" id="km" name="km" placeholder="180000" required>

        <select name="registrovan" id="registrovan" required>
            <option value="" disabled selected hidden>Регистрован до</option>
            <option value="baza">мај 2023</option>
        </select>

        <select name="pogon" id="pogon" required>
            <option value="" disabled selected hidden>Погон</option>
            <option value="baza">база</option>
        </select>

        <select name="vrata" id="vrata" required>
            <option value="" disabled selected hidden>Број врата</option>
            <option value="baza">база</option>
        </select>

        <select name="menjac" id="menjac" required>
            <option value="" disabled selected hidden>Мењач</option>
            <option value="baza">база</option>
        </select>


        <h2>Цена</h2>
        <label for="cena">Цена:</label>
        <input type="text" id="cena" name="cena" placeholder="Цена €" required>

        <input type="checkbox" id="fiks" name="fiks">
        <label for="fiks">Фиксна цена</label>
        
        <input type="checkbox" id="zamena" name="zamena">
        <label for="zamena">Замена</label>

        <input type="submit" value="Унеси">
    </form>
</div>


<div class="footer">
    <p>аутодетектив 2023. © Сва права задржана.</p>
</div>

</body>
</html>