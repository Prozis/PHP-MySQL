<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="/css/style.css">
    <title>Поиск</title>
  </head>
  <body>
    <?php
    require_once '../header.php'; ?>
    <div class="container">
    <div class="users_list">
      <?php

        $name = $_POST['name'];
        require_once 'functions.php';
        /* Подключение к серверу MySQL */
        $link = connect();
          $query_find = "SELECT * FROM users WHERE name = '$name'";
          if ($result = mysqli_query($link, $query_find)) {

            /* ВЫводим результаты  поиска таблицей */
            echo '<h3>Результаты поиска:</h3>';
            echo '<table border="1"> <tr id="title"><td>id</td><td>Имя</td><td>Возраст</td><td>E-mail</td></tr>';
            while( $row = mysqli_fetch_assoc($result) ){

              echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['email']."</td></tr>";

            }
            echo "</table>";
            mysqli_free_result($result);

        }
          mysqli_close($link);
       ?>
</div>
<div class="users_form">
  <form class="default_form" action="/core/find.php" method="post">
    <h3>Поиск пользователя:</h3>
<div class="form_inner">
      <label for="name">Имя</label>
      <input type="text" name="name" ><br>
</div>
    <button type="submit" name="button_find">Поиск пользователя</button>
  </form>
</div>



  </body>
</html>
