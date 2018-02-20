<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="get_ord.css" type="text/css"/>
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

    /* Выгружаем таблицу товаров*/
    $table = "product";
    /* Создаем соединение */
    mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
    /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
    mysql_select_db($dbName) or die (mysql_error());

    /* Составляем запрос для извлечения данных из полей "login", "parol", "kod_polzovatelia", таблицы "pokupatel" */
    $query = "SELECT name FROM $table";
    /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
    $res = mysql_query($query) or die(mysql_error());
    echo "<form action=\"save_ord.php\" method=\"post\"name=\"test_form\"> ";
      echo "<div class=\"select\">";
        echo "<label>Товар:<select name=\"product_name\" >";
          while ($row = mysql_fetch_array($res)) {
            echo "<option>".$row['name']."</option>\n";
          }
        echo "</select>";
      echo "</div>";
      mysql_close();

    $table = "buyer";
    /* Создаем соединение */
    mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
    /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
    mysql_select_db($dbName) or die (mysql_error());
    /* Составляем запрос для извлечения данных из полей "login", "parol", "kod_polzovatelia", таблицы "pokupatel" */
    $query = "SELECT user_code FROM $table";
    /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
    $res = mysql_query($query) or die(mysql_error());
    echo "<div class=\"select\">";
      echo "<label>Код пользователя:<select name=\"user_code\" >";
        while ($row = mysql_fetch_array($res)) {
          echo "<option>".$row['user_code']."</option>\n";
        }
      echo "</select>";
      echo "</div>";
      mysql_close();

      echo "<div>";
        $code = rand(1, 1000);
        echo "Код заказа:<input type=\"text\"name=\"zakaz_number\" maxlength=\"30\" value='".$code."' readonly/>";
      echo "</div>";
      echo "<input type=\"submit\"class=\"buttons\"value=\"Завершить заказ\"/>";
    echo "</form>";
    ?>
  </body>
</html>
