<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="/css/style.css">
    <title>Сообщение</title>
  </head>
  <body>
    <?php
    require_once 'header.php'; ?>
    <div class="container">
      <div class="users_form">
        <h3>Добавление сообщения в таблицу 'mesage':</h3>

        <form class="default_form" action="" method="post">
            <label for="title">Заголовок</label><br>
            <input type="text" name="title" ><br>
            <label for="body">Введите текст сообщения</label>
            <textarea name="body" rows="8" cols="50"></textarea>
              <button type="submit" name="button_add">Отправить</button>
          </form>

      <?php

        $name = $_POST['name'];
        require_once 'functions.php';
        /* Подключение к серверу MySQL */
        $link = connect();
          $query_find = "SELECT * FROM users WHERE name = '$name'";
          if ($result = mysqli_query($link, $query_find)) {
            while( $row = mysqli_fetch_assoc($result) ){
            }
            mysqli_free_result($result);

        }
          mysqli_close($link);
       ?>

</div>



  </body>
</html>
