<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <title>Корисници</title>
</head>
<body>
    

<div class="topnav">    
    <a href="login.php">Одјави се</a>
    <a href="kontrolnatablaoglas.php">Огласи</a>
    <a href="kontrolnatabla.php" class="active">Корисници</a>
</div>

<h1>Преглед корисника</h1>
<table>
  <tr>
    <th>Име</th>
    <th>Презиме</th>
    <th>Корисничко име</th>
    <th>E-mail</th>
    <th>Статус корисника</th>
    <th>Akcije</th>
  </tr>
  <tr>
    <td>Input</td>
    <td>Doe</td>
    <td>johndoe</td>
    <td>johndoe@example.com</td>
    <td>Administrator</td>
    <td>
    <a href="./kontrolnatablauredi.php" class="green">Уреди</a> 
      <a href="#"class="red">Обриши</a>
      <a href="./kontrolnatablauredi.php"class="green">Додај</a>
    </td>
  </tr>
  <tr>
    <td>Jane</td>
    <td>Doe</td>
    <td>janedoe</td>
    <td>janedoe@example.com</td>
    <td>Korisnik</td>
    <td>
      <a href="./kontrolnatablauredi.php" class="green">Уреди</a> 
      <a href="#"class="red">Обриши</a>
        <a href="./kontrolnatablauredi.php"class="green">Додај</a>
    </td>
  </tr>
</table>








</body>

</html>