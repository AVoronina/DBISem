<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="staff.css" type="text/css"/>
  </head>
  <body>
    <header>
      <div class="head_reg">
        <h1>ONLINE TECH</h1>
      </div>
    </header>
    <div><h2>Наши филиалы</h2>
      <?php
        $hostname = "localhost"; // название/путь сервера, с MySQL
        $username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
        $password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
        $dbName = "online_tech"; // название базы данных

        /* Таблица MySQL, в которой будут храниться данные */
        $table = "branch";
        /* Создаем соединение */
        mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
        /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
        mysql_select_db($dbName) or die (mysql_error());

        /* Составляем запрос для извлечения данных из полей "login", "parol", "kod_polzovatelia", таблицы "pokupatel" */
        $query = "SELECT id, branch_code, address FROM $table";
         /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
        $res = mysql_query($query) or die(mysql_error());
        while ($row = mysql_fetch_array($res)) {
          echo "<form>";
          echo "<div>Код филиала ".$row['branch_code']."</div>\n";
          echo "<div>Адрес ".$row['address']."</div>\n";
          echo "</form>";
        }

       ?>
     </div>
     <div>
       <form class="" action="save_staff.php" method="post">
         <div class="">
           <label for="name">ФИО</label>
           <input type="text" name="name_staff">
         </div>
         <div class="">
           <label for="name">Должность</label>
           <input type="text" name="position">
         </div>
         <div>
           <label for="email">E-mail</label>
           <input type="email" name="email">
         </div>
         <div class="">
           <?php
           echo "<label>Код филиала:<select name=\"branch_code\" >";
           $res = mysql_query($query) or die(mysql_error());
             while ($row = mysql_fetch_array($res)) {
               echo "<option>".$row['branch_code']."</option>\n";
             }
           echo "</select>";
           mysql_close();
            ?>
         </div>
         <input type="submit" name="" value="Отправить заявку" class="button">
       </form>
    </div>
  </body>
</html>
