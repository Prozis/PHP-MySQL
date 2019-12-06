<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="/css/style.css">
    <title>Сообщение</title>
  </head>
  <body>
    <?php
    require_once '../header.php'; ?>
    <div class="container">
      <div class="users_form">
        <h3>Добавление сообщения в таблицу 'mesage':</h3>

        <form class="default_form" action="" method="post">
            <div class="form_inner">
              <input type="text" name="title" >
              <label for="title">Заголовок</label>
            </div>

  <div class="form_inner">
            <label for="body">Введите текст сообщения</label>
            <textarea name="body" ></textarea>
              </div>
              <button type="submit" name="button_add">Отправить</button>
          </form>

      <?php

        $name = $_POST['name'];
        require_once 'functions.php';
        /* Подключение к серверу MySQL */
        $link = connect();

          mysqli_close($link);
       ?>

</div>



  </body>
</html>
