<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css" type="text/css"/>
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
      $table = "buyer";
      /* Создаем соединение */
      mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
      /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
      mysql_select_db($dbName) or die (mysql_error());
      /* Составляем запрос для вставки информации в таблицу login...kod_polzovatelia - название конкретных полей в базе*/
      $query = "INSERT INTO $table SET login='".$_POST['email']."', user_code='".$_POST["user_code"]."' ";
      /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
      mysql_query($query) or die(mysql_error());
      /* Закрываем соединение */
      mysql_close();

      /* Выгружаем таблицу товаров*/
      $table = "product";
      /* Создаем соединение */
      mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
      /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
      mysql_select_db($dbName) or die (mysql_error());

      /* Составляем запрос для извлечения данных из полей "login", "parol", "kod_polzovatelia", таблицы "pokupatel" */
      $query = "SELECT id, count_in_score, count_in_stock, name, product_code, branch_code_pr FROM $table";
      /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
      $res = mysql_query($query) or die(mysql_error());
      while ($row = mysql_fetch_array($res)) {

        echo "<div class=\"char\">";

          echo "<div>Название ".$row['name']."</div>\n";
          echo "<div>В магазине ".$row['count_in_score']."</div>\n";
          echo "<div>На складе ".$row['count_in_stock']."</div>\n";
          echo "<div>Код продукта ".$row['product_code']."</div>\n";
          echo "<div>Код филиала ".$row['branch_code_pr']."</div>\n";
          // echo "<div><img src=\"img\\7.jpg\" width=\"100px\" height=\"100px\"></div>\n";
        echo "</div>";
      }
      mysql_close();
      echo "<div class=\"clr\">";
      echo "<form action=\"get_ord.php\"method=\"post\"name=\"order\">";
        echo "<input type=\"submit\" value=\"Сделать заказ\" class=\"button\">";
      echo "</form>";
      echo "</div>";
     ?>
  </body>
</html>
