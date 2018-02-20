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
      $table = "booking";
      /* Создаем соединение */
      mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
      /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
       mysql_select_db($dbName) or die (mysql_error());
       /* Составляем запрос для вставки информации в таблицу login...kod_polzovatelia - название конкретных полей в базе*/
       $query = "INSERT INTO $table SET code_book='".$_POST['zakaz_number']."', user='". $_POST["user_code"] ."', product_name='". $_POST["product_name"] ."'";
       /* Выполняем запрос. Если произойдет ошибка - вывести ее. */

       mysql_query($query) or die(mysql_error());
       /* Закрываем соединение */
       mysql_close();

       $table = "product";
       /* Создаем соединение */
       mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
       /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
       mysql_select_db($dbName) or die (mysql_error());

       /* Составляем запрос для извлечения данных из полей "login", "parol", "kod_polzovatelia", таблицы "pokupatel" */
       $query = "SELECT name, count_in_score, count_in_stock, product_code, branch_code_pr FROM $table WHERE name='". $_POST["product_name"] ."' ";
       /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
       $res = mysql_query($query) or die(mysql_error());
       while($row = mysql_fetch_array($res)) {

         if($row["count_in_stock"] == 0) {
           $prod_code = $row["product_code"];
           $br_code = $row["branch_code_pr"];
           echo "<div>Данного товара нет в наличии на складе. Ваш заказ отправлен в службу закупок</div>";
           mysql_close();

           $table = "procurement_service";
           /* Создаем соединение */
           mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
           /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
           mysql_select_db($dbName) or die (mysql_error());
           /* Составляем запрос для вставки информации в таблицу login...kod_polzovatelia - название конкретных полей в базе*/
           $query = "INSERT INTO $table SET product_code_ps=$prod_code";
           /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
           mysql_query($query) or die(mysql_error());
           /* Закрываем соединение */
           mysql_close();
         } elseif ($row["count_in_score"] == 0) {
           echo "<div>Данного товара нет в наличии в магазине. Ваш заказ отправлен на склад</div>";
           $table = "delivery_service";
           /* Создаем соединение */
           mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
           /* Выбираем базу данных. Если произойдет ошибка - вывести ее */
           mysql_select_db($dbName) or die (mysql_error());
           /* Составляем запрос для вставки информации в таблицу login...kod_polzovatelia - название конкретных полей в базе*/
           $query = "INSERT INTO $table SET branch_code_ds='".$br_code."', code_book_ds='". $_POST["zakaz_number"] ."'";
           /* Выполняем запрос. Если произойдет ошибка - вывести ее. */
           mysql_query($query) or die(mysql_error());
           /* Закрываем соединение */
           mysql_close();

         }
         else {
           mysql_close();
         }
      }
       echo ("<div>Ваш заказ сохранен!
         <a href=\"index.html\">Вернуться к выбору товара</a></div>");
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
  </body>
</html>
