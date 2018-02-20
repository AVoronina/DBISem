<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <div class="head_reg">
        <h1>ONLINE TECH</h1>
      </div>
    </header>
    <?php
      $hostname = "localhost"; // название/путь сервера, с MySQL
      $username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
      $password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
      $dbName = "online_tech"; // название базы данных

      /* Таблица MySQL, в которой будут храниться данные */
      $table = "staff";
      /* Создаем соединение */
      mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
      /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
       mysql_select_db($dbName) or die (mysql_error());
       /* Составляем запрос для вставки информации в таблицу login...kod_polzovatelia - название конкретных полей в базе*/
       $query = "INSERT INTO $table SET name='".$_POST['name_staff']."', post='". $_POST["position"] ."', branch_code_staff='". $_POST["branch_code"] ."'";
       /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
       mysql_query($query) or die(mysql_error());
       /* Закрываем соединение */
       mysql_close();
     ?>
     <style media="screen">
       body {
         background: -webkit-radial-gradient(center, ellipse cover, rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%);
       }
       div {
         text-align: center;
         font-family: monospace;
         font-size: 20px;
       }

       header {
         color: #fff;
         font-size: 20px;
         text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
         0px 8px 13px rgba(0,0,0,0.1),
         0px 18px 23px rgba(0,0,0,0.1);
       }
     </style>
     <div><p>Спасибо!
       Ваша заявка принята. Мы с Вами свяжемся</p>
       <a href="index.html">Вернуться назад</a>
     </div>
  </body>
</html>
