<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
  <title>Главная страница</title>
</head>
<body>
  <?php require_once 'header.php'; ?>
  <div class="container">
    <div class="users_list">
    <h3>Список пользователей:</h3>
    <?php
    require_once '/core/functions.php';
    /* Подключение к серверу MySQL */
    $link = connect();
    /* Посылаем запрос серверу */
    $query = 'SELECT * FROM users';
    if ($result = mysqli_query($link, $query)) {

      /* Выборка результатов запроса */

      echo '<table border="1"> <tr id="title"><td>id</td><td>Имя</td><td>Возраст</td><td>E-mail</td><td></td></tr>';
      while( $row = mysqli_fetch_assoc($result) ){
        echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['email']."</td>
        <td>

        <a href='/core/delete.php?id=".$row['id']."'><img src='img/del.png' alt='Удалить' width='20px' height='20px'></a>
        <a href='/core/edit.php?id=".$row['id']."'><img src='img/edit.png' alt='Удалить' width='20px' height='20px'></a>

        </td></tr> ";
      }
      echo "</table>";

      /* Освобождаем используемую память */
      mysqli_free_result($result);
    }
    ?>

  </div>
  <div class="users_form">


    <form class="default_form" action="core/add.php" method="post">
      <h3>Добавление пользователя:</h3>
<div class="form_inner">
        <label for="name">Имя</label>
        <input type="text" name="name" >
          </div>
          <div class="form_inner">
        <label for="age">Возраст</label>
        <input type="text" name="age" ></div>
        <div class="form_inner">
        <label for="email">E-mail</label>
        <input type="text" name="email" >
          </div>
      <button type="submit" name="button_add">Добавить пользователя</button>
      </form>



    <form class="default_form" action="/core/find.php" method="post">
      <h3>Поиск пользователя:</h3>
<div class="form_inner">
        <label for="name">Имя</label>
        <input type="text" name="name" ><br>
  </div>
      <button type="submit" name="button_find">Поиск пользователя</button>
    </form>
  <?php

      //если нажата кнопка удалить

      /* Закрываем соединение */
      mysqli_close($link);
      ?>
        </div>
    </div>
  </body>
  </html>
