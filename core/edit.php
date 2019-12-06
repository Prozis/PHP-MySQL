<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="/css/style.css">
    <title>Редактировани</title>
  </head>
  <body>
    <?php
    require_once '../header.php'; ?>


      <?php
//получаем id пользователя
        $id = $_GET['id'];

        require_once 'functions.php';
        /* Подключение к серверу MySQL */
        $link = connect();
          $query_find = "SELECT * FROM users WHERE id = '$id'";
          if ($result = mysqli_query($link, $query_find)) {

            /* Получаем остальные данные о пользователе */
          $row = mysqli_fetch_assoc($result);
          $id = $row['id'];
          $name = $row['name'];
          $age = $row['age'];
          $email = $row['email'];
          mysqli_free_result($result);

        }

 ?>





<div class="users_form">
  <form class="default_form" action="/core/edit_code.php" method="post">
    <h3>Редактирование данных пользователя:</h3>
    <input type="hidden" name="id" value="<?php echo $id;?>"><br>
      <label for="name">Имя</label>
      <input type="text" name="name" value="<?php echo $name;?>"><br>
      <label for="age">Возраст</label>
      <input type="text" name="age" value="<?php echo $age; ?>"><br>
      <label for="email">E-mail</label>
      <input type="text" name="email" value="<?php echo $email; ?>">
    <button type="submit" name="button_find">Сохранить</button>
  </form>
</div>

  <?php mysqli_close($link); ?>

  </body>
</html>
