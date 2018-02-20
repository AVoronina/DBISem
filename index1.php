<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <title>Registration</title>
</head>
<body>
  <header>
    <div class="head_reg">
      <h1>ONLINE TECH</h1>
    </div>
  </header>
  <div class="form">
    <form class="reg_name" action="main.php" method="post">
      <div class="reg">
        <div><label for="email">E-mail</label></div>
        <input type="email" name="email">
      </div>
      <div class="reg">
        <div><label for="name"> Ваш код пользователя на эту покупку</label></div>
        <?php
          $code = rand(1, 1000);
          echo "<input type=\"text\" name=\"user_code\" value='".$code."' readonly/>";
        ?>

      </div>
      <div class="clr">
        <input type="submit" value="Войти" class="button">
      </div>
    </form>
  </div>

  <div>
    <a href="staff.php">Хотите работать у нас?</a>
  </div>
</body>
</html>
